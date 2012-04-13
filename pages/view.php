<?php
	/**
	 * Elgg Pages
	 *
	 * @package ElggPages
	 */

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
	global $CONFIG;
	
	$page_guid = get_input('page_guid');
	set_context('pages');

	if (is_callable('group_gatekeeper')) group_gatekeeper();

	$pages = get_entity($page_guid);
	if (!$pages) forward();

	$container = $pages->container_guid;

	if ($container) {
		set_page_owner($container);
	} else {
		set_page_owner($pages->owner_guid);
	}

	// add_submenu_item(sprintf(elgg_echo("pages:user"), page_owner_entity()->name), $CONFIG->url . "pg/pages/owned/" . page_owner_entity()->username, 'pageslinksgeneral');
	
	//add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/$guid", 'pageslinks');
	add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/$guid", 'pagesactions');
	if (($pages) && ($pages->canEdit())) {
		add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/$guid", 'pagesactions');
		add_submenu_item(elgg_echo('pages:newchild'),"{$CONFIG->wwwroot}pg/pages/new/?parent_guid={$pages->getGUID()}&container_guid=" . page_owner(), 'pagesactions');
		$delete_url = elgg_add_action_tokens_to_url("{$CONFIG->wwwroot}action/pages/delete?page={$pages->getGUID()}");
		add_submenu_item(elgg_echo('pages:delete'), $delete_url, 'pagesactions', true);
	}
	if (can_write_to_container()) {
		add_submenu_item(elgg_echo('pages:new'), $CONFIG->url . "pg/pages/new/?container_guid=" . $entity->container_guid , 'pagesactions2');
	}
	//if the page has a parent, get it
	if($parent_page = get_entity(get_input("page_guid")))
		$parent = $parent_page;

	$title = $pages->title;

	// Breadcrumbs
	//$body = elgg_view('pages/breadcrumbs', array('page_owner' => page_owner_entity(), 'parent' => $parent));
	$area2 = elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'tab_select' => 'pages'));
	
	$content = elgg_view_title($pages->title);
	
	
	$content .= elgg_view_entity($pages, true);

	//add comments
	$content .= elgg_view_comments($pages);

	$area2 .= elgg_view('profile/tabs/content', array('content' => $content));
	
	pages_set_navigation_parent($pages);
	$sidebar = elgg_view('pages/sidebar/tree');

	$body = elgg_view_layout('two_column_left_sidebar', '', $area2, $sidebar);

	// Finally draw the page
	page_draw($title, $body);

?>
