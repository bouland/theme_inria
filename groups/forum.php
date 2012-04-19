<?php
	/**
	 * Elgg groups forum
	 * 
	 * @package ElggGroups
	 */

	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

	$group_guid = (int)get_input('group_guid');
	set_page_owner($group_guid);
	if (!(page_owner_entity() instanceof ElggGroup)) {
		forward();
	}
	
	group_gatekeeper();
	
	//get any forum topics
	//theme_inria changes
	//set_context('search');
	//$area2 = elgg_view("forum/topics", array('topics' => $topics, 'group_guid' => $group_guid));
	$content = list_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 20, 0, $group_guid, false, false, false);
	if (!$content) {
		$content = elgg_view('page_elements/contentwrapper',array('body' => elgg_echo("forum:none")));
	}
	$area2 .= $content;
	
	
	//set_context('groups');
	
	$body = elgg_view_layout('two_column_left_sidebar',$area1, $area2);
	
	$title = elgg_echo('item:object:groupforumtopic');
	
	// Finally draw the page
	page_draw($title, $body);



?>