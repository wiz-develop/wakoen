<?php
/**
 * The template used for displaying single post
 *
 * @package marlin-lite
 */
?>

<?php $sticky_class = ( is_sticky() ) ? 'vt-post-sticky' : null; ?>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="post-inner">
	
	  <?php if ( has_post_thumbnail() ) : ?>
		<div class="marlin-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(); ?>
				<span class="marlin-format-icon"></span>
			</a>
			<div class="marlin-categories"><?php the_category(", "); ?></div>
		</div>
	  <?php endif; ?>
                    
		<div class="entry-content">
			<div class="round-cap"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>

			<div class="post-time pull-right">
				投稿日：<?php the_time(get_option('date_format')); ?>
			</div>

			<div class="entry-summary">
				<?php the_content(); ?>
				<?php edit_post_link( __( 'Edit', 'marlin-lite' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
			
			<?php if ( get_the_tags() ) : ?>
			<div class="vt-post-tags">
				<?php the_tags('',' '); ?>
			</div>
			<?php endif; ?>

			<hr style="border: solid 1px #eee;">

			<div class="nav-links">
				<div class="nav-next">
					<?php
					$max_length   = 10;
					$trim_marker  = '...';
					$html         = '';
					$prev_post = get_previous_post();
					
					if( !empty( $prev_post ) ) {
						$title = apply_filters( 'the_title', $prev_post->post_title );
						if( mb_strlen( $title ) > $max_length ) {
						$title = mb_substr( $title, 0, $max_length ) . $trim_marker;
						}    
						$html .= sprintf(
						'<a href="%s" rel="prev">%s <i class="fas fa-chevron-circle-right"></i></a>',
						esc_url( get_permalink( $prev_post->ID ) ),
						$title
						);
						echo $html;
					}  
					?>
				</div>
				<div class="nav-previous">
					<?php
					$max_length   = 10;
					$trim_marker  = '...';
					$html         = '';
					$next_post = get_next_post();
					
					if( !empty( $next_post ) ) {
						$title = apply_filters( 'the_title', $next_post->post_title );
						if( mb_strlen( $title ) > $max_length ) {
						$title = mb_substr( $title, 0, $max_length ) . $trim_marker;
						}    
						$html .= sprintf(
						'<a href="%s" rel="next"><i class="fas fa-chevron-circle-left"></i> %s</a>',
						esc_url( get_permalink( $next_post->ID ) ),
						$title
						);
						echo $html;
					}  
					?>
				</div>
			</div>
			<?php get_template_part( 'template-parts/single', 'post-author' ); ?>
			
		</div><!-- post-content -->
		
  </div><!-- post-inner -->
		
</article><!-- #post-## -->