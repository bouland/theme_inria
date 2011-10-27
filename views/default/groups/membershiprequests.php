<div class="contentWrapper">

<?php
	if (!empty($vars['entity']) && !empty($vars['requests']) && is_array($vars['requests'])) {

		$form = elgg_view('forms/groups/membershipreq', array('requests' => $vars['requests'], 'group_guid' => $vars['entity']->guid));
		
		echo elgg_view('input/form', array('action' => $vars['url'].'action/groups/membershipreq', 'body' => $form, 'internalid' => 'membershipreq'));
			
	} else {

		echo "<p>" . elgg_echo('groups:requests:none') . "</p>";

	}
?>
</div>
