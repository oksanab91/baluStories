<?php
/**
 * Custom template tags for noteskine theme hero area.
 *
 * This file is part of "template-tags.php".
 *
 * @package Noteskine
 */

if ( ! function_exists( 'noteskine_hero_area' ) ) :
/**
 * Display hero area image, blog description & social media links.
 *
 * Used in header.php.
 */
function noteskine_hero_area() { ?>
	<div id="hero-image">

		<?php if ( get_theme_mod( 'noteskine_upload_hero_area_image' ) && ( get_theme_mod( 'noteskine_hide_hero_image' ) == false ) ) { ?>

			<?php if ( get_theme_mod( 'noteskine_single_hero_image' ) == false ) { ?>
				<img src="<?php echo esc_url( get_theme_mod( 'noteskine_upload_hero_area_image' ) ); ?>"/>
			<?php } elseif ( ! is_single() && ! is_page() ) { ?>
				<img src="<?php echo esc_url( get_theme_mod( 'noteskine_upload_hero_area_image' ) ); ?>"/>
			<?php } //end if single ?>

			<?php if ( get_theme_mod( 'noteskine_display_hero_gradient' ) == true ) { ?>
				<div class="gradient"></div>
			<?php } //end if gradient ?>

		<?php } //end if image ?>

	</div><!-- #hero-image -->

	<div id="hero-area">
		<?php if ( is_home() && ! is_paged() ): ?>
			<!-- Blog description in hero area. -->
			<span id="tagline"><?php bloginfo( 'description' ); ?></span>

			<!-- Social media links in hero area -->
			<?php if ( get_theme_mod( 'noteskine_display_social_buttons' ) == true ) { ?>
				<div id="social-links">

					<?php // Facebook link
					if ( get_theme_mod( 'facebook' ) ) { ?>
						<a id="facebook-link" href="<?php echo esc_url( get_theme_mod('facebook') ); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a>
					<?php } // end if ?>

					<?php // Twitter link
					if ( get_theme_mod( 'twitter' ) ) { ?>
						<a id="twitter-link" href="<?php echo esc_url( get_theme_mod('twitter') ); ?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
					<?php } // end if ?>

					<?php // Google Plus link
					if ( get_theme_mod( 'google_plus' ) ) { ?>
						<a id="google-plus-link" href="<?php echo esc_url( get_theme_mod('google_plus') ); ?>" target="_blank"><i class="fa fa-google-plus-square"></i></a>
					<?php } // end if ?>

					<?php // Youtube link
					if ( get_theme_mod( 'youtube' ) ) { ?>
						<a id="youtube-link" href="<?php echo esc_url( get_theme_mod('youtube') ); ?>" target="_blank"><i class="fa fa-youtube-square"></i></a>
					<?php } // end if ?>

					<?php // Pinterest link
					if ( get_theme_mod( 'pinterest' ) ) { ?>
						<a id="pinterest-link" href="<?php echo esc_url( get_theme_mod('pinterest') ); ?>" target="_blank"><i class="fa fa-pinterest-square"></i></a>
					<?php } // end if ?>

					<?php // Instagram link
					if ( get_theme_mod( 'instagram' ) ) { ?>
						<a id="instagram-link" href="<?php echo esc_url( get_theme_mod('instagram') ); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
					<?php } // end if ?>

					<?php // Linkedin link
					if ( get_theme_mod( 'linkedin' ) ) { ?>
						<a id="linkedin-link" href="<?php echo esc_url( get_theme_mod('linkedin') ); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a>
					<?php } // end if ?>

					<?php // Tumblr link
					if ( get_theme_mod( 'tumblr' ) ) { ?>
						<a id="tumblr-link" href="<?php echo esc_url( get_theme_mod('tumblr') ); ?>" target="_blank"><i class="fa fa-tumblr-square"></i></a>
					<?php } // end if ?>

					<?php // RSS link
					if ( get_theme_mod( 'rss' ) ) { ?>
						<a id="tumblr-link" href="<?php echo esc_url( get_theme_mod('tumblr') ); ?>" target="_blank"><i class="fa fa-tumblr-square"></i></a>
					<?php } // end if ?>

				</div><!-- #social-links -->
			<?php } ?>

		<?php endif; // is home ?>
	</div><!-- #hero-area -->
<?php
}
endif; ?>
