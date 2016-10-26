<footer>

	<div class="footer-area">

		<div class="container">

			<div class="row">

			<?php get_sidebar('left-footer'); ?>


			<?php get_sidebar('right-footer'); ?>

			</div> <!-- end row -->

		</div> <!-- end container -->
		
		<div class="container">

			<div class="copyright-container clearfix">

				<p class="top-link-footer"><a href="#top"><?php _e('Go To Top', 'k1-framework'); ?></a></p>

				<p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></p>

			</div> <!-- end copyright-container -->

		</div> <!-- end container -->


	</div> <!-- End footer-area -->



</footer>



<?php wp_footer(); ?>

	


</body>
</html>
