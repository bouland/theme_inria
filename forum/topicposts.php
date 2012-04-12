<?php

	/**
	 * Elgg Groups topic posts page
	 * 
	 * @package ElggGroups
	 */

	// Load Elgg engine
		require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
		global $CONFIG;
	// We now have RSS on topics
		global $autofeed;
		$autofeed = true;
		
    // get the entity from id
		$topic_guid=get_input('topic');
        $topic = get_entity($topic_guid);
        if (!$topic) forward();
		
        $group_guid = $topic->container_guid;
		$group = get_entity($group_guid);
		set_page_owner($group_guid);
		
		group_gatekeeper();
		
		if ( $topic->canEdit() ) {
			add_submenu_item(elgg_echo('groups:edittopic'), $CONFIG->url . "pg/forum/edit/{$topic_guid}", 'forumactions');
			$delete_url = elgg_add_action_tokens_to_url("{$CONFIG->url}action/groups/deletetopic?topic={$topic_guid}&group={$group_guid}");
			add_submenu_item(elgg_echo('groups:deltopic'), $delete_url, 'forumactions', true);
		}
		if (can_write_to_container()){
			add_submenu_item(elgg_echo('groups:addtopic'),$CONFIG->url . "pg/forum/new/{$group->guid}/", 'forumactions2');
		}
		
		//theme_inria change
		$area2 = elgg_view('profile/tabs/menu', array('entity' => $topic, 'tab_select' => 'forum'));
    // Display them
	    $area2 .= elgg_view("forum/viewposts", array('entity' => $topic));
	    $body = elgg_view_layout("two_column_left_sidebar", '' , $area2);
		
	// Display page
		page_draw($topic->title,$body);
		
?>