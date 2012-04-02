<?php
if ($vars['entity']->pages_enable != 'no' && $vars['group_tab'] == 'pages') {
	$context = get_context();
	set_context('search');
	echo elgg_list_entities(array('types' => 'object',
											'subtypes' => array('page', 'page_top'),
											'container_guid' => $vars['entity']->guid,
											'limit' => 20,
											'full_view' => FALSE,
											'pagination' => TRUE));
	set_context($context);
}