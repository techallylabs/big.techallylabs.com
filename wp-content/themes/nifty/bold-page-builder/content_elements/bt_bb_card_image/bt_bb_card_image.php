<?php

class bt_bb_card_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'image'      					=> '',
			'image_position'  				=> '',
			'image_format'					=> 'square',
			'image_base_size'				=> 'full',
			'lazy_load'  					=> 'no',
			'supertitle'					=> '',
			'title'							=> '',
			'html_tag'      				=> 'h3',
			'text'							=> '',	
			'url'    						=> '',
			'target' 						=> '',
			'title_size'					=> 'normal',
			'border'      					=> 'show',
			'shadow'      					=> '',
			'font'          				=> '',
			'font_subset'					=> '',
			'font_weight'   				=> ''
			
		) ), $atts, $this->shortcode ) );


		if ( $font != '' && $font != 'inherit' ) {
			require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
			bt_bb_enqueue_google_font( $font, $font_subset );
		}
		
		$content_elements_path = get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_card_image/';

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

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $shadow != '' ) {
			$class[] = $this->prefix . 'shadow' . '_' . $shadow;
		}

		if ( $title_size != '' ) {
			$class[] = $this->prefix . 'title_size' . '_' . $title_size;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight_' . $font_weight ;
		}

		if ( $image_position != '' ) {
			$image_position_arr = explode( ' ', $image_position );
			$class[] = $this->prefix . 'image_position' . '_' . $image_position_arr[0];
			if ( count( $image_position_arr ) > 1 ) {
				$class[] = $this->prefix . 'content_position' . '_' . $image_position_arr[1];
			}
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

		$output = '';

		$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $title ) );
		$link = bt_bb_get_url( $url );
		
		
		// IMAGE
		if ( $image_base_size != 'full' && $image_base_size != '' ) {
			$image_size = 'boldthemes_' . esc_attr( $image_base_size ) . '_' . esc_attr( $image_format ) ; 
		} else {
			$image_size = 'full';
		}
		
		// IMAGE - TOP
		if ( $image != '' ) {
			$output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" size="' . esc_attr( $image_size ) . '" url="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" lazy_load="' . esc_attr( $lazy_load ) . '" ignore_fe_editor="true"]' ) . '</div>';	
		} else if ( strpos( $image_position, 'background' ) !== false ) {
			$output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '">' . do_shortcode( '[bt_bb_image image="' . get_template_directory_uri() . '/gfx/img_formats/boldthemes_' . $image_base_size . '_' . $image_format . '.png'  . '" size="full"  url="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" lazy_load="' . esc_attr( $lazy_load ) . '" ignore_fe_editor="true"]' ) . '</div>';
			$class[] = 'bt_transparent_background';
		}
		

		// CONTENT
		$output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '"><div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">';
			
			// HEADLINE
			$output .= '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">';
				if ( ( $supertitle != '' ) || ( $title != '' ) ) {
					$output .= do_shortcode('[bt_bb_headline headline="' . esc_attr( $title ) . '" superheadline="' . esc_attr( $supertitle ) . '" html_tag="'. esc_attr( $html_tag ) .'" size="'. esc_attr( $title_size ) .'" url="'. esc_attr( $link ) .'" target="'. esc_attr( $target ) .'" font="'. esc_attr( $font ) .'" ignore_fe_editor="true"]');		
				}
			$output .= '</div>';

			// TEXT
			if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '">' . ( $text ) . '</div>';

			// CONTENT
			if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '">' . ( $content ) . '</div>';

		$output .= '</div></div>';
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		require( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/fonts.php' );

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Card Image', 'nifty' ), 'description' => esc_html__( 'Card with image, title and text', 'nifty' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_text' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'nifty' ) 
				),
				
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'nifty' ) ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Title', 'nifty' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'default' => 'h3', 'heading' => esc_html__( 'HTML tag', 'nifty' ),
					'value' => array(
						esc_html__( 'h1', 'nifty' ) 							=> 'h1',
						esc_html__( 'h2', 'nifty' )	 						=> 'h2',
						esc_html__( 'h3', 'nifty' ) 							=> 'h3',
						esc_html__( 'h4', 'nifty' ) 							=> 'h4',
						esc_html__( 'h5', 'nifty' ) 							=> 'h5',
						esc_html__( 'h6', 'nifty' ) 							=> 'h6'
				) ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'nifty' ) ),


				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'group' => esc_html__( 'Image', 'nifty' ), 'heading' => esc_html__( 'Lazy load this image', 'nifty' ),
					'value' => array(
						esc_html__( 'No', 'nifty' ) 							=> 'no',
						esc_html__( 'Yes', 'nifty' ) 							=> 'yes'
					)
				),
				array( 'param_name' => 'image_position', 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Image', 'nifty' ), 'heading' => esc_html__( 'Image position', 'nifty' ), 
					'value' => array(
						esc_html__( 'Top', 'nifty' ) 							=> '',
						esc_html__( 'Background', 'nifty' ) 					=> 'background'
					)
				),
				array( 'param_name' => 'image_base_size', 'default' => 'full', 'type' => 'dropdown', 'group' => esc_html__( 'Image', 'nifty' ), 'heading' => esc_html__( 'Image base size', 'nifty' ), 
					'value' => array(
						esc_html__( 'Full (ignores image format)', 'nifty' ) 	=> 'full',
						esc_html__( 'Large', 'nifty' ) 						=> 'large',
						esc_html__( 'Medium', 'nifty' ) 						=> 'medium',
						esc_html__( 'Small', 'nifty' ) 						=> 'small'
					)
				),
				array( 'param_name' => 'image_format', 'default' => 'vertical_rectangle', 'group' => esc_html__( 'Image', 'nifty' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Image format', 'nifty' ), 
					'value' => array(
						esc_html__( 'Square', 'nifty' ) 						=> 'square',
						esc_html__( 'Horizontal rectangle', 'nifty' ) 		=> '4:3',
						esc_html__( 'Vertical rectangle', 'nifty' ) 			=> 'vertical_rectangle'
					)
				),


				array( 'param_name' => 'url', 'type' => 'textfield', 'group' => esc_html__( 'URL', 'nifty' ), 'heading' => esc_html__( 'URL', 'nifty' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'nifty' ), 'heading' => esc_html__( 'Target', 'nifty' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'nifty' ) 		=> '_self',
						esc_html__( 'Blank (open in new tab)', 'nifty' ) 		=> '_blank',
					)
				),


				array( 'param_name' => 'title_size', 'default' => 'normal', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Title size', 'nifty' ),
					'value' => array(
						esc_html__( 'Small', 'nifty' ) 					=> 'small',
						esc_html__( 'Medium', 'nifty' ) 					=> 'medium',
						esc_html__( 'Large', 'nifty' ) 					=> 'large'
					)
				),
				array( 'param_name' => 'border', 'type' => 'dropdown', 'default' => 'show', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Show border', 'nifty' ),
					'value' => array(
						esc_html__( 'No', 'nifty' ) 						=> '',
						esc_html__( 'Yes', 'nifty' )						=> 'show'
				) ),
				array( 'param_name' => 'shadow', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Show shadow', 'nifty' ),
					'value' => array(
						esc_html__( 'No', 'nifty' ) 						=> '',
						esc_html__( 'Yes', 'nifty' )						=> 'show',
						esc_html__( 'Yes (on hover)', 'nifty' )			=> 'hover_show'
				) ),
				array( 'param_name' => 'font', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Title font', 'nifty' ),
					'value' => array( esc_html__( 'Inherit', 'nifty' ) => 'inherit' ) + $font_arr
				),
				array( 'param_name' => 'font_subset', 'type' => 'textfield', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Title font subset', 'nifty' ), 'value' => 'latin,latin-ext', 'description' => 'E.g. latin,latin-ext,cyrillic,cyrillic-ext' ),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Title font weight', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
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
				)
				)
			)
		);
	}
}