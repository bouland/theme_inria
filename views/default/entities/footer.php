<?php

	$entity = $vars['entity'];
	if($entity && ($entity instanceof ElggEntity || $entity instanceof ElggAnnotation))
	{
		echo '<div id="footer">';
		if(isset($vars['link']))
		{
			echo '<div id="footer_link">';
			echo $vars['link'];
			echo '</div>';
		}
		$time = $vars['entity']->time_updated;
		if ($time < $vars['entity']->time_created)
		{
			$time = $vars['entity']->time_created;
		}
		$update = sprintf(elgg_echo("entities:footer:time"), elgg_view_friendly_time($time));
		$owner = $entity->getOwnerEntity();
		if($owner && $owner instanceof ElggUser)
		{
			$author = sprintf(elgg_echo("entities:owner"), '<a href="' . $owner->getURL() . '">' . $owner->name ."</a>");
		}
		
		echo '<div id="footer_text">';
		//
		echo '<p class="owner_timestamp">' . $update . ' ' . $author . '</p>';
		echo '</div><div class="clearfloat"> </div>';
		echo '</div>';
		
		//echo '<div class="footer_icon">' . elgg_view("profile/icon",array('entity' => $owner, 'size' => 'tiny')) . '</div>';
		
		
		
		
	}
?>