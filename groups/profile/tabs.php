<?php
	/**
	 * group profile with tabs
	 * 
	 * @package ElggGroups
	 */
	$group_guid = get_input('group_guid');
	set_context('groups');
	
	global $autofeed;
	$autofeed = true;
	
	$group = get_entity($group_guid);
	if ($group) {
				
		set_page_owner($group_guid);
		
		// Hide some items from closed groups when the user is not logged in.
		//$view_all = true;
		
		//$groupaccess = group_gatekeeper(false);
		
		$area2 = elgg_view('profile/tabs/menu', array('entity' => $group, 'tab_select' => 'home'));
		
		$content = 	elgg_view('group/group', array('entity' => $group, 'user' => $_SESSION['user'], 'full' => true));
		
		//elgg_view('group/group', array('entity' => $group, 'user' => $_SESSION['user'], 'full' => true));
		$area2 .= elgg_view('profile/tabs/content', array('content' => $content));
			
		$content = elgg_view_river_group(array('group_guid' => $group_guid));
		if($content){
			$area2 .= elgg_view('custom_index_inria/index_box', array('title' => elgg_echo('inria:news'),
																  'body'  => $content ));
		}
		//$area2 .= elgg_view('profile/tabs/content', array('content' => $content));
		
		$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2, $area3);
	} else {
		$title = elgg_echo('groups:notfound');
		
		$area2 = elgg_view_title($title);
		$area2 .= elgg_view('groups/contentwrapper',array('body' => elgg_echo('groups:notfound:details')));
		
		$body = elgg_view_layout('two_column_left_sidebar', "", $area2,"");
	}
		
	// Finally draw the page
	page_draw($title, $body);
?>