<?php
/*
 * @package amora, Copyright Rohit Tripathi, rohitink.com
 * This file contains Custom Theme Related Functions.
 */
/*
* @package madhat, Copyright Rohit Tripathi, rohitink.com
* This file contains Custom Theme Related Functions.
*/
//Import Admin Modules
require get_template_directory() . '/framework/admin_modules/register_styles.php';
require get_template_directory() . '/framework/admin_modules/register_widgets.php';
require get_template_directory() . '/framework/admin_modules/theme_setup.php';
require get_template_directory() . '/framework/admin_modules/admin_styles.php';
require get_template_directory() . '/framework/admin_modules/excerpt_length.php';
require get_template_directory() . '/framework/admin_modules/exclude_single_post.php';
/*
** Walkers for Navigation menus
*/ 
//Supports Menu Desc and Icons Both
class Amora_Menu_With_Description extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$fontIcon = ! empty( $item->attr_title ) ? ' <i class="fa ' . esc_attr( $item->attr_title ) .'">' : '';
		$attributes = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$fontIcon.'</i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '<br /><span class="menu-desc">' . $item->description . '</span>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}
//Supports Icon only. No Description.
class Amora_Menu_With_Icon extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$fontIcon = ! empty( $item->attr_title ) ? ' <i class="fa ' . esc_attr( $item->attr_title ) .'">' : '';
		$attributes = ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_url( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>'.$fontIcon.'</i>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
	}
}

/*
** Customizer Controls 
*/
if (class_exists('WP_Customize_Control')) {
	class Amora_WP_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'amora' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}  

if (class_exists('WP_Customize_Control')) {
	class Amora_WP_Customize_Upgrade_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         */
        public function render_content() {
             printf(
                '<label class="customize-control-upgrade"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $this->description
            );
        }
    }
}
  
/*
** Function to check if Sidebar is enabled on Current Page 
*/

function amora_load_sidebar() {
	$load_sidebar = true;
	if ( get_theme_mod('amora_disable_sidebar', true) ) :
		$load_sidebar = false;
	elseif( get_theme_mod('amora_disable_sidebar_home',true) && is_home() )	:
		$load_sidebar = false;
	elseif( get_theme_mod('amora_disable_sidebar_front',true) && is_front_page() ) :
		$load_sidebar = false;
	endif;
	
	return  $load_sidebar;
}

/*
** Add Body Class
*/
function amora_body_class( $classes ) {
	
	$sidebar_class_name =  amora_load_sidebar() ? "sidebar-enabled" : "sidebar-disabled" ;
    return array_merge( $classes, array( $sidebar_class_name ) );   
}
add_filter( 'body_class', 'amora_body_class' );


/*
**	Determining Sidebar and Primary Width
*/
function amora_primary_class() {
	$sw = esc_html(get_theme_mod('amora_sidebar_width',4));
	$class = "col-md-".(12-$sw);
	
	if ( !amora_load_sidebar() ) 
		$class = "col-md-12";
	
	echo $class;
}
add_action('amora_primary-width', 'amora_primary_class');

function amora_secondary_class() {
	$sw = esc_html(get_theme_mod('amora_sidebar_width',4));
	$class = "col-md-".$sw;
	
	echo $class;
}
add_action('amora_secondary-width', 'amora_secondary_class');


/*
**	Helper Function to Convert Colors
*/
function amora_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);
   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}
function amora_fade($color, $val) {
	return "rgba(".amora_hex2rgb($color).",". $val.")";
}


/*
** Function to Get Theme Layout 
*/
function amora_get_blog_layout(){
    $ldir = 'framework/layouts/content';
    if (get_theme_mod('amora_blog_layout') ) :
        get_template_part( $ldir , get_theme_mod('amora_blog_layout') );
    else :
        get_template_part( $ldir ,'amora');
    endif;
}
add_action('amora_blog_layout', 'amora_get_blog_layout');
/*
** Function to Set Masonry Class 
*/
function amora_set_masonry_class(){
	if ( get_theme_mod('amora_blog_layout','amora') != "amora" ) :
		//DO NOTHING
	else :
		echo "masonry-main";	
	endif;	
}
add_action('amora_masonry_class', 'amora_set_masonry_class');

/*
** Load Custom Widgets
*/

require get_template_directory() . '/framework/widgets/recent-posts.php';


