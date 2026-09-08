<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package amora
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'amora' ); ?></a>
    <?php get_template_part('modules/header/jumbosearch'); ?>
    <?php get_template_part('modules/header/top', 'bar'); ?>
    <?php get_template_part('modules/header/masthead'); ?>

	<?php if( class_exists('rt_slider') ) {
			 rt_slider::render('slider', 'nivo' ); 
		} ?>

    <?php get_template_part('modules/hero/hero'); ?>
	
	<div class="mega-container">
        <?php get_template_part('framework/featured-components/featured', 'posts' ); ?>
		<div id="content" class="site-content container">