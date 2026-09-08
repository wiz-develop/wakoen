<?php
//hero 1 section start
//HERO 1
function amora_customize_register_front_hero($wp_customize) {
$wp_customize->add_section('amora_hero1_section',


array(
'title' => __('HERO (Above Content)', 'amora'),
'priority' => 50,
)
);

$wp_customize->add_setting('amora_hero_enable',
array(
'sanitize_callback' => 'amora_sanitize_checkbox'
));
$wp_customize->add_control('amora_hero_enable',
array(
'setting' => 'amora_hero_enable',
'section' => 'amora_hero1_section',
'label' => __('Enable HERO', 'amora'),
'type' => 'checkbox',
'default' => false,
)
);

$wp_customize->add_setting('amora_hero_background_image',
array(
'sanitize_callback' => 'esc_url_raw',
)
);

$wp_customize->add_control(
new WP_Customize_Image_Control(
$wp_customize, 'amora_hero_background_image',
array (
'setting' => 'amora_hero_background_image',
'section' => 'amora_hero1_section',
'label' => __('Background Image', 'amora'),
'description' => __('Upl    oad an image to display in background of HERO', 'amora'),
'active_callback' => 'amora_hero_active_callback'
)
)
);

$wp_customize->add_setting('amora_hero1_selectpage',
array(
'sanitize_callback' => 'absint'
)
);

$wp_customize->add_control('amora_hero1_selectpage',
array(
'setting' => 'amora_hero1_selectpage',
'section' => 'amora_hero1_section',
'label' => __('Title', 'amora'),
'description' => __('Select a Page to display Title. Make sure page should contain feature image.', 'amora'),
'type' => 'dropdown-pages',
'active_callback' => 'amora_hero_active_callback'
)
);


$wp_customize->add_setting('amora_hero1_full_content',
array(
'sanitize_callback' => 'amora_sanitize_checkbox'
)
);

$wp_customize->add_control('amora_hero1_full_content',
array(
'setting' => 'amora_hero1_full_content',
'section' => 'amora_hero1_section',
'label' => __('Show Full Content insted of excerpt', 'amora'),
'type' => 'checkbox',
'default' => false,
'active_callback' => 'amora_hero_active_callback'
)
);

$wp_customize->add_setting('amora_hero1_button',
array(
'sanitize_callback' => 'sanitize_text_field'
)
);

$wp_customize->add_control('amora_hero1_button',
array(
'setting' => 'amora_hero1_button',
'section' => 'amora_hero1_section',
'label' => __('Button Name', 'amora'),
'description' => __('Leave blank to disable Button.', 'amora'),
'type' => 'text',
'active_callback' => 'amora_hero_active_callback'
)
);

function amora_hero_active_callback( $control ) {
$option = $control->manager->get_setting('amora_hero_enable');
return $option->value() == true;
}

//hero 1 section end
}
add_action('customize_register', 'amora_customize_register_front_hero');