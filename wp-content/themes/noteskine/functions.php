<?php
/**
 * Noteskine functions and definitions
 *
 * @package Noteskine
 */

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 960; /* pixels */
}

if ( ! function_exists( 'noteskine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function noteskine_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'noteskine', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style ( 'editor-styles.css' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add document title tag to HTML
	add_theme_support( 'title-tag' );

	// Register for header and footer menu location.
	register_nav_menus(	array(
		'header_menu' => __( 'Header Menu', 'noteskine' ),
		'footer_menu' => __( 'Footer Menu', 'noteskine' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', 'status' )
	);

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'noteskine_custom_background_args', array(
		'default-color'          => '#30373d',
	) ) );

	// Enable support for Post Thumbnails, and declare custom sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 320, 320, true );
	//update_option( 'thumbnail_size_w', 320 );
	//update_option( 'thumbnail_size_h', 320 );
	add_image_size( 'noteskine-full-width', 960, 99999, false );
	add_image_size( 'noteskine-related', 320, 200, true );
	add_image_size( 'noteskine-gallery-thumb', 320, 320, true );
}
endif; // noteskine_setup
add_action( 'after_setup_theme', 'noteskine_setup' );

/**
 * Register widgetized area.
 */
function noteskine_widgets_init() {

    // First Footer Widget Area. Empty by default.
	register_sidebar( array(
		'name'          => __( 'Left Column', 'noteskine' ),
		'id'            => 'first-footer-widget-area',
		'description'   => __( 'Hidden on Mobile Devices.', 'noteskine' ),
		'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Second Footer Widget Area. Empty by default.
	register_sidebar( array(
		'name'          => __( 'Middle Column', 'noteskine' ),
		'id'            => 'second-footer-widget-area',
		'description'   => __( 'Displayed on Mobile Devices.', 'noteskine' ),
		'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Third Footer Widget Area. Empty by default.
	register_sidebar( array(
		'name'          => __( 'Right Column', 'noteskine' ),
		'id'            => 'third-footer-widget-area',
		'description'   => __( 'Hidden on Mobile Devices.', 'noteskine' ),
		'before_widget' => '<div class="widget-container %2$s" id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'noteskine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 function noteskine_scripts() {
	wp_enqueue_style( 'noteskine-style', get_stylesheet_uri() );

	wp_enqueue_style( 'noteskine-ie', get_template_directory_uri() . '/css/ie.css', array( 'noteskine-style' ), '66' );
	wp_style_add_data( 'noteskine-ie', 'conditional', 'lte IE 9' );

	wp_enqueue_style( 'noteskine-font-stylesheet', '//fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700,700italic|Open+Sans:400,400italic,700italic,700|Noto+Sans:400,400italic,700italic,700&subset=latin,latin-ext,cyrillic-ext,cyrillic,devanagari,vietnamese,greek,greek-ext' );

	wp_enqueue_style( 'noteskine-font-awsome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.2' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'noteskine-menu', get_template_directory_uri() . '/js/menu.js', array('jquery'), '2014-11-03', true );

	wp_enqueue_script( 'noteskine-search', get_template_directory_uri() . '/js/search.js', array('jquery'), '2014-11-03', true );

	wp_enqueue_script( 'noteskine-reading-progress', get_template_directory_uri() . '/js/reading-progress.js', array('jquery'), '2014-11-03', true );

	wp_enqueue_script( 'noteskine-top-bottom', get_template_directory_uri() . '/js/top-bottom.js', array('jquery'), '2014-11-03', true );

	wp_enqueue_script( 'noteskine-fluid-video', get_template_directory_uri() . '/js/fluid-video.js', array('jquery'), '2014-11-03', true );

	wp_enqueue_script( 'noteskine-next-prev-titles', get_template_directory_uri() . '/js/next-prev-titles.js', array('jquery'), '2014-11-03', true );

	wp_enqueue_script( 'noteskine-helpers', get_template_directory_uri() . '/js/helpers.js', array('jquery'), '2014-11-03', true );

}
add_action( 'wp_enqueue_scripts','noteskine_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

?>
