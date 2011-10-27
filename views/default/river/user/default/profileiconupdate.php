<?php

	$performed_by = get_entity($vars['item']->subject_guid); // $statement->getSubject();
	
	$url = "<a href=\"{$performed_by->getURL()}\">{$performed_by->name}</a>";
	$string = sprintf(elgg_echo("profile:river:iconupdate"),$url);
?>

<?php echo $string; ?>