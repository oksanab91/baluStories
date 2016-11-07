<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to noteskine_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package Noteskine
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password it will
 * return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<?php if (comments_open()): ?>

	<div class="comments-wrapper content-box">
		<div class="comments-area">

			<?php if ( have_comments() ) : ?>
				<h2 class="comments-title">
					<?php
						// Display different titles depending on number of comments.
						comments_number( '<i class="fa fa-comments-o"></i>&nbsp;' . __('Leave a Comment', 'noteskine'), '<i class="fa fa-comments-o"></i>&nbsp;' . __('One Comment', 'noteskine'), '<i class="fa fa-comments-o"></i>&nbsp;' . __('Comments: %', 'noteskine') );
					?>
				</h2>

				<?php
					// Are there comments to navigate through? If so, show navigation.
					if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				?>
					<nav id="comment-nav" role="navigation">
						<span>
							<?php previous_comments_link( '<i class="fa fa-angle-left"></i>&nbsp;' . __( 'Older', 'noteskine' ) ); ?><!-- Link to previous comments -->
							<?php next_comments_link( __( 'Newer', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i>' ); ?><!-- Link to next comments -->
						</span>
					</nav><!-- #comment-nav -->
				<?php endif; // check for comment navigation ?>

				<ol class="comment-list">
					<?php
						/*
						 * Loop through and list the comments. Tell wp_list_comments()
						 * to use noteskine_comment() to format the comments.
						 */
						get_template_part( 'inc', 'template-tags.php' );
						wp_list_comments( array( 'callback' => 'noteskine_comment' ) );
					?>
				</ol><!-- .comment-list -->

				<?php
					// Are there comments to navigate through? If so, show navigation.
					if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				?>
					<nav id="comment-nav" role="navigation">
						<span>
							<?php previous_comments_link( '<i class="fa fa-angle-left"></i>&nbsp;' . __( 'Older', 'noteskine' ) ); // Link to previous comments. ?>
							<?php next_comments_link( __( 'Newer', 'noteskine' ) . '&nbsp;<i class="fa fa-angle-right"></i>' ); // Link to next comments. ?>
						</span>
					</nav><!-- #comment-nav -->
				<?php endif; // check for comment navigation. ?>

			<?php endif; // have_comments() ?>

			<?php comment_form(); ?>

		</div><!-- .comments-area -->
	</div><!-- .comments-wrapper -->

<?php endif; // If comments are opened. ?>
