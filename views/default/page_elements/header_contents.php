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
<script type="text/javascript">
	function random_image(){
	  var images=new Array()
	  //specify random images below. You can have as many as you wish
	  <?php
	  	global $CONFIG;
	  	$dir = 'mod/theme_inria/graphics/aleatoire/';
	  	$c=getcwd();
	    if ($handle = opendir($CONFIG->path . $dir)) {
	    	$i = 1;
	   		while (false !== ($file = readdir($handle))) {
	    		if ($file != "." && $file != ".." && !is_dir($file)) {
					echo 'images[' . $i . ']="' . $CONFIG->url . $dir . $file . '"' . "\n";
					$i++;
	            }
	        }
	        closedir($handle);
	    }
	  ?>
	  var ry=Math.floor(Math.random()*images.length)
	
	  if (ry==0)
	     ry=1
		document.write('<img height="100" src="' + images[ry] + '" border=0>');
	}
</script>
<div id="banner_layout" class="<?php if (isloggedin()) {echo 'connected';}?>">
	<div class="logo"><a href="https://www.inria.fr/"><img alt="Inria" width="195" height="100" src="<?php echo $vars['url']; ?>mod/theme_inria/graphics/logo_devnet_SB-2.jpg" /></a></div>
    <div class="logo"><a href="<?php echo $vars['url']; ?>"><script type="text/javascript">random_image()</script></a></div>
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

