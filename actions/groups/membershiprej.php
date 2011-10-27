<?php
	require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))) . "/engine/start.php");
	
	global $CONFIG;
	
	gatekeeper();
	
	$send_to = get_input('user_guid');
	$subject = get_input('title');
	$message = get_input('message');
	$send = get_input('send');
	$cancel = get_input('cancel');
	$group_guid = get_input('group_guid');
	
	if ($group_guid){
		$url_back = 'pg/groups/membershipreq/' . $group_guid;
		$url_fwd = 'pg/groups/' . $group_guid;
	}else{
		$url_back = '';
		$url_fwd = '';
	}

	
	if ($cancel){
		forward($url_back);
	}
	
	// Cache to the session to make form sticky
	$_SESSION['msg_to'] = $send_to;
	$_SESSION['msg_title'] = $subject;
	$_SESSION['msg_contents'] = $message;

	if (empty($send_to)) {
		register_error(elgg_echo("messages:user:blank"));
		forward($url_back);
	}
		

	// Make sure the message field, send to field and title are not blank
	if (empty($message) || empty($subject)) {
		register_error(elgg_echo("messages:blank"));
		forward($url_back);
	}
	
	$result = notify_user($send_to, get_loggedin_userid(), $subject, $message);
	
	// Save 'send' the message
	if ($result) {
		system_message(elgg_echo("messages:posted"));
		// successful so uncache form values
		unset($_SESSION['msg_to']);
		unset($_SESSION['msg_title']);
		unset($_SESSION['msg_contents']);
		
		action('groups/killrequest', $CONFIG->url . "pg/groups/membershipreq/" . $group_guid);			
		
	}else{
		register_error(elgg_echo("messages:error"));
		forward($url_back);
	}

	


	