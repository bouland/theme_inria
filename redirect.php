<?php 

	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
	
	global $CONFIG;
	
	$body .= elgg_view_title(elgg_echo('theme_inria:redirect:title'));
		
	$body = elgg_view_layout('two_column_left_sidebar', '', $body, '');
	
	// Finally draw the page
	page_draw($title, $body);

