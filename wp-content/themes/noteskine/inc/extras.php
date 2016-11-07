<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package Noteskine
 */

/**
 * Change title of password protected & private posts.
 */
function noteskine_titles($title) {
	$title = esc_attr($title);
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'<i class="fa fa-key"></i>', // What to replace "Protected:" with
		'<i class="fa fa-eye-slash"></i>' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'noteskine_titles');

/**
 * Adding "content-box" class to post_class.
 */
function noteskine_post_classes( $classes ) {
 	$classes[] = 'content-box';

    return $classes;
}
add_filter( 'post_class','noteskine_post_classes' );

/**
 * Add 'full-width' size to Media Gallery.
 */
function noteskine_custom_image_sizes_choose( $sizes ) {
    $custom_sizes = array(
        'noteskine-full-width' => 'Full Post Width',
    );
    return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', 'noteskine_custom_image_sizes_choose' );

/**
 * Change default fields & text in comment form.
 */
add_filter( 'comment_form_defaults', 'noteskine_comment_fields' );

function noteskine_comment_fields($fields) {

	//$fields['author'] ='<div class="comment-form-author"><input id="author" name="author" type="text"  placeholder="nick"' . $aria_req . ' /></div>';

	//$fields['email'] ='<div class="comment-form-email"><input id="email" name="email" type="text"  placeholder="email"' . $aria_req . ' /></div>';

	//$fields['url'] ='<div class="comment-form-url"><input id="url" name="url" type="text"  placeholder="url" /></div>';

	return $fields;
}
add_filter('comment_form_default_fields', 'noteskine_comment_fields');

function noteskine_comment_text($arg) {

	//$arg['comment_notes_before'] = '' ;
	$arg['comment_notes_after'] = '' ;
	//$arg['comment_field'] = '<div class="comment-form-comment"><label for="comment">' . '' . '</label><textarea id="comment" name="comment"  aria-required="true"></textarea></div>';

  return $arg;
}
add_filter('comment_form_defaults', 'noteskine_comment_text');

/**
 * Support for Jetpack infinite scroll.
 */
function noteskine_infinite_scroll_init() {
	add_theme_support( 'infinite-scroll', array(
		'main'  => 'content'
	));
}
add_action( 'after_setup_theme', 'noteskine_infinite_scroll_init' );

/**
 * Register four custom buttons in visual post editor.
 */
add_action('init', 'noteskine_buttons');
function noteskine_buttons() {
     add_filter('mce_external_plugins', 'noteskine_add_buttons');
     add_filter('mce_buttons', 'noteskine_register_buttons');
}

function noteskine_add_buttons($plugin_array) {
   $plugin_array['noteskine_plugin'] = get_template_directory_uri().'/js/buttons-plugin.js';
   return $plugin_array;
}

function noteskine_register_buttons($buttons) {
   array_push($buttons, 'drop-cap', 'pull-quote-left', 'pull-quote-right', 'box');
   return $buttons;
}

/**
 * Convert hex color to rgba color.
 */
function noteskine_hex2rgb($hex, $opacity = "1") {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }

   echo 'rgba('. $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
}

/**
 * Replaces the excerpt [...] by a 'Continue' link.
 */
function noteskine_new_excerpt_more($more) {
    global $post;
	return '...<br><br><a class="more-link" href="'. get_permalink($post->ID) . '">' . __( 'Continue', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i></a>';
}
add_filter('excerpt_more', 'noteskine_new_excerpt_more');

function noteskine_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv-printshiv.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'noteskine_ie_html5_shim');

/**
 * Add Noteskine dashboard page.
 */
 require get_template_directory() . '/inc/dashboard-page.php';
?>
