<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package amora
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses amora_header_style()
 * @uses amora_admin_header_style()
 * @uses amora_admin_header_image()
 */
function amora_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'amora_custom_header_args', array(
        'default-image'          => get_template_directory_uri().'/assets/images/header-image.jpeg',
        'default-text-color'     => '#fff',
		'width'  				 => 1440,
		'height'				 => 380,
		'flex-height'            => true,
		'wp-head-callback'       => 'amora_header_style',
	) ) );
    register_default_headers( array(
            'default-image'    => array(
                'url'            => '%s/assets/images/header-image.jpeg',
                'thumbnail_url'    => '%s/assets/images/header-image.jpeg',
                'description'    => __('Default Header Image', 'amora')
            )
        )
    );
}
add_action( 'after_setup_theme', 'amora_custom_header_setup' );

if ( ! function_exists( 'amora_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see amora_custom_header_setup().
 */
function amora_header_style() {
	?>
	<style>
	#masthead {
			background-image: url(<?php header_image(); ?>);
			background-size: <?php echo esc_html(get_theme_mod('amora_himg_style','cover')); ?>;
			background-position-x: <?php echo esc_html(get_theme_mod('amora_himg_align','center')); ?>;
			background-repeat: <?php echo  esc_html(get_theme_mod('amora_himg_repeat')) ? "repeat" : "no-repeat" ?>;
		}
	</style>	
	<?php
}
endif; // amora_header_style