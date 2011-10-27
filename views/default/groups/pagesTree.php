<?php

	
	if (isset($vars['page_owner_user']) && $vars['page_owner_user'] instanceof ElggGroup) {
		$group_guid = $vars['page_owner_user']->guid;
	}
	
	
	if ($group_guid){
		$context = get_context();
		set_context('search');
		$group_pages_top = elgg_get_entities(array(	'types' => 'object',
												'subtypes' => array('page_top'),
												'container_guid' => $group_guid,
												'limit' => 99,
												'full_view' => FALSE,
												'pagination' => FALSE));
		$group_pages_count = elgg_get_entities(array(	'types' => 'object',
												'subtypes' => array('page_top','page'),
												'container_guid' => $group_guid,
												'limit' => 99,
												'full_view' => FALSE,
												'pagination' => FALSE,
												'count' => TRUE));
		set_context($context);
	}

	if ( is_array($group_pages_top) ){
		elgg_extend_view('metatags','pages/metatags');
		
		echo '<div class="submenu_group"><div class="submenu_group_wrapper">';
		$more_url = "{$vars['url']}pg/pages/owned/group:{$group_guid}/";
		echo '<a href="' . $more_url . '">' . elgg_echo("pages:group") . " ({$group_pages_count})</a>";
		
		$index = 0;
		foreach ($group_pages_top as $pages) {
			pages_set_navigation_parent($pages);
			set_input('page_guid', $pages->guid);
			$index++;
		
		
		
			$guid = (int) get_input('treeguid', get_input('page_guid'));
			if(!empty($guid)){
				$page = get_entity($guid);
				if($page->getSubtype() == "page_top"){
?>
		
		<script type="text/javascript">
			var pages_tree_first;
			
			$(function(){
				$("#pages_tree_sidebar_tree<?php echo $index; ?>").tree({ 
					"opened": ["<?php echo get_input('page_guid', $guid); ?>"],
					"selected": ["<?php echo get_input('page_guid', $guid); ?>"],
					"ui": {
						"theme_name": "classic"
					},
					"rules": {
						"multiple": false,
						"drag_copy": false,
						// only nodes of type root can be top level nodes
						"valid_children" : [ "root" ] 
					},
					"callback": {
						
						"onmove": function (NODE, REF_NODE, TYPE, TREE_OBJ, RB){
							var page_guid = TREE_OBJ.get_node(NODE).find("a").attr("id");
							var parent_guid = TREE_OBJ.parent(NODE).find("a:first").attr("id");
							var order = TREE_OBJ.parent(NODE).children("ul").children("li").children("a").makeDelimitedList("id");

							pages_tree_reorder(page_guid, parent_guid, order);
						},
						"onselect": function(NODE, TREE_OBJ){
							if(!pages_tree_first){
								pages_tree_first = true;
								return;
							}
							
							var location = TREE_OBJ.get_node(NODE).find("a").attr("href");
							if(location && (location !== document.location.href)){
								document.location.href = location;
							}
						}
					},
					types : {
						// all node types inherit the "default" node type
						"default" : {
							deletable : false,
							renameable : false
						},
						"root" : {
							draggable : false
						},
						"non_edit" : {
							draggable : false
						}
					}
				});
			});
		</script>
		
			<div id="pages_tree_sidebar_tree<?php echo $index; ?>">
				
				<ul>
					<li id="pages_tree_sidebar_tree_main" rel="root">
						<a id="<?php echo $page->getGUID(); ?>" href="<?php echo $page->getURL(); ?>"><?php echo $page->title; ?></a>
					
						<?php
							echo pages_tree_display_pages($page);
						?>
				
					</li>
					
				</ul>
			</div>
			
<?php 
				}
			}
		}
		echo '<div class="clearfloat"></div>';
		echo '</div></div>';
	}
?>

