<?php
if ($vars['group_tab'] == 'home') {
	echo elgg_view('group/group', array('entity' => $vars['entity'], 'user' => $_SESSION['user'], 'full' => true));
}