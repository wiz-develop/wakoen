<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package marlin-lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
$fields =  array(
    'author' => '<div class="row"><div class="col-sm-6"><input type="text" name="author" id="name" class="input-form" placeholder="' . __( 'Name*', 'marlin-lite' ) . '"/></div>',
    'email'  => '<div class="col-sm-6"><input type="text" name="email" id="email" class="input-form" placeholder="' . __( 'Email*', 'marlin-lite' ) . '"/></div>',
    'url'=>'<div class="col-sm-12"><input type="text" name="url" id="url" class="input-form" placeholder="' . __( 'Website', 'marlin-lite' ) . '"/></div></div>'

);
$custom_comment_form = array( 
    'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
    'comment_field'         => '
    <textarea name="comment" id="message" class="textarea-form" placeholder="' . __( 'Comment', 'marlin-lite' ) . '"  rows="1"></textarea>',
    'logged_in_as'          => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s">Log out?</a>','marlin-lite' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
    'cancel_reply_link'     => esc_html__( 'Cancel' , 'marlin-lite' ),
    'comment_notes_before'  => '',
    'comment_notes_after'   => '',
    'title_reply'           => esc_html__( 'Leave a Reply' , 'marlin-lite' ),
    'label_submit'          => esc_html__( 'Submit' , 'marlin-lite' ),
    'id_submit'             => 'comment_submit',
);

?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area">    
        <?php if ( comments_open() ) : ?>
            <h4 class="comments-title"><?php comments_number( null, esc_html__('1 Comment', 'marlin-lite'), '% ' . esc_html__('Comments', 'marlin-lite') ); ?></h4>
       	<?php endif; ?>
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
    		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'marlin-lite' ); ?></h1>
    		<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
    		<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
    	</nav><!-- #comment-nav-above -->
    	<?php endif; // Check for comment navigation. ?>    
    	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 70,
                'callback'	  => 'marlin_lite_custom_comment'
			) );
		?>
    	</ol><!-- .comment-list -->    
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
    		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'marlin-lite' ); ?></h1>
    		<div class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></div>
    		<div class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
    	</nav><!-- #comment-nav-below -->
    	<?php endif; // Check for comment navigation. ?>    
    	<?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'marlin-lite' ); ?></p>
    	<?php endif; ?>
</div>
<?php endif; ?>
<!-- Leave reply -->
<?php comment_form($custom_comment_form); ?>
<!-- Leave reply -->