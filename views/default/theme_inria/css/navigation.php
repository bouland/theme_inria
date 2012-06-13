<?php
/**
 * Navigation toppbar
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>
/* ***************************************
	DROP MENU
*************************************** */
.elgg-menu-drop {
	z-index: 1;
}
.elgg-menu-drop > a:after {
	content: "\25BC";
	font-size: smaller;
	margin-left: 4px;
}
ul.elgg-child-menu {
	display: none;
	//background-color:  #333333;
}