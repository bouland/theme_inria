<?php
if ($vars['entity']->file_enable != 'no'){
	echo '<li ';
	if ($vars['tab_select'] == 'file') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . "pg/file/owner/" . page_owner_entity()->username . '">' . elgg_echo('groups:tabs:files') . '</a></li>';
}
	