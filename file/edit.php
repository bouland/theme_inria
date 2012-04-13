<?php
/**
 * Elgg file saver
 *
 * @package ElggFile
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

gatekeeper();

// Render the file upload page

$file_guid = (int) get_input('file_guid');
$file = get_entity($file_guid);
if (!$file) {
	forward();
}

// Set the page owner
$page_owner = page_owner_entity();
if (!$page_owner) {
	$container_guid = $file->container_guid;
	if ($container_guid) {
		set_page_owner($container_guid);
	}
}

if (!$file->canEdit()) {
	forward();
}
$delete_url = elgg_add_action_tokens_to_url("{$CONFIG->url}action/file/delete?file={$guid}");
add_submenu_item(elgg_echo('file:delete'), $delete_url, 'fileactions', true);

if (can_write_to_container()){
	add_submenu_item(elgg_echo('file:upload'), $CONFIG->url . "pg/file/new/". page_owner_entity()->username, 'fileactions2');
}
$title = elgg_echo('file:edit');

//theme_inria change
$area2 = elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'tab_select' => 'file'));
$content = elgg_view_title($title);
$content .= elgg_view("file/upload", array('entity' => $file));
$area2 .= elgg_view('profile/tabs/content', array('content' => $content));

$body = elgg_view_layout('two_column_left_sidebar', '', $area2);
page_draw($title, $body);
