<?php
/**
 * Custom template tags for marlin-lite theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package marlin-lite
 */

if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
	  <div class="vt-pagination">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'marlin-lite' ); ?></h2>
		<div class="row">
			<?php
				previous_post_link( '<div class="older col-xs-6 col-md-6">%link</div>', _x( '%title', 'Previous post link', 'marlin-lite' ) );
				next_post_link(     '<div class="newer col-xs-6 col-md-6">%link</div>',     _x( '%title', 'Next post link', 'marlin-lite' ) );
			?>
		</div>
	  </div><!-- .vt-pagination -->
	</nav><!-- .navigation -->
	<?php
}
endif;

// The Excerpt
function marlin_lite_excerpt_length( $length ) {
    return 45;
}
add_filter( 'excerpt_length', 'marlin_lite_excerpt_length');

// Url Encode
function marlin_lite_url_encode($title)
{
    $title = html_entity_decode($title);
    $title = urlencode($title);
    return $title;
}

if ( ! function_exists( 'marlin_lite_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function marlin_lite_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span><span class="byline"> - %2$s</span>', 'marlin-lite' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

// Comment Layout
function marlin_lite_custom_comment($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>
	<<?php echo esc_attr($tag); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		<div class="comment-author">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		</div>
		<div class="comment-content">
			<?php printf( __( '<h4 class="author-name">%s</h4>', 'marlin-lite' ), get_comment_author_link() ); ?>
			<span class="date-comment">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( __('%1$s at %2$s', 'marlin-lite'), get_comment_date(),  get_comment_time() ); ?></a>
			</span>
			<div class="reply">
				<?php edit_comment_link( esc_html__( '(Edit)', 'marlin-lite' ), '  ', '' );?>
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'marlin-lite' ); ?></em>
				<br />
			<?php endif; ?>
			<div class="comment-text"><?php comment_text(); ?></div>
		</div>	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * Flush out the transients used in marlin_lite_categorized_blog.
 */
function marlin_lite_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'marlin_lite_categories' );
}
add_action( 'edit_category', 'marlin_lite_category_transient_flusher' );
add_action( 'save_post',     'marlin_lite_category_transient_flusher' );

/**
 * Footer info, copyright information
 */
if ( ! function_exists( 'marlin_lite_footer' ) ) :
function marlin_lite_footer() {
   $site_link = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" ><span>' . get_bloginfo( 'name', 'display' ) . '</span></a>';

   $wp_link = '<a href="https://wordpress.org" target="_blank" title="' . esc_attr__( 'WordPress', 'marlin-lite' ) . '"><span>' . __( 'WordPress', 'marlin-lite' ) . '</span></a>';

   $tg_link =  '<a href="http://volthemes.com/theme/marlin/" target="_blank" title="'.esc_attr__( 'VolThemes', 'marlin-lite' ).'"><span>'.__( 'VolThemes', 'marlin-lite') .'</span></a>';

   $default_footer_value = sprintf( __( 'Copyright &copy; %1$s %2$s. All rights reserved.', 'marlin-lite' ), date_i18n( 'Y' ), $site_link ).'<br>'.sprintf( __( 'Theme: %1$s by %2$s.', 'marlin-lite' ), 'marlin-lite', $tg_link ).' '.sprintf( __( 'Powered by %s.', 'marlin-lite' ), $wp_link );

   $marlin_lite_footer = '<div class="copyright">'.$default_footer_value.'</div>';
   echo $marlin_lite_footer;
}
endif;
add_action( 'marlin_lite_footer', 'marlin_lite_footer', 10 );