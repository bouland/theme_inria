<?php
if ($vars['entity']->file_enable != 'no'){
	echo '<li ';
	if ($vars['group_tab'] == 'forum') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['entity']->getURL() . 'forum">' . elgg_echo('groups:tabs:forum') . '</a></li>';
}
	