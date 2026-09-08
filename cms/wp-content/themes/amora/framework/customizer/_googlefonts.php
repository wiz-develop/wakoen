<?php
//Google Fonts
function amora_customize_register_fonts( $wp_customize ) {
$wp_customize->add_section(
    'amora_typo_options',
    array(
        'title'     => __('Google Web Fonts','amora'),
        'priority'  => 41,
        'panel'     => 'amora_design_panel'
    )
);

$font_array = array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans');
$fonts = array_combine($font_array, $font_array);

$wp_customize->add_setting(
    'amora_title_font',
    array(
        'default'=> 'Bree Serif',
        'sanitize_callback' => 'amora_sanitize_gfont'
    )
);

function amora_sanitize_gfont( $input ) {
    if ( in_array($input, array('HIND','Khula','Open Sans','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Arimo','Bitter','Noto Sans') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'amora_title_font',array(
        'label' => __('Title','amora'),
        'settings' => 'amora_title_font',
        'section'  => 'amora_typo_options',
        'type' => 'select',
        'choices' => $fonts,
    )
);

$wp_customize->add_setting(
    'amora_body_font',
    array(	'default'=> 'Bitter',
        'sanitize_callback' => 'amora_sanitize_gfont' )
);

$wp_customize->add_control(
    'amora_body_font',array(
        'label' => __('Body','amora'),
        'settings' => 'amora_body_font',
        'section'  => 'amora_typo_options',
        'type' => 'select',
        'choices' => $fonts
    )
);
    //font size
    $font_size = array(
        '14px' => 'Default',
        'initial' => 'Initial',
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
        'larger' => 'Larger',
        'x-large' => 'Extra Large',
    );

    $wp_customize->add_setting(
        'amora_content_font_size', array(
            'default' => '14px',
            'sanitize_callback' => 'amora_sanitize_fontsize'
        )
    );

    function amora_sanitize_fontsize( $input ) {
        if ( in_array($input, array('14px','initial','small','medium','large','larger','x-large') ) )
            return $input;
        else
            return '';
    }



    $wp_customize->add_control(
        'amora_content_font_size', array(
            'settings' => 'amora_content_font_size',
            'label' => __( 'Content Font Size','amora' ),
            'description' => __('Select Font Size. This is only for the content on Static Page area. Not for Blog Posts, Pages or Archives.', 'amora'),
            'section'  => 'amora_basic_settings_section',
            'type'     => 'select',
            'choices' => $font_size
        )
    );

    //Page and Post content Font size start
    $wp_customize->add_setting(
        'amora_content_page_post_fontsize_set',
        array(
            'default' => 'default',
            'sanitize_callback' => 'amora_sanitize_content_size'
        )
    );
    function amora_sanitize_content_size( $input ) {
        if ( in_array($input, array('default','small','medium','large','extra-large') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'amora_content_page_post_fontsize_set', array(
            'settings' => 'amora_content_page_post_fontsize_set',
            'label'    => __( 'Page/Post Font Size','amora' ),
            'description' => __('Choose your font size. This is only for Posts and Pages. It wont affect your blog page.','amora'),
            'section'  => 'amora_typo_options',
            'type'     => 'select',
            'choices' => array(
                'default'   => 'Default',
                'small' => 'Small',
                'medium'   => 'Medium',
                'large'  => 'Large',
                'extra-large' => 'Extra Large',
            ),
        )
    );

    //Page and Post content Font size end


}
add_action( 'customize_register', 'amora_customize_register_fonts' );