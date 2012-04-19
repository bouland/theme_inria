<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup && $group->file_enable == 'yes'){
	echo '<li ';
	if (get_context() == 'file') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/file/owner/" . $group->username . '">' . elgg_echo('groups:tabs:files') . '</a></li>';
}
	