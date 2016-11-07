(function( $ ) {
	"use strict";

	//	Tagline
	wp.customize( 'noteskine_display_tagline', function( value ) {
        value.bind( function( newval ) {
            false === newval ? $('#tagline').hide() : $('#tagline').show();
		});
    });

	// Header Text Color
	wp.customize( 'noteskine_header_text_color', function( value ) {
        value.bind( function( newval ) {

			$( '.toggle, #header-menu li a,	#post-navigation #post-buttons a, #prev-title a, #next-title a, a.bottom-scroll, a.top-scroll, #top-search input[type="search"]' ).css( 'color', newval );

			$( '#top-search input[type="search"], #post-navigation #post-buttons a' ).css( 'border-color', newval );

			$( '#header-menu a, #post-navigation #post-buttons a' ).mouseover(function() {
				$(this).css( 'background-color', newval );
				$(this).css( 'color', '#ebebeb');
				}).mouseout(function() {
				$(this).css( 'background-color', 'transparent');
				$(this).css( 'color', newval);
			});
	    });
    });

	// Header Background Color
	wp.customize( 'noteskine_header_background_color', function( value ) {
        value.bind( function( newval ) {
			$( '#site-header, #header-menu ul ul li,	#prev-title a, #next-title a' ).css('background-color', newval );
		});
    });

	// Display Search Box
	wp.customize( 'noteskine_header_search', function( value ) {
        value.bind( function( newval ) {
            false === newval ? $('#top-search').hide() : $('#top-search').show();
		});
    });

	// Display Top-Bottom Navigation
	wp.customize( 'noteskine_top_bottom_navigation', function( value ) {
        value.bind( function( newval ) {
            false === newval ? $('#top-button a, #bottom-button a').hide() : $('#top-button a, #bottom-button a').show();
		});
    });

	// Display Posts Navigation
	wp.customize( 'noteskine_post_navigation', function( value ) {
        value.bind( function( newval ) {
            false === newval ? $('#post-navigation').hide() : $('#post-navigation').show();
		});
    });

	// Fixed Header
	wp.customize( 'noteskine_fixed_header', function( value ) {
        value.bind( function( newval ) {
			if ( newval === false ){
				$( '#site-header' ).css( 'position', 'absolute' );
				$( '#reading-progress ' ).css( 'margin-top', '0px' );

			}
			else {
				$( '#site-header' ).css( 'position', 'fixed' );
				$( '#reading-progress ' ).css( 'margin-top', '42px' );

			}
		});
    });

	// Hero Area Image Opacity
	wp.customize( 'noteskine_hero_area_image_opacity', function( value ) {
        value.bind( function( newval ) {
			$( '#hero-image img' ).css( 'opacity', newval );
		});
    });

	// Fixed Hero Area Image
	wp.customize( 'noteskine_fixed_hero_image', function( value ) {
        value.bind( function( newval ) {
			if ( newval === false ){
				$( '#hero-image' ).css( 'position', 'absolute' );
			}
			else {
				$( '#hero-image' ).css( 'position', 'fixed' );
			}
		});
    });

	// Hide Hero Area Image on Single Post
	wp.customize( 'noteskine_single_hero_image', function( value ) {
        value.bind( function( newval ) {
			false === newval ? $('.page #hero-image, .single #hero-image').show() : $('.page #hero-image, .single #hero-image').hide();
		});
    });

	// Hide Hero Area Image
	wp.customize( 'noteskine_hide_hero_image', function( value ) {
        value.bind( function( newval ) {
			false === newval ? $('#hero-image').show() : $('#hero-image').hide();
		});
    });

	// Display Gradient on Hero Image Color
	wp.customize( 'noteskine_display_hero_gradient', function( value ) {
		value.bind( function( newval ) {
			false === newval ? $('.gradient').hide() : $('.gradient').show();
		});
	});

	// Hero Area Gradient Color
	wp.customize( 'noteskine_hero_gradient_color', function( value ) {
        value.bind( function( newval ) {
			$('.gradient').css('background', '-webkit-linear-gradient(top, transparent 0%, ' + newval + ' 100%)');
			$('.gradient').css('background', '-moz-linear-gradient(top, transparent 0%, ' + newval + ' 100%)');
			$('.gradient').css('background', 'linear-gradient(top, transparent 0%, ' + newval + ' 100%)');
		});
    });

	// Social buttons
	wp.customize( 'noteskine_display_social_buttons', function( value ) {
        value.bind( function( newval ) {
			false === newval ? $('#social-links').hide() : $('#social-links ').show();
		});
    });

	// Background Text Color
	wp.customize( 'noteskine_background_text_color', function( value ) {
        value.bind( function( newval ) {
			$( '#tagline, #social-links a, .archive-title, .archive-meta, .error404 .entry-title, .error404 .entry-content, input.search-field,	.entry-content input[type="search"]' ).css( 'color', newval );

			$( '.entry-content input[type="search"]' ).css( 'border-color', newval );
		});
    });

	// Pagination Color
	wp.customize( 'noteskine_background_text_color', function( value ) {
        value.bind( function( newval ) {
			$( '.pagination ul > li > a, .pagination ul > li > span, #mobile-pagination span a' ).css( 'color', newval );

			$( '.pagination ul > li > a, .pagination ul > li > span, #mobile-pagination span a' ).css( 'border-color', newval );

			$( '.pagination .current' ).css( 'background-color', newval );
			$( '.pagination .current' ).css( 'color', '#fff' );

			$( '.pagination .page-numbers, #mobile-pagination a' ).mouseover(function() {
				$( this ).css( 'background-color', newval );
				$( this ).css( 'color', '#fff' );
			}).mouseout(function() {
				$( this ).css( 'background-color', 'transparent');
				$( '.pagination .current' ).css( 'background-color', newval );
				$( this ).css( 'color', newval );
			});
		});
    });

	// Display Box Shadows
	wp.customize( 'noteskine_display_shadows', function( value ) {
        value.bind( function( newval ) {
            if ( newval === false ){
				$( '.content-box, #disqus_thread' ).css( '-webkit-box-shadow', 'none' );
				$( '.content-box, #disqus_thread' ).css( '-moz-box-shadow', 'none' );
				$( '.content-box, #disqus_thread' ).css( 'box-shadow', 'none' );
			}
			else {
				$( '.content-box, #disqus_thread' ).css( '-webkit-box-shadow', '0px 3px 10px 0px rgba(50, 50, 50, 0.5)' );
				$( '.content-box, #disqus_thread' ).css( '-moz-box-shadow', '0px 3px 10px 0px rgba(50, 50, 50, 0.5)' );
				$( '.content-box, #disqus_thread' ).css( 'box-shadow', '0px 3px 10px 0px rgba(50, 50, 50, 0.5)' );
			}
		});
    });

	// Accent Color
	wp.customize( 'noteskine_accent_color', function( value ) {
        value.bind( function( newval ) {

			$( '.entry-content h1, .entry-content h2, .entry-content h3, .entry-content h4, .entry-content h5, .entry-content h6, .noteskine-dropcap, .noteskine-pull-quote-left, .noteskine-pull-quote-right, .entry-content a.more-link, #reading-progress, .entry-title, .entry-title a, .entry-content a, .comment-author a, .comment-text a, .comment-footer a, .pingback a, #cancel-comment-reply-link, .must-log-in a, .logged-in-as a, .form-submit #submit' ).css( 'color', newval );

			$( 'blockquote, .entry-content a.more-link, a.external-link, .form-submit #submit' ).css( 'border-color', newval );

			$( '.sticky .ribbon, .entry-content .noteskine-box' ).css( 'background-color', newval );

			$( '.entry-content a.more-link, .entry-title a, .entry-content a, a.external-link, .related li, .comment-author a, .comment-text a, .comment-footer a, .pingback a, #cancel-comment-reply-link, .must-log-in a, .logged-in-as a, .form-submit #submit' ).mouseover(function() {
				$(this).css( 'background-color', newval );
				$(this).css( 'color', '#fff' );
			}).mouseout(function() {
				$(this).css( 'background-color', 'transparent');
				$(this).css( 'color', newval );
			});
		});
    });

	// Main Text Color
	wp.customize( 'noteskine_main_text_color', function( value ) {
        value.bind( function( newval ) {
			$( 'body, .top-date, .top-date a, .entry-content, .related .title, .comments-title,	#reply-title' ).css( 'color', newval );
		});
    });

	// Secondary Text Color
	wp.customize( 'noteskine_secondary_text_color', function( value ) {
        value.bind( function( newval ) {
			$( 'blockquote, .entry-meta, .entry-meta a, .page-links span a, .comment-time, .waiting, .pingback, .logged-in-as, .must-log-in, .comment-notes, .comment-form-author label[for=author], .comment-form-email label[for="email"], .comment-form-url label[for="url"], .comment-form-comment label[for="comment"], #comment-nav span a' ).css( 'color', newval );

			$( 'table, th, td, .page-links span a, #comment-nav span a' ).css( 'border-color', newval );

			$( 'hr' ).css( 'background-color', newval );

			$( '.entry-meta a, .page-links span a, #comment-nav span a' ).mouseover(function() {
				$(this).css( 'background-color', newval );
				$(this).css( 'color', '#fff' );
			}).mouseout(function() {
				$(this).css( 'background-color', 'transparent');
				$(this).css( 'color', newval );
			});
		});
    });

	//	Aside Text Color
	wp.customize( 'noteskine_aside_text_color', function( value ) {
        value.bind( function( newval ) {
			$( '.aside-container *, .aside-container .entry-content a, .aside-container .entry-content a:hover, .aside-container .entry-content a.more-link' ).css( 'color', newval );

			$( '.aside-container *, .aside-container .entry-content a, .aside-container .entry-content a:hover, .aside-container .entry-content a.more-link' ).css( 'border-color', newval );
		});
    });

	//	Aside text Shadow
	wp.customize( 'noteskine_aside_text_shadow', function( value ) {
        value.bind( function( newval ) {
			true === newval ? $('.aside-container *').css( 'text-shadow', '1px 1px 1px rgba(50, 50, 50, 0.35)' ) : $('.aside-container *').css( 'text-shadow', 'none' );
		});
    });

	//	Quote Text Color
	wp.customize( 'noteskine_quote_text_color', function( value ) {
        value.bind( function( newval ) {
			$( '.quote-container *, .quote-container .entry-content a, .quote-container .entry-content a:hover, .quote-container .entry-content a.more-link' ).css( 'color', newval );

			$( '.quote-container *, .quote-container .entry-content a, .quote-container .entry-content a:hover, .quote-container .entry-content a.more-link' ).css( 'border-color', newval );
		});
    });

	//	Quote text Shadow
	wp.customize( 'noteskine_quote_text_shadow', function( value ) {
        value.bind( function( newval ) {
			true === newval ? $( '.quote-container *' ).css( 'text-shadow', '1px 1px 1px rgba(50, 50, 50, 0.35)' ) : $( '.quote-container *' ).css( 'text-shadow', 'none' );
		});
    });

	//	Status Text Color
	wp.customize( 'noteskine_status_text_color', function( value ) {
        value.bind( function( newval ) {
			$( '.status-container *, .status-container .entry-content a, .status-container .entry-content a:hover, .status-container .entry-content a.more-link' ).css( 'color', newval );

			$( '.status-container *, .status-container .entry-content a, .status-container .entry-content a:hover, .status-container .entry-content a.more-link' ).css( 'border-color', newval );
		});
    });

	//	Status text Shadow
	wp.customize( 'noteskine_status_text_shadow', function( value ) {
        value.bind( function( newval ) {
			true === newval ? $('.status-container *').css( 'text-shadow', '1px 1px 1px rgba(50, 50, 50, 0.35)' ) : $( '.status-container *' ).css( 'text-shadow', 'none' );
		});
    });

	// Display Top Date
	wp.customize( 'noteskine_display_top_date', function( value ) {
        value.bind( function( newval ) {
			false === newval ? $('.top-date').hide() : $('.top-date').show();
		});
    });

	// Footer Text Color
	wp.customize( 'noteskine_footer_text_color', function( value ) {
        value.bind( function( newval ) {
		    $( '.widget-container, .widget-title, .widget_search input[type="search"], #colophon, #footer-menu li a' ).css( 'color', newval );

			$( '.footer-widgets, .widget-title, .widget_search input[type="search"]' ).css( 'border-color', newval );
		});
    });

	// Footer Accent Color
	wp.customize( 'noteskine_footer_accent_color', function( value ) {
        value.bind( function( newval ) {
			$( '.widget-container a' ).css( 'color', newval );
			$( '.widget-container .tagcloud a' ).css( 'background-color', newval );
			$( '.widget-container .tagcloud a' ).css( 'color', '#777' );
		});
    });

	// Footer Background Color
	wp.customize( 'noteskine_footer_background_color', function( value ) {
        value.bind( function( newval ) {
		    $( '.widget-container .tagcloud a' ).css( 'color', newval );
			$( '#footer-wrapper ' ).css( 'background-color', newval );
		});
    });

	// Hide Widget Area
	wp.customize( 'noteskine_hide_widget_area', function( value ) {
        value.bind( function( newval ) {
			true === newval ? $( '.footer-widgets' ).hide() : $( '.footer-widgets' ).show();
		});
    });

	// Hide Footer Menu
	wp.customize( 'noteskine_hide_footer_menu', function( value ) {
        value.bind( function( newval ) {
			true === newval ? $( '#footer-menu' ).hide() : $( '#footer-menu' ).show();
		});
    });

	// Font Family
	wp.customize( 'noteskine_font_family', function( value ) {
        value.bind( function( newval ) {
		    $('#site-title, #tagline, .archive-title, .entry-title, .comments-title, article, .archive-meta, .comment-content, #respond').css('font-family', newval );
		});
    });

})( jQuery );
