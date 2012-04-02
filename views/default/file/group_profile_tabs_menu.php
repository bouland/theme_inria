<?php
if ($vars['entity']->file_enable != 'no'){
	echo '<li ';
	if ($vars['group_tab'] == 'files') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['entity']->getURL() . 'files">' . elgg_echo('groups:tabs:files') . '</a></li>';
}
	