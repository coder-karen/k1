<?php 
/*
	Template Name: Full Width Page
*/
?>
 
<?php get_header(); ?>

	<div class="container">
	
		<div class="row">
		

				
				<div class="articles">
				
					<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

						<article class="page-content clearfix">
							
							<header>
								
								<?php if (current_user_can('edit_post', $post->ID)) {
									edit_post_link(__('Edit This', 'k1-framework'), '<p class="page-admin-edit-this">', '</p>');
								} ?>
								
								<h2><?php the_title(); ?></h2>
								
								<hr />
								
							</header>
							
							<?php the_content(); ?>
							
						</article>
												
					<?php endwhile; else : ?>
						<article class="no-posts">

							<h1><?php _e('No page was found.', 'k1-framework'); ?></h1>
							
						</article>
					<?php endif; ?>
																	
				</div> <!-- end article-container -->

				<div class="comments-area" id="comments">
					
					<?php comments_template('', true); ?>
					
				</div> <!-- end comments-area -->
				

			
		</div> <!-- end row -->
		
	</div> <!-- end container -->

<?php get_footer(); ?>