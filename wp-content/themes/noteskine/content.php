<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/search.
 *
 * @package Noteskine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php /* Ribbon for sticky posts. */ ?>
	<?php noteskine_sticky(); ?>

	<?php the_post_thumbnail( 'noteskine-full-width' ); ?>

	<header class="entry-header">

		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		<?php endif; // is_single() ?>

		<?php noteskine_top_date(); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( ! is_single() && get_theme_mod( 'noteskine_excerpt' ) == true ):
				// Post excerpt.
				the_excerpt();

			else:
				// Post content.
				the_content( __( 'Continue', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i>' );

				// Post pagination.
				wp_link_pages( array( 'before' => '<div class="page-links"><span>', 'after' => '</span></div>', 'next_or_number' => 'next', 'nextpagelink' => __( 'Next page', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i>', 'previouspagelink' => '<i class="fa fa-angle-left"></i>&nbsp;' . __( 'Previous page', 'noteskine' ) ) );

			endif;
		?>
	</div><!-- entry-content -->

	<?php if ( is_single() ) : ?>
		<footer class="entry-meta">
			<?php noteskine_meta(); ?>
		</footer><!-- .entry-meta -->
	<?php endif; // is_single() ?>

</article><!-- #post -->
