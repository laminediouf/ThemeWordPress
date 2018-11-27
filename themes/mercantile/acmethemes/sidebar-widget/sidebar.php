<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mercantile_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'mercantile' ),
        'id'            => 'mercantile-sidebar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

	if ( is_customize_preview() ) {
		$mercantile_home_description = sprintf( __( 'Displays widgets on home page main content area.%1$s Note : Please go to %2$s "Static Front Page"%3$s setting, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'mercantile' ), '<br />','<b><a class="at-customizer" data-section="static_front_page" style="cursor: pointer">','</a></b>' );
	}
	else{
		$mercantile_home_description = __( 'Displays widgets on Front/Home page. Note : Please go to Setting => Reading, Select "A static page" then "Front page" and "Posts page" to show added widgets', 'mercantile' );
	}
    register_sidebar(array(
        'name' => __('Home Main Content Area', 'mercantile'),
        'id'   => 'mercantile-home',
        'description' => $mercantile_home_description,
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column One', 'mercantile'),
        'id' => 'mercantile-footer-top-col-one',
        'description' => __('Displays items on footer section.', 'mercantile'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column Two', 'mercantile'),
        'id' => 'mercantile-footer-top-col-two',
        'description' => __('Displays items on footer section.', 'mercantile'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column Three', 'mercantile'),
        'id' => 'mercantile-footer-top-col-three',
        'description' => __('Displays items on footer section.', 'mercantile'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
}
add_action( 'widgets_init', 'mercantile_widgets_init' );