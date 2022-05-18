<?php
function nifty_enqueue_styles() {

    $parent_style = 'nifty-style';

    wp_enqueue_style( $parent_style, get_parent_theme_file_uri( 'style.css' ) );
    wp_enqueue_style( 'child-style',
        get_theme_file_uri( 'style.css' ),
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'nifty_enqueue_styles' );
?>