<?php

	/**
	 * Elgg blog edit entry page
	 *
	 * @package ElggBlog
	 */

	// Load Elgg engine
	require_once( $_SERVER['DOCUMENT_ROOT'] . "/engine/start.php");
	
	gatekeeper();

	// Get the current page's owner

	// Get the post, if it exists
	$blogpost = (int) get_input('blogpost');
	if ($post = get_entity($blogpost)) {
		//INRIA add for groups_write_acl_plugin_hook_inria needs
		set_page_owner($post->container_guid);
		
		if ($post->canEdit()) {

			$area1 = elgg_view_title(elgg_echo('blog:editpost'));
			$content = elgg_view("blog/forms/edit", array('entity' => $post));
			$area1 .= elgg_view('profile/tabs/content', array('content' => $content));
	
			$body = elgg_view_layout("edit_layout", $area1);

		}

	}

	// Display page
	page_draw(sprintf(elgg_echo('blog:editpost'),$post->title),$body);

?>