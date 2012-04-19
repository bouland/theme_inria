<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup){
	echo '<li ';
	if (get_context() == 'members') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/groups/memberlist/" . $group->guid . '">' . elgg_echo('groups:tabs:members') . '</a></li>';
}