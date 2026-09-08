<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function amora_custom_css_mods() {

	$custom_css = "";

    //page builder
    if(!is_home() && is_front_page()):
        if( get_theme_mod('amora_page_title', true)):
            $custom_css .= "#primary-mono .entry-header { display:none; }
                            #content{margin-top:0px; padding-top:0px;}
            ";
        endif;
    endif;

    if (!is_home() && is_front_page()) :
        if ( get_theme_mod('amora_content_font_size') ) :
            $size = (get_theme_mod('amora_content_font_size'));
            $custom_css .= "#primary-mono .entry-content { font-size:".$size.";}";
        endif;
    endif;

    if (!is_home() && is_front_page()) :
        if ( get_theme_mod('amora_content_font_size') ) :
            $size = (get_theme_mod('amora_content_font_size'));
            $custom_css .= "#primary-mono .entry-content { font-size:".$size.";}";
        endif;
    endif;

    //hero 1
    if (!is_home() && is_front_page()) :
        if ( get_theme_mod('amora_content_font_size') ) :
            $size = (get_theme_mod('amora_content_font_size'));
            $custom_css .= "#primary-mono .entry-content { font-size:".$size.";}";
        endif;
    endif;

    if (get_theme_mod('amora_hero_background_image') != '') :
        $image = get_theme_mod('amora_hero_background_image');
        $custom_css .= "#hero {
                    	background-image: url('" . $image . "');
                        background-size: cover;
                        background-attachment:fixed;
                }";
    endif;


    
    if (!is_home() && is_front_page()) :
        if ( get_theme_mod('amora_content_font_size') ) :
            $size = (get_theme_mod('amora_content_font_size'));
            $custom_css .= "#primary-mono .entry-content { font-size:".$size.";}";
        endif;
    endif;





    //If Highlighting Nav active item is disabled
	if ( get_theme_mod('amora_disable_active_nav') ) :
		$custom_css .= "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;
	
	//If Logo is Centered
	if ( get_theme_mod('amora_center_logo') ) :
		
		$custom_css .= "#masthead #text-title-desc, #masthead #site-logo { float: none; } .site-branding { text-align: center; } #text-title-desc { display: inline-block; }";
		
	endif;
	
	//Exception: When Logo is Centered, and Title Not Set to display in next line.
	if ( get_theme_mod('amora_center_logo') && !get_theme_mod('amora_branding_below_logo') ) :
		$custom_css .= ".site-branding #text-title-desc { text-align: left; }";
	endif;
	
	//Exception: When Logo is centered, but there is no logo.
	if ( get_theme_mod('amora_center_logo') && !get_theme_mod('amora_logo') ) :
		$custom_css .= ".site-branding #text-title-desc { text-align: center; }";
	endif;
	
	//Exception: IMage transform origin should be left on Left Alignment, i.e. Default
	if ( !get_theme_mod('amora_center_logo') ) :
		$custom_css .= "#masthead #site-logo img { transform-origin: left; }";
	endif;	

	
	if ( get_background_color() ) {
		$custom_css .= "#social-search .searchform:before { border-left-color: #".get_background_color()." }";
		$custom_css .= "#social-search .searchform, #social-search .searchform:after { background: #".get_background_color()." }";
	}
	
	if ( get_theme_mod('amora_title_font','Bree Serif') ) :
		$custom_css .= ".title-font, h1, h2 { font-family: ".esc_html(get_theme_mod('amora_title_font'))."; }";
	endif;
	
	if ( get_theme_mod('amora_body_font','Bitter') ) :
		$custom_css .= "body { font-family: ".esc_html(get_theme_mod('amora_body_font'))."; }";
	endif;
	
	if (get_header_image()) 
		$custom_css .= '#masthead { padding-bottom: 20px; }';
	
	if ( get_header_textcolor() ) :
		$custom_css .= "#masthead h1.site-title a { color: #".get_header_textcolor()."; }";
	endif;
	
	
	if ( get_theme_mod('amora_header_desccolor','#fff') ) :
		$custom_css .= "#masthead h2.site-description { color: ".esc_html(get_theme_mod('amora_header_desccolor','#fff'))."; }";
	endif;
	
	
	if ( !display_header_text() ) :
		$custom_css .= "#masthead .site-branding #text-title-desc { display: none; }";
	endif;
	
	if ( amora_load_sidebar() ) :
		$custom_css .= ".amora { padding: 20px 20px; }";
	endif;
	

    // page & post fontsize
    if(get_theme_mod('amora_content_page_post_fontsize_set')):
        $val = get_theme_mod('amora_content_page_post_fontsize_set');
        if($val=='small'):
            $custom_css .= "#primary-mono .entry-content{ font-size:12px;}";
        elseif ($val=='medium'):
            $custom_css .= "#primary-mono .entry-content{ font-size:16px;}";
        elseif ($val=='large'):
            $custom_css .= "#primary-mono .entry-content{ font-size:18px;}";
        elseif ($val=='extra-large'):
            $custom_css .= "#primary-mono .entry-content{ font-size:20px;}";
        endif;
    else:
        $custom_css .= "#primary-mono .entry-content{ font-size:14px;}";
    endif;
		
		
		

	wp_add_inline_style( 'amora-main-theme-style', wp_strip_all_tags($custom_css) );


	
}

add_action('wp_enqueue_scripts', 'amora_custom_css_mods');