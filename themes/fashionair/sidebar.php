<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
?>
<div class="col-md-4 col-sm-12 col-xs-12 fashion-sidebar">
	<?php if ( is_active_sidebar( 'sidebar-primary' ) )
	{ dynamic_sidebar( 'sidebar-primary' );	}
	else  { 
	$args = array(
	'before_widget' => '<div class="col-md-12 fashion-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="fashionair_sidebar_widget_title"><h2>',
	'after_title'   => '</h2></div>' );
	the_widget('WP_Widget_Search', null, $args);

	$args = array(
	'before_widget' => '<div class="col-md-12 fashion-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="fashionair_sidebar_widget_title"><h2>',
	'after_title'   => '</h2></div>' );
	the_widget('WP_Widget_Categories', null, $args);

	$args = array(
	'before_widget' => '<div class="col-md-12 fashion-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="fashionair_sidebar_widget_title"><h2>',
	'after_title'   => '</h2></div>' );
	the_widget('WP_Widget_Recent_Posts', null, $args);

	$args = array(
	'before_widget' => '<div class="col-md-12 fashion-widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="fashionair_sidebar_widget_title"><h2>',
	'after_title'   => '</h2></div>' );
	the_widget('WP_Widget_Recent_Comments', null, $args);
	}
	?>
</div>