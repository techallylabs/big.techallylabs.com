<?php

class bt_bb_section extends BT_BB_Element {
    
        function  bb_exist() {
            if ( file_exists( WP_PLUGIN_DIR . '/bold-page-builder/bold-builder.php' ) ) { return true; }
            return false;
        }

	function handle_shortcode( $atts, $content ) {
                if ( !$this->bb_exist() ) { return false; }
            
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'layout'                		=> '',
			'full_screen'           		=> '',
			'vertical_align'        		=> '',
			'top_spacing'           		=> '',
			'bottom_spacing'        		=> '',
			'color_scheme'          		=> '',
			'background_color'      		=> '',
			'background_image'      		=> '',
			'lazy_load'  					=> 'no',
			'background_overlay'    		=> '',
			'background_video_yt'   		=> '',
			'yt_video_settings'     		=> '',
			'background_video_mp4'  		=> '',
			'background_video_ogg'  		=> '',
			'background_video_webm' 		=> '',
			'show_video_on_mobile' 			=> '',
			'parallax'              		=> '',
			'parallax_offset'       		=> '',
			'background_position'    		=> '',
			'background_size'               => '',
			'top_section_coverage_image'    => '',
			'bottom_section_coverage_image' => '',
			'allow_content_outside'         => 'no'
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		wp_enqueue_script(
			'bt_bb_elements',
			 plugins_url() . '/bold-page-builder/content_elements/bt_bb_section/bt_bb_elements.js',
			 array( 'jquery' ),
			 '',
			 true
		);
		
		$show_video_on_mobile = ( $show_video_on_mobile == 'show_video_on_mobile' || $show_video_on_mobile == 'yes' ) ? 1 : 0;

		/*if ( $top_spacing != '' ) {
			$class[] = $this->prefix . 'top_spacing' . '_' . $top_spacing;
		}

		if ( $bottom_spacing != '' ) {
			$class[] = $this->prefix . 'bottom_spacing' . '_' . $bottom_spacing;
		}*/

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		if ( $background_color != '' ) {
			$el_style = $el_style . ';' . 'background-color:' . $background_color . ';';
		}

		if ( $layout != '' ) {
			$class[] = $this->prefix . 'layout' . '_' . $layout;
		}

		if ( $full_screen == 'yes' ) {
			$class[] = $this->prefix . 'full_screen';
		}

		if ( $vertical_align != '' ) {
			$class[] = $this->prefix . 'vertical_align' . '_' . $vertical_align;
		}
		$background_data_attr = '';

		if ( $background_image != '' ) {
			$background_image = wp_get_attachment_image_src( $background_image, 'full' );
		}
		
		$background_image_url = '';
		$data_parallax_attr = '';

		if ( $background_image ) {
			$background_image_url = isset($background_image[0]) ? $background_image[0] : '';
		}
		if ( $background_image_url != '' ) {
			if ( $lazy_load == 'yes' ) {
				$blank_image_src = BT_BB_Root::$path . 'img/blank.gif';
				$background_image_style = 'background-image:url(\'' . $blank_image_src . '\');';
				$background_data_attr .= ' data-background_image_src="\'' . $background_image_url . '\'"';
				$class[] = 'btLazyLoadBackground';
			} else {
				$background_image_style = 'background-image:url(\'' . $background_image_url . '\');';
				
			}
			$el_style = $background_image_style . $el_style;	
			$class[] = $this->prefix . 'background_image';

			if ( $parallax != '' ) {
				$data_parallax_attr = 'data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="' . esc_attr( intval( $parallax_offset ) ) . '"';
				$class[] = $this->prefix . 'parallax';
			}
		}

		if ( $background_overlay != '' ) {
			$class[] = $this->prefix . 'background_overlay' . '_' . $background_overlay;
		}

		$id_attr = '';
		if ( $el_id == '' ) {
			$el_id = uniqid( 'bt_bb_section' );
		}
		$id_attr = 'id="' . esc_attr( $el_id ) . '"';

		$background_video_attr = '';

		$video_html = '';

		if ( $background_video_yt != '' ) {
			wp_enqueue_style( 'bt_bb_style_yt', plugins_url() . '/bold-page-builder/content_elements/bt_bb_section/YTPlayer.css' );
			wp_enqueue_script( 
				'bt_bb_yt',
				plugins_url() . '/bold-page-builder/content_elements/bt_bb_section/jquery.mb.YTPlayer.min.js',
				array( 'jquery' ),
				'',
				true
			);

			$class[] = $this->prefix . 'background_video_yt';

			if ( $yt_video_settings == '' ) {
				$yt_video_settings = 'showControls:false,showYTLogo:false,startAt:0,loop:true,mute:true,stopMovieOnBlur:false,opacity:1';
				// $yt_video_settings = '';
			}
			
			$yt_video_settings .= $show_video_on_mobile ? ',useOnMobile:true' : ',useOnMobile:false';
			
			$yt_video_settings .= '';
			// $yt_video_settings .= ',cc_load_policy:false,showAnnotations:false,optimizeDisplay:true,anchor:\'center,center\'';
			$yt_video_settings .= ',useNoCookie:false';

			$background_video_attr = ' ' . 'data-property="{videoURL:\'' . $background_video_yt . '\',containment:\'#' . $el_id . '\',' . $yt_video_settings . '}"';
			
			$video_html .= '<div class="' . $this->prefix . 'background_video_yt_inner" ' . $background_video_attr . ' ></div>';
			
			$proxy = new BT_BB_YT_Video_Proxy( $this->prefix, $el_id );
			add_action( 'wp_footer', array( $proxy, 'js_init' ) );

		} else if ( ( $background_video_mp4 != '' || $background_video_ogg != '' || $background_video_webm != '' ) && ! ( wp_is_mobile() && ! $show_video_on_mobile ) ) {
			$class[] = $this->prefix . 'video';
			$video_html = '<video autoplay loop muted playsinline onplay="bt_bb_video_callback( this )">';
			if ( $background_video_mp4 != '' ) {
				$video_html .= '<source src="' . esc_url_raw( $background_video_mp4 ) . '" type="video/mp4">';
			}
			if ( $background_video_ogg != '' ) {
				$video_html .= '<source src="' . esc_url_raw( $background_video_ogg ) . '" type="video/ogg">';
			}
			if ( $background_video_webm != '' ) {
				$video_html .= '<source src="' . esc_url_raw( $background_video_webm ) . '" type="video/webm">';
			}
			$video_html .= '</video>';
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
		$class_attr = implode( ' ', $class );

		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}

		if ( $allow_content_outside == 'yes' ) {
			$class_attr = $class_attr . ' ' . $this->shortcode . '_allow_content_outside';
		}

		$top_section_coverage_image_output = '';
			if ( $top_section_coverage_image != '' ) { 
				$alt_top_section_coverage_image = get_post_meta($top_section_coverage_image, '_wp_attachment_image_alt', true);
				$alt_top_section_coverage_image = $alt_top_section_coverage_image ? $alt_top_section_coverage_image : $this->shortcode . '_top_section_coverage_image';

				$top_section_coverage_image = wp_get_attachment_image_src( $top_section_coverage_image, 'full' );
				if ( isset($top_section_coverage_image[0]) ) {
					$class_attr = $class_attr . ' ' . $this->shortcode . '_with_top_coverage_image';
					$top_section_coverage_image = $top_section_coverage_image[0];
					$top_section_coverage_image_output = 
						'<div class="' . esc_attr( $this->shortcode ) . '_top_section_coverage_image"><img src="' . esc_url( $top_section_coverage_image ) . '" alt="' . esc_attr($alt_top_section_coverage_image) . '" /></div>';
					$class[] = $this->prefix . 'top_section_coverage_image';
				}
			}

		$bottom_section_coverage_image_output = '';
			if ( $bottom_section_coverage_image != '' ) {  
				$alt_bottom_section_coverage_image = get_post_meta($bottom_section_coverage_image, '_wp_attachment_image_alt', true);
				$alt_bottom_section_coverage_image = $alt_bottom_section_coverage_image ? $alt_bottom_section_coverage_image : $this->shortcode . '_bottom_section_coverage_image';

				$bottom_section_coverage_image = wp_get_attachment_image_src( $bottom_section_coverage_image, 'full' );
				if ( isset($bottom_section_coverage_image[0]) ) {
					$class_attr = $class_attr . ' ' .$this->shortcode . '_with_bottom_coverage_image';
					$bottom_section_coverage_image = $bottom_section_coverage_image[0];
					$bottom_section_coverage_image_output = 
						'<div class="' . esc_attr( $this->shortcode ) . '_bottom_section_coverage_image"><img src="' . esc_url( $bottom_section_coverage_image ) . '" alt="' . esc_attr($alt_bottom_section_coverage_image) . '" /></div>';
					$class[] = $this->prefix . 'bottom_section_coverage_image';
				}
			}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = 'style="' . esc_attr( $el_style ) . '"';
		}

		$output = '<section ' . $id_attr . ' ' . $data_parallax_attr . $background_data_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . ' data-bt-override-class="' . htmlspecialchars( json_encode( $data_override_class, JSON_FORCE_OBJECT ), ENT_QUOTES, 'UTF-8' ) . '">';
		$output .= $video_html;
			$output .= '<div class="' . esc_attr( $this->prefix ) . 'port">';
				$output .= '<div class="' . esc_attr( $this->prefix ) . 'cell">';
					$output .= '<div class="' . esc_attr( $this->prefix ) . 'cell_inner">';
						$output .= do_shortcode( $content );
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			$output .= $top_section_coverage_image_output;
			$output .= $bottom_section_coverage_image_output;

		$output .= '</section>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		if ( !$this->bb_exist() ) { return false; }
		require_once( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/misc.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Section', 'nifty' ), 'description' => esc_html__( 'Basic root element', 'nifty' ), 'root' => true, 'container' => 'vertical', 'accept' => array( 'bt_bb_row' => true ), 'toggle' => true, 'auto_add' => 'bt_bb_row', 'show_settings_on_create' => false,
			'params' => array( 
				array( 'param_name' => 'layout', 'type' => 'dropdown', 'default' => 'boxed_1200', 'heading' => esc_html__( 'Layout', 'nifty' ), 'group' => esc_html__( 'General', 'nifty' ), 'weight' => 0, 'preview' => true,
					'value' => array(
						esc_html__( 'Boxed (800px)', 'nifty' ) 	=> 'boxed_800',
						esc_html__( 'Boxed (900px)', 'nifty' ) 	=> 'boxed_900',
						esc_html__( 'Boxed (1000px)', 'nifty' ) 	=> 'boxed_1000',
						esc_html__( 'Boxed (1100px)', 'nifty' ) 	=> 'boxed_1100',
						esc_html__( 'Boxed (1200px)', 'nifty' ) 	=> 'boxed_1200',
						esc_html__( 'Boxed (1300px)', 'nifty' ) 	=> 'boxed_1300',
						esc_html__( 'Boxed (1400px)', 'nifty' ) 	=> 'boxed_1400',
						esc_html__( 'Boxed (1500px)', 'nifty' ) 	=> 'boxed_1500',
						esc_html__( 'Boxed (1600px)', 'nifty' ) 	=> 'boxed_1600',
						esc_html__( 'Wide', 'nifty' ) 			=> 'wide'
					)
				),
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'nifty' ), 'preview' => true,
					'responsive_override' => true, 
					'value' => array(
						esc_html__( 'No spacing', 'nifty' ) 		=> '',
						esc_html__( 'Extra small', 'nifty' ) 		=> 'extra_small',
						esc_html__( 'Small', 'nifty' ) 			=> 'small',		
						esc_html__( 'Normal', 'nifty' ) 			=> 'normal',
						esc_html__( 'Medium', 'nifty' ) 			=> 'medium',
						esc_html__( 'Large', 'nifty' ) 			=> 'large',
						esc_html__( 'Extra large', 'nifty' ) 		=> 'extra_large',
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
						esc_html__( '55px', 'nifty' ) 		=> '55',
						esc_html__( '60px', 'nifty' ) 		=> '60',
						esc_html__( '65px', 'nifty' ) 		=> '65',
						esc_html__( '70px', 'nifty' ) 		=> '70',
						esc_html__( '75px', 'nifty' ) 		=> '75',
						esc_html__( '80px', 'nifty' ) 		=> '80',
						esc_html__( '85px', 'nifty' ) 		=> '85',
						esc_html__( '90px', 'nifty' ) 		=> '90',
						esc_html__( '95px', 'nifty' ) 		=> '95',
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
						esc_html__( '55px', 'nifty' ) 		=> '55',
						esc_html__( '60px', 'nifty' ) 		=> '60',
						esc_html__( '65px', 'nifty' ) 		=> '65',
						esc_html__( '70px', 'nifty' ) 		=> '70',
						esc_html__( '75px', 'nifty' ) 		=> '75',
						esc_html__( '80px', 'nifty' ) 		=> '80',
						esc_html__( '85px', 'nifty' ) 		=> '85',
						esc_html__( '90px', 'nifty' ) 		=> '90',
						esc_html__( '95px', 'nifty' ) 		=> '95',
						esc_html__( '100px', 'nifty' ) 		=> '100'
					)
				),
				array( 'param_name' => 'full_screen', 'type' => 'dropdown', 'heading' => esc_html__( 'Full screen', 'nifty' ), 
					'value' => array(
						esc_html__( 'No', 'nifty' ) 	=> '',
						esc_html__( 'Yes', 'nifty' ) 	=> 'yes'
					)
				),
				array( 'param_name' => 'vertical_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Vertical align (for fullscreen section)', 'nifty' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Top', 'nifty' )     => 'top',
						esc_html__( 'Middle', 'nifty' )  => 'middle',
						esc_html__( 'Bottom', 'nifty' )  => 'bottom'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'nifty' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'nifty' )  ),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Background color', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ), 'preview' => true ),
				array( 'param_name' => 'background_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Background image', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load background image', 'nifty' ),
					'value' => array(
						esc_html__( 'No', 'nifty' ) 	=> 'no',
						esc_html__( 'Yes', 'nifty' ) 	=> 'yes'
					)
				),
				array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ), 
					'value' => array(
						esc_html__( 'No overlay', 'nifty' )    					=> '',
						esc_html__( 'Light stripes', 'nifty' ) 					=> 'light_stripes',
						esc_html__( 'Dark stripes', 'nifty' )  					=> 'dark_stripes',
						esc_html__( 'Light solid', 'nifty' )	  					=> 'light_solid',
						esc_html__( 'Dark solid', 'nifty' )	  					=> 'dark_solid',
						esc_html__( 'Light top & bottom gradient', 'nifty' )		=> 'light_gradient',
						esc_html__( 'Dark top & bottom gradient', 'nifty' )		=> 'dark_gradient',
						esc_html__( 'Accent top & bottom gradient', 'nifty' )		=> 'accent_gradient',
						esc_html__( 'Alternate top & bottom gradient', 'nifty' )	=> 'alternate_gradient',
						esc_html__( 'Dark top gradient', 'nifty' )				=> 'top_dark_gradient',
						esc_html__( 'Dark bottom gradient', 'nifty' )				=> 'bottom_dark_gradient',
						esc_html__( 'Alternate bottom gradient', 'nifty' )		=> 'bottom_alternate_gradient'
					)
				),
				
				
				array( 'param_name' => 'top_section_coverage_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Top Section Coverage Image', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
				array( 'param_name' => 'bottom_section_coverage_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Bottom Section Coverage Image', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),

				array( 'param_name' => 'allow_content_outside', 'type' => 'dropdown', 'default' => 'no', 'heading' => esc_html__( 'Show content over top or bottom covering image', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
					'value' => array(
							esc_html__( 'No (content to be underneath top and bottom covering image)', 'nifty' ) => 'no',
							esc_html__( 'Yes (content will cover both covering images)', 'nifty' ) => 'yes'
					)
				),

				array( 'param_name' => 'parallax', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax (e.g. 0.7)', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
				array( 'param_name' => 'parallax_offset', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax offset in px (e.g. -100)', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ) ),
				array( 'param_name' => 'background_video_yt', 'type' => 'textfield', 'heading' => esc_html__( 'YouTube background video', 'nifty' ), 'group' => esc_html__( 'Video', 'nifty' ) ),
				array( 'param_name' => 'yt_video_settings', 'type' => 'textfield', 'heading' => esc_html__( 'YouTube video settings (e.g. startAt:20, mute:true, stopMovieOnBlur:false)', 'nifty' ), 'group' => esc_html__( 'Video', 'nifty' ) ),
				array( 'param_name' => 'background_video_mp4', 'type' => 'textfield', 'heading' => esc_html__( 'MP4 background video', 'nifty' ), 'group' => esc_html__( 'Video', 'nifty' ) ),
				array( 'param_name' => 'background_video_ogg', 'type' => 'textfield', 'heading' => esc_html__( 'OGG background video', 'nifty' ), 'group' => esc_html__( 'Video', 'nifty' ) ),
				array( 'param_name' => 'background_video_webm', 'type' => 'textfield', 'heading' => esc_html__( 'WEBM background video', 'nifty' ), 'group' => esc_html__( 'Video', 'nifty' ) ),
				array( 'param_name' => 'show_video_on_mobile',  'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'nifty' ) => 'yes' ), 'default' => '', 'heading' => esc_html__( 'Show Video on Mobile Devices', 'nifty' ), 'group' => esc_html__( 'Video', 'nifty' ) )
			)
		) );
	} 
}

class BT_BB_YT_Video_Proxy {
	function __construct( $prefix, $el_id ) {
		$this->prefix = $prefix;
		$this->el_id = $el_id;
	}
	public function js_init() {
		// wp_register_script( 'boldthemes-script-bt-bb-section-js-init', '' );
		// wp_enqueue_script( 'boldthemes-script-bt-bb-section-js-init' );
		// wp_add_inline_script( 'boldthemes-script-bt-bb-section-js-init', 'jQuery(function() { jQuery( "#' . esc_html( $this->el_id ) . ' .' . esc_html( $this->prefix ) . 'background_video_yt_inner" ).YTPlayer();});' );
		wp_add_inline_script( 'bt_bb_yt', 'jQuery(function() { jQuery( "#' . esc_html( $this->el_id ) . ' .' . esc_html( $this->prefix ) . 'background_video_yt_inner" ).YTPlayer();});' );
    }

}