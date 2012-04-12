<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 */

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
	gatekeeper();
		
	$page_guid = get_input('page_guid');
		
    $pages = get_entity($page_guid);
	if ($pages->container_guid) {
		set_page_owner($pages->container_guid);
	} else {
		set_page_owner($pages->owner_guid);
	}
	
	if (is_callable('group_gatekeeper')) group_gatekeeper();

	$limit = (int)get_input('limit', 20);
	$offset = (int)get_input('offset');
	
	$page_guid = get_input('page_guid');
	$pages = get_entity($page_guid);
	
	if (($pages) && ($pages->canEdit())) {
		add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/$page_guid", 'pagesactions');
	}
	if(can_write_to_container()){
		add_submenu_item(elgg_echo('pages:new'), $CONFIG->url . "pg/pages/new/?container_guid=" . $pages->container_guid , 'pagesactions2');
	}
		
					 
	$title = $pages->title . ": " . elgg_echo("pages:history");
	
	$area2 = elgg_view('profile/tabs/menu', array('entity' => $pages, 'tab_select' => 'pages'));
	$area2 .= elgg_view_title($title);
	
	$context = get_context();
	
	set_context('search');
	
	$area2 .= list_annotations($page_guid, 'page', $limit, false);
	
	set_context($context);
	
	
	pages_set_navigation_parent($pages);
	$area3 = elgg_view('pages/sidebar/tree');
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $area2, $area3);
	
	page_draw($title, $body);
?>