<?php

	/**
	 * Elgg Groups add a forum topic page
	 * 
	 * @package ElggGroups
	 */

	// Load Elgg engine
	require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
	
	gatekeeper();
	
	$page_owner = set_page_owner((int) get_input('group_guid'));
	
	if (!(page_owner_entity() instanceof ElggGroup)) forward();
	
	//theme_inria change
	$area2 = elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'tab_select' => 'forum'));
    $content = elgg_view("forms/forums/addtopic");
    $area2 .= elgg_view('profile/tabs/content', array('content' => $content));
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
	
	// Display page
	page_draw(elgg_echo('groups:addtopic'),$body);
	
?>