<?php
	/**
	 * Elgg groups forum
	 * 
	 * @package ElggGroups
	 */

	require_once( $_SERVER['DOCUMENT_ROOT'] .  "/engine/start.php");

	$group_guid = (int)get_input('group_guid');
	set_page_owner($group_guid);
	
	$group = page_owner_entity();
	
	if (!($group instanceof ElggGroup)) {
		forward();
	}
	
	group_gatekeeper();
	
	
	
	$area2 = elgg_view('profile/tabs/menu', array('entity' => $group, 'tab_select' => 'forum'));
	//get any forum topics
	set_context('search');	
	$area2 .= elgg_view('forum/topiclist' , array('entity' => $group));
	$area2 .= list_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 20, 0, $group_guid, false, false, false);
	//$topics = list_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 20, 0, $group_guid, false, false, false);
	//$area2 .= elgg_view("forum/topics", array('topics' => $topics, 'group_guid' => $group_guid));
	set_context('forum');
	
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
	
	$title = elgg_echo('item:object:groupforumtopic');
	
	// Finally draw the page
	page_draw($title, $body);



?>