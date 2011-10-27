<?php

    /**
	 * Elgg send a message page
	 *
	 * 
	 * @package ElggMessages
	 *
	 * @uses $vars['friends'] This is an array of a user's friends and is used to populate the list of
	 * people the user can message
	 *
	 */
	 
	//grab the user id to send a message to. This will only happen if a user clicks on the 'send a message'
	//link on a user's profile or hover-over menu
	$send_to = get_input('user_guid');
	$group_guid = (int) get_input('group_guid');
	$group = get_entity($group_guid);
	
	
	// old sticky forms
	if (!$send_to) {
		$send_to = $_SESSION['msg_to'];
    }
	$msg_title = $_SESSION['msg_title'];
	if(!$msg_title){
		$msg_title = elgg_echo('theme_inria:membershiprej:default_subject');
	}
	$msg_content = $_SESSION['msg_contents'];
	if(!$msg_content){
		$loggedin_user = get_loggedin_user();
		if ($loggedin_user){
			$msg_content = sprintf(elgg_echo('theme_inria:membershiprej:default_message'), $group->name, $loggedin_user->name);
		}
	}
	// clear sticky form cache in case user browses away from page and comes back 
	unset($_SESSION['msg_to']);
	unset($_SESSION['msg_title']);
	unset($_SESSION['msg_contents']);
	//check to see if the message recipient has already been selected
	echo '<div class="message_box"><label>' . elgg_echo("messages:to") . " :</label><div>";
	if(is_array($send_to)){
		foreach($send_to as $user_guid){
			$user = get_user($user_guid);
			echo "<div class=\"member_icon\"><a href=\"".$user->getURL()."\">" . elgg_view("profile/icon",array('entity' => $user, 'size' => 'tiny', 'override' => 'true')) . "</a></div>";
			echo elgg_view('input/hidden', array('internalname' => 'user_guid[]', 'value' => $user_guid));	
    	}
	}else{
		$user = get_user($send_to);
		echo "<div class=\"member_icon\"><a href=\"".$user->getURL()."\">" . elgg_view("profile/icon",array('entity' => $user, 'size' => 'tiny', 'override' => 'true')) . "</a></div>";
		echo elgg_view('input/hidden', array('internalname' => 'user_guid', 'value' => $send_to));
	}
	echo '<div class="clearfloat"></div></div></div>';
	
	echo '<div class="message_box"><label for="title">' . elgg_echo("messages:title") . '</label>';
	echo elgg_view('input/text',array(	'internalname' => 'title',
										'internalid' => 'title',
										'value' => $msg_title
									));
	echo '</div>';
	
	echo '<div class="message_box"><label for="content">' . elgg_echo("messages:message") . '</label>';
	echo elgg_view("input/longtext", array( "internalname" => "message",
											'internalid' => 'content',
											"value" => $msg_content
									));
	echo '</div>';
	
	echo elgg_view('input/hidden', array('internalname' => 'group_guid', 'value' => $group_guid));
	
	echo elgg_view('input/submit', array(	'internalname' => 'cancel',
											'value' => elgg_echo('theme_inria:membershiprej:cancel')
		 								));
	
	echo elgg_view('input/submit', array(	'internalname' => 'send',
											'value' => elgg_echo('theme_inria:membershiprej:send')
		 								));
?>