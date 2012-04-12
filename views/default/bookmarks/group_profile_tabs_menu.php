<?php
if ($vars['entity']->bookmarks_enable != 'no'){
	echo '<li ';
	if ($vars['tab_select'] == 'bookmarks') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/bookmarks/owner/" . page_owner_entity()->username . '">' . elgg_echo('groups:tabs:bookmarks') . '</a></li>';
}
	