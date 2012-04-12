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
	
	// Get the current page's owner
		if ($container = $pages->container_guid) {
			set_page_owner($container);
		}
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
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