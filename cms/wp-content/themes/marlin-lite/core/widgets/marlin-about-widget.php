<?php

/***** About Widget *****/
class marlin_lite_about_widget extends WP_Widget {
    function __construct() {
		parent::__construct(
			'marlin_lite_about_widget', esc_html_x('[Marlin] About Widget', 'widget name', 'marlin-lite'),
			array('classname' => 'marlin_lite_about_widget', 'description' => esc_html__('About Widget with your image and description.', 'marlin-lite'))
		);
	}
	function widget( $args, $instance ) {
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters( 'widget_title', $instance['title'] );
		$imageurl = $instance['imageurl'];
		$imagealt = $instance['imagealt'];
		$imagewidth = $instance['imagewidth'];
		$imageheight = $instance['imageheight'];
		$aboutdescription = $instance['aboutdescription'];
		$feed = $instance['feed'];
		$facebook = $instance['facebook'];
		$twitter = $instance['twitter'];
		$googleplus = $instance['googleplus'];
		$linkedin = $instance['linkedin'];
		$youtube = $instance['youtube'];
		$instagram = $instance['instagram'];

		echo $before_widget; 
		?>

			<?php if($title != '') echo '<h4 class="widget-title">'.$title.'</h4>'; ?>
			
			<div class="about-widget widget-content">
				
				<div class="about-img">
					<img src="<?php echo esc_attr($imageurl); ?>" width="<?php echo esc_attr($imagewidth); ?>" height="<?php echo esc_attr($imageheight); ?>" class="about-img" alt="<?php echo esc_attr($imagealt); ?>">
				</div>
				
				<div class="about-description">
					<p><?php echo $aboutdescription; ?></p>
					<p class="about-social">
						<?php if($feed != '') echo '<a href="' . esc_url($feed) . '" title="' . __( 'Feed', 'marlin-lite' ) . '" class="' . __( 'fa fa-feed', 'marlin-lite' ) . '" target="' . __( '_blank', 'marlin-lite' ) . '"></a>'; ?>
						<?php if($facebook != '') echo '<a href="' . esc_url($facebook) . '" title="' . __( 'Facebook', 'marlin-lite' ) . '" class="' . __( 'fa fa-facebook', 'marlin-lite' ) . '" target="' . __( '_blank', 'marlin-lite' ) . '"></a>'; ?>
						<?php if($twitter != '') echo '<a href="' . esc_url($twitter) . '" title="' . __( 'Twitter', 'marlin-lite' ) . '" class="' . __( 'fa fa-twitter', 'marlin-lite' ) . '" target="' . __( '_blank', 'marlin-lite' ) . '"></a>'; ?>
						<?php if($googleplus != '') echo '<a href="' . esc_url($googleplus) . '" title="' . __( 'Google Plus', 'marlin-lite' ) . '" class="' . __( 'fa fa-google-plus', 'marlin-lite' ) . '" target="' . __( '_blank', 'marlin-lite' ) . '"></a>'; ?>
						<?php if($linkedin != '') echo '<a href="' . esc_url($linkedin) . '" title="' . __( 'LinkedIn', 'marlin-lite' ) . '" class="' . __( 'fa fa-linkedin', 'marlin-lite' ) . '" target="' . __( '_blank', 'marlin-lite' ) . '"></a>'; ?>
						<?php if($youtube != '') echo '<a href="' . esc_url($youtube) . '" title="' . __( 'Youtube', 'marlin-lite' ) . '" class="' . __( 'fa fa-youtube', 'marlin-lite' ) . '" target="' . __( '_blank', 'marlin-lite' ) . '"></a>'; ?>
						<?php if($instagram != '') echo '<a href="' . esc_url($instagram) . '" title="' . __( 'Instagram', 'marlin-lite' ) . '" class="' . __( 'fa fa-instagram', 'marlin-lite' ) . '" target="' . __( '_blank', 'marlin-lite' ) . '"></a>'; ?>
					</p>
				</div>
			</div>

		<?php
		echo $after_widget;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 
				'title' => '', 
				'imageurl' => 'http://...', 
				'imagealt' => '',  
				'imagewidth' => '250', 
				'imageheight' => '250',
				'aboutdescription' => '',
				'feed' => './feed/', 
				'facebook' => '',
				'twitter' => '',
				'googleplus' => '',
				'linkedin' => '',
				'youtube' => '',
				'instagram' => '',
			);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title' )); ?>"><?php _e('Title:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'imageurl' )); ?>"><?php _e('Image URL:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'imageurl' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'imageurl' )); ?>" type="text" value="<?php echo esc_attr($instance['imageurl']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'imagealt' )); ?>"><?php _e('Image ALT:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'imagealt' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'imagealt' )); ?>" type="text" value="<?php echo esc_attr($instance['imagealt']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'imagewidth' )); ?>"><?php _e('Image Width:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'imagewidth' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'imagewidth' )); ?>" type="text" value="<?php echo esc_attr($instance['imagewidth']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'imageheight' )); ?>"><?php _e('Image Height:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'imageheight' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'imageheight' )); ?>" type="text" value="<?php echo esc_attr($instance['imageheight']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'aboutdescription' )); ?>"><?php _e('About Description:','marlin-lite'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'aboutdescription' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'aboutdescription' )); ?>" rows="12" cols="20"><?php echo esc_attr($instance['aboutdescription']); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'feed' )); ?>"><?php _e('Feed:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'feed' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'feed')); ?>" type="text" value="<?php echo esc_attr($instance['feed']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php _e('Facebook:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" type="text" value="<?php echo esc_attr($instance['facebook']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php _e('Twitter:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" type="text" value="<?php echo esc_attr($instance['twitter']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>"><?php _e('Googleplus:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'googleplus' )); ?>" type="text" value="<?php echo esc_attr($instance['googleplus']); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>"><?php _e('Linkedin:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin' )); ?>" type="text" value="<?php echo esc_attr($instance['linkedin']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php _e('Youtube:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" type="text" value="<?php echo esc_attr($instance['youtube']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php _e('Instagram:','marlin-lite'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" type="text" value="<?php echo esc_attr($instance['instagram']); ?>" />
		</p>

		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = wp_strip_all_tags ( $new_instance['title'] );
		$instance['imageurl'] = esc_url_raw ( $new_instance['imageurl'] );
		$instance['imagealt'] = wp_strip_all_tags ( $new_instance['imagealt'] );
		$instance['imagewidth'] = wp_strip_all_tags ( $new_instance['imagewidth'] );
		$instance['imageheight'] = wp_strip_all_tags ( $new_instance['imageheight'] );
		$instance['aboutdescription'] = wp_strip_all_tags ( $new_instance['aboutdescription'] );
		$instance['feed'] = wp_strip_all_tags ( $new_instance['feed'] );
		$instance['facebook'] = esc_url_raw ( $new_instance['facebook'] );
		$instance['twitter'] = esc_url_raw ( $new_instance['twitter'] );
		$instance['googleplus'] = esc_url_raw ( $new_instance['googleplus'] );
		$instance['linkedin'] = esc_url_raw ( $new_instance['linkedin'] );
		$instance['youtube'] = esc_url_raw ( $new_instance['youtube'] );
		$instance['instagram'] = esc_url_raw ( $new_instance['instagram'] );

		return $instance;
	}
	
} // class marlin_lite_about_widget
add_action('widgets_init', 'marlin_lite_about_init');
function marlin_lite_about_init() {
    register_widget('marlin_lite_about_widget');
}

?>