<?php
/** fashionair widget area ***/
	add_action('widgets_init', 'fashionair_widgets_init');
	function fashionair_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'fashionair' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'fashionair' ),
			'before_widget' => '<div class="col-md-12 fashion-widget">',
			'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="sidebar_widget_heading">',
	        'after_title'   => '</h2>',
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'fashionair' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'fashionair' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="col-md-12 title"><h3><span class="fa fa-info icon"></span>',
			'after_title' => '</h3></div>',
		) );             
	}
?>