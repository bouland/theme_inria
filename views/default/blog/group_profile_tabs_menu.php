<?php
if ($vars['entity']->blog_enable != 'no'){
	echo '<li ';
	if ($vars['group_tab'] == 'blog') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['entity']->getURL() . 'blog">' . elgg_echo('groups:tabs:blog') . '</a></li>';
}
	