<?php
/**
 * Elgg top toolbar
 * The standard elgg top toolbar
 *
 * @package Elgg
 * @subpackage Core
 * @author Curverider Ltd
 * @link http://elgg.org/
 *
 */
?>


<?php
	if (isloggedin()) {
		$usergroups = elgg_get_entities_from_relationship(array('relationship' => 'member',
																'relationship_guid' => $_SESSION['user']->guid,
																'inverse_relationship' => false,
																'type' => "group",
																'limit' => 999));
?>
<script type="text/javascript">
$(function() {
	$('ul.topbardropdownmenu').elgg_topbardropdownmenu();
});
</script>
<script type="text/javascript" src="<?php echo $vars['url']; ?>mod/theme_inria/js/config.js"></script>
<div id="elgg_topbar">
 	<div id="elgg_topbar_container_left">
	<div class="elgg_topbar_menu">
			<ul class="topbardropdownmenu">
				<li class="drop"><a href="<?php echo $vars['url'].'pg/profile/'.$_SESSION['user']->username; ?>" class="menuitemtools"><?php echo elgg_echo('theme_inria:topbar:me'); ?></a>
				<ul>
			    	<li><a href="<?php echo $vars['url'].'pg/groups/member/'.$_SESSION['user']->username; ?>" class="menuitemtools"><?php echo(elgg_echo('theme_inria:topbar:usergroups')); ?></a>
		  			<ul class="subdrop">
				      	<?php
				      	foreach($usergroups as $group) {
				      		$name = $group->name;
				      		$name = str_replace(' ','&nbsp;',$name);
				        	echo '<li><a href="' . $group->getURL() . '" title="' . $group->briefdescription . '">' . $name . '</a></li>';
				      	}
				     	?>
	    			</ul>
  					</li>
  					<li><a href="<?php echo $vars['url'].'pg/friends/'.($_SESSION['user']->username); ?>"><?php echo elgg_echo('theme_inria:topbar:userfriends'); ?></a></li>
					<li><a href="<?php echo $vars['url']; ?>pg/dashboard/"><?php echo elgg_echo('theme_inria:topbar:dashboard'); ?></a></li>
					<li><a href="<?php echo $vars['url'].'pg/profile/'.$_SESSION['user']->username; ?>"><?php echo elgg_echo('theme_inria:topbar:profil'); ?></a></li>
				</ul>
				</li>
				<li class="drop"><a href="<?php echo $vars['url']; ?>" class="menuitemtools"><?php echo elgg_echo('theme_inria:topbar:explorer'); ?></a>
				<ul>
					<li><a href="<?php echo $vars['url']; ?>"><?php echo elgg_echo('theme_inria:topbar:home'); ?></a></li>
					<li><a href="<?php echo $vars['url']; ?>pg/groups/all/"><?php echo elgg_echo('theme_inria:topbar:groups'); ?></a></li>
					<li><a href="<?php echo $vars['url']; ?>pg/members/all/"><?php echo elgg_echo('theme_inria:topbar:members'); ?></a></li>
					<li><a href="<?php echo $vars['url']; ?>pg/activity/"><?php echo elgg_echo('theme_inria:topbar:activity'); ?></a></li>
					<li><a href="<?php echo $vars['url']; ?>pg/pages/all/"><?php echo elgg_echo('theme_inria:topbar:pages'); ?></a></li>
				</ul>
				</li>
				<li class="drop"><a href="#" class="menuitemtools"><?php echo elgg_echo('theme_inria:topbar:action'); ?></a>
				<ul>
					<li><a href="<?php echo $vars['url']; ?>pg/thewire/all"><?php echo elgg_echo('theme_inria:topbar:thewire'); ?></a></li>
					<li><a href="<?php echo $vars['url']; ?>pg/groups/new/"><?php echo elgg_echo('theme_inria:topbar:new_group'); ?></a></li>
					<li><a href="<?php echo $vars['url']; ?>mod/invitefriends/"><?php echo elgg_echo("theme_inria:topbar:invite"); ?></a></li>
				</ul>
				</li>
				<li class="drop"><a href="#" class="menuitemtools"><?php echo elgg_echo('theme_inria:topbar:collaborative'); ?></a>
				<ul>
					<li><a target="blank" href="https://gforge.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:forge'); ?></a></li>
					<li><a target="blank" href="https://notepad.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:etherpad'); ?></a></li>
					<li><a target="blank" href="http://www.doodle.com/"><?php echo elgg_echo('theme_inria:topbar:doodle'); ?></a></li>
					<li><a target="blank" href="http://qlf-devinar.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:webinar'); ?></a></li>
					<li><a target="blank" href="https://transfert.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:ftp'); ?></a></li>
					<li><a target="blank" href="https://partage.inria.fr"><?php echo elgg_echo('theme_inria:topbar:share'); ?></a></li>
					<li><a target="blank" href="http://intranet.irisa.fr/irisa/services/pavu/documentation/audioconf#resa"><?php echo elgg_echo('theme_inria:topbar:confcall'); ?></a></li>
					<li><a target="blank" href="http://dsi.inria.fr/services_offerts/visio/EVO">EVO</a></li>
					<li><a target="blank" href="https://sympa-roc.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:mailinglist'); ?></a></li>
				</ul>
				</li>
				<li class="drop"><a target="blank" href="https://www.inria.fr" class="menuitemtools"><?php echo elgg_echo('theme_inria:topbar:inria'); ?></a>
				<ul>
					<li><a target="blank" href="https://annuaire.inria.fr/"><?php echo elgg_echo('theme_inria:topbar:annuaire'); ?></a></li>
					<li><a target="blank" href="https://zimbra.inria.fr"><?php echo elgg_echo('theme_inria:topbar:mailer'); ?></a></li>
					<li><a target="blank" href="https://casa.inria.fr"><?php echo elgg_echo('theme_inria:topbar:hollydays'); ?></a></li>
					<li><a target="blank" href="https://portail-izi.inria.fr"><?php echo elgg_echo('theme_inria:topbar:mission'); ?></a></li>
				</ul>
				</li>
				
			</ul>
		</div>
	</div>

<div id="elgg_topbar_container_right">
	<ul>
		<?php
			//allow people to extend this top menu
			echo elgg_view('elgg_topbar/extend', $vars);
		?>
		<li>
			<a href="<?php echo $vars['url']; ?>pg/settings/<?php echo get_loggedin_user()->username; ?>" class="usersettings"><img class="user_mini_avatar" src="<?php echo get_loggedin_user()->getIcon('topbar'); ?>" alt="User avatar" /><?php echo elgg_echo('settings'); ?></a>
		</li>
		
<?php
	// The administration link is for admin or site admin users only
	if ($vars['user']->isAdmin()) {
?>
		<li><a class="usersettings" href="<?php echo $vars['url']; ?>pg/admin/"><?php echo elgg_echo("admin"); ?></a></li>
<?php }	?>
		<li><?php echo elgg_view('output/url', array('href' => "{$vars['url']}action/logout", 'text' => elgg_echo('logout'), 'is_action' => TRUE)); ?></li>
	</ul>
</div>

</div><!-- /#elgg_topbar -->

<div class="clearfloat"></div>

<?php
	}
