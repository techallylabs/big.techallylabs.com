<?php

/* examples:
https://kimmobrunfeldt.github.io/progressbar.js/
http://progressbarjs.readthedocs.io/en/latest/api/shape/
*/

class bt_bb_progress_bar_advanced extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'type'        					=> '',
			'percentage'        			=> '',
			'duration'     	   				=> '',
			'easing'       	 				=> '',
			'text'        					=> '',
			'icon'      					=> '',
			'colored_icon'         			=> 'no_icon',
			'title'        					=> '',
			'text_below'        			=> '',
			'size'        					=> '',
			'thickness'						=> '',
			'trail_thickness'				=> '',
			'color_from' 					=> '',
			'color_to' 						=> '',
			'trail_color'       			=> '',
			'fill_color'					=> '',
			'font_weight'					=> '',
			'colored_icon_color_scheme' 	=> ''
		) ), $atts, $this->shortcode ) );

		$pb_id = rand(1000, 100000);

		/**
		* Enqueue scripts and styles
		*/

		$content_elements_path			= get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_progress_bar_advanced/';
		$content_elements_misc_path_js	= get_template_directory_uri() . '/bold-page-builder/content_elements_misc/js/';

		wp_enqueue_script( 
			'bt_bb_progressbar_advanced_js',
			$content_elements_path . 'bb_progressbar_advanced.js',
			array( 'jquery' ),
			'',
			true
		);

		wp_enqueue_script( 
			'bt_bb_progressbar_advanced',
			$content_elements_misc_path_js . 'bt_bb_progress_bar_advanced.js',
			array( 'jquery' ),
			'',
			true
		);


		$class = array( $this->shortcode );
		$class[] = 'animate-adv_progressbar';

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

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight' . '_' . $font_weight;
		}

		if ( $colored_icon_color_scheme != '' ) {
			$class[] = $this->prefix . 'colored_icon_color_scheme' . '_' . $colored_icon_color_scheme;
		}

	

		if ( $percentage == '' ) {
			$percentage = 100;
		}

		if ( $fill_color != '' ) {
			if ( strpos( $fill_color, '#' ) !== false ) {
				$fill_color = $this->hex2rgba($fill_color, 1);
			}
		}

		$container				= 'container_' . $pb_id;
		$container_text			= $text;
		$container_percentage	= $percentage / 100;
		$container_duration		= ( $duration == '' ) ? '1400' : $duration;	
		$container_easing		= ( $easing == '') ? 'linear' : $easing;
			
		$container_color_from	= ( $color_from == '') ? '#eee' : $color_from;
		$container_color_to		= ( $color_to == '') ? '#000' : $color_to;		
		$container_trail_color	= ( $trail_color == '') ? '#eee' : $trail_color;
		$container_fill			= ( $fill_color) ? $fill_color : null;


		if ( $color_to == "" && $color_from != "") {
			$container_color_to = $container_color_from;
		}


		switch( $thickness ){
			case 'small':	$container_depth_from	= 1;	$container_depth_to		= 1;	$container_stroke_width = 1;	$container_trail_width	= 1;break;
			case 'normal':	$container_depth_from	= 2;	$container_depth_to		= 2;	$container_stroke_width = 2;	$container_trail_width	= 2;break;
			case 'medium':	$container_depth_from	= 4;	$container_depth_to		= 4;	$container_stroke_width = 4;	$container_trail_width	= 4;break;
			case 'large':	$container_depth_from	= 8;	$container_depth_to		= 8;	$container_stroke_width = 8;	$container_trail_width	= 8;break;
			case 'xlarge':	$container_depth_from	= 10;	$container_depth_to		= 10;	$container_stroke_width = 10;	$container_trail_width	= 10;break;
			default:break;
		}

		switch( $trail_thickness ){
			case 'small':	$container_trail_width	= 1;break;
			case 'normal':	$container_trail_width	= 2;break;
			case 'medium':	$container_trail_width	= 4;break;
			case 'large':	$container_trail_width	= 8;break;
			case 'xlarge':	$container_trail_width	= 10;break;
			default:break;
		}


		if ( $container_color_to == "" ) {
			$container_color_to = $container_color_from;
		}

		$content = do_shortcode( $content );
		$data = ' data-container="' . esc_attr( $container ) . '"';
		$data .= ' data-container-pbid="' . esc_attr( $pb_id ) . '"';
		$data .= ' data-container-type="' . esc_attr( $type ) . '"';
		$data .= ' data-container-percentage="' . esc_attr( $container_percentage ) . '"';
		$data .= ' data-container-stroke-width="' . esc_attr( $container_stroke_width ) . '"';
		$data .= ' data-container-trail-color="' . esc_attr( $container_trail_color ) . '"';
		$data .= ' data-container-trail-width="' . esc_attr( $container_trail_width ) . '"';
		$data .= ' data-container-easing="' . esc_attr( $container_easing ) . '"';
		$data .= ' data-container-color-from="' . esc_attr( $container_color_from ) . '"';
		$data .= ' data-container-depth-from="' . esc_attr( $container_depth_from ) . '"';
		$data .= ' data-container-color-to="' . esc_attr( $container_color_to ) . '"';
		$data .= ' data-container-depth-to="' . esc_attr( $container_depth_to ) . '"';
		$data .= ' data-container-fill="' . esc_attr( $container_fill ) . '"';
		$data .= ' data-container-duration="' . esc_attr( $container_duration ) . '"';
		$data .= ' data-container-text="' . esc_attr( $container_text ) . '"';

		$output = '';

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$icon_html = bt_bb_icon::get_html( $icon, '' );



		$output .= '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . ' ' . $data . '>';

			// PROGRESS BAR
			$output .= '<div id="' . esc_attr( 'container_' . $pb_id ) . '" class="container">';

				// COLORED ICON
				if ( $colored_icon != '' && $colored_icon != 'no_icon' ) {
					
					$output .= '<div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '">';
						$output .= bt_bb_get_svg_icon_html( $colored_icon );
					$output .= '</div>';
					
				}

				// ICON
				if ( $icon != '' && $colored_icon == '' || $colored_icon == 'no_icon'  ) {
					$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
				}

				// TEXT
				if ( $container_text != '' && $colored_icon == '' || $colored_icon == 'no_icon' && $icon == '' ) {
					
					$output .= '<span class="bt_bb_progress_bar_advanced_text">' . ( $container_text ) . '</span>';
					
				}

			$output .= '</div>';

			// TITLE
			if ( $title != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_title' ) . '">' . ( $title ) . '</div>';

			// TEXT
			if ( $text_below != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_text_below' ) . '">' . ( $text_below ) . '</div>';

		$output .= '</div>';


		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;
	}

	

	/* Convert hexdec color string to rgb(a) string */ 
	static function hex2rgba($color, $opacity = false) {
		$default = 'rgb(0,0,0)';

		// Return default if no color provided
		if ( empty($color) )
			return $default;

		// Sanitize $color if "#" is provided 
		if ($color[0] == '#' ) {
			$color = substr( $color, 1 );
		}

		// Check if color has 6 or 3 characters and get values
		if (strlen($color) == 6) {
			$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
			$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
			return $default;
		}

		// Convert hexadec to rgb
		$rgb =  array_map('hexdec', $hex);

		// Check if opacity is set(rgba or rgb)
		if ( $opacity ) {
			if ( abs($opacity ) > 1 )
				$opacity = 1.0;
				$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
			} else {
				$output = 'rgb('.implode(",",$rgb).')';
			}
		// Return rgb(a) color string
		return $output;
	}

	function map_shortcode() {

		$svg_icons_arr = bt_bb_get_svg_icons_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Advanced Progress bar', 'nifty' ), 'description' => esc_html__( 'Advanced Progress bar', 'nifty' ), 'container' => 'vertical', 'accept' => false, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'type', 'type' => 'dropdown', 'heading' => esc_html__( 'Progress Bar Type', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Semi circle', 'nifty' ) 		=> 'semi-circle',
						esc_html__( 'Circle', 'nifty' ) 			=> 'circle'
					)
				),
				array( 'param_name' => 'percentage', 'type' => 'textfield', 'heading' => esc_html__( 'Percentage', 'nifty' ), 'description' => esc_html__( 'Enter number from 1 to 100, without %', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'duration', 'type' => 'textfield', 'heading' => esc_html__( 'Animation duration', 'nifty' ), 'preview' => true ),
						array( 'param_name' => 'easing', 'type' => 'dropdown', 'heading' => esc_html__( 'Easing', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Linear', 'nifty' ) 			=> 'linear',
						esc_html__( 'Ease In Out', 'nifty' ) 		=> 'easeInOut',
						esc_html__( 'Bounce', 'nifty' ) 			=> 'bounce'
					)
				),

				
				array( 'param_name' => 'text', 'type' => 'textarea', 'group' => esc_html__( 'Content', 'nifty' ), 'description' => esc_html__( 'If icons are chosen from the list, text will not be displayed', 'nifty' ), 'heading' => esc_html__( 'Text', 'nifty' ) ),
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'group' => esc_html__( 'Content', 'nifty' ), 'heading' => esc_html__( 'Icon', 'nifty' ), 'description' => esc_html__( 'If colored icon is chosen from the list, regular icon will not be displayed', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'colored_icon', 'type' => 'dropdown', 'default' => 'no_icon', 'group' => esc_html__( 'Content', 'nifty' ), 'heading' => esc_html__( 'Colored Icon', 'nifty' ), 'value' => $svg_icons_arr ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'group' => esc_html__( 'Content', 'nifty' ), 'heading' => esc_html__( 'Title', 'nifty' ) ),
				array( 'param_name' => 'text_below', 'type' => 'textarea', 'group' => esc_html__( 'Content', 'nifty' ), 'heading' => esc_html__( 'Text below', 'nifty' ) ),

				
				

				array( 'param_name' => 'size', 'type' => 'dropdown', 'default' => 'normal', 'heading' => esc_html__( 'Progress bar size', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Small', 'nifty' ) 			=> 'small',
						esc_html__( 'Normal', 'nifty' ) 			=> 'normal',
						esc_html__( 'Medium', 'nifty' ) 			=> 'medium',
						esc_html__( 'Large', 'nifty' ) 			=> 'large',
						esc_html__( 'Extra large', 'nifty' ) 		=> 'xlarge'
					)
				),
				array( 'param_name' => 'thickness', 'type' => 'dropdown', 'heading' => esc_html__( 'Progress bar thickness', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
					'value' => array(
						esc_html__( 'Small', 'nifty' ) 			=> 'small',
						esc_html__( 'Normal', 'nifty' ) 			=> 'normal',
						esc_html__( 'Medium', 'nifty' ) 			=> 'medium',
						esc_html__( 'Large', 'nifty' ) 			=> 'large',
						esc_html__( 'Extra large', 'nifty' ) 		=> 'xlarge'
					)
				),
				array( 'param_name' => 'trail_thickness', 'type' => 'dropdown', 'heading' => esc_html__( 'Progress bar trail thickness', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
					'value' => array(
						esc_html__( 'Same as progress bar', 'nifty' ) 	=> 'progressbar',
						esc_html__( 'Small', 'nifty' ) 					=> 'small',
						esc_html__( 'Normal', 'nifty' ) 					=> 'normal',
						esc_html__( 'Medium', 'nifty' ) 					=> 'medium',
						esc_html__( 'Large', 'nifty' ) 					=> 'large',
						esc_html__( 'Extra large', 'nifty' ) 				=> 'xlarge'
					)
				),
				array( 'param_name' => 'color_from', 'type' => 'colorpicker', 'heading' => esc_html__( 'Starting Progress Bar Background color', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
				array( 'param_name' => 'color_to', 'type' => 'colorpicker', 'heading' => esc_html__( 'Ending Progress Bar Background color', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
				array( 'param_name' => 'trail_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Color for lighter trail stroke underneath the actual progress path', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
				array( 'param_name' => 'fill_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Fill color', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
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
				array( 'param_name' => 'colored_icon_color_scheme', 'type' => 'dropdown', 'default' => '', 'heading' => esc_html__( 'Colored icon color scheme', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
					'value' => array(
						esc_html__( 'Default', 'nifty' ) 				=> '',
						esc_html__( 'Accent color', 'nifty' ) 		=> 'accent',
						esc_html__( 'Alternate color', 'nifty' ) 		=> 'alternate'
				) )
			)
		) );
	}
}

