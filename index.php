<?php get_header(); ?>
 

	<!-- TOP BANNER -->

				<?php 
					// Get options
					$options = get_option('k1_custom_settings');
					?>


<div class="container">

		<div class="row">

			<div class="col-lg-12 top-banner">

					
	<?php if($options['display_k1_banner'] != '') : ?>  

				<div class="top-banner-inner">


				<img src="<?php echo get_theme_mod( 'k1_banner', 'http://lorempixel.com/1200/300' ); ?>" alt="Banner image" />


					<h1><?php echo get_theme_mod( 'k1_banner_heading', 'What can K1 do for you?' ); ?></h1>
						<p><?php echo get_theme_mod( 'k1_banner_desc', 'Lorem ipsum dolor sit amet' ); ?></p>
						<a class="button" href="<?php echo get_theme_mod( 'k1_banner_link', '#' ); ?>"><em><?php echo get_theme_mod( 'k1_banner_link_text', 'More' ); ?></em></a>


				</div> <!-- end top-banner-inner -->
				 <?php endif; ?> 
		
		
				
			
			</div> <!-- end top-banner -->

		</div> <!-- end row -->

	</div> <!-- end container -->


	<!-- ABOUT SECTION -->


	<div class="container">

		<div class="row">

				<?php if($options['display_about_section'] != '') : ?>

			<div class="body-text">

			  
			
				<h2><?php echo get_theme_mod( 'text_title_setting', 'About Our Work' ); ?></h2>

				<p><?php echo get_theme_mod( 'text_setting', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' ); ?></p>

			
				<p><a href="<?php echo get_theme_mod( 'about_link', '#' ); ?>"><?php echo get_theme_mod( 'about_link_text', 'Read more...' ); ?></a></p>					

			
			</div> <!-- end body-text -->

			 <?php endif; ?> 

		</div> <!-- end row -->

	</div> <!-- end container -->



	<!-- WIDGET AREA -->

	<div class="container">
	<div class="row"> 
		

<?php get_sidebar(); ?>


	</div> <!-- end row -->

</div> <!-- end container -->



	<!-- MAIN CONTENT -->
	<div class="container">

		<div class="row">

			<div class="articles">

		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

						<?php get_template_part('content', get_post_format()); ?>
						
					<?php endwhile; else : ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('no-posts'); ?>>

							<h1><?php _e('No posts were found.', 'k1-framework'); ?></h1>
							
						</article>
					<?php endif; ?>
			

				<div class="articles-nav clearfix">

					
					<p class="article-nav-prev"><?php previous_posts_link( 'Newer Posts »' ); ?></p>
					<?php next_posts_link( '« Older Posts ', 0 ); ?>
					

				</div> <!-- end articles-nav -->
			</div> <!-- end articles -->

		</div> <!-- end row -->

	</div> <!-- end container -->


<?php get_footer(); ?>