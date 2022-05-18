<?php

/* Remove unused params */

remove_action( 'customize_register', 'boldthemes_customize_blog_side_info' );
remove_action( 'boldthemes_customize_register', 'boldthemes_customize_blog_side_info' );
remove_action( 'customize_register', 'boldthemes_customize_footer_dark_skin' );
remove_action( 'boldthemes_customize_register', 'boldthemes_customize_footer_dark_skin' );


// SUPERTITLE WEIGHT

BoldThemes_Customize_Default::$data['default_supertitle_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_supertitle_weight' ) ) {
	function boldthemes_customize_default_supertitle_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_supertitle_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_supertitle_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_supertitle_weight', array(
			'label'     		=> esc_html__( 'Supertitle Font Weight', 'nifty' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_supertitle_weight]',
			'priority'  		=> 100,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'nifty' ),
				'thin' 			=> esc_html__( 'Thin', 'nifty' ),
				'lighter' 		=> esc_html__( 'Lighter', 'nifty' ),
				'light' 		=> esc_html__( 'Light', 'nifty' ),
				'normal' 		=> esc_html__( 'Normal', 'nifty' ),
				'medium' 		=> esc_html__( 'Medium', 'nifty' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'nifty' ),
				'bold' 			=> esc_html__( 'Bold', 'nifty' ),
				'bolder' 		=> esc_html__( 'Bolder', 'nifty' ),
				'black' 		=> esc_html__( 'Black', 'nifty' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_supertitle_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_supertitle_weight' );


// HEADING WEIGHT

BoldThemes_Customize_Default::$data['default_heading_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_heading_weight' ) ) {
	function boldthemes_customize_default_heading_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_heading_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_heading_weight', array(
			'label'     		=> esc_html__( 'Heading Font Weight', 'nifty' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]',
			'priority'  		=> 100,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'nifty' ),
				'thin' 			=> esc_html__( 'Thin', 'nifty' ),
				'lighter' 		=> esc_html__( 'Lighter', 'nifty' ),
				'light' 		=> esc_html__( 'Light', 'nifty' ),
				'normal' 		=> esc_html__( 'Normal', 'nifty' ),
				'medium' 		=> esc_html__( 'Medium', 'nifty' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'nifty' ),
				'bold' 			=> esc_html__( 'Bold', 'nifty' ),
				'bolder' 		=> esc_html__( 'Bolder', 'nifty' ),
				'black' 		=> esc_html__( 'Black', 'nifty' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_heading_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_heading_weight' );


// SUBTITLE WEIGHT

BoldThemes_Customize_Default::$data['default_subtitle_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_subtitle_weight' ) ) {
	function boldthemes_customize_default_subtitle_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_subtitle_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_subtitle_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_subtitle_weight', array(
			'label'     		=> esc_html__( 'Subtitle Font Weight', 'nifty' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_subtitle_weight]',
			'priority'  		=> 100,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'nifty' ),
				'thin' 			=> esc_html__( 'Thin', 'nifty' ),
				'lighter' 		=> esc_html__( 'Lighter', 'nifty' ),
				'light' 		=> esc_html__( 'Light', 'nifty' ),
				'normal' 		=> esc_html__( 'Normal', 'nifty' ),
				'medium' 		=> esc_html__( 'Medium', 'nifty' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'nifty' ),
				'bold' 			=> esc_html__( 'Bold', 'nifty' ),
				'bolder' 		=> esc_html__( 'Bolder', 'nifty' ),
				'black' 		=> esc_html__( 'Black', 'nifty' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_subtitle_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_subtitle_weight' );


// SUBTITLE STYLE

BoldThemes_Customize_Default::$data['subtitle_style'] = '';
if ( ! function_exists( 'boldthemes_customize_subtitle_style' ) ) {
	function boldthemes_customize_default_subtitle_style( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[subtitle_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['subtitle_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'subtitle_style', array(
			'label'     		=> esc_html__( 'Subtitle Style', 'nifty' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[subtitle_style]',
			'priority'  		=> 101,
			'type'      		=> 'select',
			'choices'   => array(
				''					=> esc_html__( 'Default', 'nifty' ),
				'italic' 			=> esc_html__( 'Italic', 'nifty' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_subtitle_style' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_subtitle_style' );



// BUTTON FONT

BoldThemes_Customize_Default::$data['button_font'] = 'Nunito Sans';
if ( ! function_exists( 'boldthemes_customize_button_font' ) ) {
	function boldthemes_customize_button_font( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[button_font]', array(
			'default'           => urlencode( BoldThemes_Customize_Default::$data['button_font'] ),
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'button_font', array(
			'label'     => esc_html__( 'Button Font', 'nifty' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[button_font]',
			'priority'  => 101,
			'type'      => 'select',
			'choices'   => BoldThemesFramework::$customize_fonts
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_button_font' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_button_font' );


// BUTTON FONT WEIGHT

BoldThemes_Customize_Default::$data['default_button_weight'] = 'default';

if ( ! function_exists( 'boldthemes_customize_default_button_weight' ) ) {
	function boldthemes_customize_default_button_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_button_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_button_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_button_weight', array(
			'label'     => esc_html__( 'Button Font Weight', 'nifty' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_button_weight]',
			'priority'  => 102,
			'type'      => 'select',
			'choices'   => array(
				'default'	=> esc_html__( 'Default', 'nifty' ),
				'thin' 		=> esc_html__( 'Thin', 'nifty' ),
				'lighter' 	=> esc_html__( 'Lighter', 'nifty' ),
				'light' 	=> esc_html__( 'Light', 'nifty' ),
				'normal' 	=> esc_html__( 'Normal', 'nifty' ),
				'medium' 	=> esc_html__( 'Medium', 'nifty' ),
				'semi-bold' => esc_html__( 'Semi bold', 'nifty' ),
				'bold' 		=> esc_html__( 'Bold', 'nifty' ),
				'bolder' 	=> esc_html__( 'Bolder', 'nifty' ),
				'black' 	=> esc_html__( 'Black', 'nifty' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_button_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_button_weight' );


// MENU WEIGHT

BoldThemes_Customize_Default::$data['default_menu_weight'] = 'default';

if ( ! function_exists( 'boldthemes_customize_default_menu_weight' ) ) {
	function boldthemes_customize_default_menu_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_menu_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_menu_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_menu_weight', array(
			'label'     => esc_html__( 'Menu Font Weight', 'nifty' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_menu_weight]',
			'priority'  => 103,
			'type'      => 'select',
			'choices'   => array(
				'default'	=> esc_html__( 'Default', 'nifty' ),
				'thin' 		=> esc_html__( 'Thin', 'nifty' ),
				'lighter' 	=> esc_html__( 'Lighter', 'nifty' ),
				'light' 	=> esc_html__( 'Light', 'nifty' ),
				'normal' 	=> esc_html__( 'Normal', 'nifty' ),
				'medium' 	=> esc_html__( 'Medium', 'nifty' ),
				'semi-bold' => esc_html__( 'Semi bold', 'nifty' ),
				'bold' 		=> esc_html__( 'Bold', 'nifty' ),
				'bolder' 	=> esc_html__( 'Bolder', 'nifty' ),
				'black' 	=> esc_html__( 'Black', 'nifty' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_menu_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_menu_weight' );


// LETTER SPACING HEADING FONT

if ( ! function_exists( 'boldthemes_customize_letter_spacing_heading' ) ) {
	function boldthemes_customize_letter_spacing_heading( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[letter_spacing_heading]', array(
			'default'           => BoldThemes_Customize_Default::$data['letter_spacing_heading'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control( 'letter_spacing_heading', array(
			'label'     => esc_html__( 'Letter Spacing Heading Font', 'nifty' ),
			'description'    => esc_html__( 'Enter number (without px) in order to define letter spacing in the Heading (e.g. -1, 0, 1 etc.).', 'nifty' ),
			'section'  => BoldThemesFramework::$pfx . '_typo_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[letter_spacing_heading]',
			'priority' => 104,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_letter_spacing_heading' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_letter_spacing_heading' );


// LETTER SPACING BUTTON FONT

if ( ! function_exists( 'boldthemes_customize_letter_spacing_button' ) ) {
	function boldthemes_customize_letter_spacing_button( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[letter_spacing_button]', array(
			'default'           => BoldThemes_Customize_Default::$data['letter_spacing_button'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control( 'letter_spacing_button', array(
			'label'     => esc_html__( 'Letter Spacing Button Font', 'nifty' ),
			'description'    => esc_html__( 'Enter number (without px) in order to define letter spacing in the buttons (e.g. -1, 0, 1 etc.).', 'nifty' ),
			'section'  => BoldThemesFramework::$pfx . '_typo_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[letter_spacing_button]',
			'priority' => 105,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_letter_spacing_button' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_letter_spacing_button' );


// CAPITALIZE MAIN MENU

BoldThemes_Customize_Default::$data['capitalize_main_menu'] = false;
if ( ! function_exists( 'boldthemes_customize_capitalize_main_menu' ) ) {
	function boldthemes_customize_capitalize_main_menu( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]', array(
			'default'           => BoldThemes_Customize_Default::$data['capitalize_main_menu'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'capitalize_main_menu', array(
			'label'     => esc_html__( 'Capitalize Menu Items', 'nifty' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]',
			'priority'  => 106,
			'type'      => 'checkbox'
		));
	}
}

add_action( 'customize_register', 'boldthemes_customize_capitalize_main_menu' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_capitalize_main_menu' );


// PAGE BACKGROUND COLOR

BoldThemes_Customize_Default::$data['page_background_color'] = '';

if ( ! function_exists( 'boldthemes_customize_page_background_color' ) ) {
	function boldthemes_customize_page_background_color( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[page_background_color]', array(
			'default'           => BoldThemes_Customize_Default::$data['page_background_color'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color'
		));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_background_color', array(
			'label'    => esc_html__( 'Page Background Color', 'nifty' ),
			'section'  => BoldThemesFramework::$pfx . '_general_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[page_background_color]',
			'priority' => 27,
			'context'  => BoldThemesFramework::$pfx . '_page_background_color'
		)));
	}
}
add_action( 'customize_register', 'boldthemes_customize_page_background_color' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_page_background_color' );



// FOOTER DARK SKIN

BoldThemes_Customize_Default::$data['footer_skin'] = '';

if ( ! function_exists( 'boldthemes_customize_footer_skin' ) ) {
	function boldthemes_customize_footer_skin( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[footer_skin]', array(
			'default'           => BoldThemes_Customize_Default::$data['footer_dark_skin'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'footer_skin', array(
			'label'    => esc_html__( 'Footer Skin', 'nifty' ),
			'section'  => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[footer_skin]',
			'priority' => 80,
			'type'     => 'select',
			'choices'   => array(
				'' 		=> esc_html__( 'Light skin', 'nifty' ),
				'dark'	=> esc_html__( 'Dark skin', 'nifty' ),
				'gray' 	=> esc_html__( 'Gray skin', 'nifty' )
			)
		));	
	}
}
add_action( 'customize_register', 'boldthemes_customize_footer_skin' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_footer_skin' );



// CUSTOM 404 IMAGE

if ( ! function_exists( 'boldthemes_customize_image_404' ) ) {
	function boldthemes_customize_image_404( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[image_404]', array(
			'default'           => BoldThemes_Customize_Default::$data['image_404'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_image'
		));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'image_404', array(
			'label'    => esc_html__( 'Custom Error 404 Page Image', 'nifty' ),
			'description'    => esc_html__( 'Set static image as a background on Error page. Minimum recommended size: 1920x1080px', 'nifty' ),
			'section'  => BoldThemesFramework::$pfx . '_general_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[image_404]',
			'priority' => 121,
			'context'  => BoldThemesFramework::$pfx . '_image_404'
		)));
	}
}
add_action( 'customize_register', 'boldthemes_customize_image_404' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_image_404' );


// BODY CUSTOM CLASS

BoldThemes_Customize_Default::$data['body_custom_class'] = '';

if ( ! function_exists( 'boldthemes_customize_body_custom_class' ) ) {
	function boldthemes_customize_body_custom_class( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[body_custom_class]', array(
			'default'           => BoldThemes_Customize_Default::$data['body_custom_class'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
		));

		$wp_customize->add_control( 'body_custom_class', array(
			'label'     => esc_html__( 'Body Custom Class', 'nifty' ),
			'description'    => esc_html__( 'Enter custom body CSS class', 'nifty' ),
			'section'  => BoldThemesFramework::$pfx . '_general_section',
			'settings' => BoldThemesFramework::$pfx . '_theme_options[body_custom_class]',
			'priority' => 105,
			'type'     => 'text'
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_body_custom_class' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_body_custom_class' );


/* Helper function */

if ( ! function_exists( 'nifty_body_class' ) ) {
	function nifty_body_class( $extra_class ) {
		if ( boldthemes_get_option( 'default_heading_weight' ) ) {
			$extra_class[] =  'btHeadingWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_heading_weight' ) );
		}
		if ( boldthemes_get_option( 'default_supertitle_weight' ) ) {
			$extra_class[] =  'btSupertitleWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_supertitle_weight' ) );
		}
		if ( boldthemes_get_option( 'default_subtitle_weight' ) ) {
			$extra_class[] =  'btSubtitleWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_subtitle_weight' ) );
		}
		if ( boldthemes_get_option( 'subtitle_style' ) ) {
			$extra_class[] =  'btSubtitleStyle' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'subtitle_style' ) );
		}
		if ( boldthemes_get_option( 'default_button_weight' ) ) {
			$extra_class[] =  'btButtonWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_button_weight' ) );
		}
		if ( boldthemes_get_option( 'page_background_color' ) ) {
			$extra_class[] =  'btPageBackground';
		}
		if ( boldthemes_get_option( 'footer_skin' ) ) {
			$extra_class[] =  'btButtonWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'footer_skin' ) );
		}
		if ( boldthemes_get_option( 'body_custom_class' ) ) {
			$extra_class[] =  boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'body_custom_class' ) );
		}
		return $extra_class;
	}
}