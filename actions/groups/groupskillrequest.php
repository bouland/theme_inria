<?php
	/**
	 * Delete a user request to join a closed group.
	 * 
	 * @package ElggGroups
	 */

	// Load configuration
	global $CONFIG;
	
	gatekeeper();
	
	$user_guid = get_input('user_guid', get_loggedin_userid());
	$group_guid = get_input('group_guid');
	if (!is_array($user_guid))
		$user_guid = array($user_guid);
		
	foreach ($user_guid as $u_id) {
	
	// If join request made
		if (check_entity_relationship($u_id, 'membership_request', $group_guid))
		{
			remove_entity_relationship($u_id, 'membership_request', $group_guid);
			system_message(elgg_echo("groups:joinrequestkilled"));
		}

	}
	
?>