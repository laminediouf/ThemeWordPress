<?php
/**
 * The header for our theme 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'multipurpose-ecommerce' ); ?></a>
	<div class="topbar-box">
		<div class="container">
			<div class="row">
				<div class="topbar col-md-4">
			      <?php if( get_theme_mod( 'multipurpose_ecommerce_shipping','' ) != '') { ?>
			        <i class="fas fa-shopping-cart"></i><span><?php echo esc_html( get_theme_mod('multipurpose_ecommerce_shipping',__('Free Shipping on all orders','multipurpose-ecommerce') )); ?></span>
			       <?php } ?>
			    </div>
			    <div class="topbar col-md-4 col-xs-12 col-sm-4">
			      <?php if( get_theme_mod( 'multipurpose_ecommerce_money','' ) != '') { ?>
			        <i class="fab fa-cc-mastercard"></i></i><span><?php echo esc_html( get_theme_mod('multipurpose_ecommerce_money',__('100% Money Back Guarantee','multipurpose-ecommerce')) ); ?></span>
			      <?php } ?>
			    </div>
			    <div class="topbar col-md-4 col-xs-12 col-sm-5">
			      <?php if( get_theme_mod( 'multipurpose_ecommerce_support','' ) != '') { ?>
			        <i class="far fa-clock"></i><span class="location"><?php echo esc_html( get_theme_mod('multipurpose_ecommerce_support',__('Online Support 24/7','multipurpose-ecommerce')) ); ?></span>
			      <?php } ?>
			    </div>
			</div>
		</div>
	</div>
	<header id="masthead" class="site-header" role="banner">
		
		<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="wrap">
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div>
			</div>
		<?php endif; ?>

	</header>

	<div class="site-content-contain">
		<div id="content" class="site-content">
