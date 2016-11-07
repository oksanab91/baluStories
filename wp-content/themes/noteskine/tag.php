<?php
/**
* The template for displaying Tag pages.
*
* Used to display archive-type pages for posts in a tag.
*
* @package Noteskine
*/

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="archive-header">

				<h1 class="archive-title"><?php printf( '<i class="fa fa-tag"></i>&nbsp;' . __( 'Tag: %s', 'noteskine' ), single_tag_title( '', false ) ); ?></h1>

				<?php if ( tag_description() ) : // Show an optional tag description ?>
					<div class="archive-meta"><?php echo tag_description(); ?></div>
				<?php endif; ?>

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
