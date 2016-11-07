<?php
/**
 * Template Name: Archives Template
 *
 * @package Noteskine
 */
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_post_thumbnail('full-width'); ?>

				<h1 class="entry-title"><?php the_title(); ?></h1>

				<div class="entry-content">

					<?php the_content(); ?>

					<h2><?php echo __( 'Latest 50 posts', 'noteskine' ); ?></h2>
					<?php wp_get_archives( array(
						'type' => 'postbypost',
						'limit' => '50',
						) );
					?>

				</div><!-- entry-content -->

			</article><!-- #post -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
