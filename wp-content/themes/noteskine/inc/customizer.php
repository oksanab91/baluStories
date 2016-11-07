<?php
// Require the display functions to output the customized options.
require_once get_template_directory() . '/inc/customizer-display.php';

// Removes all theme mods
//remove_theme_mods();

// CUSTOMIZER
function noteskine_customize_register( $wp_customize ) {
	//All sections, settings, and controls will be added here.

	// Site Title & Tagline.
	$wp_customize->get_section( 'title_tagline' )      ->panel = 'noteskine_panel_site_header';
	$wp_customize->get_section( 'title_tagline' )      ->priority = 1;
	$wp_customize->get_control( 'blogname' )           ->priority = 1;
	$wp_customize->get_control( 'blogdescription' )    ->priority = 2;
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Title', 'noteskine' );
	$wp_customize->get_control( 'display_header_text' )->priority = 3;

	// Logo & Favicon.
	$wp_customize->get_section( 'header_image' )->panel = 'noteskine_panel_site_header';
	$wp_customize->get_section( 'header_image' )->title = __( 'Logo & Favicon', 'noteskine' );
	$wp_customize->get_section( 'header_image' )->priority = 2;
	$wp_customize->get_control( 'header_image' )->priority = 1;

	// Site Header.
	$wp_customize->get_control( 'header_textcolor' )->section = 'noteskine_header_colors';
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'noteskine' );
	$wp_customize->get_control( 'header_textcolor' )->priority = 1;

	// Background.
	$wp_customize->get_control( 'background_image' )     ->section = 'noteskine_background_image';
	$wp_customize->get_control( 'background_image' )     ->priority = 1;
	$wp_customize->get_control( 'background_repeat' )    ->section = 'noteskine_background_image';
	$wp_customize->get_control( 'background_repeat' )    ->priority = 2;
	$wp_customize->get_control( 'background_attachment' )->section = 'noteskine_background_image';
	$wp_customize->get_control( 'background_attachment' )->priority = 3;
	$wp_customize->get_control( 'background_color' )     ->section = 'noteskine_background_colors';
	$wp_customize->get_control( 'background_color' )     ->priority = 1;

	$wp_customize->remove_control( 'background_position_x' );

	// Removed Sections.
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );

	/*
	 *	"Site Header" Panel
	 * -----------------------------------------------------------------------
	 */

	$wp_customize->add_panel( 'noteskine_panel_site_header', array(
		'title'    => __( 'Site Header', 'noteskine' ),
		'priority' => 1,
   ) );

	// Display Tagline.
	$wp_customize->add_setting( 'noteskine_display_tagline', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_tagline', array(
		'label'    => __( 'Display Tagline', 'noteskine' ),
		'priority' => 4,
		'type'     => 'checkbox',
		'section'  => 'title_tagline',
		'settings' => 'noteskine_display_tagline',
	) );

	//	Upload Favicon.
	$wp_customize->add_setting( 'noteskine_upload_favicon', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
	$wp_customize, 'noteskine_upload_favicon', array(
		'label'    => __( 'Upload Favicon', 'noteskine' ),
		'priority' => 2,
		'section'  => 'header_image',
		'settings' => 'noteskine_upload_favicon',
	) ) );

	// "Header Colors" Section.
	$wp_customize->add_section( 'noteskine_header_colors', array(
		'title'    => __( 'Header Colors', 'noteskine' ),
		'priority' => 3,
		'panel'    => 'noteskine_panel_site_header',
	) );

	//	Header Text Color.
	$wp_customize->add_setting( 'noteskine_header_text_color', array(
		'default'           => '#fff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_header_text_color', array(
		'label'    => __( 'Header Text Color', 'noteskine' ),
		'priority' => 2,
		'section'  => 'noteskine_header_colors',
		'settings' => 'noteskine_header_text_color',
	) ) );

	//	Header Background Color.
	$wp_customize->add_setting( 'noteskine_header_background_color', array(
		'default'           => '#000',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_header_background_color', array(
		'label'    => __( 'Header Background Color', 'noteskine' ),
		'priority' => 3,
		'section'  => 'noteskine_header_colors',
		'settings' => 'noteskine_header_background_color',
	) ) );

	//	Header Background Opacity.
	$wp_customize->add_setting( 'noteskine_header_background_opacity', array(
		'default'   => '0.7',
		'transport' => 'refresh',
		'sanitize_callback' =>'noteskine_sanitize_opacity_list',
	) );

	$wp_customize->add_control( 'noteskine_header_background_opacity', array(
		'label'    => __( 'Header Background Opacity', 'noteskine' ),
		'priority' => 4,
		'type'     => 'select',
		'section'  => 'noteskine_header_colors',
		'choices'  => array(
			'1.0' => '100%',
			'0.9' => '90%',
			'0.8' => '80%',
			'0.7' => '70%',
			'0.6' => '60%',
			'0.5' => '50%',
			'0.4' => '40%',
			'0.3' => '30%',
			'0.2' => '20%',
			'0.1' => '10%',
			'0.0' => '0%',
		)
	) );

	// "Header Settings" Section.
	$wp_customize->add_section( 'noteskine_header_settings', array(
		'title'    => __( 'Header Settings', 'noteskine' ),
		'priority' => 4,
		'panel'    => 'noteskine_panel_site_header',
	) );

	/**
	 * Display Search Box in Header.
	 *
	 * Used in "themplate-tags.php".
	 */
	$wp_customize->add_setting( 'noteskine_header_search', array(
		'default'   => true,
		'transport' => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_header_search', array(
		'label'    => __( 'Display Search Box', 'noteskine' ),
		'priority' => 1,
		'type'     => 'checkbox',
		'section'  => 'noteskine_header_settings',
		'settings' => 'noteskine_header_search',
	) );

	/* Display Top-Bottom Navigation
	 *
	 * Used in "themplate-tags.php".
	 */
	$wp_customize->add_setting( 'noteskine_top_bottom_navigation', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_top_bottom_navigation', array(
		'label'    => __( 'Display Top-Bottom Navigation', 'noteskine' ),
		'priority' => 2,
		'type'     => 'checkbox',
		'section'  => 'noteskine_header_settings',
		'settings' => 'noteskine_top_bottom_navigation',
	) );

	/* Display Post Navigation
	 *
	 * Used in "themplate-tags.php".
	 */
	$wp_customize->add_setting( 'noteskine_post_navigation', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_post_navigation', array(
		'label'    => __( 'Display Post Navigation', 'noteskine' ),
		'priority' => 3,
		'type'     => 'checkbox',
		'section'  => 'noteskine_header_settings',
		'settings' => 'noteskine_post_navigation',
	) );

	// Fixed Header
	$wp_customize->add_setting( 'noteskine_fixed_header', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_fixed_header', array(
		'label'    => __( 'Fixed Header', 'noteskine' ),
		'priority' => 4,
		'type'     => 'checkbox',
		'section'  => 'noteskine_header_settings',
		'settings' => 'noteskine_fixed_header',
	) );

	/*
	 *	"Hero Area" Panel
	 * -----------------------------------------------------------------------
	 */
	$wp_customize->add_panel( 'noteskine_panel_hero_area', array(
		'title'    => __( 'Hero Area', 'noteskine' ),
		'priority' => 2,
	) );

	//	"Hero Area Image" Section
	$wp_customize->add_section( 'noteskine_hero_area_image', array(
		'title'    => __( 'Hero Area Image', 'noteskine' ),
		'priority' => 1,
		'panel'    => 'noteskine_panel_hero_area',
	) );

	//	Upload Hero Area Image
	$wp_customize->add_setting( 'noteskine_upload_hero_area_image', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
	$wp_customize, 'noteskine_upload_hero_area_image', array(
		'label'    => __('Upload Hero Area Image', 'noteskine'),
		'priority' => 1,
		'section'  => 'noteskine_hero_area_image',
		'settings' => 'noteskine_upload_hero_area_image',
	) ) );

	//	Hero Area Image Opacity
	$wp_customize->add_setting( 'noteskine_hero_area_image_opacity', array(
		'default'           => '0.7',
		'transport'         => 'postMessage',
		'sanitize_callback' =>'noteskine_sanitize_opacity_list',
	) );

	$wp_customize->add_control(	 'noteskine_hero_area_image_opacity', array(
		'label'    => __( 'Hero Area Image Opacity', 'noteskine' ),
		'priority' => 2,
		'type'     => 'select',
		'section'  => 'noteskine_hero_area_image',
		'choices'  => array(
			'1.0' => '100%',
			'0.9' => '90%',
			'0.8' => '80%',
			'0.7' => '70%',
			'0.6' => '60%',
			'0.5' => '50%',
			'0.4' => '40%',
			'0.3' => '30%',
			'0.2' => '20%',
			'0.1' => '10%',
			'0.0' => '0%',
		)
	) );

	// Fixed Hero Area Image
	$wp_customize->add_setting( 'noteskine_fixed_hero_image', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_fixed_hero_image', array(
		'label'    => __( 'Fixed Hero Area Image', 'noteskine' ),
		'priority' => 3,
		'type'     => 'checkbox',
		'section'  => 'noteskine_hero_area_image',
		'settings' => 'noteskine_fixed_hero_image',
	) );

	// Hide Hero Area Image on Single Post
	$wp_customize->add_setting( 'noteskine_single_hero_image', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_single_hero_image', array(
		'priority' => 4,
		'type'     => 'checkbox',
		'label'    => __( 'Hide Image on Single Post Page', 'noteskine' ),
		'section'  => 'noteskine_hero_area_image',
		'settings' => 'noteskine_single_hero_image',
	) );

	// Hide Hero Area Image
	$wp_customize->add_setting( 'noteskine_hide_hero_image', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_hide_hero_image', array(
		'priority' => 5,
		'type'     => 'checkbox',
		'label'    => __( 'Hide Image', 'noteskine' ),
		'section'  => 'noteskine_hero_area_image',
		'settings' => 'noteskine_hide_hero_image',
	) );

	// Display Gradient on Hero Area Image
	$wp_customize->add_setting( 'noteskine_display_hero_gradient',	array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_hero_gradient',	array(
		'label'    => __( 'Display Gradient on Image', 'noteskine' ),
		'priority' => 6,
		'type'     => 'checkbox',
		'section'  => 'noteskine_hero_area_image',
		'settings' => 'noteskine_display_hero_gradient',
	) );

	//	"Social Media Buttons" Section
	$wp_customize->add_section( 'noteskine_social_buttons', array(
		'title'    => __( 'Social Media Buttons', 'noteskine' ),
		'priority' => 3,
		'panel'    => 'noteskine_panel_hero_area',
		'description'    => __( 'Enter URL to social media buttons.', 'noteskine' ),
	) );

	// Display Social Media Links
	$wp_customize->add_setting( 'noteskine_display_social_buttons', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_social_buttons', array(
		'label'    => __( 'Display Social Media Buttons', 'noteskine' ),
		'priority' => 1,
		'type'     => 'checkbox',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'noteskine_display_social_buttons',
	) );

	// Facebook-link
	$wp_customize->add_setting( 'facebook', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'facebook',	array(
		'label'    => 'Facebook',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'facebook',
		'type'     => 'url',
	) );

	// Twitter-link
	$wp_customize->add_setting( 'twitter', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'twitter', array(
		'label'    => 'Twitter',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'twitter',
		'type'     => 'url',
	) );

	// Google plus
	$wp_customize->add_setting( 'google_plus', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'google_plus', array(
		'label'    => 'Google Plus',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'google_plus',
		'type'     => 'url',
	) );

	// Youtube
	$wp_customize->add_setting( 'youtube', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'youtube', array(
		'label'    => 'Youtube',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'youtube',
		'type'     => 'url',
	) );

	// Pinterest
	$wp_customize->add_setting( 'pinterest', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'pinterest', array(
		'label'    => 'Pinterest',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'pinterest',
		'type'     => 'url',
	) );

	// Instagram
	$wp_customize->add_setting( 'instagram', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'instagram', array(
		'label'    => 'Instagram',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'instagram',
		'type'     => 'url',
	) );

	// Linkedin
	$wp_customize->add_setting( 'linkedin', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'linkedin', array(
		'label'    => 'Linkedin',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'linkedin',
		'type'     => 'url',
	) );

	// Tumblr
	$wp_customize->add_setting( 'tumblr', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'tumblr', array(
		'label'    => 'Tumblr',
		'section'  => 'noteskine_social_buttons',
		'settings' => 'tumblr',
		'type'     => 'url',
	) );

	/*
	 *	"Background" Panel
	 * -----------------------------------------------------------------------
	 */
	$wp_customize->add_panel( 'noteskine_panel_background', array(
		'priority' => 3,
		'title'    => __( 'Background', 'noteskine' ),
	) );

	//	"Background Image" Section
	$wp_customize->add_section( 'noteskine_background_image', array(
		'title'    => __( 'Background Image', 'noteskine' ),
		'priority' => 1,
		'panel'    => 'noteskine_panel_background',
    ) );

	//	"Background Colors" Section
	$wp_customize->add_section( 'noteskine_background_colors', array(
		'title'    => __( 'Background Colors', 'noteskine' ),
		'priority' => 2,
		'panel'    => 'noteskine_panel_background',
    ) );

	// Hero Gradient Color
	$wp_customize->add_setting( 'noteskine_hero_gradient_color', array(
		'default'           => '#30373d',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_hero_gradient_color', array(
		'label'       => __( 'Hero Area Gradient Color', 'noteskine' ),
		'priority'    => 2,
		'description' => __( 'Same color as background recommended.', 'noteskine' ),
		'section'     => 'noteskine_background_colors',
		'settings'    => 'noteskine_hero_gradient_color',
	) ) );

	//Pagination Text Color - Hover
	$wp_customize->add_setting( 'noteskine_pagination_text_color_hover',	array(
		'default'           => '#30373d',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_pagination_text_color_hover', array(
		'label'       => __( 'Pagination Text Color - Hover', 'noteskine' ),
		'priority'    => 3,
		'description' => __( 'Same color as background recommended.', 'noteskine' ),
		'section'     => 'noteskine_background_colors',
		'settings'    => 'noteskine_pagination_text_color_hover',
	) ) );

	// Background Text Color
	$wp_customize->add_setting( 'noteskine_background_text_color', array(
		'default'           => '#fff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_background_text_color',	array(
		'label'    => __( 'Background Text Color', 'noteskine' ),
		'priority' => 4,
		'section'  => 'noteskine_background_colors',
		'settings' => 'noteskine_background_text_color',
	) ) );

	// Display Shadows Under Posts
	$wp_customize->add_setting( 'noteskine_display_shadows', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_shadows', array(
		'label'    => __( 'Display Shadows Under Content Boxes', 'noteskine' ),
		'priority' => 5,
		'type'     => 'checkbox',
		'section'  => 'noteskine_background_colors',
		'settings' => 'noteskine_display_shadows',
	) );

	/*
	 *	"Post" Panel
	 * -----------------------------------------------------------------------
	 */
	$wp_customize->add_panel( 'noteskine_panel_post', array(
		'priority' => 4,
		'title'    => __( 'Post', 'noteskine' ),
	) );

	//	"Standard Format Colors" Section
	$wp_customize->add_section( 'noteskine_standard_format_colors', array(
		'title'    => __( 'Standard Format Colors', 'noteskine' ),
		'priority' => 1,
		'panel'    => 'noteskine_panel_post',
	) );

	// Accent Color
	$wp_customize->add_setting(	'noteskine_accent_color', array(
		'default'           => '#e03555',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_accent_color', array(
		'label'       => __( 'Accent Color', 'noteskine' ),
		'description' => __( 'Title, headings, drop cap, links, pull quotes, highlighted box, sticky ribbon.', 'noteskine' ),
		'priority'    => 1,
		'section'     => 'noteskine_standard_format_colors',
		'settings'    => 'noteskine_accent_color',
	) ) );

	// Main Text Color
	$wp_customize->add_setting(	'noteskine_main_text_color', array(
		'default'           => '#2A4557',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_main_text_color', array(
		'label'       => __( 'Main Text Color', 'noteskine' ),
		'description' => __( 'Post paragraphs.', 'noteskine' ),
		'priority'    => 2,
		'section'     => 'noteskine_standard_format_colors',
		'settings'    => 'noteskine_main_text_color',
	) ) );

	// Secondary Text Color
	$wp_customize->add_setting(	'noteskine_secondary_text_color',	array(
		'default'         => '#777',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_secondary_text_color', array(
		'label'       => __( 'Secondary Text Color', 'noteskine' ),
		'description' => __( 'Quotes, captions, date, author, categories, tags.', 'noteskine' ),
		'priority'    => 3,
		'section'     => 'noteskine_standard_format_colors',
		'settings'    => 'noteskine_secondary_text_color',
	) ) );

	//	"Aside Format Colors" Section
	$wp_customize->add_section( 'noteskine_aside_format_colors', array(
		'title'    => __( 'Aside Format Colors', 'noteskine' ),
		'priority' => 2,
		'panel'    => 'noteskine_panel_post',
  ) );

	// Aside Text Color
	$wp_customize->add_setting( 'noteskine_aside_text_color', array(
		'default'           => '#2a4557',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_aside_text_color', array(
		'label'       => __( 'Aside Text Color', 'noteskine' ),
		'priority'    => 1,
		'section'     => 'noteskine_aside_format_colors',
		'settings'    => 'noteskine_aside_text_color',
	) ) );

	// Aside 1st Background Color
	$wp_customize->add_setting( 'noteskine_aside_1st_color', array(
		'default'           => '#fff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(	 new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_aside_1st_color', array(
		'label'       => __( '1st Background Color', 'noteskine' ),
		'priority'    => 2,
		'section'     => 'noteskine_aside_format_colors',
		'settings'    => 'noteskine_aside_1st_color',
	) ) );

	// Aside 2nd Background Color
	$wp_customize->add_setting( 'noteskine_aside_2nd_color',	array(
		'default'           => '#fff',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(	 new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_aside_2nd_color', array(
		'label'       => __( '2nd Background Color', 'noteskine' ),
		'priority'    => 3,
		'section'     => 'noteskine_aside_format_colors',
		'settings'    => 'noteskine_aside_2nd_color',
	) ) );

	// Aside Text Shadow
	$wp_customize->add_setting( 'noteskine_aside_text_shadow', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_aside_text_shadow', array(
		'label'    => __( 'Text Shadow', 'noteskine' ),
		'priority' => 4,
		'type'     => 'checkbox',
		'section'  => 'noteskine_aside_format_colors',
		'settings' => 'noteskine_aside_text_shadow',
	) );

	//	"Quote Format Colors" Section
	$wp_customize->add_section( 'noteskine_quote_format_colors', array(
		'title'    => __( 'Quote Format Colors', 'noteskine' ),
		'priority' => 3,
		'panel'    => 'noteskine_panel_post',
	) );

	// Quote Text Color
	$wp_customize->add_setting( 'noteskine_quote_text_color', array(
		'default'           => '#fff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_quote_text_color', array(
		'label'       => __( 'Quote Text Color', 'noteskine' ),
		'priority'    => 1,
		'section'     => 'noteskine_quote_format_colors',
		'settings'    => 'noteskine_quote_text_color',
	) ) );

	// Quote 1st Background Color
	$wp_customize->add_setting(	'noteskine_quote_1st_color',	array(
		'default'           => '#B79601',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(	 new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_quote_1st_color', array(
		'label'       => __( '1st Background Color', 'noteskine' ),
		'priority'    => 2,
		'section'     => 'noteskine_quote_format_colors',
		'settings'    => 'noteskine_quote_1st_color',
	) ) );

	// Quote 2nd Background Color
	$wp_customize->add_setting( 'noteskine_quote_2nd_color',	array(
		'default'           => '#017C68',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(	 new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_quote_2nd_color', array(
		'label'       => __( '2nd Background Color', 'noteskine' ),
		'priority'    => 3,
		'section'     => 'noteskine_quote_format_colors',
		'settings'    => 'noteskine_quote_2nd_color',
	) ) );

	// Quote Text Shadow
	$wp_customize->add_setting( 'noteskine_quote_text_shadow', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control(	'noteskine_quote_text_shadow', array(
		'label'    => __( 'Text Shadow', 'noteskine' ),
		'priority' => 4,
		'type'     => 'checkbox',
		'section'  => 'noteskine_quote_format_colors',
		'settings' => 'noteskine_quote_text_shadow',
	) );

	//	"Status Format Colors" Section
	$wp_customize->add_section( 'noteskine_status_format_colors', array(
		'title'    => __( 'Status Format Colors', 'noteskine' ),
		'priority' => 3,
		'panel'    => 'noteskine_panel_post',
	) );

	// Status Text Color
	$wp_customize->add_setting( 'noteskine_status_text_color', array(
		'default'           => '#fff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(	 new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_status_text_color', array(
		'label'       => __( 'Status Text Color', 'noteskine' ),
		'priority'    => 1,
		'section'     => 'noteskine_status_format_colors',
		'settings'    => 'noteskine_status_text_color',
	) ) );

	// Status 1st Background Color
	$wp_customize->add_setting(	'noteskine_status_1st_color',	array(
		'default'           => '#2D9393',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(	 new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_status_1st_color', array(
		'label'       => __( '1st Background Color', 'noteskine' ),
		'priority'    => 2,
		'section'     => 'noteskine_status_format_colors',
		'settings'    => 'noteskine_status_1st_color',
	) ) );

	//	Status 2nd Background Color
	$wp_customize->add_setting( 'noteskine_status_2nd_color', array(
		'default'           => '#0B4577',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control(	 new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_status_2nd_color', array(
		'label'       => __( '2nd Background Color', 'noteskine' ),
		'priority'    => 3,
		'section'     => 'noteskine_status_format_colors',
		'settings'    => 'noteskine_status_2nd_color',
	) ) );

	//	Status Text Shadow
	$wp_customize->add_setting( 'noteskine_status_text_shadow', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control(	'noteskine_status_text_shadow', array(
		'label'    => __( 'Text Shadow', 'noteskine' ),
		'priority' => 4,
		'type'     => 'checkbox',
		'section'  => 'noteskine_status_format_colors',
		'settings' => 'noteskine_status_text_shadow',
	) );

	//	Post Meta Section
	$wp_customize->add_section( 'noteskine_post_meta', array(
		'title'    => __( 'Post Info', 'noteskine' ),
		'priority' => 7,
		'panel'    => 'noteskine_panel_post',
    ) );

	//	Display Top Date
	$wp_customize->add_setting( 'noteskine_display_top_date', array(
		'default'           => true,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_top_date', array(
		'label'    => __( 'Display Date Under Title', 'noteskine' ),
		'priority' => 1,
		'type'     => 'checkbox',
		'section'  => 'noteskine_post_meta',
		'settings' => 'noteskine_display_top_date',
	) );

	//	Display Date in Post Footer
	$wp_customize->add_setting( 'noteskine_display_date', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_date', array(
		'label'    => __( 'Display Date', 'noteskine' ),
		'priority' => 2,
		'type'     => 'checkbox',
		'section'  => 'noteskine_post_meta',
		'settings' => 'noteskine_display_date',
	) );

	//	Display Author in Post Footer
	$wp_customize->add_setting( 'noteskine_display_author', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_author', array(
		'label'    => __( 'Display Post Author', 'noteskine' ),
		'priority' => 3,
		'type'     => 'checkbox',
		'section'  => 'noteskine_post_meta',
		'settings' => 'noteskine_display_author',
	) );

	//	Display Categories in Post Footer
	$wp_customize->add_setting( 'noteskine_display_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_category', array(
		'label'    => __( 'Display Post Categories', 'noteskine' ),
		'priority' => 4,
		'type'     => 'checkbox',
		'section'  => 'noteskine_post_meta',
		'settings' => 'noteskine_display_category',
	) );

	//	Display Tags in Post Footer
	$wp_customize->add_setting(	'noteskine_display_tag', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_display_tag', array(
		'label'    => __( 'Display Post Tags', 'noteskine' ),
		'priority' => 5,
		'type'     => 'checkbox',
		'section'  => 'noteskine_post_meta',
		'settings' => 'noteskine_display_tag',
	) );

	/*
	 *	"Site Footer" Panel
	 * -----------------------------------------------------------------------
	 */

	$wp_customize->add_panel( 'noteskine_panel_site_footer', array(
		'title'    => __( 'Site Footer', 'noteskine' ),
		'priority' => 5,
	) );

	// "Footer Colors" Section.
	$wp_customize->add_section( 'noteskine_footer_colors', array(
		'title'    => __( 'Footer Colors', 'noteskine' ),
		'priority' => 1,
		'panel'    => 'noteskine_panel_site_footer',
	) );

	//	Footer Text Color
	$wp_customize->add_setting( 'noteskine_footer_text_color', array(
		'default'           => '#fff',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_footer_text_color', array(
		'label'    => __( 'Footer Text Color', 'noteskine' ),
		'priority' => 1,
		'section'  => 'noteskine_footer_colors',
		'settings' => 'noteskine_footer_text_color',
	) ) );

	//	Footer Accent Color
	$wp_customize->add_setting( 'noteskine_footer_accent_color', array(
		'default'           => '#e03555',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_footer_accent_color', array(
		'label'    => __( 'Footer Accent Color', 'noteskine' ),
		'priority' => 2,
		'section'  => 'noteskine_footer_colors',
		'settings' => 'noteskine_footer_accent_color',
	) ) );

	//	Footer Background Color
	$wp_customize->add_setting( 'noteskine_footer_background_color', array(
		'default'           => '#000',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'noteskine_footer_background_color', array(
		'label'    => __( 'Footer Background Color', 'noteskine' ),
		'priority' => 3,
		'section'  => 'noteskine_footer_colors',
		'settings' => 'noteskine_footer_background_color',
	) ) );

	//	Footer Background Opacity
	$wp_customize->add_setting( 'noteskine_footer_opacity', array(
		'default'   => '0.7',
		'transport' => 'refresh',
		'sanitize_callback' =>'noteskine_sanitize_opacity_list',
	) );

	$wp_customize->add_control( 'noteskine_footer_opacity', array(
		'label'    => __( 'Footer Background Opacity', 'noteskine' ),
		'priority' => 4,
		'type'     => 'select',
		'section'  => 'noteskine_footer_colors',
		'choices'  => array(
			'1.0' => '100%',
			'0.9' => '90%',
			'0.8' => '80%',
			'0.7' => '70%',
			'0.6' => '60%',
			'0.5' => '50%',
			'0.4' => '40%',
			'0.3' => '30%',
			'0.2' => '20%',
			'0.1' => '10%',
			'0.0' => '0%',
		)
	) );

	// "Footer Settings" Section.
	$wp_customize->add_section( 'noteskine_footer_settings', array(
		'title'    => __( 'Footer Settings', 'noteskine' ),
		'priority' => 2,
		'panel'    => 'noteskine_panel_site_footer',
	) );

	/* Hide Widget Area
	 *
	 * Used in "footer.php".
	 */
	$wp_customize->add_setting( 'noteskine_hide_widget_area', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_hide_widget_area', array(
		'label'    => __( 'Hide Widget Area', 'noteskine' ),
		'priority' => 1,
		'type'     => 'checkbox',
		'section'  => 'noteskine_footer_settings',
		'settings' => 'noteskine_hide_widget_area',
	) );

	/* Hide Footer Menu
	 *
	 * Used in "footer.php".
	 */
	$wp_customize->add_setting( 'noteskine_hide_footer_menu', array(
		'default'           => false,
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_hide_footer_menu', array(
		'label'    => __( 'Hide Footer Menu', 'noteskine' ),
		'priority' => 2,
		'type'     => 'checkbox',
		'section'  => 'noteskine_footer_settings',
		'settings' => 'noteskine_hide_footer_menu',
	) );

	/* Copyright Message
	 *
	 * Used in "footer.php".
	 */
	$wp_customize->add_setting( 'noteskine_copyright_text', array(
		'default'           => __( 'uses Noteskine Theme', 'noteskine' ),
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_text',
	) );

	$wp_customize->add_control( 'noteskine_copyright_text', array(
		'label'    => __( 'Copyright Message', 'noteskine' ),
		'priority' => 3,
		'type'     => 'text',
		'section'  => 'noteskine_footer_settings',
		'settings' => 'noteskine_copyright_text',
	) );

	/*
	 *	"Options" Section
	 * -----------------------------------------------------------------------
	 */
	$wp_customize->add_section( 'noteskine_options', array(
		'title'    => __( 'Options', 'noteskine' ),
		'priority' => 7,
	) );

	/* Use Automatic Excerpts.
	 *
	 * Used in "content.php", "content-audio.php", "content-gallery.php",
	 * "content-image.php", "content-link.php", "content-video.php".
	 */
	$wp_customize->add_setting( 'noteskine_excerpt', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_excerpt', array(
		'label'    => __( 'Use Automatic Excerpts', 'noteskine' ),
		'priority' => 1,
		'type'     => 'checkbox',
		'section'  => 'noteskine_options',
		'settings' => 'noteskine_excerpt',
	) );

	/* Display Reading Progress Bar.
	 *
	 * Used in "template-tags.php".
	 */
	$wp_customize->add_setting( 'noteskine_reading_progress', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_reading_progress', array(
		'label'    => __( 'Display Reading Progress Bar', 'noteskine' ),
		'priority' => 2,
		'type'     => 'checkbox',
		'section'  => 'noteskine_options',
		'settings' => 'noteskine_reading_progress',
	) );

	/* Display Related Posts.
	 *
	 * Used in "template-tags.php".
	 */
	$wp_customize->add_setting( 'noteskine_related_posts', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'noteskine_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'noteskine_related_posts', array(
		'label'    => __( 'Display Related Posts', 'noteskine' ),
		'priority' => 3,
		'type'     => 'checkbox',
		'section'  => 'noteskine_options',
		'settings' => 'noteskine_related_posts',
	) );

	// Font Family
	$wp_customize->add_setting( 'noteskine_font_family', array(
		'default'           => 'Open Sans, Arial, sans-serif',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'noteskine_sanitize_font_family_list',
	) );

	$wp_customize->add_control( 'noteskine_font_family', array(
		'priority'    => 4,
		'settings'    => 'noteskine_font_family',
		'label'       => __( 'Font Family', 'noteskine' ),
		'section'     => 'noteskine_options',
		'type'        => 'select',
		'choices'     => array(
			'Open Sans, Arial, sans-serif'   => 'Sans',
			'Noto Serif, Georgia, serif'  => 'Serif',
		),
	) );

	/* Add Google Analytics Code.
	 *
	 *
	 */
	// $wp_customize->add_setting( 'noteskine_google_analytics', array(
	// 	'default'   => 'default',
	// 	'transport' => 'refresh',
	// 	'sanitize_callback' => 'noteskine_sanitize_text',
	// ) );

	// $wp_customize->add_control( 'noteskine_google_analytics', array(
	// 	'label'       => __( 'Google Analytics Code', 'noteskine' ),
	// 	'description' => __( 'Enter Google Analitics User-ID (UA-XXXX-Y).', 'noteskine' ),
	// 	'priority'    => 5,
	// 	'type'        => 'textarea',
	// 	'section'     => 'noteskine_options',
	// 	'settings'    => 'noteskine_google_analytics',
	// ) );

}
add_action( 'customize_register', 'noteskine_customize_register' );

// Live preview.
function mytheme_customizer_live_preview() {
	wp_enqueue_script( 'mytheme-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'jquery', 'customize-preview' ), '0.3.0', true );
}
add_action( 'customize_preview_init', 'mytheme_customizer_live_preview' );

// Sanitize text.
function noteskine_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

// Sanitize Google Analytics Code.
function noteskine_sanitize_analytics_code($input) {
	$custom_allowedtags["script"] = array();
	return wp_kses( $input, $custom_allowedtags );
}

// Sanitize checkbox.
function noteskine_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Sanitize opacity select list.
function noteskine_sanitize_opacity_list( $input ) {
	$valid = array(
		'1.0' => '100%',
		'0.9' => '90%',
		'0.8' => '80%',
		'0.7' => '70%',
		'0.6' => '60%',
		'0.5' => '50%',
		'0.4' => '40%',
		'0.3' => '30%',
		'0.2' => '20%',
		'0.1' => '10%',
		'0.0' => '0%',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

// Sanitize font family select list.
function noteskine_sanitize_font_family_list( $input ) {
	$valid = array(
		'Open Sans, Arial, sans-serif'   => 'Sans',
		'Noto Serif, Georgia, serif'  => 'Serif',
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return 'Open Sans';
	}
}
?>
