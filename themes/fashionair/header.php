<?php 
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Fashionair
 * @since 2.0
 * @version 2.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="home1" class="wrapper">
<header id="home1top">		
	<div class="container-fluid fashion_top"  style="background-image: url('<?php echo esc_url(get_header_image()); ?>')" >
		<div class="container">
			<div class="navigation_menu"  data-spy="affix" data-offset-top="95" id="fashionair_nav_top">
				<div class="navbar-container" >
					<nav class="navbar navbar-default " role="navigation">
						<div class="col-md-4 col-sm-12 navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
							  <span class="sr-only"><?php esc_attr_e('Toggle navigation' , 'fashionair');?></span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							  <span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>" tittle="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
							$image = wp_get_attachment_image_src( $custom_logo_id, 'full' ); ?>
							<?php if (has_custom_logo()) { ?> <img src="<?php echo esc_url($image[0]); ?>" height="<?php if(get_theme_mod('fashionair_options_logo_height')!='') { echo esc_attr(get_theme_mod('fashionair_options_logo_height')); } else { echo "60px"; } ?>" width="<?php if(get_theme_mod('fashionair_options_logo_width')!='') { echo esc_attr(get_theme_mod('fashionair_options_logo_width')); } else { echo "200px"; } ?>"> <?php } else { ?> <h1><?php echo esc_attr(get_bloginfo('name')); } ?></h1>
							</a>
							<?php $description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_attr($description); ?></p>
							<?php endif; ?>
						</div>
						<div class="col-md-8 col-sm-12">
							<div id="menu" class="collapse navbar-collapse ">
								<?php wp_nav_menu( array(
								'theme_location'	 => 'primary',
								'menu_class' 		 => 'nav navbar-nav',								
								'fallback_cb'        => 'WP_Bootstrap_Navwalker::fallback',
								'walker'        	 => new WP_Bootstrap_Navwalker(),
								) ); ?>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>