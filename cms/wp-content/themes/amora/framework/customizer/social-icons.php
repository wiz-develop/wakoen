<?php
// Social Icons
function amora_customize_register_social( $wp_customize ) {
$wp_customize->add_section('amora_social_section', array(
    'title' => __('Social Icons','amora'),
    'priority' => 44 ,
    'panel'   => 'amora_header_panel'
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','amora'),
    'facebook' => __('Facebook','amora'),
    'twitter' => __('Twitter','amora'),
    'google-plus' => __('Google Plus','amora'),
    'instagram' => __('Instagram','amora'),
    'rss' => __('RSS Feeds','amora'),
    'vine' => __('Vine','amora'),
    'vimeo-square' => __('Vimeo','amora'),
    'youtube' => __('Youtube','amora'),
    'flickr' => __('Flickr','amora'),
);

$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'amora_social_'.$x, array(
        'sanitize_callback' => 'amora_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'amora_social_'.$x, array(
        'settings' => 'amora_social_'.$x,
        'label' => __('Icon ','amora').$x,
        'section' => 'amora_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'amora_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'amora_social_url'.$x, array(
        'settings' => 'amora_social_url'.$x,
        'description' => __('Icon ','amora').$x.__(' Url','amora'),
        'section' => 'amora_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function amora_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'amora_customize_register_social' );