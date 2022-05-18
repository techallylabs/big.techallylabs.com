<?php

/**
 * Color schemes
 */

if ( ! function_exists( 'nifty_color_schemes' ) ) {
	function nifty_color_schemes( $color_scheme_arr ) {

		$theme_color_schemes = array();
		$theme_color_schemes[] = 'dark-skin;Light font, dark background;#ffffff;#191919';
		$theme_color_schemes[] = 'light-skin;Dark font, light background;#191919;#ffffff';
		
		$theme_color_schemes[] = 'accent-light-skin;Accent font, dark background (or details);' . boldthemes_get_option( 'accent_color' ) . ';#191919';
		$theme_color_schemes[] = 'accent-dark-skin;Accent font, light background (or details);' . boldthemes_get_option( 'accent_color' ) . ';#ffffff';
		$theme_color_schemes[] = 'light-accent-skin;Dark font, accent background (or details);#191919;' . boldthemes_get_option( 'accent_color' );
		$theme_color_schemes[] = 'dark-accent-skin;Light font, accent background (or details);#ffffff;' . boldthemes_get_option( 'accent_color' );
		
		$theme_color_schemes[] = 'alternate-light-skin;Alternate font, dark background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#191919';
		$theme_color_schemes[] = 'alternate-dark-skin;Alternate font, light background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#ffffff';
		$theme_color_schemes[] = 'light-alternate-skin;Dark font, alternate background (or details);#191919;' . boldthemes_get_option( 'alternate_color' );
		$theme_color_schemes[] = 'dark-alternate-skin;Light font, alternate background (or details);#ffffff;' . boldthemes_get_option( 'alternate_color' );

		$theme_color_schemes[] = 'gray-background;Dark font, Light gray background;#181818;#f7f7f5';

		$theme_color_schemes[] = 'alternate-accent-skin;Accent font, alternate background (or details);' . boldthemes_get_option( 'accent_color' ) . ';' . boldthemes_get_option( 'alternate_color' );
		$theme_color_schemes[] = 'accent-alternate-skin;Alternate font, accent background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';' . boldthemes_get_option( 'accent_color' );

		$theme_color_schemes[] = 'accent-gray-background;Accent font, Light gray background;' . boldthemes_get_option( 'accent_color' ) . ';#f7f7f5';
		$theme_color_schemes[] = 'alternate-gray-background;Alternate font, Light gray background;' . boldthemes_get_option( 'alternate_color' ) . ';#f7f7f5';

		return array_merge( $theme_color_schemes, $color_scheme_arr );
	}
}

/*

Black/White;#000;#fff
White/Black;#fff;#000
LightGray/Black;#e2e2e2;#000
Black/LightGray;#000;#e2e2e2
DarkGray/White;#333335;#fff
White/DarkGray;#fff;#333335

*/

/*
* set content width
*/
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Change number of related products
 */
if ( ! function_exists( 'boldthemes_change_number_related_products' ) ) {
	function boldthemes_change_number_related_products( $args ) {
		$args['posts_per_page'] = 4; // # of related products
		$args['columns'] = 4; // # of columns per row
		return $args;
	}
}

/**
 * Loop shop per page
 */
 
if ( ! function_exists( 'boldthemes_loop_shop_per_page' ) ) {
	function boldthemes_loop_shop_per_page( $cols ) {
		return 9;
	}
}

/**
 * Loop columns
 */
if ( ! function_exists( 'boldthemes_loop_shop_columns' ) ) {
	function boldthemes_loop_shop_columns() {
		return 3; // 3 products per row
	}
}