<?php

	

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
	
	global $CONFIG;
	
	gatekeeper();
	
	$user_guid = get_input('user_guid');
	$group_guid = get_input('group_guid');
	$delete = get_input('delete');
	$add = get_input('accept');
	$reject = get_input('reject');
	
	$url = $CONFIG->url . "pg/groups/" . $group_guid;
	
	
	if( empty($user_guid) ){
		forward($_SERVER['HTTP_REFERER']);
	}

	
	if ($add){
		action("groups/addtogroup");
	}
	elseif($reject){
		
		set_page_owner($group_guid);
		
		set_context('groups');
		
		$title = elgg_echo('theme_inria:membershiprequests:title');

		$area2 = elgg_view_title($title);
		
		$inputs = elgg_view('forms/groups/membershiprej');
		
		$form = elgg_view('input/form', array('action' => $CONFIG->url.'action/groups/membershiprej', 'body' => $inputs, 'name' => 'messageForm', 'internalid' => 'membershipreq'));
		
		$area2 .= elgg_view('groups/contentwrapper', array('body' => $form));
		
		$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2);
	
		page_draw($title, $body);
	
	}elseif($delete){
		action('groups/killrequest', $CONFIG->url . "pg/groups/membershipreq/" . $group_guid);
	}else{
		forward($CONFIG->url . "pg/groups/" . $group_guid);
	}
	
		
	
?>