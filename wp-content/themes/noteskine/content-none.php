<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package Noteskine
 */
?>

<article id="post-0" class="post error404 no-results not-found">

	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Content Not Found', 'noteskine' ); ?></h1>
	</header>

	<div class="entry-content">

		<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'noteskine' ); ?></p>

		<?php get_search_form(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-0 -->
