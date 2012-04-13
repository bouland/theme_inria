<?php
	/**
	 * Elgg groups forum
	 * 
	 * @package ElggGroups
	 */

	require_once( $_SERVER['DOCUMENT_ROOT'] .  "/engine/start.php");
	global $CONFIG;
	
	$group_guid = (int)get_input('group_guid');
	set_page_owner($group_guid);
	
	$group = page_owner_entity();
	
	if (!($group instanceof ElggGroup)) {
		forward();
	}
	
	group_gatekeeper();
	
	if (can_write_to_container()){
		add_submenu_item(elgg_echo('groups:addtopic'),$CONFIG->url . "pg/forum/new/{$group_guid}/", 'forumactions2');
	}
	
	$area2 = elgg_view('profile/tabs/menu', array('entity' => $group, 'tab_select' => 'forum'));
	//get any forum topics
	set_context('search');	
	$content .= elgg_view('forum/topiclist' , array('entity' => $group));
	$content .= list_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 20, 0, $group_guid, false, false, false);
	//$topics = list_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 20, 0, $group_guid, false, false, false);
	//$area2 .= elgg_view("forum/topics", array('topics' => $topics, 'group_guid' => $group_guid));
	$area2 .= elgg_view('profile/tabs/content', array('content' => $content));
	 
	
	$body = elgg_view_layout('two_column_left_sidebar','', $area2);
	
	$title = elgg_echo('item:object:groupforumtopic');
	
	// Finally draw the page
	page_draw($title, $body);



?>