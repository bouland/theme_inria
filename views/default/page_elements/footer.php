<?php
/**
 * Elgg footer
 * The standard HTML footer that displays across the site
 *
 * @package theme_INRIA
 *
 */

// get the tools menu
//$menu = get_register('menu');

?>

<div class="clearfloat"></div>

</div><!-- /#page_wrapper -->
</div><!-- /#page_container -->

<div id="footer_container">
	<div class="footer_wrapper wrapper">
		<div id="footer_logo_elgg">
			<a href="http://www.elgg.org" target="_blank">
				<img src="<?php echo $vars['url'] . '_graphics/powered_by_elgg_badge_drk_bckgnd.gif'; ?>" border="0" />
			</a>
		</div>
		<?php
			echo elgg_view('footer/links');
		?>
	</div>
</div><!-- /#footer_container -->

</body>
</html>