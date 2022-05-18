<?php

class bt_bb_card_icon extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'      					=> '',
			'colored_icon'         			=> 'no_icon',
			'colored_icon_color_scheme' 	=> '',
			'title'							=> '',
			'html_tag'      				=> 'h3',
			'text'							=> '',
			'url'    						=> '',
			'target' 						=> '',
			'border'						=> '',
			'shadow'						=> '',
			'title_size'					=> '',
			'font_weight'   				=> '',
			'colored_icon_size'         	=> '',			
		) ), $atts, $this->shortcode ) );

		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );
		$text = html_entity_decode( $text, ENT_QUOTES, 'UTF-8' );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$text = nl2br( $text );
		$title = nl2br( $title );

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight_' . $font_weight ;
		}

		if ( $shadow != '' ) {
			$class[] = $this->prefix . 'shadow' . '_' . $shadow;
		}

		if ( $colored_icon_size != '' ) {
			$class[] = $this->prefix . 'colored_icon_size' . '_' . $colored_icon_size;
		}

		if ( $title_size != '' ) {
			$class[] = $this->prefix . 'title_size' . '_' . $title_size;
		}

		if ( $url != '' ) {
			$class[] = 'WithLink';
		}

		if ( $colored_icon_color_scheme != '' ) {
			$class[] = $this->prefix . 'colored_icon_color_scheme' . '_' . $colored_icon_color_scheme;
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );		
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}

		$icon_html = bt_bb_icon::get_html( $icon, '' );

		$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $title ) );
		$link = bt_bb_get_permalink_by_slug( $url );

		$content = do_shortcode( $content );


		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '"' . $style_attr . '>';
		
			// CONTENT
			$output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '">';
				
				// ICON
				if ( $icon != '' && $colored_icon == '' || $colored_icon == 'no_icon'  ) {
					
					if ( $url != '') {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . $icon_html . '<a/></div>';
					} else {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
					}
				}


				// COLORED ICON
				if ( $colored_icon != '' && $colored_icon != 'no_icon' ) {
					if ( $url != '') {
						$output .= '<a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '"><div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '">';
							$output .= bt_bb_get_svg_icon_html( $colored_icon );
						$output .= '</div></a>';
					} else {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '">';
							$output .= bt_bb_get_svg_icon_html( $colored_icon );
						$output .= '</div>';
					}
					
				}

				// TITLE & TEXT
				$output .= '<div class="' . esc_attr( $this->shortcode . '_text_inner' ) . '">';
				
					if ( $url != '') {
						if ( $title != '' ) $output .= '<'. $html_tag . ' class="' . esc_attr( $this->shortcode . '_title' ) . '"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . $title . '</a></' . $html_tag . '>';
					} else {
						if ( $title != '' ) $output .= '<'. $html_tag . ' class="' . esc_attr( $this->shortcode . '_title' ) . '">' . $title . '</' . $html_tag . '>';
					}

					if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '"><p>' . $text . '</p></div>';

				$output .= '</div>';

				// CONTENT
				if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">' . ( $content ) . '</div>';

			$output .= '</div>';

		$output .= '</div>';


		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		$svg_icons_arr = bt_bb_get_svg_icons_param_array();

		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Card Icon', 'nifty' ), 'description' => esc_html__( 'Card with icon, title and text', 'nifty' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_separator' => true ),
			'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'colored_icon', 'type' => 'dropdown', 'default' => 'no_icon', 'heading' => esc_html__( 'Colored Icon', 'nifty' ), 'description' => esc_html__( 'If colored icon is chosen from the list, regular icon will not be displayed', 'nifty' ), 'value' => $svg_icons_arr ),
				

				array( 'param_name' => 'title', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Title', 'nifty' ) 
				),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'nifty' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'default' => 'h3', 'heading' => esc_html__( 'HTML tag', 'nifty' ),
					'value' => array(
						esc_html__( 'h1', 'nifty' ) 					=> 'h1',
						esc_html__( 'h2', 'nifty' ) 					=> 'h2',
						esc_html__( 'h3', 'nifty' ) 					=> 'h3',
						esc_html__( 'h4', 'nifty' ) 					=> 'h4',
						esc_html__( 'h5', 'nifty' ) 					=> 'h5',
						esc_html__( 'h6', 'nifty' ) 					=> 'h6'
				) ),



				array( 'param_name' => 'url', 'preview' => true, 'type' => 'textfield', 'group' => esc_html__( 'URL', 'nifty' ), 'heading' => esc_html__( 'URL', 'nifty' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'nifty' ), 'heading' => esc_html__( 'Target', 'nifty' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'nifty' ) 				=> '_self',
						esc_html__( 'Blank (open in new tab)', 'nifty' ) 				=> '_blank',
				) ),

				
				array( 'param_name' => 'title_size', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Title size', 'nifty' ),
					'value' => array(
						esc_html__( 'Extra small', 'nifty' ) 								=> 'extrasmall',
						esc_html__( 'Small', 'nifty' ) 								=> 'small',
						esc_html__( 'Medium', 'nifty' ) 								=> '',
						esc_html__( 'Large', 'nifty' ) 								=> 'large'
				) ),
				
				array( 'param_name' => 'colored_icon_color_scheme', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Colored icon color scheme', 'nifty' ),
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 								=> '',
						esc_html__( 'Accent color', 'nifty' ) 						=> 'accent',
						esc_html__( 'Alternate color', 'nifty' ) 						=> 'alternate',
						esc_html__( 'Gray color', 'nifty' ) 							=> 'gray'
				) ),
				array( 'param_name' => 'border', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Show border', 'nifty' ),
					'value' => array(
						esc_html__( 'No', 'nifty' ) 									=> '',
						esc_html__( 'Yes', 'nifty' ) 									=> 'visible'
				) ),
				
				array( 'param_name' => 'shadow', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Show shadow', 'nifty' ),
					'value' => array(
						esc_html__( 'No', 'nifty' ) 									=> '',
						esc_html__( 'Yes', 'nifty' ) 									=> 'visible',
						esc_html__( 'Yes (show on hover)', 'nifty' ) 					=> 'visible_hover'
				) ),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
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
				array( 'param_name' => 'colored_icon_size', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Colored Icon size', 'nifty' ),
					'value' => array(
						esc_html__( 'Inherit', 'nifty' ) 					=> '',
						esc_html__( 'Small', 'nifty' ) 					=> 'small',
						esc_html__( 'Medium', 'nifty' ) 					=> 'medium',
						esc_html__( 'Large', 'nifty' ) 					=> 'large'
				) )
			)
			)
		);
	}
}