<?php
	/**
	 * Delete a user request to join a closed group.
	 * 
	 * @package ElggGroups
	 */

	// Load configuration
	global $CONFIG;
	
	gatekeeper();
	
	$user_guid = get_input('user_guid');
	$group_guid = get_input('group_guid');
	
	
	$form .= elgg_view('input/text',array('internalname' => 'message', 'value' => elgg_echo('theme_inria:reject:default_message')) );
	
	$form .= elgg_view('input/submit');
	
	$form .= elgg_view('input/hidden', array('internalname' => 'user_guid', 'value' => $user_guid));
	$form .= elgg_view('input/hidden', array('internalname' => 'group_guid', 'value' => $group_guid));
	
	$area2 = elgg_view_title(elgg_echo('theme_inria:reject:title'));
	
	$area2 .= elgg_view('input/form', array('action' => $vars['url'].'theme_inria/actions/sendMail', 'body' => $form));

	$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);

	page_draw($title, $body)
	
?>