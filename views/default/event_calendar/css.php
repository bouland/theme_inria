<?php
//$background_colour = '#EBF1EB';
//$highlight_colour = '#478787';

$background_colour = '#F5F5F5';
$highlight_colour = '#3874B7';
?>

/* hide Today as it is not working as expected */
.ui-datepicker-current { visibility:hidden }

div#calendarmenucontainer {
	position: relative;
}

ul#calendarmenu {
	list-style: none;
	position: absolute;
	top: 0px;
	left: -15px;
}

ul#calendarmenu li {
	float: left;
	border-top: 1px solid #969696;
	border-left: 1px solid #969696;
	border-bottom: 1px solid #969696;
	background-color: <?php echo $background_colour; ?>;
}


ul#calendarmenu li.sys_calmenu_last {
	border-right: 1px solid #969696;
}

ul#calendarmenu li a {
	text-decoration: none;
	padding: 4px 12px;
	float: left;
}

ul#calendarmenu li a:hover, ul#calendarmenu li.sys_selected a{
	text-decoration: none;
	padding: 4px 12px;
	float: left;
	color: #FFFFFF;
	background: <?php echo $highlight_colour; ?>;
}

td.ui-datepicker-unselectable {
	background-color: #FFFFFF !important;
	color: #888888 !important;
}

.river_object_event_calendar_create {
	background: url(<?php echo $vars['url']; ?>mod/event_calendar/images/river_icon_event.gif) no-repeat left -1px;
}
.river_object_event_calendar_update {
	background: url(<?php echo $vars['url']; ?>mod/event_calendar/images/river_icon_event.gif) no-repeat left -1px;
}
#event_list {
	width:440px;
	margin:0;
	float:left;
	padding:5px 0 0 0;
}
#event_list .search_listing {
	border-bottom:1px solid #cccccc;
	margin:0 0 5px 0;
}

.events {
	min-height: 300px;
}

div.event_calendar_agenda_date_section {
	margin-bottom: 10px;
}

.event_calendar_agenda_date {
	font-size: 1.3em;
	font-weight: bold;
	margin-bottom: 3px;
}

th.agenda_header {
	font-weight: bold;
}

td.event_calendar_agenda_time {
	width: 120px;
}

.event_calendar_agenda_title a {
	font-weight: bold;
}

td.event_calendar_agenda_title {
	width: 180px;
}

.event_calendar_agenda_venue {
	margin-bottom: 5px;
}

.event_calendar_paged_month {
	font-size: 1.3em;
	font-weight: bold;
	margin-bottom: 5px;
	text-transform:uppercase;
}

td.event_calendar_paged_date {
	width: 80px;
}
td.event_calendar_paged_time {
	width: 60px;
}
td.event_calendar_paged_title {
	width: 280px;
}

table.event_calendar_paged_table {
	width:100%;
	border-collapse:collapse;
	border-bottom-width:1px;
	border-bottom-style:solid;
	border-bottom-color:#bfbfbf;
	margin-bottom: 5px;
}

table.event_calendar_paged_table td {
	border-width:1px 0 0 0;
	border-style:solid;
	border-color:#bfbfbf;
}

table.event_calendar_paged_table th {
	font-family:verdana, helvetica, arial, sans-serif;
	font-size:9pt;
	color:#183e76;
	background-color:#ececec;
	font-weight:bold;
	text-transform:none;
	padding:3px 3px 3px 3px;
}

