<?php

/**
 * List most recent bookmarks on group profile page
 */
if ($vars['entity']->bookmarks_enable != 'no') {
	$context = get_context();
	set_context('search');
	$content = elgg_list_entities(array('types' => 'object',
										'subtypes' => 'bookmarks',
										'container_guid' => $vars['entity']->guid,
										'limit' => 5,
										'full_view' => FALSE,
										'pagination' => FALSE));
	set_context($context);
	if ($content) {
		echo "<div class=\"group_widget\">";
		$more_url = "{$vars['url']}pg/bookmarks/owner/group:{$vars['entity']->guid}/";
		echo "<h2><a href=\"$more_url\">" . elgg_echo('bookmarks:group') . "</a></h2>";
	
		echo $content;
		echo "</div>";
	}
}
