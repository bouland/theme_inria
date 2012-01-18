<?php
if ( isset($vars['dear']) ) {
	$to = get_entity($vars['dear']);
}
if ( isset($vars['signature']) ) {
	$from = get_entity($vars['signature']);
}
if ( isset($vars['ressource_link']) ) {
	$link = get_entity($vars['ressource_link']);
}

if ($to instanceof ElggUser) {
	echo sprintf(elgg_echo('output:mail:hello'),$to->name);	
}

echo $vars['body'];

if($from instanceof ElggUser){
	echo '<br />--<br />';
	echo '<a href="' . $from->getURL() .'">' . $from->name . '</a><br /><br />';
}
if ($link instanceof ElggEntity){
	echo '<a href="' . $link->getURL() .'">' . sprintf(elgg_echo('output:mail:link'),$link->title) . '</a>';
}
?>
