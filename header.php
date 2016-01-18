
<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile specification Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	

	<!-- Stylesheets -->
	<link href='https://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<link rel="stylesheet/less" href="css/styles.less" type="text/css" />
	<link rel="stylesheet/less" type="text/css" href="styles.less">
<script src="less.js" type="text/javascript"></script>
<script type="text/javascript">
  less.watch();
</script>
	
	


	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="shortcut icon" href="<?php print IMAGES; ?>/icons/favicon.ico">
	<link rel="apple-touch-icon" href="<?php print IMAGES; ?>/icons/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php print IMAGES; ?>/icons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php print IMAGES; ?>/icons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php print IMAGES; ?>/icons/apple-touch-icon-180x180.png">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- HEADER -->
<?php $options = get_option('k1_custom_settings'); ?>
<?php $logo = isset($options['logo']) ? $options['logo'] : ''; ?>

	
	<header class="main-header" id="top">

		<div class="top-menu-container">

			<div class="container">
				<div class="row">

				<div class="col-lg-3 logo-container">

					<h1 class="logo">
						<?php
					
						isset($options['logo']) == '' ? $logo = IMAGES . '/logo.png' : $logo = $options['logo']; ?>
						<a href="<?php echo home_url(); ?>">
						<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />
					</a>
					</h1> 

				</div> <!-- end col-lg-3 -->

				</div> <!-- end row -->

	<nav class="main-navigation clearfix">

			<?php wp_nav_menu(array(
				'theme_location' => 'main-menu'
			)); ?>

			</nav>
			
			<a href="#" class="small-button green" id="rwd-main-nav-btn"><?php _e('Select a page...', 'k1-framework'); ?></a>
			<div class="rwd-main-nav"></div> <!-- end rwd-main-nav -->

			
			</div> <!-- end container -->

		</div> <!-- end top-menu-container -->
	


	</header> <!-- main-header -->



	