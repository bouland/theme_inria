<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup && $group->bookmarks_enable != 'no'){
	echo '<li ';
	if (get_context() == 'bookmarks') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/bookmarks/owner/" . $group->username . '">' . elgg_echo('groups:tabs:bookmarks') . '</a></li>';
}
	