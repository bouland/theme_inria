<?php
if ($vars['entity']->blog_enable != 'no' && $vars['group_tab'] == 'blog') {
	$context = get_context();
	set_context('search');
	echo elgg_list_entities(array('types' => 'object',
											'subtypes' => 'blog',
											'container_guid' => $vars['entity']->guid,
											'limit' => 20,
											'full_view' => FALSE,
											'pagination' => TRUE));
	set_context($context);
}