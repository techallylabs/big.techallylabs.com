<?php

class bt_bb_steps extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {

		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'align'      	=> '',
			'icons_size' 	=> '',
			'line_color' 	=> ''
		) ), $atts, $this->shortcode ) );
	
		wp_enqueue_script( 
			'bt_bb_steps',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_steps/bt_bb_steps.js',
			array( 'jquery' ),
			'',
			true
		);

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}

		if ( $icons_size != '' ) {
			$class[] = $this->prefix . 'icons_size' . '_' . $icons_size;
		}

		if ( $line_color != '' ) {
			$class[] = $this->prefix . 'line_color' . '_' . $line_color;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$content = do_shortcode( $content );

		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $content . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
			
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Steps', 'nifty' ), 'description' => esc_html__( 'Step line container', 'nifty' ), 'container' => 'vertical', 'auto_add' => 'bt_bb_inner_step', 'show_settings_on_create' => false, 'accept' => array( 'bt_bb_inner_step' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'align', 'type' => 'dropdown', 'default' => '', 'heading' => esc_html__( 'Align content', 'nifty' ),
					'value' => array(
						esc_html__( 'Inherit', 'nifty' ) 								=> '',
						esc_html__( 'Left', 'nifty' ) 								=> 'left',
						esc_html__( 'Right', 'nifty' ) 								=> 'right',
						esc_html__( 'Center', 'nifty' ) 								=> 'center'
				) ),
				array( 'param_name' => 'icons_size', 'type' => 'dropdown', 'default' => '', 'heading' => esc_html__( 'Icons size', 'nifty' ),
					'value' => array(
						esc_html__( 'Small', 'nifty' ) 								=> '',
						esc_html__( 'Normal', 'nifty' ) 								=> 'normal',
						esc_html__( 'Large', 'nifty' ) 								=> 'large'
				) ),
				array( 'param_name' => 'line_color', 'type' => 'dropdown', 'default' => '', 'heading' => esc_html__( 'Steps line color', 'nifty' ),
					'value' => array(
						esc_html__( 'Gray', 'nifty' ) 						=> '',
						esc_html__( 'Blue', 'nifty' ) 						=> 'blue'
				) )
			)
		) );
	}
}