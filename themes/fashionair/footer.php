<?php /**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
?>
<footer>
	<div class="container-fluid fashion-footer space">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-widget-area' ) ) { 
			dynamic_sidebar( 'footer-widget-area' ); 
			} else { 
			$args = array(
				'before_widget' => '<div class="col-md-3 col-sm-6 footer-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="col-md-12 title"><h3><span class="fa fa-info icon"></span>',
				'after_title'   => '</h3></div>' );
				the_widget('WP_Widget_Categories', null, $args);
				the_widget('WP_Widget_Archives', null, $args);					
				the_widget('WP_Widget_Recent_Posts', null, $args);
				the_widget('WP_Widget_Meta', null, $args);
			} ?>
		</div>			
	</div>
</footer>
<div class="container-fluid fashion-social space">
	<div class="container">
		<div class="col-md-12 title">			
		<a class="navbar-brand footer-nav" href="<?php echo esc_url(home_url( '/' )); ?>" tittle="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<?php if (has_custom_logo()) { the_custom_logo(); } else { ?> <h1><?php echo esc_attr(get_bloginfo('name')); } ?></h1>
		</a>
		<p><?php if(get_theme_mod('fashionair_options_footer_copyright')){  echo esc_attr(get_theme_mod('fashionair_options_footer_copyright')); } ?>
			<a href="<?php if(get_theme_mod('fashionair_options_developed_by_link')){  echo esc_url(get_theme_mod('fashionair_options_developed_by_link')); } ?>" class="footer-color">
			<?php if(get_theme_mod('fashionair_options_developed_by_text')){  echo esc_attr(get_theme_mod('fashionair_options_developed_by_text')); } ?></a> 
			<?php if(get_theme_mod('fashionair_options_powered_by_text')){  echo esc_attr(get_theme_mod('fashionair_options_powered_by_text')); } ?> 
			<a href="<?php if(get_theme_mod('fashionair_options_powered_by_link')){  echo esc_url(get_theme_mod('fashionair_options_powered_by_link')); } ?>" class="footer-red">
			<?php if(get_theme_mod('fashionair_options_powered_by_text_wp')){  echo esc_attr(get_theme_mod('fashionair_options_powered_by_text_wp')); } ?></a></p>
		</div>
		<?php if(get_theme_mod('fashionair_options_footer_sme')==1){ ?>
		<div class="col-md-12 social-icon">
			<ul class="social-icons">
				<?php if(get_theme_mod('fashionair_options_facebook_link')){ ?>
				<li class="facebook social-popout"><a href="<?php echo esc_url(get_theme_mod('fashionair_options_facebook_link'),'fashionair'); ?>"><i class="fa fa-facebook icon"></i></a></li>
				<?php }   if(get_theme_mod('fashionair_options_linkedin_link')){ ?>
				<li class="linkedin social-popout"><a href="<?php echo esc_url(get_theme_mod('fashionair_options_linkedin_link'),'fashionair'); ?>"><i class="fa fa-linkedin icon"></i></a></li>
				<?php }   if(get_theme_mod('fashionair_options_googleplus_link')){ ?>
				<li class="googleplus social-popout"><a href<?php echo esc_url(get_theme_mod('fashionair_options_googleplus_link'),'fashionair'); ?>i class="fa fa-google-plus icon"></i></a></li>
				<?php }   if(get_theme_mod('fashionair_options_twitter_link')){ ?>
				<li class="twitter social-popout"><a href="<?php echo esc_url(get_theme_mod('fashionair_options_twitter_link'),'fashionair'); ?>"><i class="fa fa-twitter icon"></i></a></li>
				<?php }   if(get_theme_mod('fashionair_options_youtube_link')){ ?>
				<li class="youtube social-popout"><a href="<?php echo esc_url(get_theme_mod('fashionair_options_youtube_link'),'fashionair'); ?>"><i class="fa fa-youtube icon"></i></a></li>
				<?php }  ?>
			</ul>
		</div>
		<?php } ?>
	</div>
</div>
<a href="#" class="back-to-top"><i class="fa fa-level-up"></i></a>
</div>
<?php wp_footer(); ?>
</body>
</html>