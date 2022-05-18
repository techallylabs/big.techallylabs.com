<?php


// HEADER STYLE
if ( ! function_exists( 'boldthemes_customize_header_style' ) ) {
	function boldthemes_customize_header_style( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[header_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['header_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'header_style', array(
			'label'     => esc_html__( 'Header Style', 'nifty' ),
			'description'    => esc_html__( 'Select header style for all the pages on the site.', 'nifty' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[header_style]',
			'priority'  => 62,
			'type'      => 'select',
			'choices'   => array(
				'transparent-light'  	=> esc_html__( 'Transparent Light', 'nifty' ),
				'transparent-dark'   	=> esc_html__( 'Transparent Dark', 'nifty' ),
				'accent-dark' 			=> esc_html__( 'Accent + Dark', 'nifty' ),
				'accent-light' 			=> esc_html__( 'Light + Accent ', 'nifty' ),
				'light-accent' 			=> esc_html__( 'Accent + Light', 'nifty' ),
				'light-dark' 			=> esc_html__( 'Light + Dark', 'nifty' ),
				'dark-transparent' 		=> esc_html__( 'Dark + Transparent Dark', 'nifty' ),
				'light-transparent' 	=> esc_html__( 'Dark + Transparent Light', 'nifty' )
			)
		));
	}
}


// PAGE WIDTH
if ( ! function_exists( 'boldthemes_customize_page_width' ) ) {
	function boldthemes_customize_page_width( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[page_width]', array(
			'default'           => BoldThemes_Customize_Default::$data['page_width'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'page_width', array(
			'label'     => esc_html__( 'Page Width', 'nifty' ),
			'section'   => BoldThemesFramework::$pfx . '_general_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[page_width]',
			'priority'  => 95,
			'type'      => 'select',
			'choices'   => array(
				'no_change' 	=> esc_html__( 'Default', 'nifty' ),
				'boxed' 		=> esc_html__( 'Boxed 1200px', 'nifty' ),
				'boxed_1600' 	=> esc_html__( 'Boxed 1600px', 'nifty' )	
			)
		));
	}
}

