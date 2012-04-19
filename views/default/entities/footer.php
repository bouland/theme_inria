<?php

	$entity = $vars['entity'];
	if($entity && $entity instanceof ElggEntity)
	{
		echo '<div class="footer">';
		
		
		$update = sprintf(elgg_echo("entities:footer:time"),	elgg_view_friendly_time($time_updated));
		 
		$owner = $entity->getOwnerEntity();
		if($owner && $owner instanceof ElggUser)
		{
			$author = sprintf(elgg_echo("entities:owner"), '<a href="' . $owner->getURL() . '">' . $owner->name ."</a>");
		}
		
		echo '<div class="footer_text"><p class="owner_timestamp">' . $update . ' ' . $author . '</p></div>';
		
		//echo '<div class="footer_icon">' . elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny')) . '</div>';
		
		echo '</div><div class="clearfloat"> </div>';
		
		
	}
?>