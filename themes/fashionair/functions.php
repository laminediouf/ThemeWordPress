<?php
/**
 * Fashionair functions and definitions
 *
 * 
 *
 * @package WordPress
 * @subpackage Fashionair
 * @since 2.0
 */
/*** Customizer additions settings. ***/	
	require( get_template_directory() . '/core/fashionair_customizer.php' );
	require( get_template_directory() . '/core/plugin-auto-install.php' );
	/*** Load menu nav_walker file. ***/
	require( get_template_directory() . '/core/Bootstrap-Navwalker.php');
	
	/*** Register widget area. ***/
	require get_template_directory() . '/core/fashionair-widgets-area.php';

	/*** Implement the Custom Header feature. ***/
	require get_template_directory() . '/core/custom-header.php';

	/*** Post navigation ***/
	require get_template_directory() . '/core/fashionair_navigation.php';

	/**** code for comment ***/
	require get_template_directory() . '/core/fashionair_comment.php';
	
	/**** code for comment ***/
	require get_template_directory() . '/core/fashionair-slider-code.php';
	
	/**** code for comment ***/
	require get_template_directory() . '/core/fashionair-breadcrumb.php';

	if(is_admin()){
	require get_template_directory() . '/core/admin/upgrade-to-pro.php';
	require get_template_directory() . '/core/admin/how_to_set.php';
	}
	
	/*After Theme Setup*/	
	function fashionair_theme_setup() {	
		/* Make theme available for translation. Translations can be filed in the /lang/ directory.
		 * If you're building a theme based on fashionair, use a find and replace, to change 'fashionair' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fashionair', get_template_directory() . '/assets/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		/*
		* Let WordPress manage the document title. By adding theme support, we declare that this theme does not use a
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );
		
		/** Enable support for Post Thumbnails on posts and pages. ***/
		add_theme_support( 'post-thumbnails' );

		/** Woocommerce support **/
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	
		/** This theme uses wp_nav_menu() in one location. **/
		register_nav_menu( 'primary', __( 'Primary Menu', 'fashionair' ) );
		
		add_editor_style('css/editor-style.css');
		
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 990; //px
		
		//Blog Thumb Image Sizes
		add_image_size('fashionair_post_thumb',750,391,true);
		//Blogs thumbs
		add_image_size('fashionair_page_thumb',730,350,true);	
		add_image_size('fashionair_blog_thumb',500,300,true);
		add_image_size('fashionair_slider_thumb',1349,703,true);
		add_theme_support( 'custom-logo', array( 'flex-height' => true, 'flex-width'  => true) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		$args = array(
        'width'         => 1200,
        'height'        => 200,
        'uploads'       => true,
        'flex-width'    => false,
        'default-repeat' => '',
        'flex-height' => false,
        );
        add_theme_support( 'custom-header', $args );
	}	
	add_action('after_setup_theme', 'fashionair_theme_setup');
	
	/*** Enqueue scripts and styles. ***/
	function fashionair_theme_name_scripts() {

		//CSS files
		wp_enqueue_style( 'fashionair-style',get_stylesheet_uri() );
		wp_enqueue_style('fashionair-font-Montserrat', '//fonts.googleapis.com/css?family=Montserrat:300,400,500,700');
		wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/css/bootstrap/bootstrap.css','3.3.7');
		wp_enqueue_style('font-awesome-css',get_template_directory_uri().'/assets/css/font-awesome.css','4.7.0');
		wp_enqueue_style('swiper-css',get_template_directory_uri().'/assets/css/swiper.css','3.4.2');
		wp_enqueue_style('animate-min',get_template_directory_uri().'/assets/css/animate.min.css');
		wp_enqueue_style('fashionair-media-css',get_template_directory_uri().'/assets/css/media.css');
		
		//JS files
		wp_enqueue_script('bootstrap',get_template_directory_uri().'/assets/css/bootstrap/bootstrap.js',array( 'jquery' ));
		wp_enqueue_script('swiper-js',get_template_directory_uri().'/js/swiper.js');
		wp_enqueue_script('fashionair-menu-js',get_template_directory_uri().'/js/menu.js');
		wp_enqueue_script('fashionair-script-js',get_template_directory_uri().'/js/script.js');
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
	add_action('wp_enqueue_scripts', 'fashionair_theme_name_scripts');
	
	/*** Replaces the excerpt "more" text by a link  ***/
	function fashionair_excerpt_more($more) {		
		return '<div class="fashion-blog"><a class="btn" href="'.get_permalink().'"><i class="fa fa-plus-circle"></i> '.__('Read More', 'fashionair' ).'</a></div>';
	}
	add_filter('excerpt_more', 'fashionair_excerpt_more');	
	
	function fashionair_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' ) ));
	}}
	add_action( 'wp_head', 'fashionair_pingback_header' );

	if ( ! function_exists( 'fashionair_is_woocommerce_activated' ) ) {
	// Query WooCommerce activation
		function fashionair_is_woocommerce_activated() {
			return class_exists( 'WooCommerce' ) ? true : false;
		}
	}

	/**
	* Enqueue script for custom customize control.
	*/
	function fashionair_custom_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_stylesheet_directory_uri() . '/assets/css/customizer.css' );
	}
	add_action( 'customize_controls_enqueue_scripts', 'fashionair_custom_customize_enqueue' );	

?>