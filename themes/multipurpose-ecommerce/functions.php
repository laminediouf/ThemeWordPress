<?php
/**
 * Multipurpose Ecommerce functions and definitions
 */

function multipurpose_ecommerce_setup() {
	
	load_theme_textdomain( 'multipurpose-ecommerce' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'multipurpose-ecommerce-featured-image', 2000, 1200, true );
	add_image_size( 'multipurpose-ecommerce-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'multipurpose-ecommerce' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_editor_style( array( 'assets/css/editor-style.css', multipurpose_ecommerce_fonts_url() ) );
}
add_action( 'after_setup_theme', 'multipurpose_ecommerce_setup' );


/**
 * Register custom fonts.
 */
function multipurpose_ecommerce_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'PT Sans:300,400,600,700,800,900';
	$font_family[] = 'Roboto:400,700';
	$font_family[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	$font_family[] = 'Lato';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

/**
 * Widget area.
 */
function multipurpose_ecommerce_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'multipurpose-ecommerce' ),
		'id'            => 'sidebox-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'multipurpose-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'multipurpose-ecommerce' ),
		'id'            => 'sidebox-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on Pages and archive pages.', 'multipurpose-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'multipurpose-ecommerce' ),
		'id'            => 'sidebox-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and pages.', 'multipurpose-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'multipurpose-ecommerce' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'multipurpose-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'multipurpose-ecommerce' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'multipurpose-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'multipurpose-ecommerce' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'multipurpose-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'multipurpose-ecommerce' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'multipurpose-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'multipurpose_ecommerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function multipurpose_ecommerce_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'multipurpose-ecommerce-fonts', multipurpose_ecommerce_fonts_url(), array(), null );

	//bootstrap
	wp_enqueue_style( 'multipurpose-ecommerce-bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array( 'multipurpose-ecommerce-style' ), '1.0' );

	// Theme stylesheet.
	wp_enqueue_style( 'multipurpose-ecommerce-style', get_stylesheet_uri() );

	//font-awesome 
	wp_enqueue_style( 'multipurpose-ecommerce-font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	//Nivo Slider
	wp_enqueue_style( 'multipurpose-ecommerce-nivo-slider', get_template_directory_uri().'/assets/css/nivo-slider.css' );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'multipurpose-ecommerce-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'multipurpose-ecommerce-style' ), '1.0' );
		wp_style_add_data( 'multipurpose-ecommerce-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'multipurpose-ecommerce-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'multipurpose-ecommerce-style' ), '1.0' );
	wp_style_add_data( 'multipurpose-ecommerce-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'multipurpose-ecommerce-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$multipurpose_ecommerceScreenReaderText=array();
	
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'multipurpose-ecommerce-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );

		$multipurpose_ecommerceScreenReaderText['expand']         = __( 'Expand child menu', 'multipurpose-ecommerce' );
		$multipurpose_ecommerceScreenReaderText['collapse']       = __( 'Collapse child menu', 'multipurpose-ecommerce' );
		
	}

	wp_enqueue_script( 'jquery-nivo-slider', get_theme_file_uri( '/assets/js/jquery.nivo.slider.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'jquery-custom', get_theme_file_uri( '/assets/js/custom.js' ), array( 'jquery' ), true );

	wp_localize_script( 'multipurpose-ecommerce-skip-link-focus-fix', 'multipurpose_ecommerceScreenReaderText', $multipurpose_ecommerceScreenReaderText );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'multipurpose_ecommerce_scripts' );

/**
 * Front Page Template 
 */
function multipurpose_ecommerce_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'multipurpose_ecommerce_front_page_template' );

function multipurpose_ecommerce_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

//footer Link
define('multipurpose_ecommerce_CREDIT','http://www.themeseye.com/','multipurpose-ecommerce');

if ( ! function_exists( 'multipurpose_ecommerce_credit' ) ) {
	function multipurpose_ecommerce_credit(){
		echo "<a href=".esc_url(multipurpose_ecommerce_CREDIT)." target='_blank'>".esc_html__('ThemesEye','multipurpose-ecommerce')."</a>";
	}
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );