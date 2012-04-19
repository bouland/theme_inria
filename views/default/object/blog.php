<?php

	/**
	 * Elgg blog individual post view
	 * 
	 * @package ElggBlog
	 * @uses $vars['entity'] Optionally, the blog post to view
	 */
		if (isset($vars['entity'])) {
			
			//display comments link?
			if ($vars['entity']->comments_on == 'Off') {
				$comments_on = false;
			} else {
				$comments_on = true;
			}
			
			if (get_context() == "search" && $vars['entity'] instanceof ElggObject) {
				
				//display the correct layout depending on gallery or list view
				if (get_input('search_viewtype') == "gallery") {
					//display the gallery view
            		echo elgg_view("blog/gallery",$vars);

				} else {
					echo elgg_view("blog/listing",$vars);
				}
			} else {
			
				if ($vars['entity'] instanceof ElggObject) {
					
					$url = $vars['entity']->getURL();
					$owner = $vars['entity']->getOwnerEntity();
					$canedit = $vars['entity']->canEdit();
					
				} else {
					
					$url = 'javascript:history.go(-1);';
					$owner = $vars['user'];
					$canedit = false;
					
				}
?>
	<div class="contentWrapper singleview">
	
	<div class="blog_post">
		<?php echo elgg_view("profile/icon",array('entity' => $owner, 'size' => 'small')); ?>
	
		<h3><a href="<?php echo $url; ?>"><?php echo $vars['entity']->title; ?></a></h3>
					<!-- display tags -->
				<?php
	
					$tags = elgg_view('output/tags', array('tags' => $vars['entity']->tags));
					if (!empty($tags)) {
						echo '<p class="tags">' . $tags . '</p>';
					}
				
					$categories = elgg_view('categories/view', $vars);
					if (!empty($categories)) {
						echo '<p class="categories">' . $categories . '</p>';
					}
				
				?>
			<div class="clearfloat"></div>
			<div class="blog_post_body">

			<!-- display the actual blog post -->
				<?php
					// see if we need to display the full post or just an excerpt
					if (!isset($vars['full']) || (isset($vars['full']) && $vars['full'] != FALSE)) {
						echo elgg_view('output/longtext', array('value' => $vars['entity']->description));
					} else {
						$body = elgg_get_excerpt($vars['entity']->description, 500);
						// add a "read more" link if cropped.
						if (elgg_substr($body, -3, 3) == '...') {
							$body .= " <a href=\"{$vars['entity']->getURL()}\">" . elgg_echo('blog:read_more') . '</a>';
						}
						
						echo elgg_view('output/longtext', array('value' => $body));
					}
				
				?>
			</div><div class="clearfloat"></div>			
			
		    <?php
		    	$num_comments = elgg_count_comments($vars['entity']);
		    	if (isset($vars['full']) && $vars['full'] == FALSE) {
		    		$link = '<a href="' . $url . '">' . $num_comments . ' ' . elgg_echo("comments") . '</a>';
		    		echo elgg_view("entities/footer",array('entity' => $vars['entity'], 'link' => $link));
		    	}
		    	
			?>
	    </div>
	    	<?php
		    	if (!isset($vars['full']) || (isset($vars['full']) && $vars['full'] != FALSE)) {
		    		echo elgg_view("entities/footer",array('entity' => $vars['entity'], 'link' => $link));
		    	}
		    	
			?>
	 </div>

<?php
				
			}

		}

?>
