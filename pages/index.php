<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 */

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

	global $CONFIG;
	
	// Add menus
	$owner = page_owner_entity();
	if (!($owner instanceof ElggGroup)) {
    		add_submenu_item(sprintf(elgg_echo("pages:user"), page_owner_entity()->name), $CONFIG->url . "pg/pages/owned/" . page_owner_entity()->username, 'pageslinksgeneral');
    		add_submenu_item(elgg_echo('pages:all'),$CONFIG->wwwroot."pg/pages/all/", 'pageslinksgeneral');
	}
    if (($owner instanceof ElggEntity) && (can_write_to_container(0,$owner->guid))){
        add_submenu_item(elgg_echo('pages:new'), $CONFIG->url . "pg/pages/new/?container_guid=" . page_owner(), 'pagesactions');
        //if ($owner instanceof ElggUser) {
			add_submenu_item(elgg_echo('pages:welcome'), $CONFIG->url . "pg/pages/welcome/" . $owner->username, 'pagesactions');
		//}
    }
    
    //INRIA update
	$group = page_owner_entity();
	if ($group->pages_enable != 'no') {
		$context = get_context();
		set_context('search');
		$pages = elgg_get_entities(array('types' => 'object',
											'subtypes' => array('page_top'),
											'container_guid' => $group->guid,
											'limit' => 5,
											'full_view' => FALSE,
											'pagination' => FALSE));
		set_context($context);
	
	}
	
	if ($pages){
		foreach ($pages as $page) {
			pages_set_navigation_parent($page);
			//$side_bar .= elgg_view('pages/sidebar/tree');
		}
	}
    
	// access check for closed groups
	group_gatekeeper();
	
	$limit = get_input("limit", 10);
	$offset = get_input("offset", 0);
	
	if($owner instanceof ElggGroup){
		$title = sprintf(elgg_echo("pages:group"),$owner->name);
	}else{
		$title = sprintf(elgg_echo("pages:user"),$owner->name);
	}

	
	// Get objects
	$context = get_context();
	
	set_context('search');
	
	$objects = elgg_list_entities(array('types' => 'object', 'subtypes' => 'page_top', 'container_guid' => page_owner(), 'limit' => $limit, 'offset' => $offset, 'full_view' => FALSE));
	
	set_context($context);
	
	//get the owners latest welcome message
	$welcome_message = elgg_get_entities(array('types' => 'object', 'subtypes' => 'pages_welcome', 'container_guid' => $owner->guid, 'limit' => 1));
	
	
	//$side_bar = elgg_view('theme_inria/pageTreeSideBar');
	
	$body = elgg_view_title($title);
	$body .= elgg_view("pages/welcome", array('entity' => $welcome_message));
	$body .= $objects;
	$body = elgg_view_layout('two_column_left_sidebar', '', $body, $side_bar);
	
	// Finally draw the page
	page_draw($title, $body);
?>