<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
get_header(); ?>
<div class="breadcrumb-cover">
	<div class="container-fluid fashion-breadcrumb">
		<div class="container">
			<div class="fashion-bredcum-title">
				<h1><?php esc_attr_e('404 Error', 'fashionair' ); ?></h1>
				<?php if(get_theme_mod('fashionair_options_breadcrumb')!=''){ ?>
				<ul class="fashion-bredcum">
					 <li><?php fashionair_breadcrumb_trail(); ?> </li>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid fashion-error ">
	<div class="container space">
		<div class="col-md-12 fashion-error-details">
			<h1><?php esc_attr_e('404 Error','fashionair'); ?></h1>
			<h1><?php esc_attr_e('Whoops... Page Not Found !!!','fashionair'); ?></h1>						
			<p><?php esc_attr_e('It looks like nothing was found at this location.','fashionair'); ?></p>
			<div class="form-group">
				<?php get_search_form(); ?>
			</div>
		</div>			
	</div>
</div>
<?php get_footer(); ?>