<?php
/**
 * The template used for displaying page content in page.php.
 *
 * @package Noteskine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_post_thumbnail( 'noteskine-full-width' ); ?>

	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			// Page content.
			the_content();

			// Page pagination.
			wp_link_pages( array( 'before' => '<div class="page-links"><span>', 'after' => '</span></div>', 'next_or_number' => 'next', 'nextpagelink' => __( 'Next page', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i>', 'previouspagelink' => '<i class="fa fa-angle-left"></i>&nbsp;' . __( 'Previous page', 'noteskine' ) ) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'noteskine' ), '<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>' ); ?>
	</footer><!-- .entry-meta -->

</article><!-- #post -->
