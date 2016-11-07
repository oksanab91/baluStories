<?php
/**
 * The Header for Noteskine Theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Noteskine
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
	<div id="page" class="hfeed site">

	<header id="site-header">
		<div id="wrapper">

			<!-- Site title & logo. -->
			<div id="branding">
				<?php if(! get_header_image()): ?>

					<!-- Site title if there is no image. -->
					<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

				<?php else: ?>

					<!-- Logo image if it is uploaded. -->
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"  rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					</a>

				<?php endif; ?>
			</div><!-- #branding -->

			<?php noteskine_header_menu(); ?>

			<?php noteskine_header_search_box(); ?>

			<?php noteskine_header_navigation(); ?>

		</div><!-- #wrapper -->
	</header><!-- #site-header -->

	<?php noteskine_reading_progress(); ?>

	<?php noteskine_hero_area(); ?>

	<div id="main" class="site-main">
