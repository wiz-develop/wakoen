<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package marlin-lite
 */
get_header(); ?>

	<div id="main">
		<div class="error-page">
			<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'marlin-lite' ); ?></h1>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'marlin-lite' ); ?></p>
			<?php get_search_form(); ?>
			
			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<div class="widget widget_categories">
				<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'marlin-lite' ); ?></h2>
				<ul>
				<?php
					wp_list_categories( array(
						'orderby'    => 'count',
						'order'      => 'DESC',
						'show_count' => 1,
						'title_li'   => '',
						'number'     => 10,
					) );
				?>
				</ul>
			</div><!-- .widget -->

			<?php
				/* translators: %1$s: smiley */
				$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'marlin-lite' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
			?>

			<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					
		</div>
	</div>
	
<?php get_footer(); ?>