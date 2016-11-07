<?php
/**
 * The sidebar containing the footer widget area.
 *
 * Displayed on home & archive pages.
 *
 * If there are no active widgets in this sidebar, hide it completely.
 *
 * @package Noteskine
 */

if ( is_active_sidebar('first-footer-widget-area') || is_active_sidebar('second-footer-widget-area') || is_active_sidebar('third-footer-widget-area') ) : ?>

		<div class="footer-widgets" role="complementary">

			<div class="left-widget-area"><?php dynamic_sidebar( 'first-footer-widget-area' ); ?></div>

			<div class="middle-widget-area"><?php dynamic_sidebar( 'second-footer-widget-area' ); ?></div>

			<div class="right-widget-area"><?php dynamic_sidebar( 'third-footer-widget-area' ); ?></div>

		</div><!-- .footer-widgets -->

<?php endif; ?>
