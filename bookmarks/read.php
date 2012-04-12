<?php

	/**
	 * Elgg bookmarks plugin index page
	 * 
	 * @package ElggBookmarks
	 */

	// Start engine
	require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

	$bookmark_guid = get_input('bookmark_guid');
	set_context('bookmarks');

	if (is_callable('group_gatekeeper')) group_gatekeeper();

	$bookmark = get_entity($bookmark_guid);
	if (!$bookmark) forward();

	$container_guid = $bookmark->container_guid;

	if ($container_guid) {
		set_page_owner($container_guid);
	} else {
		set_page_owner($bookmark->owner_guid);
	}
	
	if ( can_write_to_container(0,$container_guid) ){
		add_submenu_item(elgg_echo('bookmarks:edit'),$vars['url'] . "pg/bookmarks/edit/" . $bookmark_guid, 'bookmarksactions');
		add_submenu_item(elgg_echo('bookmarks:delete'),$vars['url'] . "action/bookmarks/delete?bookmark_guid=" . $bookmark_guid, 'bookmarksactions', true);
	}
	
	$title = $bookmark->title;

	// Breadcrumbs
	//$body = elgg_view('pages/breadcrumbs', array('page_owner' => page_owner_entity(), 'parent' => $parent));
	$body = elgg_view('profile/tabs/menu', array('entity' => $bookmark, 'tab_select' => 'bookmarks'));
	
	
	$body .= elgg_view_entity($bookmark, true);


	$body = elgg_view_layout('two_column_left_sidebar', '', $body, '');

	// Finally draw the page
	page_draw($title, $body);

?>