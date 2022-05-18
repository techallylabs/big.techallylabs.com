<?php

class bt_bb_accordion extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'style'        => '',
			'shape'        => '',
			'closed'       => ''
		) ), $atts, $this->shortcode ) );
		
		wp_enqueue_script(
			'bt_bb_accordion',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_accordion/bt_bb_accordion.js',
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

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}		

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		$data_attr = '';
		if ( $closed == 'closed' ) {
			$data_attr = ' ' . 'data-closed=closed';
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$content = do_shortcode( $content );

		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . $data_attr . '>' . $content . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Accordion', 'nifty' ), 'description' => esc_html__( 'Accordion container', 'nifty' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_accordion_item' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'toggle' => true,
			'params' => array(
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Outline', 'nifty' ) 	=> 'outline',
						esc_html__( 'Filled', 'nifty' ) 	=> 'filled',
						esc_html__( 'Simple', 'nifty' ) 	=> 'simple'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'nifty' ),
					'value' => array(
						esc_html__( 'Square', 'nifty' ) 	=> 'square',
						esc_html__( 'Rounded', 'nifty' ) 	=> 'rounded'
					)
				),
				array( 'param_name' => 'closed', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'nifty' ) => 'closed' ), 'heading' => esc_html__( 'All items closed initially', 'nifty' ), 'preview' => true )
			)
		) );
	}
}