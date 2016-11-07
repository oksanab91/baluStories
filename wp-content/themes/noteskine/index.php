<?php
/**
 * The main template file.
 *
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package Noteskine
 */

get_header(); ?>

	<div id="primary" class="main-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* The loop. */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php noteskine_pagination(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
