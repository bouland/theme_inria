<?php

/**
 * Elgg Groups edit a forum topic page
 * 
 * @package ElggGroups
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

//get the topic
$topic = get_entity((int) get_input('topic'));
$group = get_entity($topic->container_guid);
set_page_owner($group->guid);

group_gatekeeper();

if ( $topic->canEdit() ) {
	$delete_url = elgg_add_action_tokens_to_url("{$CONFIG->url}action/groups/deletetopic?topic={$topic_guid}&group={$group_guid}");
	add_submenu_item(elgg_echo('groups:deltopic'), $delete_url, 'forumactions', true);
}
if (can_write_to_container()){
	add_submenu_item(elgg_echo('groups:addtopic'),$CONFIG->url . "pg/forum/new/{$group->guid}/", 'forumactions2');
}

//theme_inria change
$content = elgg_view('profile/tabs/menu', array('entity' => $topic, 'tab_select' => 'forum'));

$content .= elgg_view("forms/forums/edittopic", array('entity' => $topic));
$body = elgg_view_layout('two_column_left_sidebar', '', $content);

page_draw(elgg_echo('groups:edittopic'), $body);

