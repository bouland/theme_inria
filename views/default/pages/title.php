<?php
$page = $vars['entity'];
if(!$page)
	forward();
?>
<div id="pages_title"><h1><?php echo $page->title ?></h1></div>