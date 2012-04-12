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

$title = elgg_echo('file:edit');

//theme_inria change
$area2 = elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'tab_select' => 'file'));
$area2 .= elgg_view_title($title);
$area2 .= elgg_view("file/upload", array('entity' => $file));

$body = elgg_view_layout('two_column_left_sidebar', '', $area2);
page_draw($title, $body);
