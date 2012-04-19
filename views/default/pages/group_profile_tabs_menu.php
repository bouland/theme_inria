<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup && $group->pages_enable != 'no'){
	echo '<li ';
	if (get_context() == 'pages') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . 'pg/pages/owned/' . $group->username. '">' . elgg_echo('groups:tabs:pages') . '</a></li>';
}
	