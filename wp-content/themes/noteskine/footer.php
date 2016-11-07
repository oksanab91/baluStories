<?php
/**
* The template for displaying the footer.
*
* Contains footer content and the closing of the #main and #page div elements.
*
* @package Noteskine
*/
?>
	</div><!-- #main -->

	<footer id="fat-footer" class="site-footer" role="contentinfo">
		<div id="footer-wrapper">

			<?php if ( get_theme_mod( 'noteskine_hide_widget_area' ) == false && ! is_single() && ! is_page() ) : ?>

				<?php get_sidebar(); ?>

			<?php endif; ?>

			<!-- Copyright message and footer menu. -->
			<div id="colophon">

				<div id="copyright-message">
					<p>&copy;&nbsp;<?php echo date( 'Y' ); ?>&nbsp;<?php bloginfo( 'title' ); ?>&nbsp;<?php echo esc_attr( get_theme_mod( 'noteskine_copyright_text' ) ); ?></p>
				</div><!-- #copyright-message -->

				<?php if ( get_theme_mod( 'noteskine_hide_footer_menu' ) == false ) : ?>
					<div id="footer-menu">
						<?php wp_nav_menu(array('theme_location' => 'footer_menu', 'menu_class' => 'nav-menu') ); ?>
					</div><!-- #footer-menu -->
				<?php endif; ?>

			</div><!-- #colophon -->

		</div><!-- #footer-wrapper -->
	</footer><!-- #fat-footer -->
</div><!-- #page -->

<?php wp_footer() ?>

</body>
</html>
