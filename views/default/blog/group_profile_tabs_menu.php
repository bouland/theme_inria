<?php
$group = page_owner_entity();
if ($group && $group instanceof ElggGroup && $group->blog_enable == 'yes'){
	echo '<li ';
	if (get_context() == 'blog') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/blog/owner/" . $group->username . '">' . elgg_echo('groups:tabs:blog') . '</a></li>';
}
	