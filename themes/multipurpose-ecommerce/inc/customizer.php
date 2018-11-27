<?php
/**
 * Multipurpose Ecommerce: Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function multipurpose_ecommerce_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'multipurpose_ecommerce_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'multipurpose-ecommerce' ),
	    'description' => __( 'Description of what this panel does.', 'multipurpose-ecommerce' ),
	) );

	$wp_customize->add_section( 'multipurpose_ecommerce_general_option', array(
    	'title'      => __( 'General Settings', 'multipurpose-ecommerce' ),
		'priority'   => 30,
		'panel' => 'multipurpose_ecommerce_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('multipurpose_ecommerce_layout_settings',array(
        'default' => __('Right Sidebar','multipurpose-ecommerce'),
        'sanitize_callback' => 'multipurpose_ecommerce_sanitize_choices'	        
	));

	$wp_customize->add_control('multipurpose_ecommerce_layout_settings',array(
        'type' => 'radio',
        'label' => __('Do you want this section','multipurpose-ecommerce'),
        'section' => 'multipurpose_ecommerce_general_option',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','multipurpose-ecommerce'),
            'Right Sidebar' => __('Right Sidebar','multipurpose-ecommerce'),
            'One Column' => __('One Column','multipurpose-ecommerce'),
            'Three Columns' => __('Three Columns','multipurpose-ecommerce'),
            'Four Columns' => __('Four Columns','multipurpose-ecommerce'),
            'Grid Layout' => __('Grid Layout','multipurpose-ecommerce')
        ),
	));

	//Topbar section
	$wp_customize->add_section('multipurpose_ecommerce_topbar',array(
		'title'	=> __('Topbar','multipurpose-ecommerce'),
		'description'	=> __('Add Topbar Content here','multipurpose-ecommerce'),
		'priority'	=> null,
		'panel' => 'multipurpose_ecommerce_panel_id',
	));

	$wp_customize->add_setting('multipurpose_ecommerce_shipping',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_shipping',array(
		'label'	=> __('For Shipping','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_topbar',
		'setting'	=> 'multipurpose_ecommerce_shipping',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_ecommerce_money',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_money',array(
		'label'	=> __('For Money Back','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_topbar',
		'setting'	=> 'multipurpose_ecommerce_money',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('multipurpose_ecommerce_support',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_support',array(
		'label'	=> __('For Support','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_topbar',
		'setting'	=> 'multipurpose_ecommerce_support',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('multipurpose_ecommerce_social_link',array(
		'title'	=> __('Social Media','multipurpose-ecommerce'),
		'description'	=> __('Add Social Media Url here','multipurpose-ecommerce'),
		'priority'	=> null,
		'panel' => 'multipurpose_ecommerce_panel_id',
	));

	$wp_customize->add_setting('multipurpose_ecommerce_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_facebook_url',array(
		'label'	=> __('Add Facebook link','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_social_link',
		'setting'	=> 'multipurpose_ecommerce_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_ecommerce_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_twitter_url',array(
		'label'	=> __('Add Twitter link','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_social_link',
		'setting'	=> 'multipurpose_ecommerce_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_ecommerce_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_insta_url',array(
		'label'	=> __('Add Instagram link','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_social_link',
		'setting'	=> 'multipurpose_ecommerce_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('multipurpose_ecommerce_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_youtube_url',array(
		'label'	=> __('Add Youtube link','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_social_link',
		'setting'	=> 'multipurpose_ecommerce_youtube_url',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'multipurpose_ecommerce_slider' , array(
    	'title'      => __( 'Slider Settings', 'multipurpose-ecommerce' ),
		'priority'   => null,
		'panel' => 'multipurpose_ecommerce_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'multipurpose_ecommerce_slide_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'multipurpose_ecommerce_slide_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'multipurpose-ecommerce' ),
			'section'  => 'multipurpose_ecommerce_slider',
			'type'     => 'dropdown-pages'
		) );

	}

	//Category
	$wp_customize->add_section('multipurpose_ecommerce_category',array(
		'title'	=> __('Categories ','multipurpose-ecommerce'),
		'description'=> __('This section will appear below the slider.','multipurpose-ecommerce'),
		'panel' => 'multipurpose_ecommerce_panel_id',
	));	
	
	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'multipurpose_ecommerce_category_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'multipurpose_ecommerce_category_page' . $count, array(
			'label'    => __( 'Select Page', 'multipurpose-ecommerce' ),
			'section'  => 'multipurpose_ecommerce_category',
			'type'     => 'dropdown-pages'
		));
	}

	//Footer
	$wp_customize->add_section( 'multipurpose_ecommerce_footer' , array(
    	'title'      => __( 'Footer Text', 'multipurpose-ecommerce' ),
		'priority'   => null,
		'panel' => 'multipurpose_ecommerce_panel_id'
	) );

	$wp_customize->add_setting('multipurpose_ecommerce_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('multipurpose_ecommerce_footer_text',array(
		'label'	=> __('Add Copyright Text','multipurpose-ecommerce'),
		'section'	=> 'multipurpose_ecommerce_footer',
		'setting'	=> 'multipurpose_ecommerce_footer_text',
		'type'		=> 'text'
	));


	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'multipurpose_ecommerce_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'multipurpose_ecommerce_customize_partial_blogdescription',
	) );
	
}
add_action( 'customize_register', 'multipurpose_ecommerce_customize_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @since Multipurpose Ecommerce 1.0
 * @see multipurpose-ecommerce_customize_register()
 *
 * @return void
 */
function multipurpose_ecommerce_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Multipurpose Ecommerce 1.0
 * @see multipurpose-ecommerce_customize_register()
 *
 * @return void
 */
function multipurpose_ecommerce_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function multipurpose_ecommerce_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'footer-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class multipurpose_ecommerce_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'multipurpose_ecommerce_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new multipurpose_ecommerce_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Multipurpose Ecommerce', 'multipurpose-ecommerce' ),
					'pro_text' => esc_html__( 'Go Pro',         'multipurpose-ecommerce' ),
					'pro_url'  => 'http://www.themeseye.com/wordpress/premium-multipurpose-ecommerce-wordpress-themes/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'multipurpose-ecommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'multipurpose-ecommerce-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
multipurpose_ecommerce_customize::get_instance();