<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'mercantile-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category/Archive Sidebar Layout', 'mercantile' ),
    'panel'          => 'mercantile-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'mercantile_theme_options[mercantile-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['mercantile-archive-sidebar-layout'],
    'sanitize_callback' => 'mercantile_sanitize_select'
) );
$choices = mercantile_sidebar_layout();
$wp_customize->add_control( 'mercantile_theme_options[mercantile-archive-sidebar-layout]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Category/Archive Sidebar Layout', 'mercantile' ),
    'description'   => __( 'Sidebar Layout for listing pages like category, author etc', 'mercantile' ),
    'section'       => 'mercantile-archive-sidebar-layout',
    'settings'      => 'mercantile_theme_options[mercantile-archive-sidebar-layout]',
    'type'	  	    => 'select'
) );