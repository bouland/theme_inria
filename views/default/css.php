<?php
/**
 * Elgg Default Theme
 * core CSS file
 *
 * Updated 30 Sept 09
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['wwwroot'] The site URL
 */
?>

/* ***************************************
	RESET BASE STYLES
*************************************** */
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	outline: 0;
	font-weight: inherit;
	font-style: inherit;
	font-size: 100%;
	font-family: inherit;
	vertical-align: baseline;
}
/* remember to define focus styles! */
:focus {
	outline: 0;
}
ol, ul {
	list-style: none;
}
em, i {
	font-style:italic;
}
/* tables still need cellspacing="0" (for ie6) */
table {
	border-collapse: separate;
	border-spacing: 0;
}
caption, th, td {
	text-align: left;
	font-weight: normal;
	vertical-align: top;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: "";
}
blockquote, q {
	quotes: "" "";
}
.clearfloat {
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}

/* ***************************************
	DEFAULTS
*************************************** */

/* elgg open source		blue 			#eb4422 */
/* elgg open source		dark blue 		#e41326 */
/* elgg open source		light yellow 	#FDFFC3 */
/* elgg open source		light blue	 	#bbdaf7 */


body {
	text-align:left;
	margin:0 auto;
	padding:0;
	background: #ffffff;
	font: 80%/1.4  "Arial", Verdana, sans-serif;
	color: #333333;
}
a {
	color: #eb4422;
	text-decoration: none;
	-moz-outline-style: none;
	outline: none;
}
a:visited {

}
a:hover {
	color: #e41326;
	text-decoration: underline;
}
p {
	margin: 0px 0px 15px 0;
}
img {
	border: none;
}
ul {
	margin: 5px 0px 15px;
	padding-left: 20px;
}
ul li {
	margin: 0px;
}
ol {
	margin: 5px 0px 15px;
	padding-left: 20px;
}
ul li {
	margin: 0px;
}
form {
	margin: 0px;
	padding: 0px;
}
small {
	font-size: 90%;
}
h1, h2, h3, h4, h5, h6 {
	font-weight: bold;
	line-height: normal;
}
h1 { font-size: 1.8em; }
h2 { font-size: 1.5em; }
h3 { font-size: 1.2em; }
h4 { font-size: 1.0em; }
h5 { font-size: 0.9em; }
h6 { font-size: 0.8em; }

dt {
	margin: 0;
	padding: 0;
	font-weight: bold;
}
dd {
	margin: 0 0 1em 1em;
	padding: 0;
}
pre, code {
	font-family:Monaco,"Courier New",Courier,monospace;
	font-size:12px;
	background:#EBF5FF;
	overflow:auto;

	overflow-x: auto; /* Use horizontal scroller if needed; for Firefox 2, not needed in Firefox 3 */
	white-space: pre-wrap; /* css-3 */
	white-space: -moz-pre-wrap !important; /* Mozilla, since 1999 */
	white-space: -pre-wrap; /* Opera 4-6 */
	white-space: -o-pre-wrap; /* Opera 7 */
	word-wrap: break-word; /* Internet Explorer 5.5+ */

}
code {
	padding:2px 3px;
}
pre {
	padding:3px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
}
blockquote {
	padding:3px 15px;
	margin:0px 0 15px 0;
	line-height:1.3em;
	background:#EBF5FF;
	border:none !important;
}
blockquote p {
	margin:0 0 5px 0;
}

/* ***************************************
	PAGE LAYOUT - MAIN STRUCTURE
*************************************** */
#page_container {
	position:relative;
	padding:0;
	background:#ffffff url(<?php echo $vars['url'].'mod/theme_inria/graphics/body_bg.gif'?>) repeat-x;
}
.wrapper {
	width:995px;
	margin:0 auto;
	padding:0;
}
#page_wrapper{
	min-height: 300px;
}


#layout_header {
	text-align:left;
	width:100%;
	height:67px;
	background:#dedede;
}
#wrapper_header {
	margin:0;
	padding:10px 20px 20px 0px;
}
#wrapper_header h1 {
	margin:10px 0 0 0;
	letter-spacing: -0.03em;
}
#layout_canvas {
	margin:0 0 20px 0;
	padding:20px;
	min-height: 360px;
	background: white;
	border:1px solid #cccccc;
	
}


/* canvas layout: 1 column, no sidebar */
#one_column {
/* 	width:928px; */
	margin:0;
	min-height: 360px;
	background: #F5F5F5;
	padding:0 0 10px 0;
}

/* canvas layout: 2 column left sidebar */
#two_column_left_sidebar {
	width:210px;
	margin:0 20px 0 0;
	min-height:360px;
	float:left;
	background:#ffffff url(<?php echo $vars['url'].'mod/theme_inria/graphics/sbar_grdnt.gif'; ?>);
	padding:0px;
	border-bottom:1px solid #cccccc;
	border-right:1px solid #cccccc;
}

#two_column_left_sidebar_maincontent {
	width:717px;
	margin:0;
	min-height: 360px;
	float:left;
	background: white;
	padding:0 0 5px 0;
}




#two_column_left_sidebar_maincontent_boxes {
	margin:0 0px 20px 20px;
	padding:0 0 5px 0;
	width:717px;
	float:left;
}
#two_column_left_sidebar_boxes {
	width:210px;
	margin:0px 0 20px 0px;
	min-height:360px;
	float:left;
	padding:0;
}
#two_column_left_sidebar_boxes .sidebarBox {
	margin:0px 0 22px 0;
	background:#ffffff url(<?php echo $vars['url'].'mod/theme_inria/graphics/sbar_grdnt.gif'; ?>);
	padding:4px 10px 10px 10px;
	border-bottom:1px solid #cccccc;
	border-right:1px solid #cccccc;
}
#two_column_left_sidebar_boxes .sidebarBox h3,
#owner_block_members h3 {
	padding:0 0 5px 0;
	font-size:1em;
	line-height:1.2em;
	color:#ea3f21;
}

/* canvas layout: 2 column right sidebar */
#two_column_right_sidebar {
	width:210px;
	margin:0 0 0 20px;
	min-height:360px;
	float:left;
	background:#ffffff url(<?php echo $vars['url'].'mod/theme_inria/graphics/sbar_grdnt.gif'; ?>);
	padding:0px;
	border-bottom:1px solid #cccccc;
	border-right:1px solid #cccccc;
}


.featuredgroups .contentWrapper {
	padding:10px;
	margin:0px;
}
span.contentIntro p {
	margin:0 0 0 0;
}
.notitle {
	margin-top:10px;
}

/* canvas layout: widgets (profile and dashboard) */
#widgets_left {
	width:303px;
	margin:0 20px 20px 0;
	min-height:360px;
	padding:0;
}
#widgets_middle {
	width:303px;
	margin:0 0 20px 0;
	padding:0;
}
#widgets_right {
	width:303px;
	margin:0px 0 20px 20px;
	float:left;
	padding:0;
}
#widget_table td {
	border:0;
	padding:0;
	margin:0;
	text-align: left;
	vertical-align: top;
}
/* IE6 fixes */
* html #widgets_right { float:none; }
* html #profile_info_column_left {
	margin:0 10px 0 0;
	width:200px;
}
* html #dashboard_info { width:585px; }
/* IE7 */
*:first-child+html #profile_info_column_left { width:200px; }


/* ***************************************
	SPOTLIGHT
*************************************** */
#layout_spotlight {
	margin:0 0 20px 0;
	padding:0;
	background: white;
	border:1px solid #cccccc;
}
#wrapper_spotlight {
	margin:0;
	padding:0;
	height:auto;
}
#wrapper_spotlight #spotlight_table h2 {
	color:#eb4422;
	font-size:1em;
	line-height:1.2em;
}
#wrapper_spotlight #spotlight_table li {
	list-style: square;
	line-height: 1em;
	margin:5px 20px 5px 0;
	color:#eb4422;
}
#wrapper_spotlight .collapsable_box_content  {
	margin:0;
	padding:10px 10px 5px 10px;
	background:none;
	min-height:60px;
	border:none;
	border-top:1px solid #cccccc;
}
#spotlight_table {
	margin:0 0 2px 0;
}
#spotlight_table .spotlightRHS {
	float:right;
	width:270px;
	margin:0 0 0 50px;
}
/* IE7 */
*:first-child+html #wrapper_spotlight .collapsable_box_content {
	width:958px;
}
#layout_spotlight .collapsable_box_content p {
	padding:0;
}
#wrapper_spotlight .collapsable_box_header_spot  {
	border: none;
	background: none;
}
#wrapper_spotlight .collapsable_box_header  {
	border: none;
	background: none;
}


/* ***************************************
	FOOTER
*************************************** */
#footer_container {
    background: url(<?php echo $vars['url'].'mod/theme_inria/graphics/bkgd_footer.png'; ?>) repeat-x scroll center -70px #282A32;
    padding-top: 1px;
    clear: both;
    color: #888888;
    font-size: 0.9em;
    position: relative;
}
#footer_container a {
    color: #888888;
    text-decoration: none;
}
#footer_container a:hover, #footer_container a:focus {
    text-decoration: underline;
}
#footer_container ul {
	padding:	0;
	margin: 	0;
}
#footer_container li {
    border-left: 1px solid #888888;
    display: inline;
    padding: 0 1em;
}
#footer_container li:first-child {
    border-left: 0 none;
}
#footer_logo_elgg{
	margin:0;
	display: inline;
	float:left;
}
.footer_toolbar_links{
	text-align:center;
	width:400;
}
.footer_wrapper{
	letter-spacing: 1px;
    padding: 2.5em 1em;
}

/* ***************************************
HORIZONTAL ELGG TOPBAR
*************************************** */
#elgg_topbar {
    background: url(<?php echo $vars['url'].'mod/theme_inria/graphics/bkgd_footer.png'; ?>) repeat-x scroll center -70px #282A32;
    clear: both;
    color: #888888;
	position:fixed;
	top:0px;
	width:100%;
	font-size: 0.85em;
	z-index: 9000; /* if you have multiple position:relative elements, then IE sets up separate Z layer contexts for each one, which ignore each other */
	text-align:left;
}
#elgg_topbar a {
    color: #CCCCCC;
    text-decoration: none;
}
#elgg_topbar a:hover, #footer_container a:focus {
    text-decoration: underline;
}



/* ***************************************
HORIZONTAL ELGG TOPBAR LEFT
*************************************** */

#elgg_topbar_container_left {
	text-align: left;
	line-height: 28px;
	margin-left:28px;
}

/* ***************************************
HORIZONTAL ELGG TOPBAR RIGHT
*************************************** */

#elgg_topbar_container_right {
	float:right;
	text-align: right;
	line-height: 28px;
	margin-right: 20px;
}
#elgg_topbar_container_right ul {
	padding:	0;
	margin: 	0;
}
#elgg_topbar_container_right li {
    border-left: 1px solid #888888;
    display: inline;
    padding: 0 0.5em;
    
}
#elgg_topbar_container_right li:first-child {
    border-left: 0 none;
}
#elgg_topbar_container_right a {
	padding:2px 0 2px 21px;
}
#elgg_topbar_container_right a.usersettings {
		padding:2px 0;
}
#elgg_topbar_container_right a.disconnect {
	padding:2px 22px 2px 0;
	background:transparent url(<?php echo $vars['url']; ?>_graphics/elgg_toolbar_logout.gif) no-repeat right top;
	display: inline;
}
#elgg_topbar_container_right a.disconnect:hover {
	background-position: right -21px;
}

#elgg_topbar_container_right a.privatemessages {
	background:transparent url(<?php echo $vars['url']; ?>_graphics/toolbar_messages_icon.gif) no-repeat left 2px;
	cursor:pointer;
}
#elgg_topbar_container_right a.privatemessages:hover {
	background:transparent url(<?php echo $vars['url']; ?>_graphics/toolbar_messages_icon.gif) no-repeat left -36px;
}
#elgg_topbar_container_right a.privatemessages_new {
	background:transparent url(<?php echo $vars['url']; ?>_graphics/toolbar_messages_icon.gif) no-repeat left -17px;
	padding:0 0 0 18px;
	margin:0 15px 0 5px;
}
/* IE6 fix */
* html #elgg_topbar_container_right a {
	width: 120px;
}
#elgg_topbar_container_right .user_mini_avatar {
	border:1px solid #eeeeee;
	margin:0 5px 0 0;
	position:relative;
	top:5px;
}

#elgg_topbar_panel {
	background:#333333;
	color:#eeeeee;
	height:200px;
	width:100%;
	padding:10px 20px 10px 20px;
	display:none;
	position:relative;
}

#elgg_topbar_container_search {
	float:right;
	top:70%;
	right:25px;
	position:absolute;
}

/* ***************************************
	BANNER
*************************************** */
#banner_bottom {
	position:relative;
	height:5px;
	background:#D7D4D6 url(<?php echo $vars['url'].'mod/theme_inria/graphics/header_bottom.gif'?>) repeat-x;
}
#banner_layout{
	position:relative;
	height:95px;
	width:100%;
	background-color:#363842;
}
div.logo{
	background-color:white;
	height:auto;
	width:auto;
	float:left;
	text-align:center;
}
.logo img{
	display:inline;
}

.connected{
	margin-top: 28px;
}

/* ***************************************
	TOP BAR - VERTICAL TOOLS MENU
*************************************** */
ul.topbardropdownmenu ul.subdrop {
	top:-1px;
	left:82px;
	border-left: 1px solid white;
	display:inline;
}

/* elgg toolbar menu setup */
ul.topbardropdownmenu, ul.topbardropdownmenu ul {
	margin:0;
	padding:0;
	display:inline;
	float:left;
	list-style-type: none;
	z-index: 9000;
	position: relative;
}
ul.topbardropdownmenu {
	margin:0pt 20px 0pt 5px;
}
ul.topbardropdownmenu li {
	display: block;
	list-style: none;
	margin: 0;
	padding: 0;
	float: left;
	position: relative;
}
ul.topbardropdownmenu li.drop {
	border-left: 1px solid #888888;
	padding: 0 0.5em;
}
ul.topbardropdownmenu li.drop:first-child {
    border-left: 0 none;
}
ul.topbardropdownmenu a {
	display:block;
}
ul.topbardropdownmenu ul {
	display: none;
	position: absolute;
	left: 0;
	margin: 0;
	padding: 0;
}
/* IE6 fix */
* html ul.topbardropdownmenu ul {
	line-height: 1.1em;
}
/* IE6/7 fix */
ul.topbardropdownmenu ul a {
	zoom: 1;
}
ul.topbardropdownmenu ul li {
	float: none;
}
/* elgg toolbar menu style */
ul.topbardropdownmenu ul {
	top: 28px;
	border-top:1px solid black;
}
ul.topbardropdownmenu *:hover {
	background-color: none;
}
ul.topbardropdownmenu a {
	text-decoration:none;
	color:white;
}
ul.topbardropdownmenu li.hover a {
	text-decoration: none;
}
ul.topbardropdownmenu ul li.drop a {
	font-weight: normal;
}
/* IE7 fixes */
*:first-child+html #elgg_topbar_container_left a.pagelinks {

}
*:first-child+html ul.topbardropdownmenu li.drop a.menuitemtools {
	padding-bottom:6px;
}
ul.topbardropdownmenu ul li a {
    background: url(<?php echo $vars['url'].'mod/theme_inria/graphics/bkgd_footer.png'; ?>) repeat-x scroll center -70px #282A32;
	padding:0 10px;
	border-bottom: 1px solid white;
}

ul.topbardropdownmenu ul a.hover {
	background-color: #333333;
	opacity: 1;
	filter: alpha(opacity=100);
}
ul.topbardropdownmenu ul a {
	opacity: 0.9;
	filter: alpha(opacity=90);
}


/* ***************************************
SYSTEM MESSSAGES
*************************************** */
.messages {
	background:#ccffcc;
	color:#000000;
	padding:3px 10px 3px 10px;
	z-index: 8000;
	margin:0;
	position:fixed;
	top:30px;
	width:969px;
	border:4px solid #00CC00;
	cursor: pointer;
}
.messages_error {
	border:4px solid #D3322A;
	background:#F7DAD8;
	color:#000000;
	padding:3px 10px 3px 10px;
	z-index: 8000;
	margin:0;
	position:fixed;
	top:30px;
	width:969px;
	cursor: pointer;
}
.closeMessages {
	float:right;
	margin-top:17px;
}
.closeMessages a {
	color:#666666;
	cursor: pointer;
	text-decoration: none;
	font-size: 80%;
}
.closeMessages a:hover {
	color:black;
}


/* ***************************************
COLLAPSABLE BOXES
*************************************** */
.collapsable_box {
	margin: 0 0 20px 0;
	height:auto;

}
/* IE6 fix */
* html .collapsable_box  {
	height:10px;
}
.collapsable_box_header {
	color: #eb4422;
	padding: 5px 10px 5px 10px;
	margin:0;
	border-left: 1px solid #ffffff;
	border-right: 1px solid #ffffff;
	border-bottom: 1px solid #ffffff;
	background:#00A2E5 url(<?php echo $vars['url'].'mod/theme_inria/graphics/box_header.gif'?>) repeat-x;
}
.collapsable_box_header h1 {
	color: #ffffff;
	font-size:0.9em;
	line-height: 1.2em;
}
.collapsable_box_header_spot {
	color: #eb4422;
	padding: 5px 10px 5px 10px;
	margin:0;
	border-left: 1px solid #ffffff;
	border-right: 1px solid #ffffff;
	border-bottom: 1px solid #ffffff;
	background:#ffffff;
}
.collapsable_box_header_spot h1 {
	color: #eb4422;
	font-size:0.9em;
	line-height: 1.2em;
}
.collapsable_box_header_spot a.toggle_box_contents {
	color: #eb4422;
	cursor:pointer;
	font-family: Arial, Helvetica, sans-serif;
	font-size:20px;
	font-weight: bold;
	text-decoration:none;
	float:right;
	margin: 0;
	margin-top: -7px;
}
.collapsable_box_header_spot a.toggle_box_edit_panel {
	color: #eb4422;
	cursor:pointer;
	font-size:9px;
	text-transform: uppercase;
	text-decoration:none;
	font-weight: normal;
	float:right;
	margin: 3px 10px 0 0;
}
.collapsable_box_content {
	padding: 10px 0 10px 0;
	margin:0;
	height:auto;
	background:#F5F5F5;
	border-left: 1px solid #ffffff;
	border-right: 1px solid #ffffff;
	border-bottom: 1px solid #ffffff;
}
.collapsable_box_content .contentWrapper {
	margin-bottom:5px;
}
.collapsable_box_editpanel {
	display: none;
	background: #FBFBFF;
	padding:10px 10px 5px 10px;
	border-left: 1px solid white;
	border-bottom: 1px solid white;
}
.collapsable_box_editpanel p {
	margin:0 0 5px 0;
}
.collapsable_box_header a.toggle_box_contents {
	color: #ffffff;
	cursor:pointer;
	font-family: Arial, Helvetica, sans-serif;
	font-size:20px;
	font-weight: bold;
	text-decoration:none;
	float:right;
	margin: 0;
	margin-top: -7px;
}
.collapsable_box_header a.toggle_box_edit_panel {
	color: #ffffff;
	cursor:pointer;
	font-size:9px;
	text-transform: uppercase;
	text-decoration:none;
	font-weight: normal;
	float:right;
	margin: 3px 10px 0 0;
}
.collapsable_box_editpanel label {
	font-weight: normal;
	font-size: 100%;
}
/* used for collapsing a content box */
.display_none {
	display:none;
}
/* used on spotlight box - to cancel default box margin */
.no_space_after {
	margin: 0 0 0 0;
}



/* ***************************************
	GENERAL FORM ELEMENTS
*************************************** */
label {
	font-weight: bold;
	color:#333333;
	font-size: 120%;
}
input {
	font: 120% Arial, Helvetica, sans-serif;
	padding: 5px;
	border: 1px solid #cccccc;
	color:#666666;
}
input[type="checkbox"] {
	padding: 1px;
	border-style: none;
}
textarea {
	font: 120% Arial, Helvetica, sans-serif;
	border: solid 1px #cccccc;
	padding: 5px;
	color:#666666;
}
textarea:focus, input[type="text"]:focus {
	border: solid 1px #eb4422;
	background-color: #e4ecf5;
	color:#333333;
}
.submit_button {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#eb4422;
	border: 1px solid #eb4422;
	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px 0 10px 0;
	cursor: pointer;
}
.submit_button:hover, input[type="submit"]:hover {
	background: #e41326;
	border-color: #e41326;
}

input[type="submit"] {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#eb4422;
	border: 1px solid #eb4422;
	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px;
	cursor: pointer;
}
.cancel_button {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #999999;
	background:#dddddd;
	border: 1px solid #999999;
	width: auto;
	height: 25px;
	padding: 2px 6px 2px 6px;
	margin:10px 0 10px 10px;
	cursor: pointer;
}
.cancel_button:hover {
	background: #cccccc;
}

.input-password,
.input-text,
.input-tags,
.input-url,
.input-textarea {
	width:98%;
}

.input-textarea {
	height: 200px;
}
#membershipreq input.submit_button{
	float:right;
}
#membershipreq input.input-checkboxes{
	float:right;
}
/* ***************************************
	LOGIN / REGISTER
*************************************** */
#login-box {
	margin:0 0 10px 0;
	padding:0 0 10px 0;
	background: #FBFBFF;
	text-align:left;
}
#login-box form {
	margin:0 10px 0 10px;
	padding:0 10px 4px 10px;
	background: white;
}
#login-box h2 {
	color:#ea3f21;
	font-size:1.35em;
	line-height:1.2em;
	margin:0 0 0 8px;
	padding:5px 5px 0 5px;
}
#login-box .login-textarea {
	width:178px;
}
#login-box label,
#register-box label {
	font-size: 1.2em;
	color:gray;
}
#login-box p.loginbox {
	margin:0;
}
#login-box input[type="text"],
#login-box input[type="password"],
#register-box input[type="text"],
#register-box input[type="password"] {
	margin:0 0 10px 0;
}
#register-box input[type="text"],
#register-box input[type="password"] {
	width:380px;
}
#login-box h2,
#login-box-openid h2,
#register-box h2,
#add-box h2,
#forgotten_box h2 {
	color:#ea3f21;
	font-size:1.35em;
	line-height:1.2em;
	margin:0pt 0pt 5px;
}
#register-box {
	text-align:left;
	width:400px;
	padding:10px;
	background: #FBFBFF;
	margin:0;
}
#persistent_login label {
	font-size:1.0em;
	font-weight: normal;
}
/* login and openID boxes when not running custom_index mod */
#two_column_left_sidebar #login-box {
	width:auto;
	background: none;
}
#two_column_left_sidebar #login-box form {
	width:auto;
	margin:10px 10px 0 10px;
	padding:5px 0 5px 10px;
}
#two_column_left_sidebar #login-box h2 {
	margin:0 0 0 5px;
	padding:5px 5px 0 5px;
}
#two_column_left_sidebar #login-box .login-textarea {
	width:158px;
}
/* login and openID boxes when not running custom_index mod */
#two_column_right_sidebar #login-box {
	width:auto;
	background: none;
}
#two_column_right_sidebar #login-box form {
	width:auto;
	margin:10px 10px 0 10px;
	padding:5px 0 5px 10px;
}
#two_column_right_sidebar #login-box h2 {
	margin:0 0 0 5px;
	padding:5px 5px 0 5px;
}
#two_column_right_sidebar #login-box .login-textarea {
	width:158px;
}

/* ***************************************
	PROFILE
*************************************** */
#profile_info {
	margin:0 0 20px 0;
	padding:20px;
	border-bottom:0px solid #cccccc;
	border-right:0px solid #cccccc;
	background: #ffffff;
}
#profile_info_column_left {
	float:left;
	padding: 0;
	margin:0 20px 0 0;
}
#profile_info_column_middle {
	float:left;
	width:365px;
	padding: 0;
}
#profile_info_column_right {
	width:578px;
	margin:0 0 0 0;
	background:#ffffff;
	padding:4px;
}
#dashboard_info {
	margin:0px 0px 0 0px;
	padding:20px;
	border-bottom:1px solid #cccccc;
	border-right:1px solid #cccccc;
	background: #bbdaf7;
}
#profile_menu_wrapper {
	margin:10px 0 10px 0;
	width:200px;
}
#profile_menu_wrapper p {
	border-bottom:1px solid #cccccc;
}
#profile_menu_wrapper p:first-child {
	border-top:1px solid #cccccc;
}
#profile_menu_wrapper a {
	display:block;
	padding:0 0 0 3px;
}
#profile_menu_wrapper a:hover {
	color:#545454;
	background:#F5F5F5;
	text-decoration:none;
}
p.user_menu_friends, p.user_menu_profile,
p.user_menu_removefriend,
p.user_menu_friends_of {
	margin:0;
}
#profile_menu_wrapper .user_menu_admin {
	border-top:none;
}

#profile_info_column_middle p {
	margin:7px 0 7px 0;
	padding:2px 4px 2px 4px;
}
/* profile owner name */
#profile_info_column_middle h2 {
	padding:0 0 14px 0;
	margin:0;
}
#profile_info_column_middle .profile_status {
	background:#F5F5F5;
	padding:2px 4px 2px 4px;
	line-height:1.2em;
}
#profile_info_column_middle .profile_status span {
	display:block;
	font-size:90%;
	color:#666666;
}
#profile_info_column_middle a.status_update {
	float:right;
}
#profile_info_column_middle .odd {
	background:#FBFBFF;
}
#profile_info_column_middle .even {
	background:#FCFCFC;
}
#profile_info_column_right p {
	margin:0 0 7px 0;
}
#profile_info_column_right .profile_aboutme_title {
	margin:0;
	padding:0;
	line-height:1em;
}
#profile_icon_wrapper {
	border:2px solid #181818;
}
/* edit profile button */
.profile_info_edit_buttons {
	float:right;
	margin:0  !important;
	padding:0 !important;
}
.profile_info_edit_buttons a {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#eb4422;
	width: auto;
	padding: 2px 6px 2px 6px;
	margin:0;
	cursor: pointer;
}
.profile_info_edit_buttons a:hover {
	background: #e41326;
	text-decoration: none;
	color:white;
}


/* ***************************************
	RIVER
*************************************** */
#river,
.river_item_list {
	//border-top:1px solid #dddddd;
	
	overflow:hidden;
	
}
.river_item p {
	margin:0;
	padding:0 0 0 21px;
	line-height:1.1em;
	min-height:17px;
}
.river_item {
	//border-bottom:1px solid #dddddd;
	border-bottom: 1px solid #CCCCCC;
    margin:0;
    padding:5px;
}
.river_item:hover{
	background:none repeat scroll 0 0 #DDDDDD;
}

.river_item_time {
	font-size:90%;
	color:#666666;
}
.river_item .river_item_useravatar {
	float:left;
	margin:0 5px 0 0;
}
/* IE6 fix */
* html .river_item p {
	padding:3px 0 3px 20px;
}
/* IE7 */
*:first-child+html .river_item p {
	min-height:17px;
}
.river_user_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_profile.gif) no-repeat left -1px;
}
.river_object_user_profileupdate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_profile.gif) no-repeat left -1px;
}
.river_object_user_profileiconupdate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_profile.gif) no-repeat left -1px;
}
.river_object_annotate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_bookmarks_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_bookmarks.gif) no-repeat left -1px;
}
.river_object_bookmarks_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_status_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_status.gif) no-repeat left -1px;
}
.river_object_file_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_files.gif) no-repeat left -1px;
}
.river_object_file_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_files.gif) no-repeat left -1px;
}
.river_object_file_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_widget_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_plugin.gif) no-repeat left -1px;
}
.river_object_forums_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_forums_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_widget_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_plugin.gif) no-repeat left -1px;
}
.river_object_blog_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_blog.gif) no-repeat left -1px;
}
.river_object_blog_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_blog.gif) no-repeat left -1px;
}
.river_object_blog_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_forumtopic_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_user_friend {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_friends.gif) no-repeat left -1px;
}
.river_object_relationship_friend_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_friends.gif) no-repeat left -1px;
}
.river_object_relationship_member_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_thewire_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_thewire.gif) no-repeat left -1px;
}
.river_group_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_group_join {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_groupforumtopic_annotate {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_groupforumtopic_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_forum.gif) no-repeat left -1px;
}
.river_object_sitemessage_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_blog.gif) no-repeat left -1px;
}
.river_user_messageboard {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_page_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_top_create {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_top_update {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_pages.gif) no-repeat left -1px;
}
.river_object_page_top_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}
.river_object_page_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}

/* ***************************************
	ENTITY LISTINGS
*************************************** */
.search_listing {
	display: block;
	background:white;
	margin:0px;
	padding:5px;
	border-bottom:1px solid #cccccc;
}
.search_listing_icon {
	float:left;
}
.search_listing_icon img {
	width: 40px;
}
.search_listing_icon .avatar_menu_button img {
	width: 15px;
}
.search_listing_info {
	margin-left: 50px;
	min-height: 40px;
}
/* IE 6 fix */
* html .search_listing_info {
	height:40px;
}
.search_listing_info p {
	margin:0 0 3px 0;
	line-height:1.2em;
}
.search_listing_info p.owner_timestamp {
	margin:0;
	padding:0;
	color:#666666;
	font-size: 90%;
}
table.entity_gallery {
	border-spacing: 10px;
	margin:0 0 0 0;
}
.entity_gallery td {
	padding: 5px;
}
.entity_gallery_item {
	background: white;
	width:170px;
}
.entity_gallery_item:hover {
	background: black;
	color:white;
}
.entity_gallery_item .search_listing {
	background: none;
	text-align: center;
}
.entity_gallery_item .search_listing_header {
	text-align: center;
}
.entity_gallery_item .search_listing_icon {
	position: relative;
	text-align: center;
}
.entity_gallery_item .search_listing_info {
	margin: 5px;
}
.entity_gallery_item .search_listing_info p {
	margin: 5px;
	margin-bottom: 10px;
}
.entity_gallery_item .search_listing {
	background: none;
	text-align: center;
}
.entity_gallery_item .search_listing_icon {
	position: absolute;
	margin-bottom: 20px;
}
.entity_gallery_item .search_listing_info {
	margin: 5px;
}
.entity_gallery_item .search_listing_info p {
	margin: 5px;
	margin-bottom: 10px;
}


/* ***************************************
	FRIENDS
*************************************** */
/* friends widget */
#widget_friends_list {
	display:table;
	width:275px;
	margin:0 10px 0 10px;
	padding:8px 0 4px 8px;
	background:white;
}
.widget_friends_singlefriend {
	float:left;
	margin:0 5px 5px 0;
}


/* ***************************************
	ADMIN AREA - PLUGIN SETTINGS
*************************************** */
.plugin_details {
	margin:0 10px 5px 10px;
	padding:0 7px 4px 10px;
}
.admin_plugin_reorder {
	float:right;
	width:200px;
	text-align: right;
}
.admin_plugin_reorder a {
	padding-left:10px;
	font-size:80%;
	color:#999999;
}
.plugin_details a.pluginsettings_link {
	cursor:pointer;
	font-size:80%;
}
.active {
	border:1px solid #999999;
	background:white;
}
.not-active {
	border:1px solid #999999;
	background:#dedede;
}
.plugin_details p {
	margin:0;
	padding:0;
}
.plugin_details a.manifest_details {
	cursor:pointer;
	font-size:80%;
}
.manifest_file {
	background:#dedede;
	padding:5px 10px 5px 10px;
	margin:4px 0 4px 0;
	display:none;
}
.admin_plugin_enable_disable {
	width:150px;
	margin:10px 0 0 0;
	float:right;
	text-align: right;
}
.contentIntro .enableallplugins,
.contentIntro .disableallplugins {
	float:right;
}
.contentIntro .enableallplugins {
	margin-left:10px;
}
.contentIntro .enableallplugins,
.not-active .admin_plugin_enable_disable a {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#eb4422;
	border: 1px solid #eb4422;
	width: auto;
	padding: 4px;
	cursor: pointer;
}
.contentIntro .enableallplugins:hover,
.not-active .admin_plugin_enable_disable a:hover {
	background: #e41326;
	border: 1px solid #e41326;
	text-decoration: none;
}
.contentIntro .disableallplugins,
.active .admin_plugin_enable_disable a {
	font: 12px/100% Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #ffffff;
	background:#999999;
	border: 1px solid #999999;
	width: auto;
	padding: 4px;
	cursor: pointer;
}
.contentIntro .disableallplugins:hover,
.active .admin_plugin_enable_disable a:hover {
	background: #333333;
	border: 1px solid #333333;
	text-decoration: none;
}
.pluginsettings {
	margin:15px 0 5px 0;
	background:#bbdaf7;
	padding:10px;
	display:none;
}
.pluginsettings h3 {
	padding:0 0 5px 0;
	margin:0 0 5px 0;
	border-bottom:1px solid #999999;
}
#updateclient_settings h3 {
	padding:0;
	margin:0;
	border:none;
}
.input-access {
	margin:5px 0 0 0;
}

/* ***************************************
	GENERIC COMMENTS
*************************************** */
.generic_comment_owner {
	font-size: 90%;
	color:#666666;
}
.generic_comment {
	background:white;
	margin:0 10px 10px 10px;
	width : auto;
}
.generic_comment_icon {
	float:left;
}
.generic_comment_details {
	margin-left: 60px;
}
.generic_comment_details p {
	margin: 0 0 5px 0;
}
.generic_comment_owner {
	color:#666666;
	margin: 0px;
	font-size:90%;
	border-top: 1px solid #aaaaaa;
}
/* IE6 */
* html #generic_comment_tbl { width:676px !important;}


/* ***************************************
PAGE-OWNER BLOCK
*************************************** */
#owner_block {
	padding:10px;
}
#owner_block_icon {
	float:left;
	margin:0 10px 0 0;
}
#owner_block_rss_feed,
#owner_block_odd_feed {
	padding:5px 0 0 0;
}
#owner_block_rss_feed a {
	font-size: 90%;
	color:#999999;
	padding:0 0 4px 20px;
	background: url(<?php echo $vars['url']; ?>_graphics/icon_rss.gif) no-repeat left top;
}
#owner_block_odd_feed a {
	font-size: 90%;
	color:#999999;
	padding:0 0 4px 20px;
	background: url(<?php echo $vars['url']; ?>_graphics/icon_odd.gif) no-repeat left top;
}
#owner_block_rss_feed a:hover,
#owner_block_odd_feed a:hover {
	color: #e41326;
}
#owner_block_desc {
	padding:4px 0 4px 0;
	margin:0 0 0 0;
	line-height: 1.2em;
	border-bottom:1px solid #cccccc;
	color:#666666;
}
#owner_block_content {
	margin:0 0 4px 0;
	padding:3px 0 0 0;
	min-height:35px;
	font-weight: bold;
}
#owner_block_content a {
	line-height: 1em;
}
.ownerblockline {
	padding:0;
	margin:0;
	border-bottom:1px solid #cccccc;
	height:1px;
}
#owner_block_submenu {
//	margin:20px 0 20px 0;
	padding: 0;
	width:100%;
}
#owner_block_submenu ul {
	list-style: none;
	padding: 0;
	margin: 0;
}
#owner_block_submenu ul li.selected a {
	color:#ea3024;
	background: #F5F3F3;
}
#owner_block_submenu ul li.selected a:hover {
	color:#ea3024;
	background: #FAFAFA;
}
#owner_block_submenu ul li a {

}
#owner_block_submenu ul li {
	padding : 2px 10px;
}
#owner_block_submenu ul li a:hover {

}
#owner_block_members {
	padding : 2px 10px;
}
/* IE 6 + 7 menu arrow position fix */
* html #owner_block_submenu ul li.selected a {
	background-position: left 10px;
}
*:first-child+html #owner_block_submenu ul li.selected a {
	background-position: left 8px;
}

#owner_block_submenu .submenu_group {
	border-bottom: 1px solid #cccccc;
	margin:10px 0 0 0;
	padding-bottom: 10px;
}

#owner_block_submenu .submenu_group .submenu_group_filter ul li a,
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li a {
	color:#666666;
}
#owner_block_submenu .submenu_group .submenu_group_filter ul li.selected a,
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li.selected a {
	background:#999999;
	color:white;
}
#owner_block_submenu .submenu_group .submenu_group_filter ul li a:hover,
#owner_block_submenu .submenu_group .submenu_group_filetypes ul li a:hover {
	color:white;
	background: #999999;
}


/* ***************************************
	PAGINATION
*************************************** */
.pagination {
	background:white;
	margin:5px 10px 5px 10px;
	padding:5px;
}
.pagination .pagination_number {
	display:block;
	float:left;
	background:#ffffff;
	border:1px solid #eb4422;
	text-align: center;
	color:#eb4422;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
}
.pagination .pagination_number:hover {
	background:#eb4422;
	color:white;
	text-decoration: none;
}
.pagination .pagination_more {
	display:block;
	float:left;
	background:#ffffff;
	border:1px solid #ffffff;
	text-align: center;
	color:#eb4422;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
}
.pagination .pagination_previous,
.pagination .pagination_next {
	display:block;
	float:left;
	border:1px solid #eb4422;
	color:#eb4422;
	text-align: center;
	font-size: 12px;
	font-weight: normal;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
}
.pagination .pagination_previous:hover,
.pagination .pagination_next:hover {
	background:#eb4422;
	color:white;
	text-decoration: none;
}
.pagination .pagination_currentpage {
	display:block;
	float:left;
	background:#eb4422;
	border:1px solid #eb4422;
	text-align: center;
	color:white;
	font-size: 12px;
	font-weight: bold;
	margin:0 6px 0 0;
	padding:0px 4px;
	cursor: pointer;
}


/* ***************************************
	FRIENDS COLLECTIONS ACCORDIAN
*************************************** */
ul#friends_collections_accordian {
	margin: 0 0 0 0;
	padding: 0;
}
#friends_collections_accordian li {
	margin: 0 0 0 0;
	padding: 0;
	list-style-type: none;
	color: #666666;
}
#friends_collections_accordian li h2 {
	background:#eb4422;
	color: white;
	padding:4px 2px 4px 6px;
	margin:10px 0 10px 0;
	font-size:1.2em;
	cursor:pointer;
}
#friends_collections_accordian li h2:hover {
	background:#333333;
	color:white;
}
#friends_collections_accordian .friends_picker {
	background:white;
	padding:0;
	display:none;
}
#friends_collections_accordian .friends_collections_controls {
	font-size:70%;
	float:right;
}
#friends_collections_accordian .friends_collections_controls a {
	color:#999999;
	font-weight:normal;
}


/* ***************************************
	FRIENDS PICKER SLIDER
*************************************** */
.friendsPicker_container h3 {
	font-size:4em !important;
	text-align: left;
	margin:0 0 10px 0 !important;
	color:#999999 !important;
	background: none !important;
	padding:0 !important;
}
.friendsPicker .friendsPicker_container .panel ul {
	text-align: left;
	margin: 0;
	padding:0;
}
.friendsPicker_wrapper {
	margin: 0;
	padding:0;
	position: relative;
	width: 100%;
}
.friendsPicker {
	position: relative;
	overflow: hidden;
	margin: 0;
	padding:0;
	width: 678px;

	height: auto;
	background: #FBFBFF;
}
.friendspicker_savebuttons {
	background: white;
	margin:0 10px 10px 10px;
}
.friendsPicker .friendsPicker_container { /* long container used to house end-to-end panels. Width is calculated in JS  */
	position: relative;
	left: 0;
	top: 0;
	width: 100%;
	list-style-type: none;
}
.friendsPicker .friendsPicker_container .panel {
	float:left;
	height: 100%;
	position: relative;
	width: 678px;
	margin: 0;
	padding:0;
}
.friendsPicker .friendsPicker_container .panel .wrapper {
	margin: 0;
	padding:4px 10px 10px 10px;
	min-height: 230px;
}
.friendsPickerNavigation {
	margin: 0 0 10px 0;
	padding:0;
}
.friendsPickerNavigation ul {
	list-style: none;
	padding-left: 0;
}
.friendsPickerNavigation ul li {
	float: left;
	margin:0;
	background:white;
}
.friendsPickerNavigation a {
	font-weight: bold;
	text-align: center;
	background: white;
	color: #999999;
	text-decoration: none;
	display: block;
	padding: 0;
	width:20px;
}
.tabHasContent {
	background: white; color:#333333 !important;
}
.friendsPickerNavigation li a:hover {
	background: #333333;
	color:white !important;
}
.friendsPickerNavigation li a.current {
	background: #eb4422;
	color:white !important;
}
.friendsPickerNavigationAll {
	margin:0px 0 0 20px;
	float:left;
}
.friendsPickerNavigationAll a {
	font-weight: bold;
	text-align: left;
	font-size:0.8em;
	background: white;
	color: #999999;
	text-decoration: none;
	display: block;
	padding: 0 4px 0 4px;
	width:auto;
}
.friendsPickerNavigationAll a:hover {
	background: #eb4422;
	color:white;
}
.friendsPickerNavigationL, .friendsPickerNavigationR {
	position: absolute;
	top: 46px;
	text-indent: -9000em;
}
.friendsPickerNavigationL a, .friendsPickerNavigationR a {
	display: block;
	height: 43px;
	width: 43px;
}
.friendsPickerNavigationL {
	right: 48px;
	z-index:1;
}
.friendsPickerNavigationR {
	right: 0;
	z-index:1;
}
.friendsPickerNavigationL {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat left top;
}
.friendsPickerNavigationR {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat -60px top;
}
.friendsPickerNavigationL:hover {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat left -44px;
}
.friendsPickerNavigationR:hover {
	background: url("<?php echo $vars['url']; ?>_graphics/friends_picker_arrows.gif") no-repeat -60px -44px;
}
.friends_collections_controls a.delete_collection {
	display:block;
	cursor: pointer;
	width:14px;
	height:14px;
	margin:2px 3px 0 0;
	background: url("<?php echo $vars['url']; ?>_graphics/icon_customise_remove.png") no-repeat 0 0;
}
.friends_collections_controls a.delete_collection:hover {
	background-position: 0 -16px;
}
.friendspicker_savebuttons .submit_button,
.friendspicker_savebuttons .cancel_button {
	margin:5px 20px 5px 5px;
}

#collectionMembersTable {
	background: #FBFBFF;
	margin:10px 0 0 0;
	padding:10px 10px 0 10px;
}


/* ***************************************
WIDGET PICKER (PROFILE & DASHBOARD)
*************************************** */
/* 'edit page' button */
a.toggle_customise_edit_panel {
	float:right;
	clear:right;
	color: #eb4422;
	background: white;
	border:1px solid #cccccc;
	padding: 5px 10px 5px 10px;
	margin:0 0 20px 0;
	width:280px;
	text-align: left;
}
a.toggle_customise_edit_panel:hover {
	color: #ffffff;
	background: #e41326;
	border:1px solid #e41326;
	text-decoration:none;
}
#customise_editpanel {
	display:none;
	margin: 0 0 20px 0;
	padding:10px;
	background: #FBFBFF;
}

/* Top area - instructions */
.customise_editpanel_instructions {
	width:690px;
	padding:0 0 10px 0;
}
.customise_editpanel_instructions h2 {
	padding:0 0 10px 0;
}
.customise_editpanel_instructions p {
	margin:0 0 5px 0;
	line-height: 1.4em;
}

/* RHS (widget gallery area) */
#customise_editpanel_rhs {
	float:right;
	width:230px;
	background:white;
}
#customise_editpanel #customise_editpanel_rhs h2 {
	color:#333333;
	font-size: 1.4em;
	margin:0;
	padding:6px;
}
#widget_picker_gallery {
	border-top:1px solid #cccccc;
	background:white;
	width:210px;
	height:340px;
	padding:10px;
	overflow:scroll;
	overflow-x:hidden;
}

/* main page widget area */
#customise_page_view {
	width:656px;
	padding:10px;
	margin:0 0 10px 0;
	background:white;
}
#customise_page_view h2 {
	border-top:1px solid #cccccc;
	border-right:1px solid #cccccc;
	border-left:1px solid #cccccc;
	margin:0;
	padding:5px;
	width:200px;
	color: #e41326;
	background: #FBFBFF;
	font-size:1.25em;
	line-height: 1.2em;
}
#profile_box_widgets {
	width:422px;
	margin:0 10px 10px 0;
	padding:5px 5px 0px 5px;
	min-height: 50px;
	border:1px solid #cccccc;
	background: #FBFBFF;
}
#customise_page_view h2.profile_box {
	width:422px;
	color: #999999;
}
#profile_box_widgets p {
	color:#999999;
}
#leftcolumn_widgets {
	width:200px;
	margin:0 10px 0 0;
	padding:5px 5px 40px 5px;
	min-height: 190px;
	border:1px solid #cccccc;
}
#middlecolumn_widgets {
	width:200px;
	margin:0 10px 0 0;
	padding:5px 5px 40px 5px;
	min-height: 190px;
	border:1px solid #cccccc;
}
#rightcolumn_widgets {
	width:200px;
	margin:0;
	padding:5px 5px 40px 5px;
	min-height: 190px;
	border:1px solid #cccccc;
}
#rightcolumn_widgets.long {
	min-height: 288px;
}
/* IE6 fix */
* html #leftcolumn_widgets {
	height: 190px;
}
* html #middlecolumn_widgets {
	height: 190px;
}
* html #rightcolumn_widgets {
	height: 190px;
}
* html #rightcolumn_widgets.long {
	height: 338px;
}

#customise_editpanel table.draggable_widget {
	width:200px;
	background: #F5F5F5;
	margin: 10px 0 0 0;
	vertical-align:text-top;
	border:1px solid #cccccc;
}
#widget_picker_gallery table.draggable_widget {
	width:200px;
	background: #F5F5F5;
	margin: 10px 0 0 0;
}

/* take care of long widget names */
#customise_editpanel table.draggable_widget h3 {
	word-wrap:break-word;/* safari, webkit, ie */
	width:140px;
	line-height: 1.1em;
	overflow: hidden;/* ff */
	padding:4px;
}
#widget_picker_gallery table.draggable_widget h3 {
	word-wrap:break-word;
	width:145px;
	line-height: 1.1em;
	overflow: hidden;
	padding:4px;
}
#customise_editpanel img.more_info {
	background: url(<?php echo $vars['url']; ?>_graphics/icon_customise_info.gif) no-repeat top left;
	cursor:pointer;
}
#customise_editpanel img.drag_handle {
	background: url(<?php echo $vars['url']; ?>_graphics/icon_customise_drag.gif) no-repeat top left;
	cursor:move;
}
#customise_editpanel img {
	margin-top:4px;
}
#widget_moreinfo {
	position:absolute;
	border:1px solid #333333;
	background:#e4ecf5;
	color:#333333;
	padding:5px;
	display:none;
	width: 200px;
	line-height: 1.2em;
}
.widget_more_wrapper {
	background-color: white;
	margin:0 10px 5px 10px;
	padding:5px;
}
/* droppable area hover class  */
.droppable-hover {
	background:#bbdaf7;
}
/* target drop area class */
.placeholder {
	border:2px dashed #AAA;
	width:196px !important;
	margin: 10px 0 10px 0;
}
/* class of widget while dragging */
.ui-sortable-helper {
	background: #eb4422;
	color:white;
	padding: 4px;
	margin: 10px 0 0 0;
	width:200px;
}
/* IE6 fix */
* html .placeholder {
	margin: 0;
}
/* IE7 */
*:first-child+html .placeholder {
	margin: 0;
}
/* IE6 fix */
* html .ui-sortable-helper h3 {
	padding: 4px;
}
* html .ui-sortable-helper img.drag_handle, * html .ui-sortable-helper img.remove_me, * html .ui-sortable-helper img.more_info {
	padding-top: 4px;
}
/* IE7 */
*:first-child+html .ui-sortable-helper h3 {
	padding: 4px;
}
*:first-child+html .ui-sortable-helper img.drag_handle, *:first-child+html .ui-sortable-helper img.remove_me, *:first-child+html .ui-sortable-helper img.more_info {
	padding-top: 4px;
}


/* ***************************************
	BREADCRUMBS
*************************************** */
#pages_breadcrumbs {
	font-size: 80%;
	color:#bababa;
	padding:0;
	margin:2px 0 0 10px;
}
#pages_breadcrumbs a {
	color:#999999;
	text-decoration: none;
}
#pages_breadcrumbs a:hover {
	color: #e41326;
	text-decoration: underline;
}


/* ***************************************
	MISC.
*************************************** */
/* general page titles in main content area */
#content_area_user_title{
	margin-bottom: 8px;
}
#content_area_user_title h2 {
	margin:0 0 0 8px;
	padding:5px;
	color:#e41326;
	font-size:1.35em;
	line-height:1.2em;
}
/* reusable generic collapsible box */
.collapsible_box {
	background:#FBFBFF;
	padding:5px 10px 5px 10px;
	margin:4px 0 4px 0;
	display:none;
}
a.collapsibleboxlink {
	cursor:pointer;
}

/* tag icon */
.object_tag_string {
	background: url(<?php echo $vars['url']; ?>_graphics/icon_tag.gif) no-repeat left 2px;
	padding:0 0 0 14px;
	margin:0;
}

/* profile picture upload n crop page */
#profile_picture_form {
	height:145px;
}
#current_user_avatar {
	float:left;
	width:160px;
	height:130px;
	border-right:1px solid #cccccc;
	margin:0 20px 0 0;
}
#profile_picture_croppingtool {
	border-top: 1px solid #cccccc;
	margin:20px 0 0 0;
	padding:10px 0 0 0;
}
#profile_picture_croppingtool #user_avatar {
	float: left;
	margin-right: 20px;
}
#profile_picture_croppingtool #applycropping {

}
#profile_picture_croppingtool #user_avatar_preview {
	float: left;
	position: relative;
	overflow: hidden;
	width: 100px;
	height: 100px;
}


/* ***************************************
	SETTINGS & ADMIN
*************************************** */
.admin_statistics,
.admin_users_online,
.usersettings_statistics,
.admin_adduser_link,
#add-box,
#search-box,
#logbrowser_search_area {
	background:white;
	margin:0 10px 10px 10px;
	padding:10px;
}

.usersettings_statistics h3,
.admin_statistics h3,
.admin_users_online h3,
.user_settings h3,
.notification_methods h3 {
	background:#FBFBFF;
	color:#333333;
	font-size:1.1em;
	line-height:1em;
	margin:0 0 10px 0;
	padding:5px;
}
h3.settings {
	background:#FBFBFF;
	color:#333333;
	font-size:1.1em;
	line-height:1em;
	margin:10px 0 4px 0;
	padding:5px;
}
.admin_users_online .profile_status {
	background:#bbdaf7;
	line-height:1.2em;
	padding:2px 4px;
}
.admin_users_online .profile_status span {
	font-size:90%;
	color:#666666;
}
.admin_users_online  p.owner_timestamp {
	padding-left:3px;
}


.admin_debug label,
.admin_usage label {
	color:#333333;
	font-size:100%;
	font-weight:normal;
}

.admin_usage {
	border-bottom:1px solid #cccccc;
	padding:0 0 20px 0;
}
.usersettings_statistics .odd,
.admin_statistics .odd {

}
.usersettings_statistics .even,
.admin_statistics .even {

}
.usersettings_statistics td,
.admin_statistics td {
	padding:2px 4px 2px 4px;
	border-bottom:1px solid #cccccc;
}
.usersettings_statistics td.column_one,
.admin_statistics td.column_one {
	width:200px;
}
.usersettings_statistics table,
.admin_statistics table {
	width:100%;
}
.usersettings_statistics table,
.admin_statistics table {
	border-top:1px solid #cccccc;
}
.usersettings_statistics table tr:hover,
.admin_statistics table tr:hover {
	background: #E4E4E4;
}
.admin_users_online .search_listing {
	margin:0 0 5px 0;
	padding:5px;
	border:2px solid #cccccc;
}



/* force tinyMCE editor initial width for safari */
.mceLayout {
	width:683px;
}
p.longtext_editarea {
	margin:0 !important;
}
.toggle_editor_container {
	margin:0 0 15px 0;
}
/* add/remove longtext tinyMCE editor */
a.toggle_editor {
	display:block;
	float:right;
	text-align:right;
	color:#666666;
	font-size:1em;
	font-weight:normal;
}

div.ajax_loader {
	background: white url(<?php echo $vars['url']; ?>_graphics/ajax_loader.gif) no-repeat center 30px;
	width:auto;
	height:100px;
	margin:0 10px 0 10px;
}



/* reusable elgg horizontal tabbed navigation
(used on friends collections, external pages, & riverdashboard mods)
*/
#elgg_horizontal_tabbed_nav {
	margin:0 0 5px 0;
	padding: 0;
	border-bottom: 2px solid #cccccc;
	display:table;
	width:100%;
}
#elgg_horizontal_tabbed_nav ul {
	list-style: none;
	padding: 0;
	margin: 0;
}
#elgg_horizontal_tabbed_nav li {
	float: left;
	border: 2px solid #cccccc;
	border-bottom-width: 0;
	background: #eeeeee;
	margin: 0 0 0 10px;
}
#elgg_horizontal_tabbed_nav a {
	text-decoration: none;
	display: block;
	padding:3px 10px 0 10px;
	color: #999999;
	text-align: center;
	height:21px;
}
/* IE6 fix */
* html #elgg_horizontal_tabbed_nav a { display: inline; }

#elgg_horizontal_tabbed_nav a:hover {
	color: #eb4422;
	background: #FBFBFF;
}
#elgg_horizontal_tabbed_nav .selected {
	border-color: #cccccc;
	background: white;
}
#elgg_horizontal_tabbed_nav .selected a {
	position: relative;
	top: 2px;
	background: white;
	color: #eb4422;
}
/* IE6 fix */
* html #elgg_horizontal_tabbed_nav .selected a { top: 3px; }




/* ***************************************
	Auto Suggest Boxes
*************************************** */

.ac_results {
	padding: 0px;
	border: 1px solid black;
	background-color: white;
	overflow: hidden;
	z-index: 99999;
}

.ac_results ul {
	width: 100%;
	list-style-position: outside;
	list-style: none;
	padding: 0;
	margin: 0;
}

.ac_results li {
	margin: 0px;
	padding: 2px 5px;
	cursor: default;
	display: block;
	/*
	if width will be 100% horizontal scrollbar will apear
	when scroll mode will be used
	*/
	/*width: 100%;*/
	font: menu;
	font-size: 12px;
	/*
	it is very important, if line-height not setted or setted
	in relative units scroll will be broken in firefox
	*/
	line-height: 16px;
	overflow: hidden;
}

.ac_loading {
	background: white url(<?php echo $vars['url']; ?>_graphics/indicator.gif) right center no-repeat;
}

.ac_odd {
	background-color: #eee;
}

.ac_over {
	background-color: #0A246A;
	color: white;
}

.autocomplete {
	width:300px;
}

.ac_results strong {
	font-weight: bold;
}

.user_picker .user_picker_entry {
	clear: both;
	padding: 1em;
}

.livesearch_icon {
	float: left;
	padding-right: 1em;
}

.draggable {
	cursor: move;
}
.category_summary {
background:url(<?php echo $vars['url'].'mod/theme_inria/graphics/categorie_bar.png'?>) repeat-y right top;
border: 1px solid #E8E8E8;
padding: 5px 10px;
margin:5px 0;
}
.message_box{
	margin-bottom:15px;
}
.submenu_group_wrapper{
	padding : 0 10px;
}