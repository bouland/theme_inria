<?php
 
    // Latest forum discussion for the group home page

    //check to make sure this group forum has been activated
    if($vars['entity']->forum_enable != 'no'){
    	$forum = elgg_get_entities_from_annotations(array('types' => 'object', 'subtypes' => 'groupforumtopic', 'annotation_names' => 'group_topic_post', 'container_guid' => $vars['entity']->guid, 'limit' => 4, 'order_by' => 'maxtime desc'));
	
	    if($forum){
			echo "<div class=\"contentWrapper\">";
			echo '<h2><a href="'.$vars['url'].'pg/groups/forum/'.page_owner().'">'.elgg_echo('theme_inria:groups:discussions')."</a></h2>";
 
	        foreach($forum as $f){
	        	    
	                $count_annotations = $f->countAnnotations("group_topic_post");
	                 
	        	    echo "<div class=\"forum_latest\">";
	        	    echo "<div class=\"topic_owner_icon\">" . elgg_view('profile/icon',array('entity' => $f->getOwnerEntity(), 'size' => 'tiny', 'override' => true)) . "</div>";
	    	        echo "<div class=\"topic_title\"><p><a href=\"{$f->getURL()}\">" . $f->title . "</a></p> <p class=\"topic_replies\"><small>".elgg_echo('groups:posts').": " . $count_annotations . "</small></p></div>";
	    	        	
	    	        echo "</div>";
	    	        
	        }
	        echo "<div class=\"clearfloat\" /></div>";
	        echo "</div>";
	    } 
	}//end of forum active check
?>