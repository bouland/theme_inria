<?php
	/**
	 * group profile with tabs
	 * 
	 * @package ElggGroups
	 */
	$group_guid = get_input('group_guid');
	$group_tab = get_input('group_tab');
	set_context('groups');
	
	global $autofeed;
	$autofeed = true;
	
	$group = get_entity($group_guid);
	if ($group) {
				
		set_page_owner($group_guid);
		
		// Hide some items from closed groups when the user is not logged in.
		//$view_all = true;
		
		//$groupaccess = group_gatekeeper(false);
		
		$area2 = elgg_view('groups/profile/tabs/menu', array('entity' => $group, 'group_tab' => $group_tab));
		
		$area2 .= elgg_view('groups/profile/tabs/content', array('entity' => $group, 'group_tab' => $group_tab));
		
		//elgg_view('group/group', array('entity' => $group, 'user' => $_SESSION['user'], 'full' => true));

		
		$body = elgg_view_layout('two_column_left_sidebar', $area1, $area2, $area3);
	} else {
		$title = elgg_echo('groups:notfound');
		
		$area2 = elgg_view_title($title);
		$area2 .= elgg_view('groups/contentwrapper',array('body' => elgg_echo('groups:notfound:details')));
		
		$body = elgg_view_layout('two_column_left_sidebar', "", $area2,"");
	}
		
	// Finally draw the page
	page_draw($title, $body);
?>