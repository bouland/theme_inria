<?php
if ($vars['group_tab'] == 'members') {
	echo list_entities_from_relationship('member', $vars['entity']->guid, true, 'user', '', 0, 10, false);
}