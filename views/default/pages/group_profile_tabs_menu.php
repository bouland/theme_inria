<?php
if ($vars['entity']->pages_enable != 'no'){
	echo '<li ';
	if ($vars['group_tab'] == 'pages') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['entity']->getURL() . 'pages">' . elgg_echo('groups:tabs:pages') . '</a></li>';
}
	