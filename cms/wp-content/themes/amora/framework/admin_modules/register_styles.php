<?php
/**
 * Enqueue scripts and styles.
 */
function amora_scripts() {
    wp_enqueue_style( 'amora-style', get_stylesheet_uri() );

    wp_enqueue_style('amora-title-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('amora_title_font', 'Bree Serif') ).':100,300,400,700' );

    wp_enqueue_style('amora-body-font', '//fonts.googleapis.com/css?family='.str_replace(" ", "+", get_theme_mod('amora_body_font', 'Bitter') ).':100,300,400,700' );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/assets/css/nivo-slider.css' );

    wp_enqueue_style( 'nivo-skin', get_template_directory_uri() . '/assets/css/nivo-default/default.css' );

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );

    wp_enqueue_style( 'hover-style', get_template_directory_uri() . '/assets/css/hover.min.css' );

    wp_enqueue_style( 'amora-main-theme-style', get_template_directory_uri() . '/assets/theme-styles/css/'.get_theme_mod('amora_skin', 'default').'.css', array(), filemtime( get_template_directory() . '/assets/theme-styles/css/'.get_theme_mod('amora_skin', 'default').'.css' ) );

    wp_enqueue_script( 'amora-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

    wp_enqueue_script( 'amora-external', get_template_directory_uri() . '/js/external.js', array('jquery'), '20120206', true );

    wp_enqueue_script('amora-sticky-sidebar-js', get_template_directory_uri()."/js/jquery-scrolltofixed-min.js", array('jquery'));

    wp_enqueue_script( 'amora-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script( 'amora-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery-masonry'), false, true );
}
add_action( 'wp_enqueue_scripts', 'amora_scripts' );