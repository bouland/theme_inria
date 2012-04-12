<?php
if ($vars['entity']->pages_enable != 'no'){
	echo '<li ';
	if ($vars['tab_select'] == 'pages') {
		echo "class='selected'";
	}
	echo '><a href="' . $vars['url'] . 'pg/pages/owned/' . page_owner_entity()->username. '">' . elgg_echo('groups:tabs:pages') . '</a></li>';
}
	