<?php

class bt_bb_inner_step extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'      					=> '',
			'colored_icon'      			=> 'no_icon',
			'supertitle' 					=> '',
			'title' 						=> '',
			'html_tag'      				=> 'h3',
			'title_size'					=> '',
			'font_weight'   				=> '',
			'colored_icon_color_scheme' 	=> ''

		) ), $atts, $this->shortcode ) );
		
		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );
		
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

		if ( $title_size != '' ) {
			$class[] = $this->prefix . 'title_size' . '_' . $title_size;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight_' . $font_weight ;
		}

		if ( $colored_icon_color_scheme != '' ) {
			$class[] = $this->prefix . 'colored_icon_color_scheme' . '_' . $colored_icon_color_scheme;
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$icon_html = bt_bb_icon::get_html( $icon, '' );

		$output = '';
		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . ' bt_bb_animation_fade_in animate move_right"' . $style_attr . '>';

			// CONTENT
			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_content">';
				
				// ICON
				if ( $icon != '' && $colored_icon == '' || $colored_icon == 'no_icon'  ) {
					
					$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
					
				}

				// COLORED ICON
				if ( $colored_icon != '' && $colored_icon != 'no_icon' ) {
					
					$output .= '<div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '">';
						$output .= bt_bb_get_svg_icon_html( $colored_icon );
					$output .= '</div>';
					
				}

				// LINE
				$output .= '<div class="' . esc_attr( $this->shortcode . '_line' ) . '"></div>';

				// SUPERTITLE
				if ( $supertitle != '' ) $output .= '<span class="' . esc_attr( $this->shortcode ) . '_supertitle">' . $supertitle . '</span>';

				// TITLE
				if ( $title != '' ) $output .= '<'. $html_tag .' class="' . esc_attr( $this->shortcode ) . '_title">' . $title . '</' . $html_tag . '>';

			
			$output .= '</div>';

			

		$output .= '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		$svg_icons_arr = bt_bb_get_svg_icons_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Inner step', 'nifty' ), 'description' => esc_html__( 'Inner step element', 'nifty' ), 'as_child' => array( 'only' => 'bt_bb_steps' ), 'accept' => array( 'bt_bb_section' => false, 'bt_bb_row' => false, 'bt_bb_column' => false, 'bt_bb_column_inner' => false, 'bt_bb_tabs' => false, 'bt_bb_tab_item' => false, 'bt_bb_accordion' => false, 'bt_bb_accordion_item' => false, 'bt_bb_cost_calculator_item' => false, 'bt_cc_group' => false, 'bt_cc_multiply' => false, 'bt_cc_item' => false, 'bt_bb_content_slider_item' => false, 'bt_bb_google_maps_location' => false, '_content' => false ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'colored_icon', 'type' => 'dropdown', 'default' => 'no_icon', 'heading' => esc_html__( 'Colored Icon', 'nifty' ), 'description' => esc_html__( 'If colored icon is chosen from the list, regular icon will not be displayed', 'nifty' ), 'value' => $svg_icons_arr ),
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'nifty' ) ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'default' => 'h3', 'heading' => esc_html__( 'HTML tag', 'nifty' ),
					'value' => array(
						esc_html__( 'h1', 'nifty' ) => 'h1',
						esc_html__( 'h2', 'nifty' ) => 'h2',
						esc_html__( 'h3', 'nifty' ) => 'h3',
						esc_html__( 'h4', 'nifty' ) => 'h4',
						esc_html__( 'h5', 'nifty' ) => 'h5',
						esc_html__( 'h6', 'nifty' ) => 'h6'
				) ),
				array( 'param_name' => 'title_size', 'type' => 'dropdown', 'default' => '', 'heading' => esc_html__( 'Title size', 'nifty' ),
					'value' => array(
						esc_html__( 'Small', 'nifty' ) 								=> 'small',
						esc_html__( 'Medium', 'nifty' ) 								=> '',
						esc_html__( 'Large', 'nifty' ) 								=> 'large'
				) ),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'nifty' ), 
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 				=> '',
						esc_html__( 'Thin', 'nifty' ) 				=> 'thin',
						esc_html__( 'Lighter', 'nifty' ) 				=> 'lighter',
						esc_html__( 'Light', 'nifty' ) 				=> 'light',
						esc_html__( 'Normal', 'nifty' ) 				=> 'normal',
						esc_html__( 'Medium', 'nifty' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'nifty' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'nifty' ) 				=> 'bold',
						esc_html__( 'Bolder', 'nifty' ) 				=> 'bolder',
						esc_html__( 'Black', 'nifty' ) 				=> 'black'
					)
				),
				array( 'param_name' => 'colored_icon_color_scheme', 'type' => 'dropdown', 'default' => '', 'heading' => esc_html__( 'Colored icon color scheme', 'nifty' ),
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 								=> '',
						esc_html__( 'Dark, Accent color', 'nifty' ) 					=> 'accent',
						esc_html__( 'Light, Accent color', 'nifty' ) 					=> 'light_accent',
						esc_html__( 'Alternate color', 'nifty' ) 						=> 'alternate'
				) )				
			)
		) );
	}
}