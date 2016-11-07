<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 *
 * @package Noteskine
 */
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

		<?php /* The loop. */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>

			<?php comments_template(); ?>
		<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
