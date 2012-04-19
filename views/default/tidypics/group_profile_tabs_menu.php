<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup && $group->photos_enable == 'yes'){
	echo '<li ';
	if (get_context() == 'photos') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/photos/owned/" . $group->username . '">' . elgg_echo('groups:tabs:photos') . '</a></li>';
}
	