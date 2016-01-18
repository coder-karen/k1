<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('left-homepage')) : ?>

	<div class="col-lg-6 widget hide_on_mobile">
		<div class="inner-widget">
	
		<h2><?php bloginfo('title'); ?></h2>
		<p><?php bloginfo('description'); ?></p>

		</div>
		
	</div> <!-- end sidebar-widget -->
	
<?php endif; ?>

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('right-homepage')) : ?>

	<div class="col-lg-6 widget">
		<div class="inner-widget">

		<h2><?php bloginfo('title'); ?></h2>
		<p><?php bloginfo('description'); ?></p>

		</div>
		
	</div> <!-- end sidebar-widget -->
	
<?php endif; ?>
				