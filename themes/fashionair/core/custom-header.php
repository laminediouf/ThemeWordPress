<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	
/**
 * Set up the WordPress core custom header feature.
 *
 * @uses edsopener_header_style()
 */
 function fashionair_custom_header_setup() {
	// theme support 	
	$args = array('default-color' => '#fff',);
	add_theme_support('custom-background', $args);
	
	/*** custom header settings ***/
	$args = array('flex-width'=> true,
	'width'=> 2000,
	'flex-height' => true,
	'height'=> 100,
	'default-image' => '',
	'wp-head-callback'   => 'fashionair_header_style');
	add_theme_support('custom-header', $args);	

}
 
 add_action( 'after_setup_theme', 'fashionair_custom_header_setup' );
 
 if ( ! function_exists( 'fashionair_header_style' ) ) :
	function fashionair_header_style() {
	$header_text_color = get_header_textcolor();
	echo esc_attr(get_theme_support( 'custom-header', 'default-text-color' ));
	// If no custom options for text are set, let's bail.
	// get_header_textcolor() options: add_theme_support( 'custom-header' ) is default, hide text (returns 'blank') or any hex value.
	/*if ( get_theme_support( 'custom-header', 'default-text-color' ) == $header_text_color ) {
		return;
	}*/
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style id="fashionair-custom-header-styles" type="text/css">
		<?php	// Has the text been hidden?
			if ( 'blank' == $header_text_color ) : 	?>
			.navbar-header a h1{
			color: #000;
			position: absolute;
			clip: rect(1px 1px 1px 1px);
			}
			.fashion_top p { color: #000;		}
		<?php	else : 	?>
		.fashion_top .navbar-brand { color: #<?php echo esc_attr( $header_text_color ); ?>;	}
		.fashion_top p { color: #<?php echo esc_attr( $header_text_color ); ?>;	}
		<?php endif; ?>
	</style>
	<?php
}
endif; ?>
