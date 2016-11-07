<?php
/**
* The template for displaying Archive pages.
*
* Used to display archive-type pages if nothing more specific matches a query.
*
* @package Noteskine
*/

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
					<?php
						if ( is_day() ) :
							// Header for daily archives.
							printf( '<i class="fa fa-calendar-o"></i>&nbsp;' . __( 'Daily Archives: %s', 'noteskine' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							// Header for montchly archives.
							printf( '<i class="fa fa-calendar-o"></i>&nbsp;' . __( 'Monthly Archives: %s', 'noteskine' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'noteskine' ) ) . '</span>' );

						elseif ( is_year() ) :
							// Header for yearly archives.
							printf( '<i class="fa fa-calendar-o"></i>&nbsp;' . __( 'Yearly Archives: %s', 'noteskine' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'noteskine' ) ) . '</span>' );

						else :
							// Header for other archives.
							_e( 'Archives', 'noteskine' );

						endif;
					?>
				</h1>
			</header><!-- .archive-header -->

			<?php /* The loop. */ ?>
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
