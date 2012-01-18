<?php

	/* Elgg Theme Simple Example */

	
	
	// Initialise log browser
	register_elgg_event_handler('init','system','theme_inria_init');
	
	/* Initialise the theme */
	function theme_inria_init(){
		global $CONFIG;
		elgg_extend_view('riverdashboard/sitemessage', 'theme_inria/login', 450);
		elgg_extend_view('groups/find', 'theme_inria/login', 450);
		elgg_extend_view('submenu/extend', 'groups/members');
		elgg_extend_view('login/extend', 'theme_inria/login_option');
		if (is_plugin_enabled('pages_tree')){
			elgg_extend_view('submenu/extend', 'groups/pagesTree');
		}
		
		
			
		unregister_page_handler('pages','pages_page_handler');
		register_page_handler('pages','pages_page_handler_inria');
		
		unregister_page_handler('groups','groups_page_handler');
		register_page_handler('groups','groups_page_handler_inria');
		
		unregister_page_handler('blog','blog_page_handler');
		register_page_handler('blog','blog_page_handler_inria');
		
		unregister_plugin_hook('notify:entity:message', 'object', 'blog_notify_message');
		register_plugin_hook('notify:entity:message', 'object', 'blog_notify_message_inria');
		
		unregister_elgg_event_handler('pagesetup','system','blog_pagesetup');
		register_elgg_event_handler('pagesetup','system','blog_pagesetup_inria');
		
		unregister_plugin_hook('notify:entity:message', 'object', 'file_notify_message');
		register_plugin_hook('notify:entity:message', 'object', 'file_notify_message_inria');
		
		unregister_elgg_event_handler('pagesetup','system','file_submenus');
		register_elgg_event_handler('pagesetup','system','file_submenus_inria');
	
		unregister_elgg_event_handler('pagesetup','system','groups_submenus');
		register_elgg_event_handler('pagesetup','system','groups_submenus_inria');
		
		unregister_plugin_hook('notify:entity:message', 'object', 'groupforumtopic_notify_message');
		register_plugin_hook('notify:entity:message', 'object', 'groupforumtopic_notify_message_inria');

		unregister_plugin_hook('notify:entity:message', 'object', 'page_notify_message');
		register_plugin_hook('notify:entity:message', 'object', 'page_notify_message_inria');
		
		unregister_elgg_event_handler('pagesetup','system','pages_submenus');
		register_elgg_event_handler('pagesetup','system','pages_submenus_inria');
		
		unregister_elgg_event_handler('pagesetup','system','event_calendar_pagesetup');
    	register_elgg_event_handler('pagesetup','system','event_calendar_pagesetup_inria');
    	
    	unregister_plugin_hook('notify:entity:message', 'object', 'bookmarks_notify_message');
    	register_plugin_hook('notify:entity:message', 'object', 'bookmarks_notify_message_inria');
    	
    	unregister_elgg_event_handler('pagesetup','system','bookmarks_pagesetup');
    	register_elgg_event_handler('pagesetup','system','bookmarks_pagesetup_inria');
	
		unregister_elgg_event_handler('pagesetup','system','tidypics_submenus');
		register_elgg_event_handler('pagesetup','system','tidypics_submenus_inria');	
		

		
		register_action("groups/membershipreq", false, $CONFIG->pluginspath . "theme_inria/actions/groups/membershipreq.php");
		register_action("groups/membershiprej", false, $CONFIG->pluginspath . "theme_inria/actions/groups/membershiprej.php");
		register_action("groups/killrequest", false, $CONFIG->pluginspath . "theme_inria/actions/groups/groupskillrequest.php");
		
		register_plugin_hook( 'forward', 'system', 'theme_inria_forward_hook');
		//register_plugin_hook( 'action', 'logout', 'theme_inria_logout_hook');
		
		unregister_plugin_hook('access:collections:write', 'all', 'groups_write_acl_plugin_hook');
		register_plugin_hook('access:collections:write', 'all', 'groups_write_acl_plugin_hook_inria');
		
		unregister_plugin_hook('email', 'system', 'phpmailer_mail_override');
		register_plugin_hook('email', 'system', 'phpmailer_mail_override_inria');
		
		register_notification_handler("email", "email_notify_handler_inria");
		
		unregister_elgg_event_handler('create','object','object_notifications');
		register_elgg_event_handler('create','object','object_notifications_inria');
		
		unregister_elgg_event_handler('annotate','all','group_object_notifications');
		register_elgg_event_handler('create', 'annotation','annotation_notifications_inria');
		register_plugin_hook('notify:entity:message', 'annotation', 'annotation_notify_message_inria');
		
		unregister_elgg_event_handler('create', 'group', 'groups_create_event_listener');
		register_elgg_event_handler('create', 'group', 'groups_create_event_listener_inria');
		
		if (isset($CONFIG->group_tool_options)) {
			$group_tool_defaults = array('pages');
			$group_tool_options = $CONFIG->group_tool_options;
			foreach ($group_tool_options as $group_tool_option) {
				if (in_array($group_tool_option->name, $group_tool_defaults)){
					$group_tool_option->default_on = true;
				}else{
					$group_tool_option->default_on = false;
				}
			}
			$CONFIG->group_tool_options = $group_tool_options;
		}
		
	}
	
	

	function theme_inria_forward_hook($hook, $entity_type, $returnvalue, $params){
		global $CONFIG;
		if ($_SERVER['REDIRECT_URL'] != '/action/logout'){
			$_SESSION['last_forward_from'] = $CONFIG->url . $_SERVER['REDIRECT_URL'];
		}
	}
	function theme_inria_logout_hook($hook, $entity_type, $returnvalue, $params){
		
		global $CONFIG;
		$redirect_url = $_SESSION['redirect_url'];
		if(!$redirect_url){
			$redirect_url = "{$CONFIG->wwwroot}index.php";
		}
		forward($redirect_url);
		return true;
	}
	
	function blog_pagesetup_inria() {
		
		global $CONFIG;

		//add submenu options
			if (get_context() == "blog") {
				$page_owner = page_owner_entity();
					
				if ((page_owner() == $_SESSION['guid'] || !page_owner()) && isloggedin()) {
					add_submenu_item(elgg_echo('blog:your'),$CONFIG->wwwroot."pg/blog/owner/" . $_SESSION['user']->username);
					add_submenu_item(elgg_echo('blog:friends'),$CONFIG->wwwroot."pg/blog/friends/" . $_SESSION['user']->username);
					add_submenu_item(elgg_echo('blog:everyone'),$CONFIG->wwwroot."pg/blog/all/");
					
				} else if (page_owner()) {
					add_submenu_item(sprintf(elgg_echo('blog:user'),$page_owner->name),$CONFIG->wwwroot."pg/blog/owner/" . $page_owner->username);
					if ($page_owner instanceof ElggUser) { // Sorry groups, this isn't for you.
						add_submenu_item(sprintf(elgg_echo('blog:user:friends'),$page_owner->name),$CONFIG->wwwroot."pg/blog/friends/" . $page_owner->username);
					}
					add_submenu_item(elgg_echo('blog:everyone'),$CONFIG->wwwroot."pg/blog/all/");
				} else {
					add_submenu_item(elgg_echo('blog:everyone'),$CONFIG->wwwroot."pg/blog/all/");
				}
				
				if (can_write_to_container(0, page_owner()) && isloggedin())
					add_submenu_item(elgg_echo('blog:addpost'),$CONFIG->wwwroot."pg/blog/new/{$page_owner->username}/");
					
				if (!defined('everyoneblog') && page_owner()) {
					
					if ($dates = get_entity_dates('object','blog',page_owner(),0,'time_created desc')) {
						foreach($dates as $date) {
							$timestamplow = mktime(0,0,0,substr($date,4,2),1,substr($date,0,4));
							$timestamphigh = mktime(0,0,0,((int) substr($date,4,2)) + 1,1,substr($date,0,4));
							if (!isset($page_owner)) $page_owner = page_owner_entity();
							$link = $CONFIG->wwwroot . 'pg/blog/archive/' . $page_owner->username . '/' . $timestamplow . '/' . $timestamphigh;
							add_submenu_item(sprintf(elgg_echo('date:month:'.substr($date,4,2)),substr($date,0,4)),$link,'filter');
						}								
					}
					
				}
				
			}
			
		// Group submenu
			$page_owner = page_owner_entity();
			
			if ($page_owner instanceof ElggGroup && get_context() == 'groups') {
    			if($page_owner->blog_enable != "no"){
    				//INRIA change
    				if (can_write_to_container(0, page_owner()) && isloggedin())
					add_submenu_item(elgg_echo('blog:addpost'),$CONFIG->wwwroot."pg/blog/new/{$page_owner->username}/");
			    }
			}
	}
	function file_submenus_inria() {
		
		global $CONFIG;
		
		$page_owner = page_owner_entity();
		
		// Group submenu option	
			if ($page_owner instanceof ElggGroup && get_context() == "groups") {
    			if($page_owner->file_enable != "no"){ 
				    //add_submenu_item(sprintf(elgg_echo("file:group"),$page_owner->name), $CONFIG->wwwroot . "pg/file/owner/" . $page_owner->username);
					if (can_write_to_container($_SESSION['guid'], page_owner()) && isloggedin())
						add_submenu_item(elgg_echo('file:upload'), $CONFIG->wwwroot . "pg/file/new/". $page_owner->username);
	    				
			    }
			}
			
		// General submenu options
		
			if (get_context() == "file") {
				if ((page_owner() == $_SESSION['guid'] || !page_owner()) && isloggedin()) {
					add_submenu_item(sprintf(elgg_echo("file:yours"),$page_owner->name), $CONFIG->wwwroot . "pg/file/owner/" . $page_owner->username);
					add_submenu_item(sprintf(elgg_echo('file:yours:friends'),$page_owner->name), $CONFIG->wwwroot . "pg/file/friends/". $page_owner->username);
				} else if (page_owner()) {
					add_submenu_item(sprintf(elgg_echo("file:user"),$page_owner->name), $CONFIG->wwwroot . "pg/file/owner/" . $page_owner->username);
					if ($page_owner instanceof ElggUser) // This one's for users, not groups
						add_submenu_item(sprintf(elgg_echo('file:friends'),$page_owner->name), $CONFIG->wwwroot . "pg/file/friends/". $page_owner->username);
				}
				add_submenu_item(elgg_echo('file:all'), $CONFIG->wwwroot . "pg/file/all/");
				if (can_write_to_container($_SESSION['guid'], page_owner()) && isloggedin())
					add_submenu_item(elgg_echo('file:upload'), $CONFIG->wwwroot . "pg/file/new/". $page_owner->username);
			}
		
	}
	function groups_submenus_inria() {

		global $CONFIG;

		// Get the page owner entity
			$page_owner = page_owner_entity();

		// Submenu items for all group pages
			if ($page_owner instanceof ElggGroup && get_context() == 'groups') {
				if (isloggedin()) {
					if ($page_owner->canEdit()) {
						add_submenu_item(elgg_echo('groups:edit'),$CONFIG->wwwroot . "pg/groups/edit/" . $page_owner->getGUID(), 'groupsactions');
						add_submenu_item(elgg_echo('groups:invite'),$CONFIG->wwwroot . "pg/groups/invite/{$page_owner->getGUID()}", 'groupsactions');
						if (!$page_owner->isPublicMembership())
							add_submenu_item(elgg_echo('groups:membershiprequests'),$CONFIG->wwwroot . "pg/groups/membershipreq/{$page_owner->getGUID()}", 'groupsactions');
					}
					if ($page_owner->isMember($_SESSION['user'])) {
						if ($page_owner->getOwner() != $_SESSION['guid']) {
							$url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/groups/leave?group_guid=" . $page_owner->getGUID());
							add_submenu_item(elgg_echo('groups:leave'), $url, 'groupsactions');
						}
					} else {
						if ($page_owner->isPublicMembership()) {
							$url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/groups/join?group_guid={$page_owner->getGUID()}");
							add_submenu_item(elgg_echo('groups:join'), $url, 'groupsactions');
						} else {
							$url = elgg_add_action_tokens_to_url($CONFIG->wwwroot . "action/groups/joinrequest?group_guid={$page_owner->getGUID()}");
							add_submenu_item(elgg_echo('groups:joinrequest'), $url, 'groupsactions');
						}
					}
				}

				if($page_owner->forum_enable != "no"){
					if (can_write_to_container(0, page_owner()) && isloggedin())
						add_submenu_item(elgg_echo('groups:addtopic'),$CONFIG->wwwroot . "pg/forum/new/{$page_owner->getGUID()}/");
				
				}
			}

		// Add submenu options
			if (get_context() == 'groups' && !($page_owner instanceof ElggGroup)) {
				if (isloggedin()) {
					add_submenu_item(elgg_echo('groups:new'), $CONFIG->wwwroot."pg/groups/new/", 'groupslinks');
					add_submenu_item(elgg_echo('groups:owned'), $CONFIG->wwwroot . "pg/groups/owned/" . $_SESSION['user']->username, 'groupslinks');
					add_submenu_item(elgg_echo('groups:yours'), $CONFIG->wwwroot . "pg/groups/member/" . $_SESSION['user']->username, 'groupslinks');
					add_submenu_item(elgg_echo('groups:invitations'), $CONFIG->wwwroot . "pg/groups/invitations/" . $_SESSION['user']->username, 'groupslinks');
				}
				add_submenu_item(elgg_echo('groups:all'), $CONFIG->wwwroot . "pg/groups/all/", 'groupslinks');
			}

	}
	function pages_submenus_inria() {
		
		global $CONFIG;
		
		$page_owner = page_owner_entity();
		
		// Group submenu option	
			if ($page_owner instanceof ElggGroup && get_context() == 'groups') {
    			if($page_owner->pages_enable != "no"){
    				if ((can_write_to_container(0,$owner->guid))){
 			    	   add_submenu_item(elgg_echo('pages:new'), $CONFIG->url . "pg/pages/new/?container_guid=" . page_owner());
	    			}
			    }
			}
			
			
    }
	function event_calendar_pagesetup_inria() {
		
		global $CONFIG;
		
		$page_owner = page_owner_entity();
		
		$context = get_context();
		
		// Group submenu option	
		if ($page_owner instanceof ElggGroup && $context == 'groups') {
			if (event_calendar_activated_for_group($page_owner)) {
				//add_submenu_item(elgg_echo("event_calendar:group"), $CONFIG->wwwroot . "pg/event_calendar/group/" . $page_owner->getGUID());
				if (page_owner_entity()->canWriteToContainer($_SESSION['user'])){
					add_submenu_item(elgg_echo('event_calendar:new'), $CONFIG->url . "pg/event_calendar/new/?group_guid=" . page_owner());
				}
			}
		} elseif ($context == 'event_calendar'){
			//if (page_owner_entity()->canWriteToContainer($_SESSION['user'])){
			//	add_submenu_item(elgg_echo('event_calendar:new'), $CONFIG->url . "pg/event_calendar/new/?group_guid=" . page_owner());
			//}
			//add_submenu_item(elgg_echo("event_calendar:site_wide_link"), $CONFIG->wwwroot . "pg/event_calendar/");
			$site_calendar = get_plugin_setting('site_calendar', 'event_calendar');
			if (!$site_calendar || $site_calendar == 'admin') {
				if (isadminloggedin()) {
					// only admins can post directly to the site-wide calendar
					add_submenu_item(elgg_echo('event_calendar:new'), $CONFIG->url . "pg/event_calendar/new/", 'eventcalendaractions');
				}
			} else if ($site_calendar == 'loggedin') {
				// any logged-in user can post to the site calendar
				if (isloggedin()) {
					add_submenu_item(elgg_echo('event_calendar:new'), $CONFIG->url . "pg/event_calendar/new/", 'eventcalendaractions');
				}
			}
		}
		
		if (($context == 'groups') || ($context == 'event_calendar')) {
			if (($event_id = get_input('event_id',0)) && ($event = get_entity($event_id))) {
				if (isadminloggedin() && (get_plugin_setting('allow_featured', 'event_calendar') == 'yes')) {
					if ($event->featured) {
						add_submenu_item(elgg_echo('event_calendar:unfeature'), $CONFIG->url . "action/event_calendar/unfeature?event_id=".$event_id.'&'.event_calendar_security_fields(), 'eventcalendaractions');
					} else {
						add_submenu_item(elgg_echo('event_calendar:feature'), $CONFIG->url . "action/event_calendar/feature?event_id=".$event_id.'&'.event_calendar_security_fields(), 'eventcalendaractions');
					}
				}
				add_submenu_item(elgg_echo("event_calendar:view_link"), $CONFIG->wwwroot . "pg/event_calendar/view/" . $event_id,'0eventcalendaradmin');
				if ($event->canEdit()) {
					add_submenu_item(elgg_echo("event_calendar:edit_link"), $CONFIG->wwwroot . "mod/event_calendar/manage_event.php?event_id=" . $event_id,'0eventcalendaradmin');
					add_submenu_item(elgg_echo("event_calendar:delete_link"), $CONFIG->wwwroot . "mod/event_calendar/delete_confirm.php?event_id=" . $event_id,'0eventcalendaradmin');
				}				
			}
		}
    }
    function bookmarks_pagesetup_inria() {
		global $CONFIG;
	
		$page_owner = page_owner_entity();
	
		//add submenu options
		if (get_context() == "bookmarks") {
	
			if (isloggedin()) {
				// link to add bookmark form
				if ($page_owner instanceof ElggGroup) {
					if ($page_owner->isMember(get_loggedin_user())) {
						add_submenu_item(elgg_echo('bookmarks:add'), $CONFIG->wwwroot."pg/bookmarks/add/" . $page_owner->username);
					}
				} else {
					add_submenu_item(elgg_echo('bookmarks:add'), $CONFIG->wwwroot."pg/bookmarks/add/" . $_SESSION['user']->username);
					add_submenu_item(elgg_echo('bookmarks:inbox'),$CONFIG->wwwroot."pg/bookmarks/inbox/" . $_SESSION['user']->username);
				}
				if (page_owner()) {
					add_submenu_item(sprintf(elgg_echo('bookmarks:read'), $page_owner->name),$CONFIG->wwwroot."pg/bookmarks/owner/" . $page_owner->username);
				}
				if (!$page_owner instanceof ElggGroup) {
					add_submenu_item(elgg_echo('bookmarks:friends'),$CONFIG->wwwroot."pg/bookmarks/friends/" . $_SESSION['user']->username);
				}
			}
	
			if (!$page_owner instanceof ElggGroup) {
				add_submenu_item(elgg_echo('bookmarks:everyone'),$CONFIG->wwwroot."pg/bookmarks/all/");
			}
			
			// Bookmarklet
			if ((isloggedin()) && (page_owner()) && (can_write_to_container(0, page_owner()))) {
	
				$bmtext = elgg_echo('bookmarks:bookmarklet');
				if ($page_owner instanceof ElggGroup) {
					$bmtext = elgg_echo('bookmarks:bookmarklet:group');
				}
				add_submenu_item($bmtext, $CONFIG->wwwroot . "pg/bookmarks/bookmarklet/{$page_owner->username}/");
			}
	
		}
	
		if ($page_owner instanceof ElggGroup && get_context() == 'groups') {
			if ($page_owner->bookmarks_enable != "no") {
				//add_submenu_item(sprintf(elgg_echo("bookmarks:group"),$page_owner->name), $CONFIG->wwwroot . "pg/bookmarks/owner/" . $page_owner->username);
				add_submenu_item(elgg_echo('theme_inria:bookmarks:group:new'), $CONFIG->wwwroot."pg/bookmarks/add/" . $page_owner->username);
			}
		}
	
	}
	function tidypics_submenus_inria() {
		
		global $CONFIG;
		
		$page_owner = page_owner_entity();
		
		if ($page_owner instanceof ElggGroup) {
			if (get_context() == "groups") {
				if ($page_owner->photos_enable != "no") {
					//add_submenu_item(	sprintf(elgg_echo('album:group'),$page_owner->name), 
					//					$CONFIG->wwwroot . "pg/photos/owned/" . $page_owner->username);
					add_submenu_item(	elgg_echo('album:create'), 
										$CONFIG->wwwroot . "pg/photos/new/{$page_owner->username}/");
				}
			}
		}
		// context is only set to photos on individual pages, not on group pages
		else if (get_context() == "photos") {
			
			$view_count = get_plugin_setting('view_count', 'tidypics');
			
			// owner gets "your albumn", "your friends albums", "your most recent", "your most viewed"
			if (get_loggedin_userid() && get_loggedin_userid() == $page_owner->guid) {
								
				add_submenu_item(	elgg_echo('album:create'), 
									$CONFIG->wwwroot . "pg/photos/new/{$page_owner->username}/", 
									'tidypics-a' );

				add_submenu_item(	elgg_echo("album:yours"), 
									$CONFIG->wwwroot . "pg/photos/owned/{$page_owner->username}/", 
									'tidypics-a' );

				add_submenu_item( 	elgg_echo('album:yours:friends'), 
									$CONFIG->wwwroot . "pg/photos/friends/{$page_owner->username}/", 
									'tidypics-a');
				
				add_submenu_item(	elgg_echo('tidypics:yourmostrecent'),
									$CONFIG->wwwroot . "pg/photos/mostrecent/{$page_owner->username}/",
									'tidypics-a');
				
				if ($view_count != 'disabled') {
					add_submenu_item(	elgg_echo('tidypics:yourmostviewed'),
										$CONFIG->wwwroot . "pg/photos/mostviewed/{$page_owner->username}/",
										'tidypics-a');
				}
				
			} else if (isloggedin()) {
				
				$user = get_loggedin_user();
				
				// logged in not owner gets "page owners albums", "page owner's friends albums", "page owner's most viewed", "page owner's most recent"
				// and then "your albums", "your most recent", "your most viewed"
				add_submenu_item(	elgg_echo("album:yours"), 
									$CONFIG->wwwroot . "pg/photos/owned/{$user->username}/", 
									'tidypics-b' );
								
				add_submenu_item(	elgg_echo('tidypics:yourmostrecent'),
									$CONFIG->wwwroot . "pg/photos/mostrecent/{$user->username}/",
									'tidypics-b');
									
				if ($view_count != 'disabled') {
					add_submenu_item(	elgg_echo('tidypics:yourmostviewed'),
										$CONFIG->wwwroot . "pg/photos/mostviewed/{$user->username}/",
										'tidypics-b');
				}
				
				if ($page_owner->name) { // check to make sure the owner set their display name
					add_submenu_item(	sprintf(elgg_echo("album:user"), $page_owner->name), 
										$CONFIG->wwwroot . "pg/photos/owned/{$page_owner->username}/", 
										'tidypics-a' );
					add_submenu_item( 	sprintf(elgg_echo('album:friends'),$page_owner->name), 
										$CONFIG->wwwroot . "pg/photos/friends/{$page_owner->username}/", 
										'tidypics-a');
					
					if ($view_count != 'disabled') {
						add_submenu_item( 	sprintf(elgg_echo('tidypics:friendmostviewed'),$page_owner->name), 
											$CONFIG->wwwroot . "pg/photos/mostviewed/{$page_owner->username}/", 
											'tidypics-a');
					}
					
					add_submenu_item( 	sprintf(elgg_echo('tidypics:friendmostrecent'),$page_owner->name), 
										$CONFIG->wwwroot . "pg/photos/mostrecent/{$page_owner->username}/", 
										'tidypics-a');
				}
			} else if ($page_owner->guid) {
				// non logged in user gets "page owners albums", "page owner's friends albums" 
				add_submenu_item(	sprintf(elgg_echo("album:user"), $page_owner->name), 
									$CONFIG->wwwroot . "pg/photos/owned/{$page_owner->username}/", 
									'tidypics-a' );
				add_submenu_item( 	sprintf(elgg_echo('album:friends'),$page_owner->name), 
									$CONFIG->wwwroot . "pg/photos/friends/{$page_owner->username}/", 
									'tidypics-a');
			}
			
			// everyone gets world albums, most recent, most viewed, most recently viewed, recently commented 
			add_submenu_item(	elgg_echo('album:all'), 
								$CONFIG->wwwroot . "pg/photos/world/", 
								'tidypics-z');
			add_submenu_item(	elgg_echo('tidypics:mostrecent'),
								$CONFIG->wwwroot . 'pg/photos/mostrecent/',
								'tidypics-z');
			
			if ($view_count != 'disabled') {
				add_submenu_item(	elgg_echo('tidypics:mostviewed'),
									$CONFIG->wwwroot . 'pg/photos/mostviewed/',
									'tidypics-z');
				add_submenu_item(	elgg_echo('tidypics:recentlyviewed'),
									$CONFIG->wwwroot . 'pg/photos/recentlyviewed/',
									'tidypics-z');
			}
			add_submenu_item(	elgg_echo('tidypics:recentlycommented'),
								$CONFIG->wwwroot . 'pg/photos/recentlycommented/',
								'tidypics-z');
/*
			add_submenu_item(	'Flickr Integration',
								$CONFIG->wwwroot . 'mod/tidypics/pages/flickr/setup.php',
								'tidypics-z');
*/
		}
		
	}
	function pages_page_handler_inria($page)
	{
		global $CONFIG;
		
		if (isset($page[0]))
		{
			// See what context we're using
			switch($page[0])
			{
				case "new":
					include($CONFIG->pluginspath . "pages/new.php");
          		break;
          		case "welcome":
					if (isset($page[1])) {
						set_input('username', $page[1]);
					}
					include($CONFIG->pluginspath . "pages/welcome.php");
          		break;
    			case "all":
   					include($CONFIG->pluginspath . "pages/world.php");
          		break;
    			case "owned":
    				// Owned by a user
    				if (isset($page[1])) {
    					set_input('username',$page[1]);

						elgg_extend_view('metatags','pages/metatags');
					}
    				//include($CONFIG->pluginspath . "pages/index.php");	
    				include($CONFIG->pluginspath . "theme_inria/pages/index.php");	
    			break;
    			case "edit":
    				if (isset($page[1])) {
						$guid = (int)$page[1];
    					set_input('page_guid', $guid);
    					
						$entity = get_entity($guid);
						add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/$guid", 'pageslinks');
						// add_submenu_item(elgg_echo('pages:user'), $CONFIG->wwwroot . "pg/pages/owned/" . $_SESSION['user']->username, 'pageslinksgeneral');
						if (($entity) && ($entity->canEdit())) {
							add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/$guid", 'pagesactions');
						}
						add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/$guid", 'pageslinks');
					}

    				include($CONFIG->pluginspath . "pages/edit.php");
    			break;
    			case "view":
    				
    				if (isset($page[1])) {
						$guid = (int)$page[1];
    					set_input('page_guid', $guid);

						elgg_extend_view('metatags','pages/metatags');
    					
						$entity = get_entity($guid);
						
						//add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/$guid", 'pageslinks');
						if (($entity) && ($entity->canEdit())) {
							add_submenu_item(elgg_echo('pages:new'), $CONFIG->url . "pg/pages/new/?container_guid=" . $entity->container_guid , 'pagesactions');
							add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/$guid", 'pagesactions');
						}
						add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/$guid", 'pagesactions');
					}

    				include($CONFIG->pluginspath . "pages/view.php");
    			break;   
    			case "history":
    				if (isset($page[1])) {
						$guid = (int)$page[1];
    					set_input('page_guid', $guid);

						elgg_extend_view('metatags','pages/metatags');
    					
						$entity = get_entity($guid);
						add_submenu_item(elgg_echo('pages:label:view'), $CONFIG->url . "pg/pages/view/$guid", 'pageslinks');
						if (($entity) && ($entity->canEdit())) {
							add_submenu_item(elgg_echo('pages:label:edit'), $CONFIG->url . "pg/pages/edit/$guid", 'pagesactions');
						}
						add_submenu_item(elgg_echo('pages:label:history'), $CONFIG->url . "pg/pages/history/$guid", 'pageslinks');
					}

    				include($CONFIG->pluginspath . "pages/history.php");
    			break; 				
    			default:
    				include($CONFIG->pluginspath . "pages/new.php");
    			break;
			}
		}
		
	}
	function blog_page_handler_inria($page) {
		global $CONFIG;
		// group usernames
		if (substr_count($page[0], 'group:')) {
			preg_match('/group\:([0-9]+)/i', $page[0], $matches);
			$guid = $matches[1];
			if ($entity = get_entity($guid)) {
				blog_url_forwarder($page);
			}
		}
	
		// user usernames
		$user = get_user_by_username($page[0]);
		if ($user) {
			blog_url_forwarder($page);
		}
			
		switch ($page[0]) {
			case "read":
				set_input('blogpost', $page[1]);
				include($CONFIG->pluginspath . "theme_inria/blog/read.php");
				break;
			case "archive":
				set_input('username', $page[1]);
				set_input('param2', $page[2]);
				set_input('param3', $page[3]);
				include($CONFIG->pluginspath . "blog/archive.php");
				break;
			case "owner":
				set_input('username', $page[1]);
				include($CONFIG->pluginspath . "blog/index.php");
				break;
			case "friends":
				set_input('username', $page[1]);
				include($CONFIG->pluginspath . "blog/friends.php");
				break;
			case "all":
				include($CONFIG->pluginspath . "blog/everyone.php");
				break;
			case "new":
				set_input('username', $page[1]);
				include($CONFIG->pluginspath . "blog/add.php");
				break;
			case "edit":
				set_input('blogpost', $page[1]);
				include($CONFIG->pluginspath . "blog/edit.php");
				break;
			default:
				return false;
		}
	
		return true;
	}
	
	function groups_page_handler_inria($page) {
		global $CONFIG;

		if (!isset($page[0])) {
			$page[0] = 'all';
		}

		switch ($page[0]) {
			case 'invitations':
				include($CONFIG->pluginspath . "groups/invitations.php");
				break;
			case "world":
			case "all":
				include($CONFIG->pluginspath . "theme_inria/groups/all.php");
				break;
			case "owned" :
				// Owned by a user
				set_input('username', $page[1]);
				include($CONFIG->pluginspath . "groups/index.php");
				break;
			case "new":
				include($CONFIG->pluginspath . "groups/new.php");
				break;
			case "edit":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "groups/edit.php");
				break;
			case "invite":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "groups/invite.php");
				break;
			case "member" :
				// User is a member of
				set_input('username',$page[1]);
				include($CONFIG->pluginspath . "groups/membership.php");
				break;
			case "memberlist":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "groups/memberlist.php");
				break;
			case "forum":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "groups/forum.php");
				break;
			case "membershipreq":
				set_input('group_guid', $page[1]);
				include($CONFIG->pluginspath . "groups/membershipreq.php");
				break;
			case "profile":
			default:
				if (is_numeric($page[0])) {
					// pg/groups/<guid>
					set_input('group_guid', $page[0]);
				} else {
					// pg/groups/profile/<guid>
					set_input('group_guid', $page[1]);
				}
				include($CONFIG->pluginspath . "theme_inria/groups/groupprofile.php");
				break;
		}
	}
	function groups_kill_request_inria($hook_name, $entity_type, $return_value, $parameters){
		global $CONFIG;
		return include $CONFIG->pluginspath . 'theme_inria/groups/groupskillrequest.php';
	}
	function groups_write_acl_plugin_hook_inria($hook, $entity_type, $returnvalue, $params)
	{
		$page_owner = page_owner_entity();
		// get all groups of user in question
		$user = get_entity($params['user_id']);
		if ($page_owner instanceof ElggGroup) {
			$returnvalue[$page_owner->group_acl] = elgg_echo('groups:group');
		}
		
		
		return $returnvalue;
	}
	function phpmailer_mail_override_inria($hook, $entity_type, $returnvalue, $params) {
		return phpmailer_send($params['from'], $params['from_name'], $params['to'], $params['to_name'], $params['subject'], $params['body'], NULL, true);
	}
	function email_notify_handler_inria(ElggEntity $from, ElggUser $to, $subject, $message, array $params = NULL) {
		global $CONFIG;
	
		if (!($from instanceof ElggEntity)) {
			throw new NotificationException(sprintf(elgg_echo('NotificationException:MissingParameter'), 'from'));
		}
	
		if (!($to instanceof ElggUser)) {
			throw new NotificationException(sprintf(elgg_echo('NotificationException:MissingParameter'), 'to'));
		}
	
		if ($to->email=="") {
			throw new NotificationException(sprintf(elgg_echo('NotificationException:NoEmailAddress'), $to->guid));
		}
		
		$params = array();
		
		$site = get_entity($CONFIG->site_guid);
		
		if ($from instanceof ElggUser) {
			$params['from'] = $from->email;
			$params['from_name'] = $from->name;
		} else if ($from instanceof ElggGroup && $site && $site->email) {
		// Use email address of current site if we cannot use sender's email
			$params['from'] = $from->guid . "+" . $site->email;
			$params['from_name'] = elgg_echo("theme_inria:mail:fromgrouptag") . $from->name;
		} else if ($site && $site->email) {
		// Use email address of current site if we cannot use sender's email
			$params['from'] = $site->email;
			$params['from_name'] = $site->name;
		} else {
			// If all else fails, use the domain of the site.
			$params['from'] = 'noreply@' . get_site_domain($CONFIG->site_guid);
		}
		
		$params['to'] = $to->email;
		$params['to_name']= $to->name;
		
		$params['subject'] = $subject;
		$params['body'] = $message;
		
		return trigger_plugin_hook('email', 'system', $params, NULL);
	}
	function object_notifications_inria($event, $object_type, $object) {
		// We only want to trigger notification events for ElggEntities
		if ($object instanceof ElggEntity) {
	
			// Get config data
			global $CONFIG, $SESSION, $NOTIFICATION_HANDLERS;
	
			$hookresult = trigger_plugin_hook('object:notifications',$object_type,array(
				'event' => $event,
				'object_type' => $object_type,
				'object' => $object,
			), false);
			if ($hookresult === true) {
				return true;
			}
	
			// Have we registered notifications for this type of entity?
			$object_type = $object->getType();
			if (empty($object_type)) {
				$object_type = '__BLANK__';
			}
	
			$object_subtype = $object->getSubtype();
			if (empty($object_subtype)) {
				$object_subtype = '__BLANK__';
			}
	
			if (isset($CONFIG->register_objects[$object_type][$object_subtype])) {
				$descr = $CONFIG->register_objects[$object_type][$object_subtype];
				$string = $descr . ": " . $object->getURL();
	
				// Get users interested in content from this person and notify them
				// (Person defined by container_guid so we can also subscribe to groups if we want)
				foreach($NOTIFICATION_HANDLERS as $method => $foo) {
					$interested_users = elgg_get_entities_from_relationship(array(
						'relationship' => 'notify' . $method,
						'relationship_guid' => $object->container_guid, 
						'inverse_relationship' => TRUE,
						'types' => 'user',
						'limit' => 99999
					));
	
					if ($interested_users && is_array($interested_users)) {
						foreach($interested_users as $user) {
							if ($user instanceof ElggUser && !$user->isBanned()) {
								if (($user->guid != $SESSION['user']->guid) && has_access_to_entity($object,$user)
								&& $object->access_id != ACCESS_PRIVATE) {
									$methodstring = trigger_plugin_hook('notify:entity:message',$object->getType(),array(
										'entity' => $object,
										'to_entity' => $user,
										'method' => $method),$string);
									//hack INRIA
									if(is_array($methodstring) ){
										if (isset($methodstring['to']) && isset($methodstring['from']) && isset($methodstring['subject']) && isset($methodstring['message'])){
											notify_user($methodstring['to'], $methodstring['from'], $methodstring['subject'], $methodstring['message'], NULL, array($method));
										}
									}
									else if (!empty($methodstring) && $methodstring !== false) {
										$methodstring = $string;
										notify_user($user->guid,$object->container_guid,$descr,$methodstring,NULL,array($method));
									}
								}
							}
						}
					}
				}
			}
		}
	}
	function annotation_notifications_inria($event, $annotation_type, $annotation) {
		global $CONFIG, $SESSION, $NOTIFICATION_HANDLERS;
		
		if ($annotation instanceof ElggAnnotation){
			$annoted_entity = get_entity($annotation->entity_guid);
			if ($annoted_entity instanceof ElggEntity){
				$container = get_entity($annoted_entity->container_guid);
				if ($container instanceof ElggUser || $container instanceof ElggGroup){
					foreach($NOTIFICATION_HANDLERS as $method => $foo) {
						$interested_users = elgg_get_entities_from_relationship(array(
																							'relationship' => 'notify' . $method,
																							'relationship_guid' => $container->guid, 
																							'inverse_relationship' => TRUE,
																							'types' => 'user',
																							'limit' => 99999
						));
						if ($interested_users && is_array($interested_users)) {
							foreach($interested_users as $user) {
								if ($user instanceof ElggUser && !$user->isBanned()) {
									if (($user->guid != $SESSION['user']->guid) && has_access_to_entity($annoted_entity,$user)
									&& $annotation->access_id != ACCESS_PRIVATE) {
										$methodstring = trigger_plugin_hook('notify:entity:message',$annotation_type,array(
																												'entity' => $annotation,
																												'to_entity' => $user,
																												'method' => $method),$string);
										//hack INRIA
										if(is_array($methodstring) ){
											if (isset($methodstring['to']) && isset($methodstring['from']) && isset($methodstring['subject']) && isset($methodstring['message'])){
												notify_user($methodstring['to'], $methodstring['from'], $methodstring['subject'], $methodstring['message'], NULL, array($method));
											}
										}
										else if (!empty($methodstring) && $methodstring !== false) {
											$methodstring = $string;
											notify_user($user->guid,$container->guid,$descr,$methodstring,NULL,array($method));
										}
									}
								}
							}
						}
					}
				}
			}
		}
		
	}
	function annotation_notify_message_inria($hook, $annotation_type, $returnvalue, $params){
		$annotation = $params['entity'];
		$to_entity = $params['to_entity'];
		$method = $params['method'];
		if (($annotation instanceof ElggAnnotation) && ($annotation->name == 'group_topic_post'))
		{
			$annoted_entity = get_entity($annotation->entity_guid);
			if ($annoted_entity instanceof ElggEntity){
				$container = get_entity($annoted_entity->container_guid);
				if ($container instanceof ElggUser || $container instanceof ElggGroup){
					$owner = $annotation->getOwnerEntity();
					if ($method == 'sms') {
						return $owner->name . ' via comment : ' . $annotation->value;
					}
					if ($method == 'email') {
						if (is_callable('object_notifications_inria')) {
							return array('to'      => $to_entity->guid,
										 'from'    => $container->guid,
										 'subject' => $annoted_entity->title,
										 'message' => $annotation->value . "<br />--<br />" . $owner->name  . "<br /><br />" . $annoted_entity->getURL());
						}else{
							return $returnvalue;
						}
					}
				}
			}
		}
		return null;
	}
	function blog_notify_message_inria($hook, $entity_type, $returnvalue, $params)
	{
		$entity = $params['entity'];
		$to_entity = $params['to_entity'];
		$method = $params['method'];
		if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'blog'))
		{
			$owner = $entity->getOwnerEntity();
			if ($method == 'sms') {
				return $owner->name . ' via blog: ' . $entity->title;
			}
			if ($method == 'email') {
				if (is_callable('object_notifications_inria')) {
					return array('to'      => $to_entity->guid,
								 'from'    => $entity->container_guid,
								 'subject' => $entity->title,
								 'message' => $entity->description . "<br />--<br />" . $owner->name  . "<br /><br />" . $entity->getURL());
				}else{
					return $returnvalue;
				}
			}
		}
		return null;
	}
	function groupforumtopic_notify_message_inria($hook, $entity_type, $returnvalue, $params)
	{
		$entity = $params['entity'];
		$to_entity = $params['to_entity'];
		$method = $params['method'];
		if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'groupforumtopic'))
		{
	
			$descr = $entity->description;
			$title = $entity->title;
			global $CONFIG;
			$url = $entity->getURL();
	
			$msg = get_input('topicmessage');
			if (empty($msg)) $msg = get_input('topic_post');
			if (!empty($msg)) $msg = $msg . "\n\n"; else $msg = '';
	
			$owner = $entity->getOwnerEntity();
			
			if ($method == 'sms') {
				return elgg_echo("groupforumtopic:new") . ': ' . $url . " ({$owner->name}: {$title})";
			}else if ($method == 'email') {
				if (is_callable('object_notifications_inria')) {
					return array('to'      => $to_entity->guid,
								 'from'    => $entity->container_guid,
								 'subject' => $entity->title,
								 'message' => $msg . "<br />--<br />" . $owner->name  . "<br /><br />" . $entity->getURL());
				}else{
					return $returnvalue;
				}
			}
	
		}
		return null;
	}
	function page_notify_message_inria($hook, $entity_type, $returnvalue, $params)
	{
		global $CONFIG;
		$entity = $params['entity'];
		$to_entity = $params['to_entity'];
		$method = $params['method'];
		if (($entity instanceof ElggEntity) && (($entity->getSubtype() == 'page_top') || ($entity->getSubtype() == 'page')))
		{
			$descr = $entity->description;
			$title = $entity->title;

			$url = $CONFIG->wwwroot . "pg/view/" . $entity->guid;
			$owner = $entity->getOwnerEntity();
			if ($method == 'sms') {

				return $owner->name . ' ' . elgg_echo("pages:via") . ': ' . $url . ' (' . $title . ')';
			}
			if ($method == 'email') {
				if (is_callable('object_notifications_inria')) {
					return array('to'      => $to_entity->guid,
								 'from'    => $entity->container_guid,
								 'subject' => $entity->title,
								 'message' => $entity->description . "<br />--<br />" . $owner->name  . "<br /><br />" . $entity->getURL());
				}else{
					return $owner->name . ' ' . elgg_echo("pages:via") . ': ' . $title . "\n\n" . $descr . "\n\n" . $entity->getURL();
				}
				
			}
			if ($method == 'site') {
				return $owner->name . ' ' . elgg_echo("pages:via") . ': ' . $title . "\n\n" . $descr . "\n\n" . $entity->getURL();
			}
		}
		return null;
	}
	function file_notify_message_inria($hook, $entity_type, $returnvalue, $params)
	{
		global $CONFIG;
		$entity = $params['entity'];
		$to_entity = $params['to_entity'];
		$method = $params['method'];
		if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'file'))
		{
			$descr = $entity->description;
			$title = $entity->title;
			$url = $CONFIG->wwwroot . "pg/view/" . $entity->guid;
			$owner = $entity->getOwnerEntity();
			if ($method == 'sms') {

				return $owner->name . ' ' . elgg_echo("file:via") . ': ' . $url . ' (' . $title . ')';
			}
			if ($method == 'email') {
				$owner = $entity->getOwnerEntity();
				if (is_callable('object_notifications_inria')) {
					$owner = $entity->getOwnerEntity();
					return array('to'      => $to_entity->guid,
								 'from'    => $entity->container_guid,
								 'subject' => $entity->title,
								 'message' => $entity->description . "<br />--<br />" . $owner->name  . "<br /><br />" . $entity->getURL());
				}else{
					return $owner->name . ' ' . elgg_echo("file:via") . ': ' . $entity->title . "\n\n" . $descr . "\n\n" . $entity->getURL();
				}
			}
			if ($method == 'web') {
				$owner = $entity->getOwnerEntity();
				return $owner->name . ' ' . elgg_echo("file:via") . ': ' . $entity->title . "\n\n" . $descr . "\n\n" . $entity->getURL();
			}
		}
		return null;
	}
	function bookmarks_notify_message_inria($hook, $entity_type, $returnvalue, $params) {
		global $CONFIG;
		$entity = $params['entity'];
		$to_entity = $params['to_entity'];
		$method = $params['method'];
		if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'bookmarks')) {
			$descr = $entity->description;
			$title = $entity->title;
			$url = $CONFIG->wwwroot . "pg/view/" . $entity->guid;
			$owner = $entity->getOwnerEntity();
			if ($method == 'sms') {
				return $owner->name . ' ' . elgg_echo("bookmarks:via") . ': ' . $url . ' (' . $title . ')';
			}
			if ($method == 'email') {
				if (is_callable('object_notifications_inria')) {
					return array('to'      => $to_entity->guid,
								 'from'    => $entity->container_guid,
								 'subject' => $entity->title,
								 'message' => $entity->description . "<br />--<br />" . $owner->name  . "<br /><br />" . $entity->getURL());
				}else{
					return $owner->name . ' ' . elgg_echo("bookmarks:via") . ': ' . $title . "\n\n" . $descr . "\n\n" . $entity->getURL();
				}
			}
			if ($method == 'web') {
				return $owner->name . ' ' . elgg_echo("bookmarks:via") . ': ' . $title . "\n\n" . $descr . "\n\n" . $entity->getURL();
			}
	
		}
	}

	//modification de la fonction d'origine pour les groupes cachés
	function groups_create_event_listener_inria($event, $object_type, $object)
	{
		global $CONFIG;
		$ac_name = elgg_echo('groups:group') . ": " . $object->name;
		$group_id = create_access_collection($ac_name, $object->guid);
		if ($group_id) {
			if ($object->access_id == ACCESS_PRIVATE){
				update_data("UPDATE {$CONFIG->dbprefix}entities set access_id='$group_id' where guid={$object->guid}");
			}
			$object->group_acl = $group_id;
		} else {
			// delete group if access creation fails
			return false;
		}
	
		return true;
	}