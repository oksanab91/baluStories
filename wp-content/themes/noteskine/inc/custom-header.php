<?php
/**
 * Implement Custom Header functionality.
 *
 * @package Noteskine
 */

function noteskine_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'noteskine_custom_header_args', array(
		'default-text-color'     => 'fff',
		'width'                  => 0,
		'height'                 => 42,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'noteskine_header_style',
		'admin-head-callback'    => 'noteskine_admin_header_style',
		'admin-preview-callback' => 'noteskine_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'noteskine_custom_header_setup' );

if ( ! function_exists( 'noteskine_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see twentyfourteen_custom_header_setup().
 *
 */
function noteskine_header_style() {
	$text_color = get_header_textcolor();

	// If no custom color for text is set, let's bail.
	if ( display_header_text() && $text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="noteskine-header-css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		#site-title {
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php
		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		#site-title a {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // twentyfourteen_header_style


if ( ! function_exists( 'noteskine_admin_header_style' ) ) :
/**
 * Style the header image displayed on the Appearance > Header screen.
 */
function noteskine_admin_header_style() {
?>
	<style type="text/css" id="noteskine-admin-header-css">
	.appearance_page_custom-header #headimg {
		background-color: transparent;
		border: none;
		max-width: 640px;
		max-height: 42px;
	}
	#headimg h1 {
		font-family: Kaushan Script, Lato, sans-serif;
		font-size: 24px;
		line-height: 42px;
		margin: 0 0 0 10px;
	}
	#headimg h1 a {
		color: #fff;
		text-decoration: none;
	}
	#headimg img {
		height: 42px;
	}
	</style>
<?php
}
endif; // twentyfourteen_admin_header_style

if ( ! function_exists( 'noteskine_admin_header_image' ) ) :
/**
 * Create the custom header image markup displayed on the Appearance > Header screen.
 */
function noteskine_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo sprintf( 'style="color:#%s;"', get_header_textcolor() ); ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
<?php
}
endif; // noteskine_admin_header_image
?>
