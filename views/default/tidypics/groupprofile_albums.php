<?php

/***********************************************
 *
 *  This is used on the group profile page
 *
 ***********************************************/

if ($vars['entity']->photos_enable != 'no') {
	$owner = page_owner_entity();
	$owner_albums = elgg_get_entities(array('types' => "object",
											'subtypes' => "album",
											'container_guid' => page_owner(),
											'limit' => 1,
											'count'	=>	TRUE));
	if($owner_albums > 0) {
	echo '<div id="tidypics_group_profile">';
?>
	<h2><a href="<?php echo $CONFIG->wwwroot . "pg/photos/owned/group:" . $vars['entity']->guid; ?>"><?php echo elgg_echo('album:group')?></a></h2>
<?php
	//echo '<h2>' . elgg_echo('album:group') . '</h2>';
	echo elgg_view('tidypics/albums', array('num_albums' => 5));
	echo '</div>';
	}
}
?>