<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup && $group->forum_enable == 'yes'){
	echo '<li ';
	if (get_context() == 'forum') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/groups/forum/" . $group->guid . '">' . elgg_echo('groups:tabs:forum') . '</a></li>';
}
	