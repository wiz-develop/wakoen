<?php
/**
 * The template for displaying all pages.
 *
 * @package marlin-lite
 */

get_header(); ?>

	<div class="col-md-8 site-main">
		<div class="post-inner">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</div>
	</div><!-- .site-main -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>