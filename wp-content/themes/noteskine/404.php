<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Noteskine
 */

get_header(); ?>

	<div id="primary" class="main-content">
		<div id="content" class="site-content" role="main">

			<header class="entry-header">
				<h1 class="entry-title"><?php _e( 'Not Found', 'noteskine' ); ?></h1>
			</header>

			<div class="entry-content">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'noteskine' ); ?></p>

				<?php get_search_form(); ?>
			</div><!-- .entry-content -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
