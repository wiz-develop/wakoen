<?php
/**
 * The default template for displaying content
 *
 * @package marlin-lite
 */

$sticky_class = ( is_sticky() ) ? 'is_sticky' : null;
$pin_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );

?>
			
<article <?php post_class("post {$sticky_class}"); ?>>
					
  <?php if ( has_post_thumbnail() ) : ?>
	<div class="post-format post-standard">
		<div class="marlin-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); ?>
				<span class="marlin-format-icon"></span>
			</a>
			<div class="marlin-categories"><?php the_category(", "); ?></div>
		</div>
	</div>
  <?php endif; ?>
	
	<div class="entry-content">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<div class="entry-meta">
		<div class="post-time pull-right">
				投稿日：<?php the_time(get_option('date_format')); ?>
		</div>
		</div>

		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<p class="readmore">
				<a href="<?php the_permalink(); ?>" class="link-more"><?php _e( 'Read more', 'marlin-lite' ); ?></a>
			</p>
		</div><!-- .entry-summary -->
		
	</div><!-- entry-content -->
	
</article><!-- #post-## -->