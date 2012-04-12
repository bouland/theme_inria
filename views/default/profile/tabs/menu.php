<?php

	/**
	 * A simple view to provide the user with group filters and the number of group on the site
	 * 
	 <?php
$entity = $vars['entity'];
if (isset($entity) && $entity instanceof ElggGroup){
	$container = get_entity($entity->container_guid);
	if (isset($container) && $container instanceof ElggGroup){
		$subtype = $entity->subtype;
		$enable = $subtype . '_enable';
		if(isset($subtype) && $container->$enable != 'no'){
			echo '<li';
			if (get_context() == $subtype) {
				echo ' class="selected"';
			}
			echo '>';
			echo elgg_view('profile/tabs/url_extend', $vars);
			//echo '<a href="' . $entity->getURL() . '">' . elgg_echo('groups:tabs:' . $subtype) . '</a></li>';
				
		}
	}
}
?>
	 **/
	 
?>
<div id="elgg_horizontal_tabbed_nav">
<ul>
<?php	echo elgg_view('profile/tabs/menu_extend', $vars); ?>
</ul>
</div>
