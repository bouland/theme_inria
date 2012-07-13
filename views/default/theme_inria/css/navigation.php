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
.elgg-menu-topbar > li > a:hover{
	color: #E33729;
}
.elgg-menu-owner-block li.elgg-state-selected > a {
    background-color: #E95F54;
}
.elgg-menu-owner-block li > a:hover {
    background-color: #E33729;
}
.elgg-menu-page a:hover {
    background-color: #E33729;
}