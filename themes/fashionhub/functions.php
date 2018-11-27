<?php
add_action('wp_enqueue_scripts', 'fashionhub_enqueueScripts' , 20);
function fashionhub_enqueueScripts() {
  $parent_style = 'parent-style';
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
}

function fashionhub_add_editor_styles() {
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $font_url );
}
add_action( 'after_setup_theme', 'fashionhub_add_editor_styles' );

function fashionhub_is_wc() {

	if (class_exists('WooCommerce')) {
		return true;
	} else {
		return false;
	}
}

function fashionhub_mini_cart_links(){
	?>
	<div class="bgs-cart-nav">
		<div class="mini-cart-icon">
			<div class="mini-item-count"><?php echo esc_html(number_format_i18n(WC()->cart->get_cart_contents_count())); ?></div>
			<i class="fa fa-shopping-cart"></i>
		</div>
		<div class="mini-cart-details">
			<div class="mini-cart-title"><?php esc_html_e('TOTAL', 'fashionhub');?></div>
			<div class="mini-cart-total"><?php echo wp_kses_post(WC()->cart->get_cart_subtotal()); ?></div>
		</div>
	</div>
	<?php
}
function fashionhub_mini_cart() {
	if (fashionhub_is_wc()): ?>
		<div class="mini-cart-container pull-right">
			<?php fashionhub_mini_cart_links(); ?>
			<div class="bgs-mini-cart">
				<?php the_widget( 'WC_Widget_Cart', array('title' => '') ); ?>
			</div>
		</div>
	<?php endif;
}

function fashionhub_woocommerce_cart_link_fragment( $fragments ) {
	ob_start();
	fashionhub_mini_cart_links();
	$fragments['div.bgs-cart-nav'] = ob_get_clean();
	return $fragments;
}
add_filter('add_to_cart_fragments', 'fashionhub_woocommerce_cart_link_fragment');

add_filter('woocommerce_widget_cart_is_hidden', '__return_false', 999 );


remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals');
add_action('fashionhub_woocommerce_cart_totals', 'woocommerce_cart_totals', 10);

function fashionhub_get_page_links_html() {
	if (fashionhub_is_wc()) {

		global $woocommerce;

		$myaccount_page_id = get_option('woocommerce_myaccount_page_id');
		$links             = array();
		$account_link      = '#';
		if ($myaccount_page_id) {
			$account_link = get_permalink($myaccount_page_id);
		}

		if (is_user_logged_in()) {
			$links['myaccount'] = $account_link;
		} else {
			$links['login']    = $account_link;
			$links['register'] = $account_link;
		}

		$links['cart']     = wc_get_cart_url();
		$links['checkout'] =  wc_get_checkout_url();

		if (is_user_logged_in()) {
			$links['logout'] = wp_logout_url(esc_url(home_url('/')));

			if (get_option('woocommerce_force_ssl_checkout') == 'yes') {
				$links['logout'] = str_replace('http:', 'https:', $links['logout']);
			}
		}

		$links  = apply_filters('fashionhub_page_links', $links);
		$lables = fashionhub_get_page_labels();
		$html   = '';

		foreach ($links as $key => $link) {
			$html .= sprintf('<li><a class="top-bl-%1$s" href="%2$s"> %3$s </a></li>',
				esc_attr($key),
				esc_url($link),
				wp_kses_post($lables[$key])
			);
		}
		$html = '<ul class="account-links">' . $html . '</ul>';
		return $html;
	}
}

function fashionhub_get_page_labels() {
	$lables = array(
		'myaccount' => '<i class="fa fa-user"></i> ' . __('My Account', 'fashionhub'),
		'login'     => '<i class="fa fa-sign-in"></i> ' . __('Login', 'fashionhub'),
		'register'  => '<i class="fa fa-user-plus"></i> ' . __('Register', 'fashionhub'),
		'cart'      => '<i class="fa fa-shopping-basket"></i> ' . __('Cart', 'fashionhub'),
		'checkout'  => '<i class="fa fa-check-circle-o"></i> ' . __('Checkout', 'fashionhub'),
		'wishlist'  => '<i class="fa fa-heart"></i> ' . __('Wishlist', 'fashionhub'),
		'logout'    => '<i class="fa fa-sign-out"></i> ' . __('Logout', 'fashionhub'),
	);

	$lables = apply_filters('fashionhub_page_labels', $lables);
	return $lables;
}