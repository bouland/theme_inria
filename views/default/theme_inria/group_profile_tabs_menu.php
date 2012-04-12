<?php
$group = page_owner_entity();
if($group && $group instanceof ElggGroup)
{
	echo '<li ';
	if ($vars['tab_select'] == 'home') {
		echo "class='selected'";
	}
	echo '><a href="' . page_owner_entity()->getURL() . '">' . elgg_echo('groups:tabs:home') . '</a></li>';
}