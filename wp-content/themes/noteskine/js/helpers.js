( function( $ ) {
"use strict";

	//	Hide first iframe in content on "Video" $ "Audio" post format.
	$('.format-video .entry-content, .format-audio .entry-content').find('p:has(iframe):first').hide();

	// Don't display hover background under images.
	$('a:has(img)').css( 'background', 'none' );

	//	Always use square thumbnails in galleries
	$('.gallery-item').each(function() {
		var img_height = $(this).width();
		$(this).css({'height':img_height+'px'});
	});

	$(window).resize(function () {
		$('.gallery-item').each(function() {
			var img_height = $(this).width();
			$(this).css({'height':img_height+'px'});
		});
	});

	//	Fix for fixed header & input elements on mobile devices.
	/* we need this only on touch devices */
	if (window.Touch) {
		/* cache dom references */
		var $body = jQuery('body');

		/* bind events */
		$(document)
		.on('focus', 'input, textarea', function(e) {
			$body.addClass('fixfixed');
		})
		.on('blur', 'input, textarea', function(e) {
			$body.removeClass('fixfixed');
		});
	}

	//	Fix z-index youtube video embedding
	$('iframe').each(function() {
		var url = $(this).attr("src");
		if ($(this).attr("src").indexOf("?") > 0) {
			$(this).attr({
				"src" : url + "&wmode=transparent",
				"wmode" : "Opaque"
			});
		} else {
			$(this).attr({
				"src" : url + "?wmode=transparent",
				"wmode" : "Opaque"
			});
		}
	});

})( jQuery );
