<?php
// Load Elgg engine
require_once($_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

// Get the GUID of the entity we want to view
$guid = (int) get_input('guid');
$shell = get_input('shell');
if ($shell == "no") {
	$shell = false;
} else {
	$shell = true;
}

//theme_inria change
set_context('file');
// Get the entity, if possible
if ($entity = get_entity($guid)) {
	if ($entity->container_guid) {
		set_page_owner($entity->container_guid);
	} else {
		set_page_owner($entity->owner_guid);
	}

	// Set the body to be the full view of the entity, and the title to be its title
	if ($entity instanceof ElggObject) {
		$title = $entity->title;
	} else if ($entity instanceof ElggEntity) {
		$title = $entity->name;
	}
	
	//theme_inria change
	$area2 = elgg_view('profile/tabs/menu', array('entity' => $entity, 'tab_select' => 'file'));
	$area2 .= elgg_view_entity($entity,true);

	if ($shell) {
		$body = elgg_view_layout('two_column_left_sidebar', '', $area2);
	} else {
		$body = $area2;
	}
} else {
	forward();
}

// Display the page
if ($shell) {
	page_draw($title, $body);
} else {
	header("Content-type: text/html; charset=UTF-8");
	echo $title;
	echo $body;
}