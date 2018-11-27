<?php
/**
 * Loads the child theme textdomain.
 */
function oneway_child_theme_setup() {
    load_child_theme_textdomain( 'oneway');
}
add_action( 'after_setup_theme', 'oneway_child_theme_setup' );

function oneway_child_enqueue_styles() {
    $parent_style = 'oneway-parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	 wp_enqueue_style( 'oneway-style',get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'oneway_child_enqueue_styles',99);