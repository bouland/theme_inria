<?php

/**
 * List most recent files on group profile page
 */

if ($vars['entity']->file_enable != 'no') {
	$context = get_context();
	set_context('search');
	$content = elgg_list_entities(array('types' => 'object',
										'subtypes' => 'file',
										'container_guid' => $vars['entity']->guid,
										'limit' => 5,
										'full_view' => FALSE,
										'pagination' => FALSE));
	set_context($context);
	if ($content) {
		echo "<div class=\"group_widget\">";
		$more_url = "{$vars['url']}pg/file/owner/group:{$vars['entity']->guid}/";
		echo "<h2><a href=\"$more_url\">" . elgg_echo('file:group') . "</a></h2>";
	
		echo $content;
		echo "</div>";
	}
}
