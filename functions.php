<?php

/***********************************************************************************************/
/* 	Define Constants */
/***********************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/images');



/***********************************************************************************************/
/* Load JS Files */
/***********************************************************************************************/
function load_custom_scripts() {
	wp_enqueue_script('custom_script', THEMEROOT . '/js/scripts.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'load_custom_scripts');




/***********************************************************************************************/
/* Set the max width of the uploaded images */
/***********************************************************************************************/
if (!isset($content_width)) $content_width = 784;




/***********************************************************************************************/
/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
/***********************************************************************************************/
if (function_exists('add_theme_support')) {
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));
	
	add_theme_support('post-thumbnails', array('post'));
	set_post_thumbnail_size(210, 210, true);
	add_image_size('custom-blog-image', 784, 350);

	add_theme_support('automatic-feed-links');
}




/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/
function register_my_menus(){
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu', 'k1-framework')
		)
	);
}
add_action('init', 'register_my_menus');
		


	
/***********************************************************************************************/
/* Add Sidebar and Widgetized Area Support */
/***********************************************************************************************/
if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name' => __('Left Homepage Widget', 'k1-framework'),
			'id' => 'left-homepage',
			'description' => __('The left homepage widget area', 'k1-framework'),
			'before_widget' => '<div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-1 widget">',
			'after_widget' => '</div> <!-- end left homepage widget -->',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => __('Right Homepage Widget', 'k1-framework'),
			'id' => 'right-homepage',
			'description' => __('The right homepage widget area', 'k1-framework'),
			'before_widget' => '<div class="col-sm-10 col-sm-offset-1 col-md-4 col-md-offset-2 widget">',
			'after_widget' => '</div> <!-- end right homepage widget -->',
			'before_title' => '<h2>',
			'after_title' => '</h2>'
		)
	);
	register_sidebar(
		array(
			'name' => __('Footer', 'k1-framework'),
			'id' => 'footer',
			'description' => __('The footer widget area', 'k1-framework'),
			'before_widget' => '<div class="footer-sidebar-widget col-lg-4">',
			'after_widget' => '</div> <!-- end footer-widget -->',
			'before_title' => '<h5>',
			'after_title' => '</h5>'
		)
	);

}
	

	
/***********************************************************************************************/
/* Custom Function for Displaying Comments */
/***********************************************************************************************/
function k1_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>
	
		<li class="pingback" id="comment-<?php comment_ID(); ?>">

			<article <?php comment_class('clearfix'); ?>>
			
				<header>
				
					<h5><?php _e('Pingback:', 'k1-framework'); ?></h5>
					<p><?php edit_comment_link(); ?></p>
					
				</header>
	
				<?php comment_author_link(); ?>
								
			</article>
		
	<?php endif; ?>
	
	<?php if (get_comment_type() == 'comment') : ?>
		<li id="comment-<?php comment_ID(); ?>">
	
			<article <?php comment_class('clearfix'); ?>>
			
				<header>
				
					<h4><span><?php _e('AUTHOR', 'k1-framework'); ?></span><?php comment_author_link(); ?></h4>
					<p><span>on <?php comment_date(); ?> at <?php comment_time(); ?> - </span><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></p>
					
				</header>
	
				<figure class="comment-avatar">
					<?php 
						$avatar_size = 80;
						if ($comment->comment_parent != 0) {
							$avatar_size = 64;
						}
						
						echo get_avatar($comment, $avatar_size);
					?>
				</figure>
				
				<?php if ($comment->comment_approved == '0') : ?>
				
					<p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'k1-framework'); ?></p>
					
				<?php endif; ?>

				<?php comment_text(); ?>
								
			</article>
			
	<?php endif;	
}




/***********************************************************************************************/
/* Custom Comment Form */
/***********************************************************************************************/
function k1_custom_comment_form($defaults) {
	$comment_notes_after = '' .
		'<div class="allowed-tags">' .
		'<p><strong>' . __('Allowed Tags', 'k1-framework') . '</strong></p>' .
		'<code> ' . allowed_tags() . ' </code>' .
		'</div> <!-- end allowed-tags -->';
	
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after'] = $comment_notes_after;
	$defaults['id_form'] = 'comment-form';
	$defaults['comment_field'] = '<p><textarea name="comment" id="comment" cols="30" rows="10"></textarea></p>';

	return $defaults;
}

add_filter('comment_form_defaults', 'k1_custom_comment_form');

function k1_custom_comment_fields() {
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');
	
	$fields = array(
		'author' => '<p>' . 
						'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" ' . $aria_req . ' />' .
						'<label for="author">' . __('Name', 'k1-framework') . '' . ($req ? __(' (required)', 'k1-framework') : '') . '</label>' .
		            '</p>',
		'email' => '<p>' . 
						'<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' />' .
						'<label for="email">' . __('Email', 'k1-framework') . '' . ($req ? __(' (required) (will not be published)', 'k1-framework') : '') . '</label>' .
		            '</p>',
		'url' => '<p>' . 
						'<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" />' .
						'<label for="url">' . __('Website', 'k1-framework') . '</label>' .
		            '</p>'
	);

	return $fields;
}

add_filter('comment_form_default_fields', 'k1_custom_comment_fields');


/***********************************************************************************************/
/* Load Theme Options Page and Custom Widgets */
/***********************************************************************************************/
require_once('functions/k1-theme-customizer.php');
	
	


?>