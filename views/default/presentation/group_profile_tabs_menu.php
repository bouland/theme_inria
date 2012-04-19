<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup && $group->presentation_enable == 'yes'){
	echo '<li ';
	if (get_context() == 'presentation') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . 'pg/presentation/' . $group->username. '">' . elgg_echo('groups:tabs:presentation') . '</a></li>';
}
	