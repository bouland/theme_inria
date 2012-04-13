<?php

	/**
	 * Elgg read blog post page
	 * 
	 * @package ElggBlog
	 */

	// Load Elgg engine
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");

	global $CONFIG;
		
	// Get the specified blog post
	$post = (int) get_input('blogpost');

	// If we can get out the blog post ...
	if ($blogpost = get_entity($post)) {
			
		// Get any comments
		//$comments = $blogpost->getAnnotations('comments');
		
		// Set the page owner
		if ($blogpost->container_guid) {
			set_page_owner($blogpost->container_guid);
		} else {
			set_page_owner($blogpost->owner_guid);
		}
		if ( can_write_to_container() ){
			add_submenu_item(elgg_echo('blog:editpost'),$CONFIG->url .  "pg/blog/edit/" . $post, 'bookmarksactions');
			add_submenu_item(elgg_echo('blog:delpost'), $CONFIG->url .  "action/blog/delete?blogpost=" . $post, 'bookmarksactions', true);
			add_submenu_item(elgg_echo('blog:addpost'), $CONFIG->url . 'pg/blog/new/' .page_owner_entity()->username, 'bookmarksactions2');
		}
		$page_owner = page_owner_entity();
				
		$area2 = elgg_view('profile/tabs/menu', array('entity' => $blogpost, 'tab_select' => 'blog'));
		
		// Display it
		$content = elgg_view_entity($blogpost, true);
			/*$area2 = elgg_view("object/blog",array(
											'entity' => $blogpost,
											'entity_owner' => $page_owner,
											'comments' => $comments,
											'full' => true
											));
			*/
		$area2 .= elgg_view('profile/tabs/content', array('content' => $content));
			
		// Set the title appropriately
		$title = sprintf(elgg_echo("blog:posttitle"),$page_owner->name,$blogpost->title);
		set_context('blog_view');
		// Display through the correct canvas area
		$body = elgg_view_layout("two_column_left_sidebar", '', $area2);
			
		// If we're not allowed to see the blog post
	} else {
		
		forward();
		
	}
	
	// Display page
	page_draw($title,$body);
		
?>