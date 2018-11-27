<?php 
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
get_header();
	if(is_page_template('assets/template-product.php')) {
	get_template_part('assets/template','product'); }

	elseif(is_page_template('assets/template-home.php')) {
	get_template_part('assets/template','home'); }
	
	elseif(is_page_template('assets/template-fullwidth.php')) {
	get_template_part('assets/template','fullwidth'); }
	elseif(is_page()){
		get_template_part('page');
	} else {
		get_template_part('index');
	}
get_footer();
 ?>