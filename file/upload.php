<?php
	/**
	 * Elgg file browser uploader
	 * 
	 * @package ElggFile
	 */

	require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

	gatekeeper();
	if (is_callable('group_gatekeeper')) {
		group_gatekeeper();
	}

	// Render the file upload page

	$container_guid = page_owner();
	
	//theme_inria change
	$area2 = elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'tab_select' => 'file'));
	$area2 .= elgg_view_title($title = elgg_echo('file:upload'));
	
	$area2 .= elgg_view("file/upload", array('container_guid' => $container_guid));
	$body = elgg_view_layout('two_column_left_sidebar', '', $area2);
	
	page_draw(elgg_echo("file:upload"), $body);
	
?>