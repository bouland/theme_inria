<?php
/**
 * Elgg 2 column left sidebar with boxes
 *
 * @package Elgg
 * @subpackage Core
 */
?>

<!-- left sidebar -->
<div id="two_column_left_sidebar_boxes">

	<?php
	if (!isloggedin()){
		echo elgg_view('custom_index_inria/login_box', array('login' => elgg_view("account/forms/login")));
	}else{	
		if (isset($vars['area1'])) echo $vars['area1'];
		if (isset($vars['area3'])) echo $vars['area3'];
	}
	?>

</div><!-- /two_column_left_sidebar -->

<!-- main content -->
<div id="two_column_left_sidebar_maincontent_boxes">

<?php if (isset($vars['area2'])) echo $vars['area2']; ?>

</div><!-- /two_column_left_sidebar_maincontent -->

