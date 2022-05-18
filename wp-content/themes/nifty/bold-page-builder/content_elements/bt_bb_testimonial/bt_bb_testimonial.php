<?php

class bt_bb_testimonial extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'text'						=> '',
			'logo'						=> '',
			'name'						=> '',
			'details'					=> '',
			'signature'					=> '',
			'font_weight'				=> '',
			'text_font'          		=> '',
			'text_font_subset'			=> '',
			'text_size'					=> '',
			'text_style'				=> '',
			'quote_color'				=> '',
			'quote_position'			=> ''
			
		) ), $atts, $this->shortcode ) );

		if ( $text_font != '' && $text_font != 'inherit'  ) {
			require_once( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/misc.php' );
			
			if ( $text_font != '' && $text_font != 'inherit' ) {
				bt_bb_enqueue_google_font( $text_font, $text_font_subset );
			}
		}

		$text = html_entity_decode( $text, ENT_QUOTES, 'UTF-8' );

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $text_size != '' ) {
			$class[] = $this->prefix . 'text_size' . '_' . $text_size;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight' . '_' . $font_weight;
		}

		if ( $quote_color != '' ) {
			$class[] = $this->prefix . 'quote_color' . '_' . $quote_color;
		}

		if ( $quote_position != '' ) {
			$class[] = $this->prefix . 'quote_position' . '_' . $quote_position;
		}

		if ( $text_style != '' ) {
			$class[] = $this->prefix . 'text_style' . '_' . $text_style;
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

		/* style text font */
		$html_text_tag_style = "";
		$html_text_tag_style_arr = array();		

		if ( $text_font != '' && $text_font != 'inherit' ) {
			$html_text_tag_style_arr[] = 'font-family:\'' . urldecode_deep( $text_font ) . '\'';
		}
		if ( count( $html_text_tag_style_arr ) > 0 ) {
			$html_text_tag_style = ' style="' . implode( '; ', $html_text_tag_style_arr ) . ';"';
		}


		$output = '';

		// TEXT
		if ( $text != '' ) {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '"><span'. $html_text_tag_style  . '>' . $text . '</span></div>';
		}

		// NAME & DETAILS
		$output .= '<div class="' . esc_attr( $this->shortcode . '_text_box' ) . '">';
			$output .= '<div class="' . esc_attr( $this->shortcode . '_left_box' ) . '">';
				if ( $logo != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_logo') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $logo ) . '" size="boldthemes_small" ignore_fe_editor="true"]' ) . '</div>';
				if ( $name != '' ) $output .= '<span class="' . esc_attr( $this->shortcode . '_name' ) . '">' . $name . '</span>';
				if ( $details != '' ) $output .= '<span class="' . esc_attr( $this->shortcode . '_details' ) . '">' . $details . '</span>';
			$output .= '</div>';

			$output .= '<div class="' . esc_attr( $this->shortcode . '_right_box' ) . '">';
				if ( $signature != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_signature') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $signature ) . '" size="boldthemes_small" ignore_fe_editor="true"]' ) . '</div>';
			$output .= '</div>';

		$output .= '</div>';


		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;

	}


	function map_shortcode() {

		require( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/fonts.php' );

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Testimonial', 'nifty' ), 'description' => esc_html__( 'Testimonial with ratings, text and title', 'nifty' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Quote text', 'nifty' ) ),
				array( 'param_name' => 'logo', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Logo', 'nifty' ) ),
				array( 'param_name' => 'name', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Name', 'nifty' ) ),
				array( 'param_name' => 'details', 'type' => 'textarea', 'heading' => esc_html__( 'Details', 'nifty' ) ),
				array( 'param_name' => 'signature', 'type' => 'attach_image', 'heading' => esc_html__( 'Signature image', 'nifty' ) ),

				
				array( 'param_name' => 'quote_color', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Quote icon color', 'nifty' ), 
					'value' => array(
						esc_html__( 'Gray color', 'nifty' ) 				=> '',
						esc_html__( 'Light color', 'nifty' ) 				=> 'light',
						esc_html__( 'Dark color', 'nifty' ) 				=> 'dark',
						esc_html__( 'Accent color', 'nifty' ) 			=> 'accent',
						esc_html__( 'Alternate color', 'nifty' ) 			=> 'alternate',
						esc_html__( 'Transparent light color', 'nifty' ) 	=> 'transparent_light',
					)
				),
				array( 'param_name' => 'quote_position', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Show quote icon', 'nifty' ), 
					'value' => array(
						esc_html__( 'Show', 'nifty' ) 				=> '',
						esc_html__( 'Hide', 'nifty' ) 				=> 'hide'
					)
				),
				array( 'param_name' => 'text_size', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Quote text size', 'nifty' ), 
					'value' => array(
						esc_html__( 'Small', 'nifty' ) 				=> '',
						esc_html__( 'Medium', 'nifty' ) 				=> 'medium',
						esc_html__( 'Large', 'nifty' ) 				=> 'large'
					)
				),
				array( 'param_name' => 'text_style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Quote text style', 'nifty' ),
					'value' => array(
						esc_html__( 'Normal', 'nifty' ) 				=> '',
						esc_html__( 'Italic', 'nifty' ) 				=> 'italic'
					)
				),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Quote font weight', 'nifty' ),
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
				array( 'param_name' => 'text_font', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Quote text font', 'nifty' ),
					'value' => array( esc_html__( 'Inherit', 'nifty' ) => 'inherit' ) + $font_arr
				),
				array( 'param_name' => 'text_font_subset', 'type' => 'textfield', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Quote text font subset', 'nifty' ), 'value' => 'latin,latin-ext', 'description' => 'E.g. latin,latin-ext,cyrillic,cyrillic-ext' ),

			))
		);
	}
}