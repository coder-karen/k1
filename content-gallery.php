<?php
/***********************************************************************************************/
/* Template for the gallery post format */
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
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<a href="<?php the_permalink(); ?>"><?php _e('Permalink to the post', 'k1-framework'); ?></a>
		<?php endif; ?>
		<p class="article-meta-extra"><?php the_time(get_option('date_format')); ?> by <?php the_author_posts_link(); ?></p>
		
	</header>
	
	<?php 
		
		$gallery_atts = array(
			'post_parent' => $post->ID,
			'post_mime_type' => 'image'
		);
		$gallery_images = get_children($gallery_atts);
		
		if (!empty($gallery_images)) {
			$gallery_count = count($gallery_images);
			$first_image = array_shift($gallery_images);
			$display_first_image = wp_get_attachment_image($first_image->ID);
			
			?>
			
		<figure class="article-preview-image">
			<a href="<?php the_permalink(); ?>"><?php echo $display_first_image; ?></a>
		</figure>
		
		<p><strong><?php printf(_n('This gallery contains %s photo.', 'This gallery contains %s photos.', $gallery_count, 'k1-framework'), $gallery_count); ?></strong></p>
		
		<?php }
		
		the_excerpt();
	
	?>
	
	
</article>

<hr class="fancy-hr" />

