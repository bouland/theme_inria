<?php

/**
 * List most recent blog entries on group profile page
 */

if ($vars['entity']->blog_enable != 'no' ) {
	$context = get_context();
	set_context('search');
	$content = elgg_list_entities(array('types' => 'object',
											'subtypes' => 'blog',
											'container_guid' => $vars['entity']->guid,
											'limit' => 5,
											'full_view' => FALSE,
											'pagination' => FALSE));
	set_context($context);
	if ($content){
		$more_url = "{$vars['url']}pg/blog/owner/group:{$vars['entity']->guid}/";
		echo "<div class=\"group_widget\">";
		echo "<h2><a href=\"{$more_url}\">" . elgg_echo('blog:group') . "</a></h2>";
	
		echo $content;
		echo "</div>";
	}
}