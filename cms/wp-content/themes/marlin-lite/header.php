<?php
/**
 * The Header for marlin-lite
 *
 * @package marlin-lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="Keywords" content="和光園,大阪 保育所,保育園,福島区保育所,わこうえん,幼保連携型認定こども園,幼保連携型認定こども園 和光園" />
	<meta name="google-site-verification" content="77jQE7caZKFivSIpqU5ExPMDa8lwPQ1fRbvYKotzEos" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="icon" href="/cms/wp-content/themes/marlin-lite/images/favicon.png">
	<?php wp_head(); ?>
	
</head>
	
<body <?php body_class(); ?>>
    <div id="wrapper">
        <div class="topbar">
            <div class="container">
                <?php
                    wp_nav_menu( array (
                        'container'         => false,
                        'theme_location'    => 'topbar',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'depth'             => 2,
                        'walker'            => new wp_bootstrap_navwalker(),
                        'menu_class'        => 'topbar-menu pull-left'
                    ) );
                ?>
                <div class="social pull-right">
                    <?php if(get_theme_mod('marlin_lite_facebook')) : ?><a href="<?php echo esc_url( get_theme_mod('marlin_lite_facebook') ); ?>" target="_blank" title="<?php _e( 'Facebook', 'marlin-lite' ); ?>"><i class="fa fa-facebook"></i></a><?php endif; ?>
    				<?php if(get_theme_mod('marlin_lite_twitter')) : ?><a href="<?php echo esc_url( get_theme_mod('marlin_lite_twitter') ); ?>" target="_blank" title="<?php _e( 'Twitter', 'marlin-lite' ); ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
					<?php if(get_theme_mod('marlin_lite_google')) : ?><a href="<?php echo esc_url( get_theme_mod('marlin_lite_google') ); ?>" target="_blank" title="<?php _e( 'Google Plus', 'marlin-lite' ); ?>"><i class="fa fa-google-plus"></i></a><?php endif; ?>
    				<?php if(get_theme_mod('marlin_lite_linkedin')) : ?><a href="<?php echo esc_url( get_theme_mod('marlin_lite_linkedin') ); ?>" target="_blank" title="<?php _e( 'LinkedIn', 'marlin-lite' ); ?>"><i class="fa fa-linkedin"></i></a><?php endif; ?>
					<?php if(get_theme_mod('marlin_lite_youtube')) : ?><a href="<?php echo esc_url( get_theme_mod('marlin_lite_youtube') ); ?>" target="_blank" title="<?php _e( 'YouTube', 'marlin-lite' ); ?>"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
     				<?php if(get_theme_mod('marlin_lite_instagram')) : ?><a href="<?php echo esc_url( get_theme_mod('marlin_lite_instagram') ); ?>" target="_blank" title="<?php _e( 'Instagram', 'marlin-lite' ); ?>"><i class="fa fa-instagram"></i></a><?php endif; ?>
                </div>
            </div>
        </div><!-- topbar -->
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php if ( get_header_image() ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
				<?php }else{
					if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){ the_custom_logo(); } ?>
					
				<nav id="nav-wrapper">
				<div class="container">
					<div class="nav-toggle">
						<div class="bars">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div>
					</div><!-- /nav-toggle -->
					<?php if(is_front_page()) : ?>
					<div class="head_backimg">
						<p class="header_pic2">
						<img src="/cms/wp-content/themes/marlin-lite/images/top_framesp.png">
						</p>
					</div>
					<?php endif; ?>
				<?php } //if ( get_header_image() ) ?>
			</div>
			
					<div class="clear"></div>
					<?php
						wp_nav_menu( array (
							'container' => false,
							'theme_location' => 'primary',
							'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
							'depth' => 10,
							'walker' => new wp_bootstrap_navwalker(),
							'menu_class' => 'vtmenu'
						) );
					?>          
				</div>
				
				<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
<?php if(is_home()): ?>
<?php else: ?>

    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<?php endif; ?>
			</nav><!-- #navigation -->
        </header><!-- #masthead -->

		<div id="content" class="container">
			<div class="row">