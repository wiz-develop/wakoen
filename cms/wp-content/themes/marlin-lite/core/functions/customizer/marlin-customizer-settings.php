<?php

/** Marlin - Customizer - Add Settings */
function marlin_lite_register_theme_customizer( $wp_customize )
{
	/** Add Sections -----------------------------------------------------------------------------------------------------------*/
    $wp_customize->add_section( 'marlin_lite_new_section_social_media', array(
		'title' 	   => __('Social Media Settings','marlin-lite'),
		'description'  => __('Enter your Social Media profile URL.','marlin-lite')
	) );
    $wp_customize->add_section( 'color', array(
		'title' 	   => __('Colors Scheme','marlin-lite'),
   		'description'  => ''
	) );
	$wp_customize->add_section('vt_upgrade', array(
		'title' 	   => __('Upgrade to Premium','marlin-lite'),
		'priority' => 200,
	) );

    /** Add Settings ------------------------------------------------------------------------------------------------------------*/
  
    // Social media settings
    $wp_customize->add_setting( 'marlin_lite_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_setting( 'marlin_lite_twitter', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_setting( 'marlin_lite_google', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_setting( 'marlin_lite_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    $wp_customize->add_setting( 'marlin_lite_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ) );
     $wp_customize->add_setting( 'marlin_lite_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ) );
    // Color Scheme
    $wp_customize->add_setting( 'marlin_lite_color_scheme', array(
        'default'           => '#f37e7e',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );  
	// Upgrade
	$wp_customize->add_setting('vt_options[premium_version_upgrade]', array(
		'default'			=> '',
		'type'				=> 'option',
		'sanitize_callback' => 'esc_url_raw'
	) );
    
    /** Add Control ------------------------------------------------------------------------------------------------------------*/
    // Social Media
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'facebook',
			array(
				'label'	     => __('Facebook', 'marlin-lite'),
				'section'    => 'marlin_lite_new_section_social_media',
				'settings'   => 'marlin_lite_facebook',
				'type'		 => 'text',
				'priority'	 => 1
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'twitter',
			array(
				'label'	     => __('Twitter', 'marlin-lite'),
				'section'    => 'marlin_lite_new_section_social_media',
				'settings'   => 'marlin_lite_twitter',
				'type'		 => 'text',
				'priority'	 => 2
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'google',
			array(
				'label'	     => __('Google Plus', 'marlin-lite'),
				'section'    => 'marlin_lite_new_section_social_media',
				'settings'   => 'marlin_lite_google',
				'type'		 => 'text',
				'priority'	 => 3
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'linkedin',
			array(
				'label'	     => __('Linkedin', 'marlin-lite'),
				'section'    => 'marlin_lite_new_section_social_media',
				'settings'   => 'marlin_lite_linkedin',
				'type'		 => 'text',
				'priority'	 => 4
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'youtube',
			array(
				'label'	     => __('Youtube', 'marlin-lite'),
				'section'    => 'marlin_lite_new_section_social_media',
				'settings'   => 'marlin_lite_youtube',
				'type'		 => 'text',
				'priority'	 => 5
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'instagram',
			array(
				'label'	     => __('Instagram', 'marlin-lite'),
				'section'    => 'marlin_lite_new_section_social_media',
				'settings'   => 'marlin_lite_instagram',
				'type'		 => 'text',
				'priority'	 => 6
			)
		)
	);

	// Color Scheme
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_scheme',
			array(
				'label'	     => __('Color Scheme', 'marlin-lite'),
				'section'    => 'colors',
				'settings'   => 'marlin_lite_color_scheme',
				'priority'	 => 1
			)
		)
	);

	// Premium upgrade
	class marlin_lite_Customize_Upgrade_Control extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="vt-upgrade-thumb">
        		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/marlin-premium.png" />
        	</p>
        	<p class="vt-upgrade-title">
        		<span class="customize-control-title">
        			<?php _e('More Features and Options', 'marlin-lite'); ?>
        		</span>
        	</p>
        	<p class="vt-upgrade-text">
        		<span class="textfield">
        			<?php _e('Check out the premium version of this theme which comes with more great Features, Additional widgets, Featured Slider, and Advanced customization options for your website.', 'marlin-lite'); ?>
        		</span>
			</p>
			<p class="vt-upgrade-button">
				<a href="http://volthemes.com/theme/marlin/?utm_source=marlin+lite&amp;utm_campaign=WordPressOrg" target="_blank" class="button button-secondary">
					<?php _e('Learn more about premium version', 'marlin-lite'); ?>
				</a>
			</p><?php
        }
    }
		
	$wp_customize->add_control(
		new marlin_lite_Customize_Upgrade_Control(
			$wp_customize,
			'premium_version_upgrade', 
			array(
				'section' => 'vt_upgrade',
				'settings' => 'vt_options[premium_version_upgrade]',
			)
		)
	);
	
}

add_action( 'customize_register', 'marlin_lite_register_theme_customizer' );