<?php
	/**
	 * Elgg groups items view.
	 * This is the messageboard, members, pages and latest forums posts. Each plugin will extend the views
	 * 
	 * @package ElggGroups
	 */
	if (isset($vars['page_owner_user']) && $vars['page_owner_user'] instanceof ElggGroup) {
		$members = $vars['page_owner_user']->getMembers(15);
		if(is_array($members)) {
			set_input('members', $members);
			$more_url = "{$vars['url']}pg/groups/memberlist/{$vars['page_owner_user']->guid}/";
			echo '<div class="submenu_group sidebarBox"><div class="submenu_group_wrapper">';
			echo '<a href="' . $more_url . '">'.elgg_echo("groups:members").' (' . $vars['page_owner_user']->getMembers(2, 0, true) . ')</a>';
			echo elgg_view('custom_index_inria/members',array('members' => $members));
			echo '</div></div>';
		}
	}
?>

