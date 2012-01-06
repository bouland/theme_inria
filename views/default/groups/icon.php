<?php

	/**
	 * Elgg group icon
	 * 
	 * @package ElggGroups
	 * 
	 * @uses $vars['entity'] The user entity. If none specified, the current user is assumed.
	 * @uses $vars['size'] The size - small, medium or large. If none specified, medium is assumed. 
	 */

	$group = $vars['entity'];
	
	if ($group instanceof ElggGroup) {
	
	// Get size
	if (!in_array($vars['size'],array('small','medium','large','tiny','master','topbar')))
		$vars['size'] = "medium";
			
	// Get any align and js
	if (!empty($vars['align'])) {
		$align = " align=\"{$vars['align']}\" ";
	} else {
		$align = "";
	}
	
	if ($icontime = $vars['entity']->icontime) {
		$icontime = "{$icontime}";
	} else {
		$icontime = "default";
	}
	$title = htmlentities($vars['entity']->name, ENT_QUOTES, 'UTF-8');
	
?>

<div class="groupicon">
<a href="<?php echo $vars['entity']->getURL(); ?>" class="icon" ><img src="<?php echo elgg_format_url($vars['entity']->getIcon($vars['size'])); ?>" border="0" <?php echo $align; ?> alt="<?php echo $title; ?>" title="<?php echo $title; ?>" <?php echo $vars['js']; ?> /></a>
</div>

<?php

	}

?>