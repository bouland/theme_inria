<?php

	/**
	 * Elgg messages topbar extender
	 * 
	 * @package ElggMessages
	 */
	 
	 //need to be logged in to send a message
	 gatekeeper();

	//get unread messages
	$num_messages = count_unread_messages();
	if($num_messages){
		$num = $num_messages;
	} else {
		$num = 0;
	}

	if($num == 0){

?>

<li><a href="<?php echo $vars['url']; ?>pg/messages/inbox/<?php echo get_loggedin_user()->username; ?>" class="privatemessages" ><?php echo elgg_echo("messages:topbar"); ?></a></li>
	
<?php
    }else{
?>

<li><a href="<?php echo $vars['url']; ?>pg/messages/inbox/<?php echo get_loggedin_user()->username; ?>" class="privatemessages_new" ><?php echo elgg_echo("messages:topbar"). '['.$num; ?>]</a></li>
	
<?php
    }
?>