( function( $ ) {
"use strict";

	$('#post-buttons a:first-child').mouseover(function() {
		$('#prev-title a').css('display', 'inline-block');
	}).mouseout(function() {
		$('#prev-title a').css('display', 'none');
	});

	$('#post-buttons a:nth-child(3)').mouseover(function() {
		$('#next-title a').css('display', 'inline-block');
	}).mouseout(function() {
		$('#next-title a').css('display', 'none');
	});

})( jQuery );
