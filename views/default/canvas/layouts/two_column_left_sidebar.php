<?php
/**
 * Elgg 2 column left sidebar canvas layout
 *
 * @package Elgg
 * @subpackage Core
 */
?>
<!-- left sidebar -->
<div id="two_column_left_sidebar">

	<?php
		if (!isloggedin()){
			echo elgg_view('custom_index_inria/login_block', array('login' => elgg_view("account/forms/login")));
		}else{	
			echo elgg_view('page_elements/owner_block',array('content' => $vars['area1']));
		}

	?>

	<?php if (isset($vars['area3'])) echo $vars['area3']; ?>

</div><!-- /two_column_left_sidebar -->

<!-- main content -->
<div id="two_column_left_sidebar_maincontent">
	<div id="elgg_horizontal_tabbed_nav">
		<ul>
		<?php	echo elgg_view('profile/tabs/menu_extend'); ?>
		</ul>
	</div>
	<div class="group_tab_wrapper">
		<?php if (isset($vars['area2'])) echo $vars['area2']; ?>
	</div>

</div><!-- /two_column_left_sidebar_maincontent -->

