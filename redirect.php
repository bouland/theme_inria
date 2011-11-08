<?php 

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
	
	global $CONFIG;
	
	$_SESSION['last_forward_from'] = $_SESSION['HTTP_REFERER'];
	
	$body .= elgg_view_title(elgg_echo('theme_inria:redirect:title'));
		
	$body = elgg_view_layout('two_column_left_sidebar', '', $body, '');
	
	// Finally draw the page
	page_draw($title, $body);

