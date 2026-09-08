<?php
/**
 * The template for displaying all single posts.
 *
 * @package amora
 */

get_header(); ?>

	<div id="primary-mono" class="content-area <?php do_action('amora_primary-width') ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
            <?php $post_style = get_theme_mod('amora_post_layout_style');
            if( $post_style == 'style1' ) :
                get_template_part( 'modules/content/content', 'single1' );
             else:
			    get_template_part( 'modules/content/content', 'single' );
            endif; ?>

			<?php //amora_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
