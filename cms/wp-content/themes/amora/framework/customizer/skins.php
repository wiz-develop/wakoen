<?php
//Logo Settings
function amora_customize_register_skins( $wp_customize ) {
$wp_customize->add_section( 'title_tagline' , array(
    'title'      => __( 'Title, Tagline & Logo', 'amora' ),
    'priority'   => 30,
    'panel' => 'amora_header_panel'
) );
    function amora_logo_enabled($control) {
    $option = $control->manager->get_setting('custom_logo');
    return $option->value() == true;
}



//Replace Header Text Color with, separate colors for Title and Description
$wp_customize->get_control('header_textcolor')->label = __('Site Title Color','amora');
$wp_customize->add_setting('amora_header_desccolor', array(
    'default'     => '#fff',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'amora_header_desccolor', array(
        'label' => __('Site Tagline Color','amora'),
        'section' => 'colors',
        'settings' => 'amora_header_desccolor',
        'type' => 'color'
    ) )
);
//Skins
    //Select the Default Theme Skin
    $wp_customize->add_section(
        'amora_skin_options',
        array(
            'title' => __('Theme Skins', 'amora'),
            'priority' => 39,
            'panel'   => 'amora_design_panel'
        )
    );

    $wp_customize->add_setting(
        'amora_skin',
        array(
            'default' => 'default',
            'sanitize_callback' => 'amora_sanitize_skin'
        )
    );

    $skins = array('default' => __('Default(Blue)', 'amora'),
        'red' => __('Roman', 'amora'),
        'pink' => __('Sweet Pink', 'amora'),
        'caribbean-green' => __('Caribbean Green', 'amora'),

    );

    $wp_customize->add_control(
        'amora_skin', array(
            'settings' => 'amora_skin',
            'section' => 'amora_skin_options',
            'label' => __('Choose from the Skins Below', 'amora'),
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function amora_sanitize_skin($input)
    {
        if (in_array($input, array('default', 'red', 'caribbean-green','pink')))
            return $input;
        else
            return '';
    }
}
add_action( 'customize_register', 'amora_customize_register_skins' );