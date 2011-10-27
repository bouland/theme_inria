<?php

/**
 * Elgg event_calendar group profile content
 *
 * @package event_calendar
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Kevin Jardine <kevin@radagast.biz>
 * @copyright Radagast Solutions 2008
 * @link http://radagast.biz/
 *
 */

$page_owner_entity = page_owner_entity();

if (event_calendar_activated_for_group($page_owner_entity)) {
    $num = 5;
    // Get the upcoming events
    $start_date = time(); // now
    $end_date = $start_date + 60*60*24*365*2; // maximum is two years from now
	$events = event_calendar_get_events_between($start_date,$end_date,false,$num,0,page_owner(),'default');
		
	// If there are any events to view, view them
	if (is_array($events) && sizeof($events) > 0) {

		echo '<div id="group_pages_widget">';
		echo '<h2><a href="'.$vars['url'].'pg/event_calendar/group/'.page_owner().'">'.elgg_echo('theme_inria:event_calendar:groups').'</a></h2>';
		foreach($events as $event) {
			echo elgg_view("object/event_calendar",array('entity' => $event));
		}
		echo "</div>";
			
    } else if (get_plugin_setting('group_always_display', 'event_calendar') == 'yes') {
    	echo '<div id="group_pages_widget">';
		echo '<h2>'.elgg_echo("event_calendar:groupprofile").'</h2>';
    	echo '<div class="forum_latest">'.elgg_echo('event_calendar:no_events_found').'</div>';
    	echo "</div>";
    }
}
	
?>