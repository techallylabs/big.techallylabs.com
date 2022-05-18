<?php

class bt_bb_price_list extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon'					=> '',
			'title'					=> '',
			'letter_spacing'		=> '',
			'subtitle'				=> '',
			'currency'				=> '',
			'price'					=> '',
			'price_detail'			=> '',			
			'items'					=> '',
			'background_color'  	=> ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $letter_spacing != '' ) {
			$class[] = $this->prefix . 'letter_spacing' . '_' . $letter_spacing;
		}

		if ( $background_color != '' ) {
			$el_style = $el_style . ';' . 'background-color:' . $background_color . ';';
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

		$content = do_shortcode( $content );
		$icon_html = bt_bb_icon::get_html( $icon, '' );

		


		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '"' . $style_attr . '>';
		

			// ICON + TITLE
			if ( $icon != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
			
			if ( $title != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_title">' . $title . '</div>';
			if ( $subtitle != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_subtitle">' . $subtitle . '</div>';

			// ITEMS
			if ( $items != '' ) {
				if ( base64_encode(base64_decode($items, true)) === $items){
					$items = base64_decode( $items );
				}

				$items_arr = preg_split( '/$\R?^/m', $items );

				$output .= '<ul>';
					foreach ( $items_arr as $item ) {
						$output .= '<li>' . $item . '</li>';
					}
				$output .= '</ul>';
			}

			// PRICE
			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_price">';
				if ( $currency != '' ) $output .= '<span class="' . esc_attr( $this->shortcode ) . '_currency">' . $currency . '</span>';
				if ( $price != '' ) $output .= '<span class="' . esc_attr( $this->shortcode ) . '_amount">' . $price . '</span>';
			$output .= '</div>';

			if ( $price_detail != '' ) $output .= '<span class="' . esc_attr( $this->shortcode ) . '_detail">' . $price_detail . '</span>';

			// CONTENT
			if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">' . ( $content ) . '</div>';
		
		$output .= '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		$icon_arr = array();
		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		}
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Price List', 'bt_plugin' ), 'description' => esc_html__( 'List of items with total price', 'bt_plugin' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'bt_plugin' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'bt_plugin' ), 'preview' => true ),
				array( 'param_name' => 'subtitle', 'type' => 'textfield', 'heading' => esc_html__( 'Subtitle', 'bt_plugin' ) ),
				array( 'param_name' => 'currency', 'type' => 'textfield', 'heading' => esc_html__( 'Currency', 'bt_plugin' ) ),
				array( 'param_name' => 'price', 'type' => 'textfield', 'heading' => esc_html__( 'Price', 'bt_plugin' ) ),
				array( 'param_name' => 'price_detail', 'type' => 'textfield', 'heading' => esc_html__( 'Price detail', 'bt_plugin' ) ),
				array( 'param_name' => 'items', 'type' => 'textarea_object', 'heading' => esc_html__( 'Items', 'bt_plugin' ) ),
				array( 'param_name' => 'letter_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Letter spacing (title)', 'bt_plugin' ), 'group' => esc_html__( 'Design', 'bt_plugin' ), 
					'value' => array(
						esc_html__( 'Default', 'bt_plugin' ) 	=> '',
						esc_html__( '1px', 'bt_plugin' ) 		=> '1px',
						esc_html__( '2px', 'bt_plugin' ) 		=> '2px',
						esc_html__( '3px', 'bt_plugin' ) 		=> '3px',
						esc_html__( '4px', 'bt_plugin' ) 		=> '4px'
					)
				),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Background color', 'bt_plugin' ), 'group' => esc_html__( 'Design', 'bt_plugin' ), 'preview' => true )
			)
		) );
	}
}