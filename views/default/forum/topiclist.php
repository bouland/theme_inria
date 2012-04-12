<?php
if ($vars['entity'] instanceof ElggGroup) {
	set_context('search');
	$forum = elgg_get_entities_from_annotations(array('types' => 'object',
													  'subtypes' => 'groupforumtopic',
													  'annotation_names' => 'group_topic_post',
													  'container_guid' => $vars['entity']->guid,
													  'limit' => 20,
													  'order_by' => 'maxtime desc'));
	
	    if($forum){
			foreach($forum as $f){
	        	    
	                $count_annotations = $f->countAnnotations("group_topic_post");
	                 
	        	    echo "<div class=\"forum_latest\">";
	        	    echo "<div class=\"topic_owner_icon\">" . elgg_view('profile/icon',array('entity' => $f->getOwnerEntity(), 'size' => 'tiny', 'override' => true)) . "</div>";
	    	        echo "<div class=\"topic_lock\">";
	    	        echo elgg_view('locks/entity', array('entity' => $f));
	    	        echo '</div>';
	    	        echo "<div class=\"topic_title\"><p><a href=\"{$f->getURL()}\">" . $f->title . "</a></p> <p class=\"topic_replies\"><small>".elgg_echo('groups:posts').": " . $count_annotations . "</small></p></div>";
	    	        	
	    	        echo "</div>";
	    	        
	        }
	    }
	    set_context('groups');
}