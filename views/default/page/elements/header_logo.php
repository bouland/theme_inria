<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();
?>
<div class="inria-logo" >
	<a title="www.inria.fr" href="https://www.inria.fr/">
		<img src="<?php echo $site_url; ?>mod/theme_inria/images/INRIA_CORPO_BLANC_fond-transparent.png" alt="Logo Inria">
	</a>
</div>
<div class="inria-elgg-title">
	<h1>
		<a class="elgg-heading-site" href="<?php echo $site_url; ?>">
			<?php echo $site_name; ?>
		</a>
	</h1>
</div>