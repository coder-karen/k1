<?php 
/*
	Template Name: Archives Page
*/
?>
 
<?php get_header(); ?>

	<div class="container">
	
		<div class="row">
		

				
				<div class="articles">
				
						<article class="page-content clearfix">
							
							<header>
								
								<?php if (current_user_can('edit_post', $post->ID)) {
									edit_post_link(__('Edit This', 'k1-framework'), '<p class="page-admin-edit-this">', '</p>');
								} ?>
								
								<h1><?php the_title(); ?></h1>
								
								<hr />
								
							</header>

							<h4><?php _e('Archives by Month', 'k1-framework'); ?></h4>
							<hr />

							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>

							<h4><?php _e('Archives by Subject', 'k1-framework'); ?></h4>
							<hr />

							<ul>
								<?php wp_list_categories('hiararchical=0&title_li='); ?>
							</ul>
							
						</article>
																	
				</div> <!-- end article-container -->
				

			
		</div> <!-- end row -->
		
	</div> <!-- end container -->

<?php get_footer(); ?>