<?php
add_action('admin_menu', 'noteskine_dashboard_page');


function noteskine_dashboard_page() {
	$noteskine_page = add_theme_page( 'About Noteskine', 'Noteskine', 'edit_theme_options', 'my-custom-submenu-page', 'noteskine_dashboard_page_callback' );

	add_action('admin_print_styles-' . $noteskine_page, 'noteskine_dashboard_page_style');

}

function noteskine_dashboard_page_callback() {

	echo '<div class="dashboard-wrap"><div id="icon-tools" class="icon32"></div>';
		echo '<h2>' . __( 'About Noteskine', 'noteskine') . '</h2><div id="icon-edit-comments" class="icon32"></div>';
		echo '<img src="' . get_template_directory_uri() . '/images/noteskine-preview.jpg">';
		echo '<p class="important">' . __( 'Thank you for downloading Noteskine theme.', 'noteskine' ) . '</p>';
		echo '<p>' . __( 'I believe that Noteskine is something more than standard WordPress theme.', 'noteskine' ) . '</br>'
			. __( 'It is the way of sharing your thoughts and ideas with other people.', 'noteskine' ) . '</br>'
			. __( 'It is indispensable element of creative bloggers workflow.', 'noteskine' ) . '</br>'
			. __( 'And for me it is the chance to give you something useful.', 'noteskine' ) . '</p>';
		echo '<p>' . __( 'If you have any questions or suggestions related to Noteskine, email me:', 'noteskine' ) . '</p>';
		echo '<p class="mail">noteskine.theme@gmail.com</p>';
		echo '<p>' . __( 'I will do my best to give you the answer and solve your problem.', 'noteskine' ) . '</p>';
		echo '<p>' . __( 'Noteskine is my own project, and for months it became a part of my life. ', 'noteskine' )
			. '<span class="important">' . __( 'If you like Noteskine</span> and wish to make it even better, ', 'noteskine' )
			. '<span class="important">' . __( 'just buy me a cup of coffee.', 'noteskine' ) . '</span></br>'
			. __( 'I will apprecieate it.', 'noteskine' ) . '</p>';
		echo '<p class="sign">Arkadiusz Zalewski</p>';
		echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_donations">
		<input type="hidden" name="business" value="arkadiusz.zalewsky@gmail.com">
		<input type="hidden" name="lc" value="US">
		<input type="hidden" name="item_name" value="Noteskine">
		<input type="hidden" name="no_note" value="0">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		';
	echo '</div>';

}

function noteskine_dashboard_page_style() {

    wp_enqueue_style('noteskine-dashboard-page-style', get_template_directory_uri() . '/css/dashboard-page.css');
}

?>
