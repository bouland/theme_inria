<?php
$group = page_owner_entity();
if($group && $group instanceof ElggGroup)
{
	echo '<li ';
	if (get_context() == 'groups') {
		echo "class='selected'";
	}
	echo '><a href="' . page_owner_entity()->getURL() . '">' . elgg_echo('groups:tabs:home') . '</a></li>';
}