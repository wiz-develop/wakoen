<?php
//FEATURED POSTS
// CREATE THE FCA PANEL
function amora_customize_register_fp( $wp_customize ) {
$wp_customize->add_section(
    'amora_featposts',
    array(
        'title'     => __('Featured Posts','amora'),
        'priority'  => 35,
    )
);

$wp_customize->add_setting(
    'amora_featposts_enable',
    array( 'sanitize_callback' => 'amora_sanitize_checkbox' )
);

$wp_customize->add_control(
    'amora_featposts_enable', array(
        'settings' => 'amora_featposts_enable',
        'label'    => __( 'Enable', 'amora' ),
        'section'  => 'amora_featposts',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'amora_featposts_cat',
    array( 'sanitize_callback' => 'amora_sanitize_category' )
);


$wp_customize->add_control(
    new Amora_WP_Customize_Category_Control(
        $wp_customize,
        'amora_featposts_cat',
        array(
            'label'    => __('Category For Featured Posts','amora'),
            'settings' => 'amora_featposts_cat',
            'section'  => 'amora_featposts'
        )
    )
);
}
add_action( 'customize_register', 'amora_customize_register_fp' );