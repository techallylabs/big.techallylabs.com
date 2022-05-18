<?php

class bt_bb_floating_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'image'      					=> '',
			'horizontal_position'  			=> 'left',
			'vertical_position'  			=> 'top',
			'animation_style'  				=> 'ease_out',
			'animation_delay'  				=> 'default',
			'animation_duration'  			=> '',
			'animation_speed'  				=> '1.0',
			'animation_direction'  			=> '',
			'lazy_load'  					=> 'no'
		) ), $atts, $this->shortcode ) );
		
		wp_enqueue_script(
			'bt_bb_floating_image',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_floating_image/bt_bb_floating_image.js',
			array( 'jquery' ),
			'',
			true
		);

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $horizontal_position != '' ) {
			$class[] = $this->shortcode . '_horizontal_position' . '_' . $horizontal_position;
		}

		if ( $vertical_position != '' ) {
			$class[] = $this->shortcode . '_vertical_position' . '_' . $vertical_position;
		}

		if ( $animation_delay != '' ) {
			$class[] = $this->shortcode . '_animation_delay' . '_' . $animation_delay;
		}

		if ( $animation_duration != '' ) {
			$class[] = $this->shortcode . '_animation_duration' . '_' . $animation_duration;
		}

		if ( $animation_style != '' ) {
			$class[] = $this->shortcode . '_animation_style' . '_' . $animation_style;
		}

		if ( $animation_direction != '' ) {
			$class[] = $this->shortcode . '_animation_direction' . '_' . $animation_direction;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );		
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}
	
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}


		$output = '';

		if ( $image != '' ) {
			$output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" size="full" lazy_load="' . esc_attr( $lazy_load ) . '" ignore_fe_editor="true"]' ) . '</div>';
		}
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . ' data-speed="' . esc_attr( $animation_speed ) . '" data-direction="' . esc_attr( $animation_direction ) . '" >' . ( $output ) . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Floating image', 'nifty' ), 'description' => esc_html__( 'Absolute positioned floating image', 'nifty' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'as_child' => array( 'only' => 'bt_bb_image, bt_bb_column, bt_bb_column_inner' ),
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'nifty' ) 
				),
				array( 'param_name' => 'vertical_position', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Vertical position', 'nifty' ), 
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 					=> 'default',
						esc_html__( 'Top (absolute)', 'nifty' ) 			=> 'top',
						esc_html__( 'Middle (absolute)', 'nifty' ) 		=> 'middle',
						esc_html__( 'Bottom (absolute)', 'nifty' ) 		=> 'bottom'
					)
				),
				array( 'param_name' => 'horizontal_position', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Horizontal position', 'nifty' ), 
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 					=> 'default',
						esc_html__( 'Left (absolute)', 'nifty' ) 			=> 'left',
						esc_html__( 'Center (absolute)', 'nifty' ) 		=> 'center',
						esc_html__( 'Right (absolute)', 'nifty' ) 		=> 'right'
					)
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'no', 'heading' => esc_html__( 'Lazy load this image', 'nifty' ),
					'value' => array(
						esc_html__( 'No', 'nifty' ) 						=> 'no',
						esc_html__( 'Yes', 'nifty' ) 						=> 'yes'
					)
				),
				array( 'param_name' => 'animation_style', 'preview' => true, 'default' => 'ease_out', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'nifty' ), 'heading' => esc_html__( 'Animation style (check https://easings.net/en)', 'nifty' ), 
					'value' => array(
						esc_html__( 'Ease out (default)', 'nifty' ) 		=> 'ease_out',
						esc_html__( 'Ease out sine', 'nifty' ) 			=> 'ease_out_sine',
						esc_html__( 'Ease in', 'nifty' ) 					=> 'ease_in',
						esc_html__( 'Ease in sine', 'nifty' ) 			=> 'ease_in_sine',
						esc_html__( 'Ease in out', 'nifty' ) 				=> 'ease_in_out',
						esc_html__( 'Ease in out sine', 'nifty' ) 		=> 'ease_in_out_sine',
						esc_html__( 'Ease in out bounce', 'nifty' ) 		=> 'ease_in_out_back'
					)
				),
				array( 'param_name' => 'animation_delay', 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'nifty' ), 'heading' => esc_html__( 'Animation delay', 'nifty' ), 
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 					=> 'default',
						esc_html__( '0ms', 'nifty' ) 						=> '0',
						esc_html__( '100ms', 'nifty' ) 					=> '100',
						esc_html__( '200ms', 'nifty' ) 					=> '200',
						esc_html__( '300ms', 'nifty' ) 					=> '300',
						esc_html__( '400ms', 'nifty' ) 					=> '400',
						esc_html__( '500ms', 'nifty' ) 					=> '500',
						esc_html__( '600ms', 'nifty' ) 					=> '600',
						esc_html__( '700ms', 'nifty' ) 					=> '700',
						esc_html__( '800ms', 'nifty' ) 					=> '800',
						esc_html__( '900ms', 'nifty' ) 					=> '900',
						esc_html__( '1000ms', 'nifty' ) 					=> '1000'
					)
				),
				array( 'param_name' => 'animation_duration', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'nifty' ), 'heading' => esc_html__( 'Animation duration', 'nifty' ), 
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 					=> 'default',
						esc_html__( '0ms', 'nifty' ) 						=> '0',
						esc_html__( '100ms', 'nifty' ) 					=> '100',
						esc_html__( '200ms', 'nifty' ) 					=> '200',
						esc_html__( '300ms', 'nifty' ) 					=> '300',
						esc_html__( '400ms', 'nifty' ) 					=> '400',
						esc_html__( '500ms', 'nifty' ) 					=> '500',
						esc_html__( '600ms', 'nifty' ) 					=> '600',
						esc_html__( '700ms', 'nifty' ) 					=> '700',
						esc_html__( '800ms', 'nifty' ) 					=> '800',
						esc_html__( '900ms', 'nifty' ) 					=> '900',
						esc_html__( '1000ms', 'nifty' ) 					=> '1000',
						esc_html__( '1100ms', 'nifty' ) 					=> '1100',
						esc_html__( '1200ms', 'nifty' ) 					=> '1200',
						esc_html__( '1300ms', 'nifty' ) 					=> '1300',
						esc_html__( '1400ms', 'nifty' ) 					=> '1400',
						esc_html__( '1500ms', 'nifty' ) 					=> '1500',
						esc_html__( '2000ms', 'nifty' ) 					=> '2000',
						esc_html__( '2500ms', 'nifty' ) 					=> '2500',
						esc_html__( '3000ms', 'nifty' ) 					=> '3000',
						esc_html__( '3500ms', 'nifty' ) 					=> '3500',
						esc_html__( '4000ms', 'nifty' ) 					=> '4000',
						esc_html__( '5000ms', 'nifty' ) 					=> '5000',
						esc_html__( '6000ms', 'nifty' ) 					=> '6000'
					)
				),
				array( 'param_name' => 'animation_speed', 'preview' => true, 'default' => '1.0', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'nifty' ), 'heading' => esc_html__( 'Animation amplitude', 'nifty' ), 
					'value' => array(
						esc_html__( '0.4 (very short)', 'nifty' ) 		=> '0.4',
						esc_html__( '0.6', 'nifty' ) 						=> '0.6',
						esc_html__( '0.8', 'nifty' ) 						=> '0.8',
						esc_html__( '1.0', 'nifty' ) 						=> '1.0',
						esc_html__( '1.2 (default)', 'nifty' ) 			=> '1.2',
						esc_html__( '1.4', 'nifty' ) 						=> '1.4',
						esc_html__( '1.6 (long)', 'nifty' ) 				=> '1.6',
						esc_html__( '1.8', 'nifty' ) 						=> '1.8',
						esc_html__( '2.0 (very long)', 'nifty' ) 			=> '2.0',
						esc_html__( '2.5 (very very long)', 'nifty' ) 	=> '2.5'
					)
				),
				array( 'param_name' => 'animation_direction', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'nifty' ), 'heading' => esc_html__( 'Animation direction', 'nifty' ), 
					'value' => array(
						esc_html__( 'Top & bottom', 'nifty' ) 			=> '',
						esc_html__( 'Left & right', 'nifty' ) 			=> 'left_right'
					)
				)
			)
		) );
	}
}