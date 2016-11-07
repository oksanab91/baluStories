<?php
/**
 * Template for search form.
 *
 * @package Noteskine
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e( 'Search for:', 'noteskine' ); ?></span>
		<input type="search" class="search-field" value="" name="s" title="<?php _e( 'Type a phrase and press enter', 'noteskine' ); ?>" placeholder="<?php _e( 'Search...', 'noteskine' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="Search" />
</form>
