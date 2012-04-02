<?php
if ($vars['entity']->bookmarks_enable != 'no'){
	echo '<li ';
	if ($vars['group_tab'] == 'bookmarks') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['entity']->getURL() . 'bookmarks">' . elgg_echo('groups:tabs:bookmarks') . '</a></li>';
}
	