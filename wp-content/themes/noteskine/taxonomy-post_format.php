<?php
/**
 * The template for displaying Post Format pages.
 *
 * Used to display archive-type pages for posts with a post format.
 *
 * @package Noteskine
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<!-- Display different archive headers depending on post format.  -->
			<header class="archive-header">
				<h1 class="archive-title">
					<?php
						// Header for ASIDE format.
						if ( is_tax( 'post_format', 'post-format-aside' ) ) :
							echo '<i class="fa fa-file-o"></i>&nbsp;' . __( 'Asides', 'noteskine' );

						// Header for STATUS format.
						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							echo '<i class="fa fa-comment-o"></i>&nbsp;' . __( 'Status', 'noteskine' );

						// Header for IMAGE format.
						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							echo '<i class="fa fa-picture-o"></i>&nbsp;' . __( 'Images', 'noteskine' );

						// Header for VIDEO format.
						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							echo '<i class="fa fa-film"></i>&nbsp;' . __( 'Videos', 'noteskine' );

						// Header for AUDIO format.
						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							echo '<i class="fa fa-music"></i>&nbsp;' . __( 'Audio', 'noteskine' );

						// Header for QUOTE format.
						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							echo '<i class="fa fa-quote-right"></i>&nbsp;' . __( 'Quotes', 'noteskine' );

						// Header for LINK format.
						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							echo '<i class="fa fa-link"></i>&nbsp;' . __( 'Links', 'noteskine' );

						// Header for GALLERY format.
						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							echo '<i class="fa fa-camera"></i>&nbsp;' . __( 'Galleries', 'noteskine' );

						// Header for not defined format.
						else :
							echo '' . __( 'Archives', 'noteskine' );

						endif;
					?>
				</h1>
			</header><!-- .archive-header -->

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php noteskine_pagination(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_footer(); ?>
