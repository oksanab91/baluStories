<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package Noteskine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); noteskine_featured_image_background(); ?>>

	<?php /* Ribbon for sticky posts. */ ?>
	<?php noteskine_sticky(); ?>

	<?php if ( ! is_single() ) : ?>

		<!-- Semitransparent container for content -->
		<div class="quote-container aside-quote-status">

			<!-- Permalink to single post. -->
			<a class="permalink" href="<?php the_permalink(); ?>" rel="bookmark"></a>

			<div class="entry-content">
				<?php
					// Post date.
					noteskine_top_date();

					// Post Content.
					the_content( __( 'Continue', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i>' );
				?>
			</div><!-- entry-content -->
		</div><!-- .aside-container -->

	<?php else: ?>

		<?php the_post_thumbnail( 'noteskine-full-width' ); ?>

		<div class="entry-content">
			<?php
				// Post date.
				noteskine_top_date();

				// Post Content.
				the_content( __( 'Continue', 'noteskine' ) . '&nbsp<i class="fa fa-angle-right"></i>' );

				// Post pagination.
				wp_link_pages( array( 'before' => '<div class="page-links"><span>', 'after' => '</span></div>', 'next_or_number' => 'next', 'nextpagelink' => __( 'Next page', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i>', 'previouspagelink' => '<i class="fa fa-angle-left"></i>&nbsp;' . __( 'Previous page', 'noteskine' ) ) );
			?>
		</div><!-- entry-content -->

		<footer class="entry-meta">
			<?php noteskine_meta(); ?>
		</footer><!-- .entry-meta -->

	<?php endif; ?>

</article><!-- #post -->
