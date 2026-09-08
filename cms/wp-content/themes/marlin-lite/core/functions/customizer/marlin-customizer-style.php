<?php
// Customizer CSS
add_action( 'wp_head', 'marlin_lite_customizer_css' );
function marlin_lite_customizer_css() {

	// Color Scheme
	$color_scheme = esc_html(get_theme_mod('marlin_lite_color_scheme'));
	
?>
    <style type="text/css">
        <?php if ( get_theme_mod('marlin_lite_color_scheme') ) : ?>
            
            a {
                color: <?php echo $color_scheme; ?>;
            }
            a:hover, a:focus {
                color: <?php echo $color_scheme; ?>;
            }
			.topbar-menu li a:hover, .topbar .social a:hover {
                color: <?php echo $color_scheme; ?>;
            }
            #nav-wrapper .vtmenu .current-menu-item > a, #nav-wrapper .vtmenu a:hover, #nav-wrapper .sub-menu a:hover {
                color: <?php echo $color_scheme; ?>;
            }
            .marlin-thumbnail .marlin-categories:hover {
                color: <?php echo $color_scheme; ?>;
            }
            .post a:hover {
                color: <?php echo $color_scheme; ?>;
            }
            .post .entry-meta .socials li a:hover {
                color: <?php echo $color_scheme; ?>;
            }
            .post .link-more:hover {
                color: <?php echo $color_scheme; ?>;
            }
			#content article .link-more:hover {
                color: <?php echo $color_scheme; ?>;
            }
            .widget a:hover, .latest-post .post-item-text h4 a:hover, .widget_categories ul li a:hover {
                color: <?php echo $color_scheme; ?>;
            }
			button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover {
				color: <?php echo $color_scheme; ?>;
            }
            .single-post-footer .social-share a:hover,.about-social a:hover {
				background-color: <?php echo $color_scheme; ?>;
				color: #fff !important;
            }
			.pagination .nav-links span {
				background:  <?php echo $color_scheme; ?>;
			}
        <?php endif; ?>

    </style>
    <?php
}