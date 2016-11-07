<?php
/**
 * Custom template tags for noteskine theme.
 *
 * @package Noteskine
 */

// Custom template tags for noteskine theme header.
require_once get_template_directory() . '/inc/header-template-tags.php';

// Custom template tags for noteskine theme hero area.
require_once get_template_directory() . '/inc/hero-area-template-tags.php';

if ( ! function_exists( 'noteskine_sticky' ) ) :
 /**
 * Display ribbon on sticky posts.
 *
 * Used in all content-format files.
 */
function noteskine_sticky() {
	if ( is_sticky() && is_home()&& !is_paged()) {
		echo '<div class="ribbon-wrapper"><div class="ribbon"><i class="fa fa-thumb-tack"></i></div></div>';
	}
}
endif;

if ( ! function_exists( 'noteskine_embed_thumbnail' ) ) :
/**
 * Display first embed element as post thumbnail.
 *
 * Used in "content-video.php" & "content-audio.php".
 */
function noteskine_embed_thumbnail() {

	$post = get_post();
    $content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
    $embeds = get_media_embedded_in_content( $content );

    if( !empty($embeds) ) {
        //check what is the first embed containg video tag, youtube or vimeo.
        foreach( $embeds as $embed ) {
            if( strpos( $embed, 'video' ) || strpos( $embed, 'youtube' ) || strpos( $embed, 'vimeo' ) || strpos( $embed, 'soundcloud' ) || strpos( $embed, 'spotify' ) || strpos( $embed, 'deezer' ) ) {
                $embed_media = $embed;
            }
        }

    }
    if( !empty($embed_media) ) {
    	// If there exists embed video, use it as post thumbnail.
		echo '<div class="embed-thumbnail">' . $embed_media . '</div>';
	} else {
		// I there is no embed video, use featured image if it's set.
		the_post_thumbnail( 'noteskine-full-width' );
	}
}
endif;

if ( ! function_exists( 'noteskine_gallery_thumbnail' ) ) :
/**
 * Inserting first gallery as post thumbnail.
 *
 * Used in content-gallery.php.
 */
function noteskine_gallery_thumbnail() {
	echo '<div class="gallery-thumbnail">' . get_post_gallery() . '</div>';
}
endif;

if ( ! function_exists( 'noteskine_featured_image_background' ) ) :
 /**
 * Set Featured Image as background for 'Quote' & 'Aside' post formats.
 * Used in content-quote.php & content-aside.php.
 */
function noteskine_featured_image_background() {
	if ( ! is_single() && has_post_thumbnail() ){
		$thumbnail_id = get_post_thumbnail_id();
		$image_src = wp_get_attachment_image_src( $thumbnail_id, 'noteskine-full-width' );
		printf( ' style="background-image: url(%s);"', $image_src[0] );
	}
}
endif;

 if ( ! function_exists( 'noteskine_get_link_url' ) ) :
/**
 * Getting first link from post content in 'Link' post format.
 *
 * Used in content-link.php.
 */
function noteskine_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;

if ( ! function_exists( 'noteskine_thumbnail_link' ) ) :
/**
 * Get link to the original size of Featured Image.
 *
 * Used in content-image.php.
 */
function noteskine_thumbnail_link() {
	$thumbnail_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	echo $thumb_url[0];
}
endif;

if ( ! function_exists( 'noteskine_top_date' ) ) :
/**
 * Post date with permalink, displayed under title.
 *
 * Used in all content-format files.
 */
function noteskine_top_date(){
	if ( is_single () || has_post_format( 'aside' ) || has_post_format( 'quote' ) || has_post_format( 'status' ) ){
		echo '<span class="top-date">' . get_the_date() . '</span>';
	} else {
		echo '<span class="top-date"><a href="' . esc_url( get_permalink() ) . '">' . get_the_date() . '</a></span>';
	}
}
endif;

if ( ! function_exists( 'noteskine_meta' ) ) :
/**
 * All meta data displayed at the end of post.
 *
 * Used in all content-format files.
 */
function noteskine_meta(){
		if( get_theme_mod( 'noteskine_display_date' ) == true ) {
			// Display link to post Date archive
			$archive_year  = get_the_time('Y');
			$archive_month = get_the_time('m');
			$archive_day   = get_the_time('d');
			echo '<span class="date"><a href="' . get_day_link($archive_year, $archive_month, $archive_day) . '"><i class="fa fa-calendar"></i>&nbsp;'. get_the_date() .  '</a></span>';
		}
		if( get_theme_mod( 'noteskine_display_author' ) == true ) {
			// Display link to Author's posts
			echo '<span class="author-posts"><i class="fa fa-user"></i>';
			the_author_posts_link() ;
			echo '</span>';
		}
		if( get_theme_mod( 'noteskine_display_category' ) == true ) {
			// Display list of Categories
			$categories_list = get_the_category_list( __( ' ', 'noteskine' ) );
			if ( $categories_list ) {
				echo '<span class="categories-links"><i class="fa fa-folder"></i>' . $categories_list . '</span>';
			}
		}
		if( get_theme_mod( 'noteskine_display_tag' ) == true ) {
			// Display list of Tags
			$tag_list = get_the_tag_list( '', __( ' ', 'noteskine' ) );
			if ( $tag_list ) {
				echo '<span class="tags-links"><i class="fa fa-tag"></i>' . $tag_list . '</span>';
			}
		}
		// Display Edit link
		echo '<span class="edit-link">';
		edit_post_link( '<i class="fa fa-pencil"></i>&nbsp' . __( 'Edit', 'noteskine' ));
		echo '</span>';
}
endif;

if ( ! function_exists( 'noteskine_related_posts' ) ) :
/**
 * Display Related Posts.
 *
 * Used in "single.php".
 */
function noteskine_related_posts() {

	global $post;
	// We should get the categories of the post
	$categories = get_the_category( $post->ID );
	if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		// The arguments of the post list!
		$args = array(
			// It should be in the first category of our post:
			'category__in' => $category_ids,
			// Posts order should be random:
			'orderby' => 'rand',
			// Our post should NOT be in the list:
			'post__not_in' => array( $post->ID ),
			// ...And it should fetch 5 posts - you can change this number if you like:
			'posts_per_page' => 3
		);
		// The get_posts() function
		$posts = get_posts( $args );
		$count = count( $posts );
		if( $count >= 3 ) {
			$output = '<ul class="related content-box">';
			// Let's start the loop!
			foreach( $posts as $post ) {
				setup_postdata( $post );
				$post_title = get_the_title();
				$permalink = get_permalink();
				$post_thumbnail = get_the_post_thumbnail( $post->ID, 'noteskine-related' );
				$output .= '<li><a href="' . $permalink . '" title="' . esc_attr( $post_title ) . '">' . $post_thumbnail . '<span class="title">' . $post_title . '</span>' . '</a></li>';
			}
			$output .= '</ul>';
		}
		echo $output;
	}
	wp_reset_query();
}
endif;

if ( ! function_exists( 'noteskine_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function noteskine_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'noteskine' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'noteskine' ), ' ' ); ?></p>
    <?php
        break;
        default :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment">

			<!-- Set avatar size. -->
            <div class="avatar"><?php echo get_avatar( $comment, 48 ); ?></div>

			<div class="comment-content">
				<div class="comment-header">

					<!-- Display comment author in header. -->
                    <span class="comment-author"><a href="<?php get_comment_author_url(); ?>"><?php comment_author(); ?></a></span>

                	<!-- Display comment time -->
                    <span class="comment-time"><time datetime="<?php comment_time( 'c' ); ?>">
                     <?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . __(' ago', 'noteskine'); ?>
                    </time></span>

					<!-- Display information about waiting for approval. -->
					<span class="waiting"><?php if ( $comment->comment_approved == '0' ) {
						echo __( 'Your comment is waiting for approval.', 'noteskine' );
					} ?></span>

                </div><!-- .comment-header -->

				<!-- Display comment text -->
				<div class="comment-text"><?php comment_text(); ?></div>

				<div class="comment-footer">

					<!-- Display comment 'reply' link -->
                	<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => __('Reply', 'noteskine' ) ) ) ); ?></span>

					<!-- Display comment 'edit' link -->
					<span class="edit"><?php edit_comment_link( __( 'Edit', 'noteskine' ), ' ' );?></span>

				</div><!-- .comment-footer -->

			</div><!--comment-content-->
        </div><!-- #comment-## -->

    <?php
        break;
	endswitch;
}
endif;



if ( ! function_exists( 'noteskine_pagination' ) ) :
/**
 * Pagination for archive pages.
 *
 * Used in archive.php, taxonomy-post_format.php, tag.php, search.php, index.php, category.php, author.php.
 */
function noteskine_pagination() {
	/*
	 * Pagination for desktop ( width > 640px ).
	 */
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'prev_text'    => __('<i class="fa fa-angle-left"></i> Previous', 'noteskine'),
		'next_text'    => __('Next <i class="fa fa-angle-right"></i>', 'noteskine'),
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type'  => 'array',
		'mid_size'     => 2,
	) );
	if ( is_array($page_format) ) {
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div class="pagination"><ul>';
		echo '<li><span>'. $paged . __(' of ', 'noteskine') . $wp_query->max_num_pages .'</span></li>';
		foreach ( $page_format as $page ) {
			echo "<li>$page</li>";
		}
		echo '</ul></div>';
	}
	/*
	 * Pagination for mobile device ( width < 640px ).
	 */
	echo '<div id="mobile-pagination"><span>';
	next_posts_link( __( 'Older Posts', 'noteskine' ) );
	previous_posts_link( __( 'Newer Posts', 'noteskine' ) );
	echo '</span></div>';
}
endif;
?>
