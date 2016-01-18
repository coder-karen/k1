<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('K1 Options', 'K1 Options', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
function example_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

add_action('customize_register', 'k1_customize_register');
function k1_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('k1_logo', array(
		'title' => __('Logo', 'k1-framework'),
		'description' => __('Allows you to upload a custom logo.', 'k1-framework'),
		'priority' => 35
	));
	
	$wp_customize->add_setting('k1_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option',
		'sanitize_callback' => 'esc_url_raw'

	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Upload your Logo', 'k1-framework'),
		'section' => 'k1_logo',
		'settings' => 'k1_custom_settings[logo]'
	)));


	
	// Top Banner Image
	$wp_customize->add_section('k1_banner', array(
		'title' => __('K1 Top Banner', 'k1-framework'),
		'description' => __('Allows you to upload a banner image to display underneath the main navigation.', 'k1-framework'),
		'priority' => 36
	));

 // Add setting for checkbox for banner image display
    $wp_customize->add_setting('k1_custom_settings[display_k1_banner]', array(
        'default' => 0,
        'type' => 'option',
        'sanitize_callback' => 'example_sanitize_checkbox'
    ));

    // Add control for checkbox for banner image display
    $wp_customize->add_control('k1_custom_settings[display_k1_banner]', array(
        'label' => __('Display the Top Banner Image?', 'k1-framework'),
        'section' => 'k1_banner',
        'settings' => 'k1_custom_settings[display_k1_banner]',
        'type' => 'checkbox'
    ));


	// Add setting for top banner image
	$wp_customize->add_setting('k1_banner', array(
		'default' => 'http://lorempixel.com/1200/300',
		'type' => 'theme_mod',
		'active_callback' => 'is_front_page',
		'sanitize_callback' => 'esc_url_raw'
	));

	// Add control for top banner image
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'k1_banner', array(
		'label' => __('Upload the Top Banner Image', 'k1-framework'),
		'section' => 'k1_banner',
		'settings' => 'k1_banner'
		
		
	)));

	// Add setting for banner heading
	$wp_customize->add_setting('k1_banner_heading', array(
		'default' => 'What can K1 do for you?',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));
	
	// Add control for banner heading
	$wp_customize->add_control('k1_banner_heading', array(
		'label' => __('Banner heading text', 'k1-framework'),
		'section' => 'k1_banner',
		'type' => 'text'
	));

	// Add setting for banner description
	$wp_customize->add_setting('k1_banner_desc', array(
		'default' => 'Lorem ipsum dolor sit amet',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field'
	));
	
	// Add control for banner description
	$wp_customize->add_control('k1_banner_desc', array(
		'label' => __('Banner description text', 'k1-framework'),
		'section' => 'k1_banner',
		'type' => 'text'
	));

	// Add setting for banner link
	$wp_customize->add_setting('k1_banner_link', array(
		'default' => '#',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	));
	
	// Add control for banner link
	$wp_customize->add_control('k1_banner_link', array(
		'label' => __('Banner read more link', 'k1-framework'),
		'section' => 'k1_banner',
		'type' => 'text'
	));

	//adding setting for banner link text area
	$wp_customize->add_setting('k1_banner_link_text', array(
	 	'default'  => 'More',
	 	'sanitize_callback' => 'sanitize_text_field'
	 ));
	$wp_customize->add_control('k1_banner_link_text', array(
		'label'   => 'Read more link text here',
	  	'section' => 'k1_banner',
	 	'type'    => 'text',
	));

	// Add section for about text area

	$wp_customize->add_section('about_section', array(
		'title' => __('About Section', 'k1-framework'),
		'description' => __('Allows you to change the title and text in the about section.', 'k1-framework'),
		'priority' => 37
	));

	// Add setting for checkbox for about area
    $wp_customize->add_setting('k1_custom_settings[display_about_section]', array(
        'default' => 0,
        'type' => 'option',
        'sanitize_callback' => 'example_sanitize_checkbox'
    ));

    // Add control for checkbox for about area
    $wp_customize->add_control('k1_custom_settings[display_about_section', array(
        'label' => __('Display the About Section?', 'k1-framework'),
        'section' => 'about_section',
        'settings' => 'k1_custom_settings[display_about_section]',
        'type' => 'checkbox'
    ));

	//adding setting for about text area title
	$wp_customize->add_setting('text_title_setting', array(
	 	'default'  => 'About Our Work',
	 	'sanitize_callback' => 'sanitize_text_field'
	 ));
	$wp_customize->add_control('text_title_setting', array(
		'label'   => 'About Title Here',
	  	'section' => 'about_section',
	 	'type'    => 'text'
	));

	//adding setting for about text area
	$wp_customize->add_setting('text_setting', array(
	 	'default'  => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
	 	'sanitize_callback' => 'sanitize_text_field',
	 	
	 ));
	$wp_customize->add_control('text_setting', array(
		'label'   => 'About Text Here',
	  	'section' => 'about_section',
	 	'type'    => 'textarea',
	));

	// Add setting for about area link url
	$wp_customize->add_setting('about_link', array(
		'default' => '#',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw'
	));
	
	// Add control for about area link url
	$wp_customize->add_control('about_link', array(
		'label' => __('About link URL', 'k1-framework'),
		'section' => 'about_section',
		'type' => 'text'
	));

	//adding setting for about text area read-more link
	$wp_customize->add_setting('about_link_text', array(
	 	'default'  => 'Read more...',
	 	'sanitize_callback' => 'sanitize_text_field'
	 ));
	$wp_customize->add_control('about_link_text', array(
		'label'   => 'Read more link text here',
	  	'section' => 'about_section',
	 	'type'    => 'text',
	));

	
	// Contact Email
	$wp_customize->add_section('k1_contact_email', array(
		'title' => __('Contact Form Email', 'k1-framework'),
		'description' => __('Set the receiver email for the contact form.', 'k1-framework'),
		'priority' => 38
	));
	
	$wp_customize->add_setting('k1_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'is_email',
	));
	
	$wp_customize->add_control('k1_custom_settings[contact_email]', array(
		'label' => __('Contact Form Email Address', 'k1-framework'),
		'section' => 'k1_contact_email',
		'settings' => 'k1_custom_settings[contact_email]',
		'type' => 'text'
	));
	
}	
?>