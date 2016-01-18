<?php get_header(); ?>

	<div class="container">
	
		<div class="row">
		
				
				<div class="articles">
				
					<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

						<article class="clearfix">
							
							<header>
								
								<?php
									// Only show the comments link if comments are allowed and it's not password protected
									if (comments_open() && !post_password_required()) { 
										comments_popup_link('0', '1', '%', 'article-meta-comments');
									}
								?>
								<p class="article-meta-categories"><?php the_category(' &nbsp;/&nbsp; '); ?></p>
								<h2><?php the_title(); ?></h2>
								<p class="article-meta-extra">
									<?php the_time(get_option('date_format')); ?> by <?php the_author_posts_link(); ?>
									<?php if (current_user_can('edit_post', $post->ID)) {
										echo ' / ';
										edit_post_link(__('Edit This Post', 'k1-framework'), '<span class="page-admin-edit-this">', '</span>');
									} ?>
								</p>
								
							</header>
							
							<?php if (has_post_thumbnail()) : ?>
							
								<figure class="article-full-image">
									<?php the_post_thumbnail('custom-blog-image'); ?>
								</figure>
							
							<?php else : ?>
							
								<hr class="fancy-hr" />
								
							<?php endif; ?>
							
							<?php the_content(); ?>
							
							<?php if (has_tag()) : ?>

								<hr />
								<p class="article-tag-list"><?php the_tags(); ?></p>
								
							<?php endif; ?>
							
							<!-- Displaying post pagination links in case we have multiple page posts -->
							<?php wp_link_pages('before=<div class="post-navigation">&after=</div>&pagelink=Page %'); ?>
							
						</article>

						<div class="article-author clearfix">
						
							<p><strong>Article by </strong><?php the_author_posts_link(); ?></p>
							<p><?php the_author_meta('description'); ?></p>							
						
						</div> <!-- end clearfix -->
												
					<?php endwhile; else : ?>
						<article class="no-posts">

							<h1><?php _e('No posts were found.', 'k1-framework'); ?></h1>
							
						</article>
					<?php endif; ?>
					
				</div> <!-- end article-container -->
				
				<div class="comments-area" id="comments">
					
					<?php comments_template('', true); ?>
					
				</div> <!-- end comments-area - div articles-->
				
			
	
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->

<?php get_footer(); ?>