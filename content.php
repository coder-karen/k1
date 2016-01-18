<?php
/***********************************************************************************************/
/* Template for the default post format */
/***********************************************************************************************/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
	<header>
		
			<?php
				// Only show the comments link if comments are allowed and it's not password protected
			
				if (comments_open() && !post_password_required()) { 
					comments_popup_link('0', '1', '%', 'article-meta-comments');
				}
			?>
		<p class="article-meta-categories"><?php the_category(' &nbsp;/&nbsp; '); ?></p>
		<?php if (get_the_title() != '') : ?>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php else : ?>
			<a href="<?php the_permalink(); ?>"><?php _e('Permalink to the post', 'k1-framework'); ?></a>
		<?php endif; ?>
		<p class="article-meta-extra"><?php the_time(get_option('date_format')); ?> by <?php the_author_posts_link(); ?></p>
		
	</header>
	
	<?php if (has_post_thumbnail()) : ?>

		<figure class="article-preview-image">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
		</figure>
		
	<?php endif; ?>
	
	<?php the_content('Read More &raquo;'); ?>
	
</article>

<hr class="fancy-hr" />
