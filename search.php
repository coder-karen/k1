<?php get_header(); ?>

	<div class="container">
	
		<div class="row">
		
				
				<div class="articles">
				
					<?php if (have_posts()) : ?>
					
						<div class="search-results-container">
						
							<h4><?php _e('Search results for: ', 'k1-framework'); ?> <?php echo get_search_query(); ?></h4>
							
						</div> <!-- end search-results -->
						
						<hr class="fancy-hr" />
					
					<?php while(have_posts()) : the_post(); ?>

						<?php get_template_part('content', get_post_format()); ?>
						
					<?php endwhile; else : ?>
						<article class="no-posts">

							<h1><?php _e('No results were found matching your criteria. Please try something else.', 'k1-framework'); ?></h1>
							
						</article>
					<?php endif; ?>
					
					<div class="article-nav clearfix">
					
						<p class="article-nav-next"><?php previous_posts_link('Newer Posts &raquo;'); ?></p>
						<p class="article-nav-prev"><?php next_posts_link('&laquo; Older Posts'); ?></p>
					
					</div> <!-- end clearfix -->
					
				</div> <!-- end articles -->
				

		
			
		</div> <!-- end row -->
		
	</div> <!-- end container -->

<?php get_footer(); ?>