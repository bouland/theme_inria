<?php
if ($vars['entity']->file_enable != 'no' && $vars['group_tab'] == 'files') {
	$context = get_context();
	set_context('search');
	echo elgg_list_entities(array('types' => 'object',
											'subtypes' => 'file',
											'container_guid' => $vars['entity']->guid,
											'limit' => 20,
											'full_view' => FALSE,
											'pagination' => TRUE));
	set_context($context);
}