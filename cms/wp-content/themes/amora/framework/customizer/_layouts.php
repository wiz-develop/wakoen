<?php
// Layout and Design
function amora_customize_register_layouts( $wp_customize ) {
$wp_customize->add_panel( 'amora_design_panel', array(
    'priority'       => 3,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Design & Layout','amora'),
) );

//Blog Layout
$wp_customize->add_section(
    'amora_design_options',
    array(
        'title'     => __('Blog Layout','amora'),
        'priority'  => 0,
        'panel'     => 'amora_design_panel'
    )
);

$wp_customize->add_setting(
    'amora_blog_layout',
    array( 'sanitize_callback' => 'amora_sanitize_blog_layout' )
);

function amora_sanitize_blog_layout( $input ) {
    if ( in_array($input, array('grid','amora','grid_2_column','grid_3_column') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'amora_blog_layout',array(
        'label' => __('Select Layout','amora'),
        'settings' => 'amora_blog_layout',
        'section'  => 'amora_design_options',
        'type' => 'select',
        'choices' => array(
            'grid' => __('Basic Blog Layout','amora'),
            'amora'    => __('Amora Theme Layout','amora'),
            'grid_2_column' => __('Grid - 2 Column', 'amora'),
            'grid_3_column' => __('Grid - 3 Column', 'amora')
        )
    )
);

//Sidebar Layout
$wp_customize->add_section(
    'amora_sidebar_options',
    array(
        'title'     => __('Sidebar Layout','amora'),
        'priority'  => 0,
        'panel'     => 'amora_design_panel'
    )
);

$wp_customize->add_setting(
    'amora_sidebar_style',
    array(
        'default' => 'default',
        'sanitize_callback' => 'amora_sanitize_sidebar_style',

    )
);

$wp_customize->add_control(
    'amora_sidebar_style',
    array(
        'setting' => 'amora_sidebar_style',
        'section' => 'amora_sidebar_options',
        'label' => __('Sidebar Style', 'amora'),
        'type' => 'select',
        'choices' => array(
            'default' => __('Default', 'amora'),
            'sticky-sidebar' => __('Sticky', 'amora'),
        )
    )
);

    function amora_sanitize_sidebar_style( $input ) {
        if ( in_array($input, array('default','sticky-sidebar') ) )
            return $input;
        else
            return '';
    }

$wp_customize->add_setting(
    'amora_disable_sidebar',
    array( 'sanitize_callback' => 'amora_sanitize_checkbox', 'default'  => false )
);

$wp_customize->add_control(
    'amora_disable_sidebar', array(
        'settings' => 'amora_disable_sidebar',
        'label'    => __( 'Disable Sidebar Everywhere.','amora' ),
        'section'  => 'amora_sidebar_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'amora_disable_sidebar_home',
    array( 'sanitize_callback' => 'amora_sanitize_checkbox', 'default'  => true )
);

$wp_customize->add_control(
    'amora_disable_sidebar_home', array(
        'settings' => 'amora_disable_sidebar_home',
        'label'    => __( 'Disable Sidebar on Home/Blog.','amora' ),
        'section'  => 'amora_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'amora_show_sidebar_options',
    )
);

$wp_customize->add_setting(
    'amora_disable_sidebar_front',
    array( 'sanitize_callback' => 'amora_sanitize_checkbox', 'default'  => true )
);

$wp_customize->add_control(
    'amora_disable_sidebar_front', array(
        'settings' => 'amora_disable_sidebar_front',
        'label'    => __( 'Disable Sidebar on Front Page.','amora' ),
        'section'  => 'amora_sidebar_options',
        'type'     => 'checkbox',
        'active_callback' => 'amora_show_sidebar_options',
    )
);


$wp_customize->add_setting(
    'amora_sidebar_width',
    array(
        'default' => 4,
        'sanitize_callback' => 'amora_sanitize_positive_number' )
);

$wp_customize->add_control(
    'amora_sidebar_width', array(
        'settings' => 'amora_sidebar_width',
        'label'    => __( 'Sidebar Width','amora' ),
        'description' => __('Min: 25%, Default: 33%, Max: 40%','amora'),
        'section'  => 'amora_sidebar_options',
        'type'     => 'range',
        'active_callback' => 'amora_show_sidebar_options',
        'input_attrs' => array(
            'min'   => 3,
            'max'   => 5,
            'step'  => 1,
            'class' => 'sidebar-width-range',
            'style' => 'color: #0a0',
        ),
    )
);

/* Active Callback Function */
function amora_show_sidebar_options($control) {

    $option = $control->manager->get_setting('amora_disable_sidebar');
    return $option->value() == false ;

}

function amora_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Custom Footer Text
$wp_customize-> add_section(
    'amora_custom_footer',
    array(
        'title'			=> __('Custom Footer Text','amora'),
        'description'	=> __('Enter your Own Copyright Text.','amora'),
        'priority'		=> 11,
        'panel'			=> 'amora_design_panel'
    )
);

$wp_customize->add_setting(
    'amora_footer_text',
    array(
        'default'		=> '',
        'sanitize_callback'	=> 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    'amora_footer_text',
    array(
        'section' => 'amora_custom_footer',
        'settings' => 'amora_footer_text',
        'type' => 'text'
    )
);


}
add_action( 'customize_register', 'amora_customize_register_layouts' );