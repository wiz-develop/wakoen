<?php
//upgrade
function amora_customize_register_misc( $wp_customize ) {
$wp_customize->add_section(
    'amora_sec_upgrade',
    array(
        'title'     => __('Amora - Help & Support','amora'),
        'priority'  => 1,
    )
);

$wp_customize->add_setting(
    'amora_upgrade',
    array( 'sanitize_callback' => 'esc_textarea' )
);

$wp_customize->add_control(
    new Amora_WP_Customize_Upgrade_Control(
        $wp_customize,
        'amora_upgrade',
        array(
            'label' => __('Free Email Support','amora'),
            'description' => __('Currently We are Offering Free Email Support with our theme. If you have any queries or require help please <a target="_blank" href="https://inkhive.com/free-theme-support/">Read our FAQs</a> and if your problem is still not solved then contact us. <br><br> If you are looking for more features in your site like Unlimited Colors, More Layouts, Better Pages, More Social Icons, More Skins, More Widgets then please consider upgrading to <a href="https://inkhive.com/product/amora/" target="_blank">Amora Pro</a>.','amora'),
            'section' => 'amora_sec_upgrade',
            'settings' => 'amora_upgrade',
        )
    )
);
}
add_action( 'customize_register', 'amora_customize_register_misc' );