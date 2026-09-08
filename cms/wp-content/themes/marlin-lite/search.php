<?php
/**
 * The template for displaying search results pages.
 *
 * @package marlin-lite
 */
 
get_header(); ?>

	<div class="col-md-8 site-main">
		<div id="main" class="vt-blog-standard">
		
			<header class="page-header">
				<span><?php esc_html_e( 'Search results for', 'marlin-lite' ); ?>:&nbsp;</span>
				<h3><?php printf( __( '%s', 'marlin-lite' ), get_search_query() ); ?></h3>
			</header><!-- .page-header -->

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'search' ); ?>

				<?php endwhile; ?>

				<?php the_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>
		
		</div>
	</div><!-- site-main -->

<?php get_sidebar(); ?>      
<?php get_footer(); ?>