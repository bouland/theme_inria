<?php

	/**
	 * Elgg bookmarks plugin index page
	 * 
	 * @package ElggBookmarks
	 */

	// Start engine
		require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

	// access check for closed groups
	group_gatekeeper();
		
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
		}
		
		$title = sprintf(elgg_echo('bookmarks:read'), $page_owner->name);
		
		//theme_inria change
		$area2 = elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'tab_select' => 'bookmarks'));
		
		// List bookmarks
		//$content = elgg_view_title($title);
		set_context('search');
		$offset = (int)get_input('offset', 0);
		$content .= elgg_list_entities(array('type' => 'object', 'subtype' => 'bookmarks', 'container_guid' => page_owner(), 'limit' => 10, 'offset' => $offset, 'full_view' => FALSE, 'view_type_toggle' => FALSE));
		$area2 .= elgg_view('profile/tabs/content', array('content' => $content));
		
		set_context('bookmarks');
		
	// Format page
		$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);
		
	// Draw it
		page_draw($title, $body);

?>