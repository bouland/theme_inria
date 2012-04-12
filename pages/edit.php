<?php
	/**
	 * Elgg Pages
	 * 
	 * @package ElggPages
	 */

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
	global $CONFIG;
	
	gatekeeper();
		
	$page_guid = get_input('page_guid');
	$pages = get_entity($page_guid);
	
	// Get the current page's owner
	if ($container = $pages->container_guid) {
		set_page_owner($container);
	}
	$page_owner = page_owner_entity();
	if ($page_owner === false || is_null($page_owner)) {
		$page_owner = $_SESSION['user'];
		set_page_owner($page_owner->getGUID());
	}
	
	add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/$page_guid", 'pagesactions');
	add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/$page_guid", 'pagesactions');
	if (($pages) && ($pages->canEdit())) {
		add_submenu_item(elgg_echo('pages:newchild'),"{$CONFIG->wwwroot}pg/pages/new/?parent_guid={$pages->getGUID()}&container_guid=" . page_owner(), 'pagesactions');
		$delete_url = elgg_add_action_tokens_to_url("{$CONFIG->wwwroot}action/pages/delete?page={$pages->getGUID()}");
		add_submenu_item(elgg_echo('pages:delete'), $delete_url, 'pagesactions', true);
	}
	if (can_write_to_container()) {
		add_submenu_item(elgg_echo('pages:new'), $CONFIG->url . "pg/pages/new/?container_guid=" . $entity->container_guid , 'pagesactions2');
	}
	
	$title = elgg_echo("pages:edit");
	
	$body = elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'tab_select' => 'pages'));
		
	if (($pages) && ($pages->canEdit()))
	{
		$body .= elgg_view_title($title);
		
		$body .= elgg_view("forms/pages/edit", array('entity' => $pages));
			 
	} else {
		$body .= elgg_echo("pages:noaccess");
	}
	
	$body = elgg_view_layout('two_column_left_sidebar', '', $body);
	
	page_draw($title, $body);
?>