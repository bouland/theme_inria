<?php

	/**
	 * Elgg hoverover extender for tidypics
	 * 
	 */
		echo '<p class="user_menu_file';
			if(get_context() == 'photos')
				echo 'profile_select';
		echo '"><a href=' . $CONFIG->wwwroot .'pg/photos/new/' . $owner->username . '>' . elgg_echo("album:create") . '</a></p>';
?>
