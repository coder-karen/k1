<?php
/***********************************************************************************************/
/* Template for the video quote format */
/***********************************************************************************************/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
	<header>
		
		<span class="post-type-quote"></span>
		<p class="article-meta-categories"><?php the_category(' &nbsp;/&nbsp; '); ?></p>
		<p class="article-meta-extra"><?php the_time(get_option('date_format')); ?></p>
		
	</header>
	
	<div class="quote-container">
	
		<p><?php the_content(); ?></p>
		
	</div> <!-- end quote-container -->
		
</article>

<hr class="fancy-hr" />