<?php
if( class_exists('woocommerce')){
	/*adding sections for store title*/
	$wp_customize->add_section( 'mercantile-store-title', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Store Title', 'mercantile' ),
		'panel'          => 'mercantile-options'
	) );

	/*store title*/
	$wp_customize->add_setting( 'mercantile_theme_options[mercantile-store-title]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['mercantile-store-title'],
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'mercantile_theme_options[mercantile-store-title]', array(
		'label'		=> __( 'Store Title', 'mercantile' ),
		'section'   => 'mercantile-store-title',
		'settings'  => 'mercantile_theme_options[mercantile-store-title]',
		'type'	  	=> 'text',
		'priority'  => 10
	) );
}