<?php
/**
 * Displays header site branding
 */

?>
<div class="site-branding">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4">
				<?php the_custom_logo(); ?>

				<div class="site-branding-text">
					<?php if ( is_front_page() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php
					$description = get_bloginfo( 'description', 'display' );

					if ( $description || is_customize_preview() ) :
					?>
						<p class="site-description"><?php echo esc_html( $description ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-md-5 col-sm-5">
		      	<div class="search_form">
		        	<?php get_search_form(); ?>
		      	</div>
			</div>
			<div class="col-md-3 col-sm-3">
				<div class="socialicon">
					<?php if( get_theme_mod( 'multipurpose_ecommerce_facebook_url','' ) != '') { ?>
	                	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_ecommerce_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
	              	<?php } ?>
	               	<?php if( get_theme_mod( 'multipurpose_ecommerce_twitter_url','' ) != '') { ?>
	               		<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_ecommerce_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
	              	<?php } ?>
	              	<?php if( get_theme_mod( 'multipurpose_ecommerce_insta_url','' ) != '') { ?>
	                	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_ecommerce_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
	              	<?php } ?>
	               	<?php if( get_theme_mod( 'multipurpose_ecommerce_youtube_url','' ) != '') { ?>
	                	<a href="<?php echo esc_url( get_theme_mod( 'multipurpose_ecommerce_youtube_url','' ) ); ?>"><i class="fab fa-youtube"></i></a>
	              	<?php } ?>
	            </div>
			</div>
		</div>
	</div>
</div>
