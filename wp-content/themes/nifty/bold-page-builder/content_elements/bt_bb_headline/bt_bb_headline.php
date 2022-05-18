<?php

class bt_bb_headline extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'headline'      		=> '',
			'html_tag'      		=> '',
			'font'          		=> '',
			'font_subset'   		=> '',
			'size'     				=> '',
			'font_size'     		=> '',
			'font_weight'   		=> '',
			'supertitle_font_weight' => '',
			'subtitle_font_weight' 	=> '',
			'color_scheme'  		=> '',
			'color'         		=> '',
			'supertitle_position'   => '',
			'supertitle_style'		=> '',
			'subtitle_style'		=> '',
			'dash'          		=> '',
			'letter_spacing'		=> '',
			'supertitle_letter_spacing'		=> '',
			'subtitle_letter_spacing'		=> '',
			'align'         		=> '',
			'url'           		=> '',
			'target'        		=> '',
			'superheadline' 		=> '',
			'subheadline'   		=> ''
		) ), $atts, $this->shortcode ) );

		$superheadline = html_entity_decode( $superheadline, ENT_QUOTES, 'UTF-8' );
		$subheadline = html_entity_decode( $subheadline, ENT_QUOTES, 'UTF-8' );
		$headline = html_entity_decode( $headline, ENT_QUOTES, 'UTF-8' );

		if ( $font != '' && $font != 'inherit' ) {
			require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
			bt_bb_enqueue_google_font( $font, $font_subset );
		}

		$class = array( $this->shortcode );
		$data_override_class = array();
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		
		$html_tag_style = "";
		$html_tag_style_arr = array();
		if ( $font != '' && $font != 'inherit' ) {
			$el_style = $el_style . ';' . 'font-family:\'' . urldecode( $font ) . '\'';
			$html_tag_style_arr[] = 'font-family:\'' . urldecode( $font ) . '\'';
		}
		if ( $font_size != '' ) {
			$html_tag_style_arr[] = 'font-size:' . $font_size  ;
		}
		if ( $letter_spacing != '' ) {
			$html_tag_style_arr[] = 'letter-spacing:' . $letter_spacing ;
		}
		if ( count( $html_tag_style_arr ) > 0 ) {
			$html_tag_style = ' style="' . implode( '; ', $html_tag_style_arr ) . '"';
		}
		
		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight_' . $font_weight ;
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $color != '' ) {
			if ( strpos( $color, '#' ) !== false ) {
				$color	= bt_bb_image::hex2rgb( $color );
				$opacity = 1;
							
				$el_style = $el_style . ';' . 'color:rgba(' . $color[0] . ', ' . $color[1] . ', ' . $color[2] . ', ' . $opacity . ');border-color: rgba(' . $color[0] . ', ' . $color[1] . ', ' . $color[2] . ', ' . $opacity . ');';
			} else{
				$el_style = $el_style . ';' . 'color:' . $color . ';border-color:' . $color . ';';
			}
		}		

		if ( $dash != '' ) {
			$class[] = $this->prefix . 'dash' . '_' . $dash;
		}

		$this->responsive_data_override_class(
			$class, $data_override_class,
			array(
				'prefix' => $this->prefix,
				'param' => 'size',
				'value' => $size
			)
		);

		if ( $target == '' ) {
			$target = '_self';
		}

		if ( $headline == '' ) {
			$class[] = 'btNoHeadline';
		}

		if ( $supertitle_style != '' ) {
			$class[] = $this->prefix . 'supertitle_style' . '_' . $supertitle_style;
		}

		if ( $subtitle_style != '' ) {
			$class[] = $this->prefix . 'subtitle_style' . '_' . $subtitle_style;
		}

		if ( $supertitle_font_weight != '' ) {
			$class[] = $this->prefix . 'supertitle_font_weight' . '_' . $supertitle_font_weight;
		}

		if ( $subtitle_font_weight != '' ) {
			$class[] = $this->prefix . 'subtitle_font_weight' . '_' . $subtitle_font_weight;
		}

		if ( $supertitle_letter_spacing != '' ) {
			$class[] = $this->prefix . 'supertitle_letter_spacing_' . $supertitle_letter_spacing ;
		}

		if ( $subtitle_letter_spacing != '' ) {
			$class[] = $this->prefix . 'subtitle_letter_spacing_' . $subtitle_letter_spacing ;
		}

		$superheadline_inside = '';
		$superheadline_outside = '';
		
		if ( $superheadline != '' ) {
			$class[] = $this->prefix . 'superheadline';
			if ( $supertitle_position == 'outside' ) { 
				$superheadline_outside = '<span class="' . esc_attr( $this->shortcode ) . '_superheadline">' . $superheadline . '</span>';
			} else {
				$superheadline_inside = '<span class="' . esc_attr( $this->shortcode ) . '_superheadline">' . $superheadline . '</span>';
			}
		}
		
		if ( $subheadline != '' ) {
			$class[] = $this->prefix . 'subheadline';
			$subheadline = '<div class="' . esc_attr( $this->shortcode ) . '_subheadline">' . $subheadline . '</div>';
			$subheadline = nl2br( $subheadline );
		}
		
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$this->responsive_data_override_class(
			$class, $data_override_class,
			array(
				'prefix' => $this->prefix,
				'param' => 'align',
				'value' => $align
			)
		);
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		if ( $headline != '' ) {
			if ( $url != '' ) {
				$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $headline ) );
				$link = bt_bb_get_url( $url );
				// IMPORTANT: esc_attr must be used instead of esc_url(_raw)
				$headline = '<a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . $headline . '</a>';
			}		
			$headline = '<span class="' . esc_attr( $this->shortcode ) . '_content"><span>' . $headline . '</span></span>';			
		}
		
		$headline = nl2br( $headline );

		$output = '<header' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . ' data-bt-override-class="' . htmlspecialchars( json_encode( $data_override_class, JSON_FORCE_OBJECT ), ENT_QUOTES, 'UTF-8' ) . '">';
		if ( $superheadline_outside != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_superheadline_outside' . '">' . $superheadline_outside . '</div>';
		if ( $headline != '' || $superheadline_inside != '' ) $output .= '<' . $html_tag . $html_tag_style . ' class="bt_bb_headline_tag">' . $superheadline_inside . $headline . '</' . $html_tag . '>';
		$output .= $subheadline . '</header>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/fonts.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Headline', 'nifty' ), 'description' => esc_html__( 'Headline with custom Google fonts', 'nifty' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'superheadline', 'type' => 'textfield', 'heading' => esc_html__( 'Superheadline', 'nifty' ) ),
				array( 'param_name' => 'headline', 'type' => 'textarea', 'heading' => esc_html__( 'Headline', 'nifty' ), 'preview' => true, 'preview_strong' => true ),
				array( 'param_name' => 'subheadline', 'type' => 'textarea', 'heading' => esc_html__( 'Subheadline', 'nifty' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'heading' => esc_html__( 'HTML tag', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'h1', 'nifty' ) 				=> 'h1',
						esc_html__( 'h2', 'nifty' ) 				=> 'h2',
						esc_html__( 'h3', 'nifty' ) 				=> 'h3',
						esc_html__( 'h4', 'nifty' ) 				=> 'h4',
						esc_html__( 'h5', 'nifty' ) 				=> 'h5',
						esc_html__( 'h6', 'nifty' ) 				=> 'h6'
				) ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'nifty' ), 'description' => esc_html__( 'Predefined heading sizes, independent of html tag', 'nifty' ), 'responsive_override' => true,
					'value' => array(
						esc_html__( 'Inherit', 'nifty' ) 				=> 'inherit',
						esc_html__( 'Extra Small', 'nifty' ) 			=> 'extrasmall',
						esc_html__( 'Small', 'nifty' ) 				=> 'small',
						esc_html__( 'Medium', 'nifty' ) 				=> 'medium',
						esc_html__( 'Normal', 'nifty' ) 				=> 'normal',
						esc_html__( 'Large', 'nifty' ) 				=> 'large',
						esc_html__( 'Extra large', 'nifty' ) 			=> 'extralarge',
						esc_html__( 'Huge', 'nifty' ) 				=> 'huge'
					)
				),				
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Alignment', 'nifty' ), 'responsive_override' => true,
					'value' => array(
						esc_html__( 'Inherit', 'nifty' ) 				=> 'inherit',
						esc_html__( 'Center', 'nifty' ) 				=> 'center',
						esc_html__( 'Left', 'nifty' ) 				=> 'left',
						esc_html__( 'Right', 'nifty' ) 				=> 'right'
					)
				),
				array( 'param_name' => 'dash', 'type' => 'dropdown', 'heading' => esc_html__( 'Dash', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
					'value' => array(
						esc_html__( 'None', 'nifty' ) 				=> 'none',
						esc_html__( 'Top', 'nifty' ) 					=> 'top',
						esc_html__( 'Bottom', 'nifty' ) 				=> 'bottom',
						esc_html__( 'Top and bottom', 'nifty' ) 		=> 'top_bottom'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'nifty' ), 'description' => esc_html__( 'Define color schemes in Bold Builder settings or define accent and alternate colors in theme customizer (if avaliable)', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ), 'value' => $color_scheme_arr, 'preview' => true ),
				array( 'param_name' => 'color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Color', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'supertitle_position', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'nifty' ) => 'outside' ), 'heading' => esc_html__( 'Put supertitle outside H tag', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'supertitle_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle style', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 				=> '',
						esc_html__( 'Accent color', 'nifty' ) 		=> 'accent'
					)
				),
				array( 'param_name' => 'subtitle_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Subtitle style', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 				=> '',
						esc_html__( 'Regular', 'nifty' ) 				=> 'regular',
						esc_html__( 'Italic', 'nifty' ) 				=> 'italic'
					)
				),
				array( 'param_name' => 'font', 'type' => 'dropdown', 'heading' => esc_html__( 'Font', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ), 'preview' => true,
					'value' => array( esc_html__( 'Inherit', 'nifty' ) => 'inherit' ) + $font_arr
				),
				array( 'param_name' => 'font_subset', 'type' => 'textfield', 'heading' => esc_html__( 'Font subset', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ), 'value' => 'latin,latin-ext', 'description' => esc_html__( 'E.g. latin,latin-ext,cyrillic,cyrillic-ext', 'nifty' ) ),
				array( 'param_name' => 'font_size', 'type' => 'textfield', 'heading' => esc_html__( 'Custom font size', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ), 'description' => esc_html__( 'E.g. 20px or 1.5rem', 'nifty' ) ),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ),
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
				array( 'param_name' => 'supertitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle font weight', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ),
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
				array( 'param_name' => 'subtitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Subtitle font weight', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ),
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
				array( 'param_name' => 'letter_spacing', 'type' => 'textfield', 'heading' => esc_html__( 'Letter Spacing', 'nifty' ), 'description' => esc_html__( 'Enter number (with px) in order to define letter spacing in the Heading (e.g. -1px, 0px, 1px etc.).', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' )
				),
				array( 'param_name' => 'supertitle_letter_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle letter spacing', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ),
					'value' => array(
						esc_html__( 'Inherit', 'nifty' ) 				=> '',
						esc_html__( '0px', 'nifty' ) 					=> '0',
						esc_html__( '-1px', 'nifty' ) 				=> '-1',
						esc_html__( '-2px', 'nifty' ) 				=> '-2',
						esc_html__( '-3px', 'nifty' ) 				=> '-3',
						esc_html__( '1px', 'nifty' ) 					=> '1',
						esc_html__( '2px', 'nifty' ) 					=> '2',
						esc_html__( '3px', 'nifty' ) 					=> '3'
					)
				),
				array( 'param_name' => 'subtitle_letter_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Subtitle letter spacing', 'nifty' ), 'group' => esc_html__( 'Font', 'nifty' ),
					'value' => array(
						esc_html__( 'Inherit', 'nifty' ) 				=> '',
						esc_html__( '0px', 'nifty' ) 					=> '0',
						esc_html__( '-1px', 'nifty' ) 				=> '-1',
						esc_html__( '-2px', 'nifty' ) 				=> '-2',
						esc_html__( '-3px', 'nifty' ) 				=> '-3',
						esc_html__( '1px', 'nifty' ) 					=> '1',
						esc_html__( '2px', 'nifty' ) 					=> '2',
						esc_html__( '3px', 'nifty' ) 					=> '3'
					)
				),
				
				array( 'param_name' => 'url', 'type' => 'link', 'heading' => esc_html__( 'URL', 'nifty' ), 'description' => esc_html__( 'Enter full or local URL (e.g. https://www.bold-themes.com or /pages/about-us) or post slug (e.g. about-us) or search for existing content.', 'nifty' ), 'group' => esc_html__( 'URL', 'nifty' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'nifty' ), 'group' => esc_html__( 'URL', 'nifty' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'nifty' ) 	=> '_self',
						esc_html__( 'Blank (open in new tab)', 'nifty' ) 	=> '_blank'
					)
				)
			)
		) );
	}
}