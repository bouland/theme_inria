<?php
echo '<li ';
if ($vars['tab_select'] == 'home') {
	echo "class='selected'";
}
echo '><a href="' . page_owner_entity()->getURL() . '">' . elgg_echo('groups:tabs:home') . '</a></li>';
