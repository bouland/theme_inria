<?php
	if (!empty($vars['group_guid']) && !empty($vars['requests']) && is_array($vars['requests'])) {

		$checkboxes = array();
			
		foreach($vars['requests'] as $request){
			if ($request instanceof ElggUser) {
					$checkboxes  +=  array(elgg_view_entity($request) => $request->guid);
			}
		}
		echo elgg_view('input/checkboxes', array('internalname'=> 'user_guid', 'options' => $checkboxes));
		
		echo elgg_view('input/submit', array('internalname'=> 'delete', 'value' => elgg_echo('theme_inria:membershipreq:delete')));
				
		echo elgg_view('input/submit', array('internalname'=> 'reject', 'value' => elgg_echo('theme_inria:membershipreq:reject')));
			
		echo elgg_view('input/submit', array('internalname'=> 'accept', 'value' => elgg_echo('theme_inria:membershipreq:accept')));
		
		echo elgg_view('input/hidden', array('internalname' => 'group_guid', 'value' => $vars['group_guid']));
	}	
?>
