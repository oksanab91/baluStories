<?php
// Add customized css to site header.
function noteskine_customize_css() {

?>
	<style type="text/css">

		<?php
		/*
		 * 	Site Header
		 * ------------------------------------------------------------------------------------------------
		 */
		?>

		<?php // Display Tagline
		if ( get_theme_mod( 'noteskine_display_tagline' ) == false ) { ?>

			#tagline { display: none; }

		<?php } // end if ?>

		<?php // Header Text Color ?>

		.toggle,
		#header-menu li a,
		#post-navigation #post-buttons a,
		#prev-title a,
		#next-title a,
		a.bottom-scroll,
		a.top-scroll,
		#top-search input[type="search"] {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_header_text_color' ) ); ?>;
		}

		#top-search input[type="search"]::-webkit-input-placeholder {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_header_text_color' ) ); ?>;
		}

		#top-search input[type="search"],
		#post-navigation #post-buttons a {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_header_text_color' ) ); ?>;
		}

		#header-menu a:hover,
		#post-navigation #post-buttons a:hover {
			background-color:<?php echo esc_attr( get_theme_mod( 'noteskine_header_text_color' ) ); ?>;
		}

		<?php // Header Background Color & Opacity
		$hex = get_theme_mod( 'noteskine_header_background_color' );
		$opacity = get_theme_mod( 'noteskine_header_background_opacity' );
		?>

		#header-menu a:hover,
		#post-navigation #post-buttons a:hover {
			color:<?php echo esc_attr( $hex ); ?>;
		}

		#site-header,
		#header-menu ul ul li,
		#prev-title a,
		#next-title a {
			background-color:<?php esc_attr( noteskine_hex2rgb( $hex, $opacity ) ); ?>;
		}

		@media screen and (max-width: 960px) {
			#header-menu li { background-color:<?php esc_attr( noteskine_hex2rgb( $hex, $opacity ) ); ?>;	 }
		}

		<?php // Fixed Header
		if ( get_theme_mod( 'noteskine_fixed_header' ) == false ) { ?>

			#site-header { position: absolute; }

			#reading-progress { top: 0px; }

		<?php } // end if ?>

		<?php
		/*
		 * 	Hero Area
		 * ------------------------------------------------------------------------------------------------
		 */
		?>

		<?php // Hero Area Image Opacity ?>

			#hero-image img {
				opacity:<?php echo esc_attr( get_theme_mod( 'noteskine_hero_area_image_opacity' ) ); ?>;
			}

		<?php // Fixed Hero Area Image
		if ( get_theme_mod( 'noteskine_fixed_hero_image' ) == false ) { ?>
			#hero-image { position: absolute; }
		<?php } // end if ?>

		<?php
		/*
		 * 	Background
		 * ------------------------------------------------------------------------------------------------
		 */
		?>

		<?php // Hero Area Gradient Color ?>

		.gradient {
			background-image: -webkit-linear-gradient(top, transparent 0%, <?php echo esc_attr( get_theme_mod( 'noteskine_hero_gradient_color' ) ); ?> 100%);
			background-image: -moz-linear-gradient(top, transparent 0%, <?php echo esc_attr( get_theme_mod( 'noteskine_hero_gradient_color' ) ); ?> 100%);
			background-image: linear-gradient(top, transparent 0%, <?php echo esc_attr( get_theme_mod( 'noteskine_hero_gradient_color' ) ); ?> 100%);
		}

		<?php // Pagination Text Color - Hover ?>

		.pagination .current,
		.pagination .page-numbers:hover,
		#mobile-pagination a:hover {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_pagination_text_color_hover' ) ); ?>;
		}

		<?php // Background Text Color ?>

		#tagline,
		#social-links a,
		.archive-title,
		.archive-meta,
		.error404 .entry-title,
		.error404 .entry-content,
		input.search-field,
		.entry-content input[type="search"] {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_background_text_color' ) ); ?>;
		}

		.entry-content input[type="search"]::-webkit-input-placeholder {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_background_text_color' ) ); ?>;
		}

		.entry-content input[type="search"] {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_background_text_color' ) ); ?>;
		}

		.pagination ul > li > a,
		.pagination ul > li > span,
		#mobile-pagination span a {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_background_text_color' ) ); ?>;
		}

		.pagination ul > li > a,
		.pagination ul > li > span,
		#mobile-pagination span a {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_background_text_color' ) ); ?>;
		}

		.pagination .current,
		.pagination .page-numbers:hover,
		#mobile-pagination a:hover {
			background-color:<?php echo esc_attr( get_theme_mod( 'noteskine_background_text_color' ) ); ?>;
		}

		<?php // Display Box Shadows
		if ( false == get_theme_mod( 'noteskine_display_shadows' ) ) { ?>

			.content-box, #disqus_thread {
				-webkit-box-shadow: none;
				-moz-box-shadow:    none;
				box-shadow:         none;
			}

		<?php } // end if ?>

		<?php
		/*
		 * 	Post
		 * ------------------------------------------------------------------------------------------------
		 */
		?>

		<?php // Accent Color ?>

		h1, h2, h3, h4, h5, h6,
		.noteskine-dropcap,
		.noteskine-pull-quote-left,
		.noteskine-pull-quote-right,
		.entry-content a.more-link,
		#reading-progress,
		.entry-title,
		.entry-title a,
		.entry-content a,
		.comment-author a,
		.comment-text a,
		.comment-footer a,
		.pingback a,
		#cancel-comment-reply-link,
		.must-log-in a,
		.logged-in-as a,
		.form-submit #submit {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_accent_color' ) ); ?>;
		}

		blockquote,
		.entry-content a.more-link,
		.entry-content a.more-link:hover,
		a.external-link,
		a.external-link:hover,
		.form-submit #submit,
		.form-submit #submit:hover {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_accent_color' ) ); ?>;
		}

		.sticky .ribbon,
		.entry-content .noteskine-box,
		.entry-content a.more-link:hover,
		.entry-title a:hover,
		.entry-content a:hover,
		a.external-link:hover,
		.related li:hover,
		.comment-author a:hover,
		.comment-text a:hover,
		.comment-footer a:hover,
		.pingback a:hover,
		#cancel-comment-reply-link:hover,
		.must-log-in a:hover,
		.logged-in-as a:hover,
		.form-submit #submit:hover {
			background-color:<?php echo esc_attr( get_theme_mod( 'noteskine_accent_color' ) ); ?>;
		}

		progress::-moz-progress-bar {
			background-color:<?php echo esc_attr( get_theme_mod( 'noteskine_accent_color' ) ); ?>;
		}

		progress::-webkit-progress-value {
			background-color:<?php echo esc_attr( get_theme_mod( 'noteskine_accent_color' ) ); ?>;
		}

		<?php // Main Text Color ?>

		body,
		.top-date,
		.top-date a,
		.entry-content,
		.related .title,
		.comments-title,
		#reply-title {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_main_text_color' ) ); ?>;
		}

		<?php // Secondary Text Color ?>

		blockquote,
		.entry-meta,
		.entry-meta a,
		.page-links span a,
		.comment-time,
		.waiting,
		.pingback,
		.logged-in-as,
		.must-log-in,
		.comment-notes,
		.comment-form-author label[for="author"],
		.comment-form-email label[for="email"],
		.comment-form-url label[for="url"],
		.comment-form-comment label[for="comment"],
		#comment-nav span a {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_secondary_text_color' ) ); ?>;
		}

		table,
		th,
		td,
		.page-links span a,
		#comment-nav span a {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_secondary_text_color' ) ); ?>;
		}

		hr,
		.entry-meta a:hover,
		.page-links span a:hover,
		#comment-nav span a:hover {
			background:<?php echo esc_attr( get_theme_mod( 'noteskine_secondary_text_color' ) ); ?>;
		}

		<?php // Aside Gradient & text Colors
		$hex1 = get_theme_mod( 'noteskine_aside_1st_color' );
		$hex2 = get_theme_mod( 'noteskine_aside_2nd_color' );
		?>

		.aside-container *,
		.aside-container .entry-content a,
		.aside-container .entry-content a:hover,
		.aside-container .entry-content a.more-link,
		.aside-container .entry-content a.more-link:hover {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_aside_text_color' ) ); ?>;
		}

		.aside-container *,
		.aside-container .entry-content a,
		.aside-container .entry-content a:hover,
		.aside-container .entry-content a.more-link,
		.aside-container .entry-content a.more-link:hover {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_aside_text_color' ) ); ?>;
		}

		.aside-container .entry-content a.more-link:hover {
			background: -webkit-linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex2, 0.5 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex1, 0.5 ) ); ?> );
			background: linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex1, 0.5 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex2, 0.5 ) ); ?> );
		}

		.aside-container {
			background: -webkit-linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex2, 0.9 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex1, 0.9 ) ); ?> );
			background: linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex1, 0.9 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex2, 0.9 ) ); ?> );
		}

		<?php // Aside Text Shadow
		if ( get_theme_mod( 'noteskine_aside_text_shadow' ) == false ) { ?>

			.aside-container * { text-shadow: none; }

		<?php } // end if ?>

		<?php // Quote Gradient & text Colors
		$hex1 = get_theme_mod( 'noteskine_quote_1st_color' );
		$hex2 = get_theme_mod( 'noteskine_quote_2nd_color' );
		?>

		.quote-container *,
		.quote-container .entry-content a,
		.quote-container .entry-content a:hover,
		.quote-container .entry-content a.more-link,
		.quote-container .entry-content a.more-link:hover {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_quote_text_color' ) ); ?>;
		}

		.quote-container *,
		.quote-container .entry-content a,
		.quote-container .entry-content a:hover,
		.quote-container .entry-content a.more-link,
		.quote-container .entry-content a.more-link:hover {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_quote_text_color' ) ); ?>;
		}

		.quote-container .entry-content a.more-link:hover {
			background: -webkit-linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex2, 0.5 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex1, 0.5 ) ); ?> );
			background: linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex1, 0.5 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex2, 0.5 ) ); ?> );
		}

		.quote-container {
			background: -webkit-linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex2, 0.9 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex1, 0.9 ) ); ?> );
			background: linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex1, 0.9 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex2, 0.9 ) ); ?> );
		}

		<?php // Quote Text Shadow
		if ( get_theme_mod( 'noteskine_quote_text_shadow' ) == false ) { ?>

			.quote-container * { text-shadow: none; }

		<?php } // end if ?>

		<?php // Status Gradient & text Colors
		$hex1 = get_theme_mod( 'noteskine_status_1st_color' );
		$hex2 = get_theme_mod( 'noteskine_status_2nd_color' );
		?>

		.status-container *,
		.status-container .entry-content a,
		.status-container .entry-content a:hover,
		.status-container .entry-content a.more-link,
		.status-container .entry-content a.more-link:hover {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_status_text_color' ) ); ?>;
		}

		.status-container *,
		.status-container .entry-content a,
		.status-container .entry-content a:hover,
		.status-container .entry-content a.more-link,
		.status-container .entry-content a.more-link:hover {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_status_text_color' ) ); ?>;
		}

		.status-container .entry-content a.more-link:hover {
			background: -webkit-linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex2, 0.5 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex1, 0.5 ) ); ?> );
			background: linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex1, 0.5 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex2, 0.5 ) ); ?> );
		}

		.status-container {
			background: -webkit-linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex2, 0.9 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex1, 0.9 ) ); ?> );
			background: linear-gradient( 135deg,<?php esc_attr( noteskine_hex2rgb( $hex1, 0.9 ) ); ?>, <?php esc_attr( noteskine_hex2rgb( $hex2, 0.9 ) ); ?> );
		}

		<?php // Status Text Shadow
		if( get_theme_mod( 'noteskine_status_text_shadow' ) == false ) { ?>

			.status-container * { text-shadow: none; }

		<?php } // end if ?>

		<?php // Display Top Date
		if( get_theme_mod( 'noteskine_display_top_date' ) == false ) { ?>

			.top-date { display: none; }

		<?php } // end if ?>

		<?php
		/*
		 * 	Site Footer
		 * ------------------------------------------------------------------------------------------------
		 */
		?>

		<?php // Footer Text Color ?>

		.widget-container,
		.widget-container a:hover,
		.widget-title,
		.widget_search input[type="search"],
		#colophon,
		#footer-menu li a {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_footer_text_color' ) ); ?>;
		}

		.widget_search input[type=search]::-webkit-input-placeholder {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_footer_text_color' ) ); ?>;
		}

		.footer-widgets,
		.widget-title,
		.widget_search input[type=search] {
			border-color:<?php echo esc_attr( get_theme_mod( 'noteskine_footer_text_color' ) ); ?>;
		}

		.widget-container .tagcloud a:hover,
		#footer-menu li a:hover {
			background-color:<?php echo esc_attr( get_theme_mod( 'noteskine_footer_text_color' ) ); ?>
		}

		<?php // Footer Accent Color ?>

		.widget-container a {
			color:<?php echo esc_attr( get_theme_mod( 'noteskine_footer_accent_color' ) ); ?>;
		}

		.widget-container .tagcloud a {
			background-color:<?php echo esc_attr( get_theme_mod( 'noteskine_footer_accent_color' ) ); ?>;
		}

		<?php // Footer Background Color
		$hex = get_theme_mod( 'noteskine_footer_background_color' );
		$opacity = get_theme_mod( 'noteskine_footer_opacity' );
		?>

		.widget-container .tagcloud a,
		.widget-container .tagcloud a:hover,
		#footer-menu li a:hover {
			color:<?php echo esc_attr( $hex ); ?>;
		}

		#footer-wrapper {
			background-color:<?php esc_attr( noteskine_hex2rgb( $hex, $opacity ) ); ?>;
		}

		<?php
		/*
		 * 	Typography
		 * ------------------------------------------------------------------------------------------------
		 */
		?>

		<?php // Font Family ?>
		#site-title,
		#tagline,
		.archive-title,
		.entry-title,
		.comments-title,
		article,
		.archive-meta,
		.comment-content,
		#respond {
			font-family:<?php echo esc_attr( get_theme_mod( 'noteskine_font_family' ) ); ?>;
		}

	</style>

	<?php // Display Favicon.
	$favicon = get_theme_mod( 'noteskine_upload_favicon' );

	if ( ! empty( $favicon ) ) : ?>
		<link rel="icon" href="<?php echo esc_url( $favicon ); ?>" />
	<?php endif;

	// Insert Google Analytics Code.
	$analytics = esc_attr( get_theme_mod( 'noteskine_google_analytics' ) );

	if ( ! empty( $analytics ) ) : ?>
		<script>
 			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  			ga('create', '<?php echo $analytics; ?>', 'auto');
  			ga('send', 'pageview');

		</script>
	<?php endif;
}
add_action( 'wp_head', 'noteskine_customize_css' );
?>
