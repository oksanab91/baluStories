<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Noteskine
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php /* Start the Loop. */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php if ( get_theme_mod('noteskine_related_posts') == true ) : ?>
				<?php noteskine_related_posts(); ?>
			<?php endif; ?>

			<?php comments_template(); ?>

		<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
