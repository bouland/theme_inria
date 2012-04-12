<?php
if ($vars['entity']->blog_enable != 'no'){
	echo '<li ';
	if ($vars['tab_select'] == 'blog') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/blog/owner/" . page_owner_entity()->username . '">' . elgg_echo('groups:tabs:blog') . '</a></li>';
}
	