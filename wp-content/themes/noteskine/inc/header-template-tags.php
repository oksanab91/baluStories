<?php
/**
 * Custom template tags for noteskine theme header.
 *
 * This file is part of "template-tags.php".
 *
 * @package Noteskine
 */

 if ( ! function_exists( 'noteskine_header_menu' ) ) :
/**
 * Display Header Menu with toggle effect.
 *
 * Used in "header.php".
 *
 * Requires "menu.js" to run toggle effect.
 */
function noteskine_header_menu() { ?>
	<!-- Header Menu with toggle effect. -->
	<nav id="primary-navigation" class="site-navigation" role="navigation">

		<!-- Sreen readers support. -->
		<h3 class="menu-toggle"><?php _e( 'Menu', 'noteskine' ); ?></h3>
		<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'noteskine' ); ?>"><?php _e( 'Skip to content', 'noteskine' ); ?></a>

		<!-- "Toggle Menu" elements. -->
		<div class="toggle-menu">
			<!-- Menu Button. -->
			<div class="toggle">
				<i class="fa fa-bars"></i>
				<i class="fa fa-times"></i>
			</div>
			<!-- Header Menu. -->
			<div id="header-menu">
				<?php wp_nav_menu( array( 'theme_location'  => 'header_menu', 'menu_class' => 'nav-menu') ); ?>
			</div>
		</div>

	</nav><!-- #primary-navigation -->
<?php
}
endif;

if ( ! function_exists( 'noteskine_header_search_box' ) ) :
/**
 * Display Header Search Box with toggle effect.
 *
 * Used in "header.php".
 *
 * Requires "search.js" to run toggle effect.
 */
function noteskine_header_search_box() {
	// Display search box if it's enabled in theme customizer.
	if ( get_theme_mod( 'noteskine_header_search' ) == true ) { ?>
		<!-- Header search box with toggle effect. -->
		<div id="top-search">
			<!-- "Toggle search box" elements. -->
			<div class="toggle-search">
				<!-- Search button. -->
				<div class="toggle">
					<i class="fa fa-search"></i>
					<i class="fa fa-times"></i>
				</div>
				<!-- Search box -->
				<div class="top-search-box">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	<?php }
}
endif;

if ( ! function_exists( 'noteskine_header_navigation' ) ) :
/**
 * Display header navigation including "Post Navigation" & "Top-Bottom Navigation".
 *
 * Used in "header.php".
 *
 * Requires "titles.js" to display titles of previous/next posts
 * and "top-bottom.js" to scroll up and down.
 */
function noteskine_header_navigation() {
	//Post navigation buttons only on single post.
	if( is_single() && !is_attachment() && get_theme_mod( 'noteskine_post_navigation' ) == true ) { ?>

		<nav id="post-navigation" class="post-navigation" role="navigation">

			<div id="post-buttons">

				<!-- Older post link -->
				<?php previous_post_link('%link', '<i class="fa fa-angle-left"></i><span class="post-nav-text">&nbsp;' . __( 'Older', 'noteskine' ) . '</span>'); ?>

				<!-- Random post link -->
				<?php
				$args = array('orderby' => 'rand', 'type'=>'post', 'posts_per_page'=>1);
				$post = get_posts($args);
				$random_post_url = get_permalink($post[0]->ID);
				?>
				<a href="<?php echo $random_post_url; ?>" ><?php echo '<i class="fa fa-random"></i><span class="post-nav-text">&nbsp;' . __( 'Random', 'noteskine') . '</span>';?></a>

				<!-- Newer post link -->
				<?php next_post_link('%link', '<span class="post-nav-text">' . __( 'Newer' , 'noteskine' ). '&nbsp;</span><i class="fa fa-angle-right"></i>'); ?>

			</div>

			<!-- Older post title -->
			<div id="prev-title">
				<?php previous_post_link( '%link' ); ?>
			</div>

			<!-- Newer post title -->
			<div id="next-title">
				<?php next_post_link( '%link' ); ?>
			</div>

		</nav>
	<?php }

	//"Back to top" & "Go to pagination" arrows displayed on archive pages.
	if ( ! is_single() && ! is_page() && ! is_attachment() && get_theme_mod( 'noteskine_top_bottom_navigation' ) == true ) {
	?>
		<!-- "Back to top" button -->
		<nav id="top-button" class="top-button" role="navigation">
			<a href="#" class="top-scroll"><i class="fa fa-step-forward"></i></a>
		</nav>

		<!-- "Go to pagination" button -->
		<nav id="bottom-button" class="bottom-button" role="navigation">
			<a href="#" class="bottom-scroll"><i class="fa fa-step-backward"></i></a>
		</nav>

	<?php }
}
endif;

if ( ! function_exists( 'noteskine_reading_progress' ) ) :
/**
 * Display "Reading Progress Bar" under site header.
 *
 * Used in header.php.
 *
 * Requires "reading-progress.js" to calculate reading progress.
 */
function noteskine_reading_progress() {
	if ( (get_theme_mod( 'noteskine_reading_progress' ) == true ) && is_single() ) { ?>
		<progress id="reading-progress" value="0"></progress>
	<?php }
}
endif; ?>
