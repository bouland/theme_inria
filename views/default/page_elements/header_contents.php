<?php
/**
 * Elgg header contents
 * This file holds the header output that a user will see
 *
 * @package Elgg
 * @subpackage Core
 * @author Curverider Ltd
 * @link http://elgg.org/
 **/

?>

<div id="banner_layout" class="<?php if (isloggedin()) {echo 'connected';}?>">
	<div class="logo"><a href="https://www.inria.fr/"><img alt="Inria" width="195" height="100" src="<?php echo $vars['url']; ?>mod/theme_inria/graphics/logo_devnet_SB-2.jpg" /></a></div>
    <div class="logo"><a href="<?php echo $vars['url']; ?>"><script language="javascript">document.write('<img height="100" src="<?php echo $vars['url']; ?>mod/theme_inria/graphics/aleatoire/' + parseInt(Math.random()*08) + '.png" >');</script></a></div>
<?php
	if (isloggedin()) {
?>
	<div id="elgg_topbar_container_search"><?php echo elgg_view('page_elements/searchbox'); ?></div> 
<?php
}
?>
</div>
<div id="banner_bottom"></div>

<?php echo elgg_view('page_content/extend', $vars); ?>

<div id="page_container">
<div id="page_wrapper" class="wrapper">

