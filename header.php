<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile specification Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Stylesheets -->
	<link href='https://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<link rel="stylesheet/less" href="css/styles.less" type="text/css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<script src="<?php echo get_template_directory_uri() ?>/js/scripts.js" type="text/javascript"></script>

	




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

<body>

<!-- HEADER -->
	
	<header class="main-header" id="top">

		<div class="top-menu-container">

			<div class="container">
				<div class="row">

				<div class="col-lg-3 logo-container">

					<h1 class="logo">
						<a href="<?php echo home_url(); ?>">
						<img src="<?php print IMAGES; ?>/logo.png" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />
					</a>
					</h1> 

				</div> <!-- end col-lg-3 -->

				</div> <!-- end row -->

	<nav class="main-navigation responsive-navigation clearfix">

			
			<?php wp_nav_menu(array(
				'theme_location' => 'main-menu'
			)); ?>

			</nav>
				<div id="responsive-menu-icon">
				<div class="hamburger"></div>
				<div class="hamburger"></div>
				<div class="hamburger"></div>
			Menu </div>
			


			
			</div> <!-- end container -->

		</div> <!-- end top-menu-container -->


	


	</header> <!-- main-header -->



	
