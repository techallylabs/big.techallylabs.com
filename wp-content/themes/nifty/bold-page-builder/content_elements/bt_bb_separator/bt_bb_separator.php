<?php

class bt_bb_separator extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'top_spacing'    => '',
			'bottom_spacing' => '',
			'text'			 => '',
			'border_style'   => '',
			'border_color'   => '',
			'border_width'   => '',
			'opacity'   	 => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		
		if ( $text != '' ) {
			$class[] = "btWithText";
		}

		if ( $border_style != '' ) {
			$class[] = $this->prefix . 'border_style' . '_' . $border_style;
		}

		if ( $border_color != '' ) {
			$class[] = $this->prefix . 'border_color' . '_' . $border_color;
		}

		if ( $border_width != '' ) {
			$el_style = $el_style . '; border-width: ' . $border_width;
			if ( $border_style == 'none' ) {
				$el_style = $el_style . '; border-color: transparent; border-style: solid;';
			}
		}

		if ( $opacity != '' ) {
			$el_style = $el_style . '; opacity: ' . $opacity;
		}
		
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$this->responsive_data_override_class(
			$class, $data_override_class,
			array(
				'prefix' => $this->prefix,
				'param' => 'top_spacing',
				'value' => $top_spacing
			)
		);
		
		$this->responsive_data_override_class(
			$class, $data_override_class,
			array(
				'prefix' => $this->prefix,
				'param' => 'bottom_spacing',
				'value' => $bottom_spacing
			)
		);
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		if ( $text != '' ) {
			$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-bt-override-class="' . htmlspecialchars( json_encode( $data_override_class, JSON_FORCE_OBJECT ), ENT_QUOTES, 'UTF-8' ) . '"><span class="' . esc_attr( $this->shortcode . '_text' ) . '">' . ( $text ) . '</span></div>';
		} else {
			$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-bt-override-class="' . htmlspecialchars( json_encode( $data_override_class, JSON_FORCE_OBJECT ), ENT_QUOTES, 'UTF-8' ) . '"></div>';
		}

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Separator', 'nifty' ), 'description' => esc_html__( 'Separator line', 'nifty' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array( 
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'nifty' ), 'preview' => true,
					'responsive_override' => true, 
					'value' => array(
						esc_html__( 'No spacing', 'nifty' ) 	=> '',
						esc_html__( 'Extra small', 'nifty' ) 	=> 'extra_small',
						esc_html__( 'Small', 'nifty' ) 		=> 'small',		
						esc_html__( 'Normal', 'nifty' ) 		=> 'normal',
						esc_html__( 'Medium', 'nifty' )	 	=> 'medium',
						esc_html__( 'Large', 'nifty' ) 		=> 'large',
						esc_html__( 'Extra large', 'nifty' ) 	=> 'extra_large',
						esc_html__( '5px', 'nifty' ) 			=> '5',
						esc_html__( '10px', 'nifty' ) 		=> '10',
						esc_html__( '15px', 'nifty' ) 		=> '15',
						esc_html__( '20px', 'nifty' ) 		=> '20',
						esc_html__( '25px', 'nifty' ) 		=> '25',
						esc_html__( '30px', 'nifty' ) 		=> '30',
						esc_html__( '35px', 'nifty' ) 		=> '35',
						esc_html__( '40px', 'nifty' ) 		=> '40',
						esc_html__( '45px', 'nifty' ) 		=> '45',
						esc_html__( '50px', 'nifty' ) 		=> '50',
						esc_html__( '60px', 'nifty' )			=> '60',
						esc_html__( '70px', 'nifty' ) 		=> '70',
						esc_html__( '80px', 'nifty' ) 		=> '80',
						esc_html__( '90px', 'nifty' ) 		=> '90',
						esc_html__( '100px', 'nifty' ) 		=> '100'
					)
				),
				array( 'param_name' => 'bottom_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom spacing', 'nifty' ), 'preview' => true,
					'responsive_override' => true, 
					'value' => array(
						esc_html__( 'No spacing', 'nifty' ) 	=> '',
						esc_html__( 'Extra small', 'nifty' ) 	=> 'extra_small',
						esc_html__( 'Small', 'nifty' ) 		=> 'small',		
						esc_html__( 'Normal', 'nifty' ) 		=> 'normal',
						esc_html__( 'Medium', 'nifty' ) 		=> 'medium',
						esc_html__( 'Large', 'nifty' ) 		=> 'large',
						esc_html__( 'Extra large', 'nifty' ) 	=> 'extra_large',
						esc_html__( '5px', 'nifty' ) 			=> '5',
						esc_html__( '10px', 'nifty' ) 		=> '10',
						esc_html__( '15px', 'nifty' ) 		=> '15',
						esc_html__( '20px', 'nifty' ) 		=> '20',
						esc_html__( '25px', 'nifty' ) 		=> '25',
						esc_html__( '30px', 'nifty' ) 		=> '30',
						esc_html__( '35px', 'nifty' ) 		=> '35',
						esc_html__( '40px', 'nifty' ) 		=> '40',
						esc_html__( '45px', 'nifty' ) 		=> '45',
						esc_html__( '50px', 'nifty' ) 		=> '50',
						esc_html__( '60px', 'nifty' ) 		=> '60',
						esc_html__( '70px', 'nifty' ) 		=> '70',
						esc_html__( '80px', 'nifty' ) 		=> '80',
						esc_html__( '90px', 'nifty' ) 		=> '90',
						esc_html__( '100px', 'nifty' ) 		=> '100'
					)
				),	
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'border_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Border style', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'None', 'nifty' ) 		=> 'none',
						esc_html__( 'Solid', 'nifty' ) 		=> 'solid',
						esc_html__( 'Dotted', 'nifty' ) 		=> 'dotted',
						esc_html__( 'Dashed', 'nifty' ) 		=> 'dashed'
					)
				),
				array( 'param_name' => 'border_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Border color', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Inherit', 'nifty' ) 		=> 'none',
						esc_html__( 'Dark', 'nifty' ) 		=> 'dark',
						esc_html__( 'Light', 'nifty' ) 		=> 'light',
						esc_html__( 'Gray', 'nifty' ) 		=> 'gray',
						esc_html__( 'Accent', 'nifty' ) 		=> 'accent'
					)
				),
				array( 'param_name' => 'border_width', 'type' => 'textfield', 'heading' => esc_html__( 'Border width', 'nifty' ), 'description' => esc_html__( 'E.g. 5px or 1em', 'nifty' ) ),
				array( 'param_name' => 'opacity', 'type' => 'textfield', 'heading' => esc_html__( 'Separator opacity (e.g. 0.4)', 'nifty' ) )
			)
		) );
	}
}