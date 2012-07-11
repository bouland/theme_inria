<?php
/**
 * Blogs
 *
 * @package Blog
 *
 * @todo
 * - Either drop support for "publish date" or duplicate more entity getter
 * functions to work with a non-standard time_created.
 * - Pingbacks
 * - Notifications
 * - River entry for posts saved as drafts and later published
 */

elgg_register_event_handler('init', 'system', 'theme_inria_init');

/**
 * Init blog plugin.
 */
function theme_inria_init() {
	elgg_register_event_handler('pagesetup', 'system', 'theme_inria_pagesetup', 10000);
	
	elgg_extend_view('css/elements/icons', 'theme_inria/css/icons');
	
	elgg_extend_view('css/elements/navigation', 'theme_inria/css/navigation');
	
	//elgg_register_library('elgg:blog', elgg_get_plugins_path() . 'blog/lib/blog.php');

	elgg_register_plugin_hook_handler('register', 'menu:topbar', 'theme_inria_topbar_setup');
	//elgg_register_event_handler('upgrade', 'upgrade', 'blog_run_upgrades');

	// add to the main css
	//elgg_extend_view('css/elgg', 'blog/css');

	// register the blog's JavaScript
	//$blog_js = elgg_get_simplecache_url('js', 'blog/save_draft');
	//elgg_register_simplecache_view('js/blog/save_draft');
	//elgg_register_js('elgg.blog', $blog_js);

	// routing of urls
	//elgg_register_page_handler('blog', 'blog_page_handler');

	// override the default url to view a blog object
	//elgg_register_entity_url_handler('object', 'blog', 'blog_url_handler');

	// notifications
	//register_notification_object('object', 'blog', elgg_echo('blog:newpost'));
	//elgg_register_plugin_hook_handler('notify:entity:message', 'object', 'blog_notify_message');

	// add blog link to
	//elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'blog_owner_block_menu');

	// pingbacks
	//elgg_register_event_handler('create', 'object', 'blog_incoming_ping');
	//elgg_register_plugin_hook_handler('pingback:object:subtypes', 'object', 'blog_pingback_subtypes');

	// Register for search.
	//elgg_register_entity_type('object', 'blog');

	// Add group option
	//add_group_tool_option('blog', elgg_echo('blog:enableblog'), true);
	//elgg_extend_view('groups/tool_latest', 'blog/group_module');

	// add a blog widget
	//elgg_register_widget_type('blog', elgg_echo('blog'), elgg_echo('blog:widget:description'), 'profile');

	// register actions
	//$action_path = elgg_get_plugins_path() . 'blog/actions/blog';
	//elgg_register_action('blog/save', "$action_path/save.php");
	//elgg_register_action('blog/auto_save_revision', "$action_path/auto_save_revision.php");
	//elgg_register_action('blog/delete', "$action_path/delete.php");

	// entity menu
	//elgg_register_plugin_hook_handler('register', 'menu:entity', 'blog_entity_menu_setup');

	// ecml
	//elgg_register_plugin_hook_handler('get_views', 'ecml', 'blog_ecml_views_hook');
}
function theme_inria_pagesetup()
{
	//revert engine/lib/elgglib.php line 2147
	elgg_unregister_menu_item('topbar', 'elgg_logo');
	//revert engine/lib/users.php line 1493
	elgg_unregister_menu_item('topbar', 'profile');
	//revert engine/lib/users.php line 1506
	elgg_unregister_menu_item('topbar', 'friends');
	$viewer = elgg_get_logged_in_user_entity();
	if ($viewer)
	{
		elgg_register_menu_item('topbar', array(
					'name' => 'logout',
					'href' => "action/logout",
					'text' => elgg_echo('logout') . elgg_view_icon('logout'),
					'is_action' => TRUE,
					'priority' => 1000,
					'section' => 'alt',
		));
	}
	//elgg_register_menu_item('topbar', theme_inria_topbar_setup());
}
function theme_inria_topbar_setup($hook, $type, $return, $params) {
	/**
	<li><a target="blank" href="https://gforge.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:forge'); ?></a></li>
						<li><a target="blank" href=><?php echo ; ?></a></li>
						<li><a target="blank" href="http://qlf-devinar.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:webinar'); ?></a></li>
						<li><a target="blank" href="https://transfert.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:ftp'); ?></a></li>
						<li><a target="blank" href="https://partage.inria.fr"><?php echo elgg_echo('theme_inria:topbar:share'); ?></a></li>
						<li><a target="blank" href="http://intranet.irisa.fr/irisa/services/pavu/documentation/audioconf#resa"><?php echo elgg_echo('theme_inria:topbar:confcall'); ?></a></li>
						<li><a target="blank" href="http://dsi.inria.fr/services_offerts/visio/EVO">EVO</a></li>
						<li><a target="blank" href="https://sympa-roc.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:mailinglist'); ?></a></li>
	*/
	$children = array();
	$options = array(
			'name' => 'etherpad',
			'text' => elgg_echo('theme_inria:topbar:etherpad'),
			'href' => "https://notepad.inria.fr/",
			'priority' => 100,
	);
	$children[] = ElggMenuItem::factory($options);
	
	$options = array(
			'name' => 'doodle',
			'text' => elgg_echo('theme_inria:topbar:doodle'),
			'href' => "http://www.doodle.com/",
			'priority' => 200,
	);
	$children[] = ElggMenuItem::factory($options);
		
	$options = array(
				'name' => 'tools',
				'text' => elgg_echo('theme_inria:topbar:tools'),
				'href' => '#',
				'priority' => 100,
	);
	$tools = ElggMenuItem::factory($options);
	$tools->setChildren($children);
	$tools->setItemClass('elgg-menu-drop');
	$return[] = $tools;
	return $return;
	/*
	$options = array(
		'name' => 'tools',
		'text' => elgg_echo('theme_inria:tools'),
		'href' => false,
		'priority' => 100,
	);
	$return[] = ElggMenuItem::factory($options);

	
	// number of members
	$num_members = get_group_members($entity->guid, 10, 0, 0, true);
	$members_string = elgg_echo('groups:member');
	$options = array(
		'name' => 'members',
		'text' => $num_members . ' ' . $members_string,
		'href' => false,
		'priority' => 200,
	);
	$return[] = ElggMenuItem::factory($options);

	// feature link
	if (elgg_is_admin_logged_in()) {
		if ($entity->featured_group == "yes") {
			$url = "action/groups/featured?group_guid={$entity->guid}&action_type=unfeature";
			$wording = elgg_echo("groups:makeunfeatured");
		} else {
			$url = "action/groups/featured?group_guid={$entity->guid}&action_type=feature";
			$wording = elgg_echo("groups:makefeatured");
		}
		$options = array(
			'name' => 'feature',
			'text' => $wording,
			'href' => $url,
			'priority' => 300,
			'is_action' => true
		);
		$return[] = ElggMenuItem::factory($options);
	}

	return $return;
	*/
}

