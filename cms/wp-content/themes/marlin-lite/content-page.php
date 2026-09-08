<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package marlin-lite
 */
?>

<?php $sticky_class = ( is_sticky() ) ? 'vt-post-sticky' : null; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
	<div class="entry-content">
		<?php the_title( '<h1 class="entry-title page-title">', '</h1>' ); ?>
			
		<div class="entry-summary">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'marlin-lite' ),
					'after'  => '</div>',
				) );
			?>
			<?php edit_post_link( __( 'Edit', 'marlin-lite' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	</div><!-- .entry-content -->

</article><!-- #post-## -->