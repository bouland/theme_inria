<?php
echo '<li ';
if ($vars['tab_select'] == 'members') {
	echo "class='selected'";
}
echo '><a href="' . $vars['url'] . "pg/groups/memberlist/" . page_owner() . '">' . elgg_echo('groups:tabs:members') . '</a></li>';
