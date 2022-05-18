<?php


// NEW IMAGE SIZES

function nifty_custom_image_sizes () {
	
	/* Large */
	add_image_size( 'boldthemes_large_rectangle', 1920, 1280, true );
	add_image_size( 'boldthemes_large_vertical_rectangle', 850, 1280, true );
	add_image_size( 'boldthemes_large_4:3', 1280, 960, true );
	
	/* Medium */
	add_image_size( 'boldthemes_medium_rectangle', 1080, 720, true );
	add_image_size( 'boldthemes_medium_vertical_rectangle', 720, 1080, true );
	add_image_size( 'boldthemes_medium_4:3', 1080, 810, true );
	
	/* Small */
	add_image_size( 'boldthemes_small_rectangle', 540, 360, true );
	add_image_size( 'boldthemes_small_vertical_rectangle', 360, 540, true );
	add_image_size( 'boldthemes_small_4:3', 540, 405, true );
}

add_action( 'after_setup_theme', 'nifty_custom_image_sizes', 11);



// COLOR SCHEME

if ( is_file( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' ) ) {
	require_once( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
}
if ( function_exists('bt_bb_get_color_scheme_param_array') ) {
	$color_scheme_arr = bt_bb_get_color_scheme_param_array();
} else {
	$color_scheme_arr = array();
}


// ROW - NEGATIVE MARGIN, BORDER, SHAPE, ANIMATION

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row', array(
		array( 'param_name' => 'negative_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Negative margin', 'nifty' ), 'group' => esc_html__( 'General', 'nifty' ), 'preview' => true,
		'value' => array(
				esc_html__( 'No margin', 'nifty' ) 	=> '',
				esc_html__( 'Small', 'nifty' ) 		=> 'small',
				esc_html__( 'Normal', 'nifty' ) 		=> 'normal',
				esc_html__( 'Medium', 'nifty' ) 		=> 'medium',
				esc_html__( 'Large', 'nifty' ) 		=> 'large',
				esc_html__( 'Extra Large', 'nifty' ) 	=> 'extralarge',
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
	));
}

function nifty_bt_bb_row_class( $class, $atts ) {
	if ( isset( $atts['negative_margin'] ) && $atts['negative_margin'] != '' ) {
		$class[] = 'bt_bb_negative_margin' . '_' . $atts['negative_margin'];
	}
	return $class;
}

add_filter( 'bt_bb_row_class', 'nifty_bt_bb_row_class', 10, 2 );


// COLUMN - PADDING, INNER COLOR SCHEME, SHAPE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'nifty' ), 'preview' => true,
			'responsive_override' => true, 
			'value' => array(
				esc_html__( 'Normal', 'nifty' ) 		=> 'normal',
				esc_html__( 'Double', 'nifty' ) 		=> 'double',
				esc_html__( 'Text Indent', 'nifty' ) 	=> 'text_indent',
				esc_html__( '0px', 'nifty' ) 			=> '0',
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
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Inner shape', 'nifty' ),
			'value' => array(
				esc_html__( 'Square', 'nifty' ) 			=> '',
				esc_html__( 'Soft Rounded', 'nifty' ) 	=> 'rounded'
			)
		),
		array( 'param_name' => 'inner_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Inner color scheme', 'nifty' ), 'value' => $color_scheme_arr ),
	));
}

function nifty_bt_bb_column_class( $class, $atts ) {
	if ( isset( $atts['inner_color_scheme'] ) && $atts['inner_color_scheme'] != '' ) {
		$class[] = 'bt_bb_inner_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['inner_color_scheme'] );
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	return $class;
}

add_filter( 'bt_bb_column_class', 'nifty_bt_bb_column_class', 10, 2 );


// INNER COLUMN - PADDING, INNER COLOR SCHEME, SHAPE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column_inner', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column_inner', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'nifty' ), 'preview' => true,
			'responsive_override' => true,
			'value' => array(
				esc_html__( 'Normal', 'nifty' ) 		=> 'normal',
				esc_html__( 'Double', 'nifty' ) 		=> 'double',
				esc_html__( 'Text Indent', 'nifty' ) 	=> 'text_indent',
				esc_html__( '0px', 'nifty' ) 			=> '0',
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
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Inner shape', 'nifty' ),
			'value' => array(
				esc_html__( 'Square', 'nifty' ) 			=> '',
				esc_html__( 'Soft Rounded', 'nifty' ) 	=> 'rounded'
			)
		),
		array( 'param_name' => 'inner_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner color scheme', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ), 'value' => $color_scheme_arr ),
	));
}

function nifty_bt_bb_column_inner_class( $class, $atts ) {
	if ( isset( $atts['inner_color_scheme'] ) && $atts['inner_color_scheme'] != '' ) {
		$class[] = 'bt_bb_inner_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['inner_color_scheme'] );
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	return $class;
}
add_filter( 'bt_bb_column_inner_class', 'nifty_bt_bb_column_inner_class', 10, 2 );



// CUSTOM MENU - WEIGHT

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_custom_menu', array(
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'nifty' ),
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
	));
}

function nifty_bt_bb_custom_menu_class( $class, $atts ) {
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	return $class;
}

add_filter( 'bt_bb_custom_menu_class', 'nifty_bt_bb_custom_menu_class', 10, 2 );


// BUTTON - WEIGHT, URL, SIZE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_button', 'size' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_button', array(
		array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'nifty' ), 'preview' => true, 'responsive_override' => true, 'weight' => 1, 'group' => esc_html__( 'Design', 'nifty' ),
			'value' => array(
				esc_html__( 'Small', 'nifty' ) 		=> 'small',
				esc_html__( 'Normal', 'nifty' ) 		=> 'normal',
				esc_html__( 'Large', 'nifty' ) 		=> 'large'
			)
		),
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
			'value' => array(
				esc_html__( 'Default', 'nifty' ) 		=> '',
				esc_html__( 'Thin', 'nifty' ) 		=> 'thin',
				esc_html__( 'Lighter', 'nifty' ) 		=> 'lighter',
				esc_html__( 'Light', 'nifty' ) 		=> 'light',
				esc_html__( 'Normal', 'nifty' ) 		=> 'normal',
				esc_html__( 'Medium', 'nifty' ) 		=> 'medium',
				esc_html__( 'Semi bold', 'nifty' ) 	=> 'semi-bold',
				esc_html__( 'Bold', 'nifty' ) 		=> 'bold',
				esc_html__( 'Bolder', 'nifty' ) 		=> 'bolder',
				esc_html__( 'Black', 'nifty' ) 		=> 'black'
			)
		),
	));
}

function nifty_bt_bb_button_class( $class, $atts ) {
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	if ( $atts['icon'] != '' ) {
		$class[] = 'btWithIcon';
	}
	return $class;
}
add_filter( 'bt_bb_button_class', 'nifty_bt_bb_button_class', 10, 2 );



// ICON - SIZE, TEXT COLOR

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_icon', array(
		array( 'param_name' => 'text_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Text color', 'nifty' ), 'group' => esc_html__( 'Design', 'nifty' ),
			'value' => array(
				esc_html__( 'Inherit', 'nifty' ) 			=> '',
				esc_html__( 'Dark color', 'nifty' ) 		=> 'dark',
				esc_html__( 'Light color', 'nifty' ) 		=> 'light',
				esc_html__( 'Accent color', 'nifty' ) 	=> 'accent',
				esc_html__( 'Alternate color', 'nifty' ) 	=> 'alternate'
			)
		),
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Font weight', 'nifty' ),
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
		array( 'param_name' => 'position', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'nifty' ), 'heading' => esc_html__( 'Icon position', 'nifty' ),
			'value' => array(
				esc_html__( 'Center', 'nifty' ) 			=> '',
				esc_html__( 'Top', 'nifty' ) 				=> 'top',
				esc_html__( 'Bottom', 'nifty' ) 			=> 'bottom'
			)
		),
	));
}

function nifty_bt_bb_icon_class( $class, $atts ) {
	if ( isset( $atts['text_color'] ) && $atts['text_color'] != '' ) {
		$class[] = 'bt_bb_text_color' . '_' . $atts['text_color'];
	}
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	if ( isset( $atts['position'] ) && $atts['position'] != '' ) {
		$class[] = 'bt_bb_position' . '_' . $atts['position'];
	}
	return $class;
}
add_filter( 'bt_bb_icon_class', 'nifty_bt_bb_icon_class', 10, 2 );



// IMAGE - SHADOW

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_image', 'shape' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_image', array(
		array( 'param_name' => 'shadow', 'type' => 'dropdown', 'heading' => esc_html__( 'Show shadow', 'nifty' ), 
			'value' => array(
				esc_html__( 'No', 'nifty' ) 		=> '',
				esc_html__( 'Yes', 'nifty' ) 		=> 'visible'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'nifty' ),
			'value' => array(
				esc_html__( 'Square', 'nifty' ) 					=> 'square',
				esc_html__( 'Soft Rounded', 'nifty' ) 			=> 'soft-rounded',
				esc_html__( 'Hard Rounded', 'nifty' ) 			=> 'hard-rounded',
				esc_html__( 'Fluid shape 01', 'nifty' ) 			=> 'fluid_01',
				esc_html__( 'Fluid shape 02', 'nifty' ) 			=> 'fluid_02',
				esc_html__( 'Fluid shape 03', 'nifty' ) 			=> 'fluid_03',
				esc_html__( 'Bean shape (right)', 'nifty' ) 		=> 'bean_right',
				esc_html__( 'Bean shape (left)', 'nifty' ) 		=> 'bean_left'
			)
		),
	));
}

function nifty_bt_bb_image_class( $class, $atts ) {
	if ( isset( $atts['shadow'] ) && $atts['shadow'] != '' ) {
		$class[] = 'bt_bb_shadow' . '_' . $atts['shadow'];
	}
	return $class;
}
add_filter( 'bt_bb_image_class', 'nifty_bt_bb_image_class', 10, 2 );



// LATEST POST - SHAPE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_latest_posts', 'image_shape' );
}



// SLIDER - NAVIGATION ALIGN

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_content_slider', array(
		array( 'param_name' => 'align_navigation', 'type' => 'dropdown', 'heading' => esc_html__( 'Align navigation', 'nifty' ), 
			'value' => array(
				esc_html__( 'Inherit', 'nifty' ) 				=> '',
				esc_html__( 'Left', 'nifty' ) 				=> 'left',
				esc_html__( 'Right', 'nifty' ) 				=> 'right',
				esc_html__( 'Center', 'nifty' ) 				=> 'center'
			)
		),
		array( 'param_name' => 'navigation_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Navigation color', 'nifty' ),
			'value' => array(
				esc_html__( 'Light', 'nifty' ) 			=> '',
				esc_html__( 'Dark', 'nifty' ) 			=> 'dark',
				esc_html__( 'Accent', 'nifty' ) 			=> 'accent',
				esc_html__( 'Alternate', 'nifty' ) 		=> 'alternate'
			)
		),
	));
}

function nifty_bt_bb_content_slider_class( $class, $atts ) {
	if ( isset( $atts['align_navigation'] ) && $atts['align_navigation'] != '' ) {
		$class[] = 'bt_bb_align_navigation' . '_' . $atts['align_navigation'];
	}
	if ( isset( $atts['navigation_color'] ) && $atts['navigation_color'] != '' ) {
		$class[] = 'bt_bb_navigation_color' . '_' . $atts['navigation_color'];
	}
	return $class;
}

add_filter( 'bt_bb_content_slider_class', 'nifty_bt_bb_content_slider_class', 10, 2 );



// GOOGLE MAP

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_google_maps', array(
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'nifty' ), 
			'value' => array(
				esc_html__( 'Square', 'nifty' ) 				=> '',
				esc_html__( 'Round', 'nifty' ) 				=> 'round'
			)
		),
	));
}

function nifty_bt_bb_google_maps_class( $class, $atts ) {
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	return $class;
}

add_filter( 'bt_bb_google_maps_class', 'nifty_bt_bb_google_maps_class', 10, 2 );

function nifty_bt_bb_fe( $elements ) {

	$elements[ 'bt_bb_card_icon' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'icon'      					=> array(),
			'colored_icon'         			=> array(),
			'colored_icon_color_scheme' 	=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'title'							=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_card_icon_title a', 'type' => 'inner_html' ) ),
			'text'							=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_card_icon_text p', 'type' => 'inner_html' ) ),			
			'border'						=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'shadow'						=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'title_size'					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'font_weight'   				=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'colored_icon_size'         	=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'url'							=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'href' ) ),
			'target' 						=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'target' ) ),
		),
	);
	$elements[ 'bt_bb_card_image' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'image'      					=> array(),
			//'image_position'  				=> array(),
			//'image_format'					=> array(),
			'supertitle'					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_card_image_title .bt_bb_headline_superheadline', 'type' => 'inner_html' ) ),
			'title'							=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_card_image_title .bt_bb_headline_content span a', 'type' => 'inner_html' ) ),
			'text'							=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_card_image_text', 'type' => 'inner_html' ) ),			
			'border'      					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'shadow'      					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'url'							=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'href' ) ),
			'target' 						=> array( 'js_handler' => array( 'target_selector' => 'a', 'type' => 'attr', 'attr' => 'target' ) ),
		),
	);
	$elements[ 'bt_bb_floating_image' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'image'						=>  array(),
			'animation_speed'			=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'attr', 'attr' => 'data-speed' ) ),
			'animation_direction'		=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'attr', 'attr' => 'data-direction' ) ),
		),
	);
	$elements[ 'bt_bb_inner_step' ] = array(
		'edit_box_selector' => '',
		'ajax_trigger_scroll' => true,
		'params' => array(
			'icon'      			=> array(),
			'colored_icon'      	=> array(),
			'supertitle' 			=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_inner_step_supertitle', 'type' => 'inner_html' ) ),
			'title' 				=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_inner_step_title', 'type' => 'inner_html' ) ),
		),
	);
	$elements[ 'bt_bb_progress_bar_advanced' ] = array(
		'edit_box_selector' => '',
		'ajax_trigger_scroll' => true,
		'params' => array(
			'type'        					=> array(),
			'percentage'        			=> array(),
			'duration'     	   				=> array(),
			'easing'       	 				=> array(),
			'text'        					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_progress_bar_advanced_text', 'type' => 'inner_html' ) ),
			'icon'      					=> array(),
			'colored_icon'         			=> array(),
			'title'        					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_progress_bar_advanced_title', 'type' => 'inner_html' ) ),
			'text_below'        			=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_progress_bar_advanced_text_below', 'type' => 'inner_html' ) ),		
		),
	);
	$elements[ 'bt_bb_testimonial' ] = array(
		'edit_box_selector' => '',
		'params' => array(
			'text'						=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_testimonial_text .bt_bb_headline_content span', 'type' => 'inner_html' ) ),
			'logo'						=> array(),
			'name'						=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_testimonial_name .bt_bb_headline_superheadline', 'type' => 'inner_html' ) ),
			'details'					=> array( 'js_handler' => array( 'target_selector' => '.bt_bb_testimonial_details span', 'type' => 'inner_html' ) ),
			'signature'					=> array(),
			'font_weight'				=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'text_size'					=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'text_style'				=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'quote_color'				=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
			'quote_position'			=> array( 'js_handler' => array( 'target_selector' => '', 'type' => 'class' ) ),
		),
	);


	return $elements;
}
add_filter( 'bt_bb_fe_elements', 'nifty_bt_bb_fe' );