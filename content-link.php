<?php
/***********************************************************************************************/
/* Template for the link post format */
/***********************************************************************************************/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
	<header>
		
		<span class="post-type-url"></span>
		<p class="article-meta-categories"><?php the_category(' &nbsp;/&nbsp; '); ?></p>
		<p class="article-meta-extra"><?php the_time(get_option('date_format')); ?></p>
		
	</header>
	
	<div class="url-container">
	
		<?php $url_content = strip_tags(get_the_content()); ?>
	
		<p><a href="<?php echo $url_content; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
		
	</div> <!-- end quote-container -->
		
</article>

<hr class="fancy-hr" />
