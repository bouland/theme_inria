<?php
echo '<li ';
if ($vars['group_tab'] == 'home') {
	echo "class='selected'";
}
echo '><a href="' . $vars['entity']->getURL() . 'home">' . elgg_echo('groups:tabs:home') . '</a></li>';
