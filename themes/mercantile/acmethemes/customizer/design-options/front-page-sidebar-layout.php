<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'mercantile-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front/Home Sidebar Layout', 'mercantile' ),
    'panel'          => 'mercantile-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'mercantile_theme_options[mercantile-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['mercantile-front-page-sidebar-layout'],
    'sanitize_callback' => 'mercantile_sanitize_select'
) );
$choices = mercantile_sidebar_layout();
$wp_customize->add_control( 'mercantile_theme_options[mercantile-front-page-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Front/Home Sidebar Layout', 'mercantile' ),
    'section'   => 'mercantile-front-page-sidebar-layout',
    'settings'  => 'mercantile_theme_options[mercantile-front-page-sidebar-layout]',
    'type'	  	=> 'select'
) );