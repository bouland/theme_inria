<?php
if ($vars['entity']->forum_enable != 'no'){
	echo '<li ';
	if ($vars['tab_select'] == 'forum') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/groups/forum/" . page_owner() . '">' . elgg_echo('groups:tabs:forum') . '</a></li>';
}
	