<?php

    /**
	 * Elgg groups plugin display topic posts
	 * 
	 * @package ElggGroups
	 */
echo elgg_view('profile/tabs/menu', array('entity' => page_owner_entity(), 'group_tab' => 'forum'));
?>


<div id="topic_posts"><!-- open the topic_posts div -->
  
<?php

//display follow up comments
    $count = $vars['entity']->countAnnotations('group_topic_post');
    $offset = (int) get_input('offset',0);
    
    $baseurl = $vars['entity']->getURL();
    echo elgg_view('navigation/pagination',array(
    												'limit' => 50,
    												'offset' => $offset,
    												'baseurl' => $baseurl,
    												'count' => $count,
    											));
    echo '<div id="topic_header"><div class="topic_lock">';
    echo elgg_view('locks/entity', $vars);
    echo '</div><div id="topic_title">';
?>
    <!-- grab the topic title -->
        <div id="content_area_group_title"><h2><?php echo $vars['entity']->title; ?></h2></div>
<?php
	echo '</div></div>';
	foreach($vars['entity']->getAnnotations('group_topic_post', 50, $offset, "asc") as $post) {
    		    
	     echo elgg_view("forum/topicposts",array('entity' => $post));
		
	}
	
	// check to find out the status of the topic and act
    if($vars['entity']->status != "closed" && page_owner_entity()->isMember($vars['user'])){
        
        //display the add comment form, this will appear after all the existing comments
	    echo elgg_view("forms/forums/addpost", array('entity' => $vars['entity']));
	    
    } elseif($vars['entity']->status == "closed") {
        
        //this topic has been closed by the owner
        echo "<h2>" . elgg_echo("groups:topicisclosed") . "</h2>";
        echo "<p>" . elgg_echo("groups:topiccloseddesc") . "</p>";
        
    } else {
    }

?>
</div>