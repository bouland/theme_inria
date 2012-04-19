<?php
	$owner = $vars['owner'];
	
	if($owner && $owner instanceof ElggUser)
	{
		echo sprintf(elgg_echo("entities:owner"), '<a href="' . $owner->getURL() . '">' . $owner->name ."</a>");
		echo elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny'));
	}

?>