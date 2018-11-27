<?php if (!function_exists('fashionair_pro_page')) {
	function fashionair_pro_page() {
	$page2=add_theme_page(__('Welcome to Fasionair', 'fashionair'), __('Upgrade to Fashionair Pro', 'fashionair'), 'edit_theme_options', 'fashionair', 'fashionair_pro_detail_page');
	
	add_action('admin_print_styles-'.$page2, 'weblizar_admin_infohome');
	}	
}
add_action('admin_menu', 'fashionair_pro_page');

function weblizar_admin_infohome(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome-css',get_template_directory_uri().'/assets/css/font-awesome.css');
	wp_enqueue_style('custom_detail-css',get_template_directory_uri().'/assets/css/pro.css');

	//JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/core/admin/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('jquery');

} 
if (!function_exists('fashionair_pro_detail_page')) {
	function fashionair_pro_detail_page() {
		$theme_data = wp_get_theme(); ?>		
			<div class="Pro_detail_page">
				<section class="upgrade_to_pro_detail jumbotron text-center">
				<h1 class="text-uppercase">Fashionair Premium Theme</h1>
				<p>Fashionair is the result of an hardwork, dedicated design and extensive development process, resulting in a huge, self-proclaimed website building tool that quickly turns itself to a variety of applications, from personal to professional, corporate to commercial, it is capable of doing it all. Integrated with simple layout and many theme options, you get practically unlimited design possibilities for your online store. It is purely responsive to different types of devices and screen sizes such as desktop, tablet or mobile phone.</p>
				<div class="butt-div-buy">
					
					<a href="http://infigosoftware.in/fashionair-premium/" rel="lightbox" class="popup-link" data-type="inline">Buy Now in $39</a>
				</div>
				</section>	
				<div class="container">
					<section class="pro_image">
						<div class="col-md-6">
							<div class="row themes infigo_themes" data-orient="top">	
								<div class="Infigo-pics">
									<span class="image-shop-scroll" ></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<a href="#" rel="nofollow">
							<img class="img-responsive" style="display:inline-block;width: 268px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/support.jpg">
							</a>
							<a href="#" rel="nofollow">
							<img style="display:inline-block;width: 268px;" class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/assets/images/document.jpg">
							</a>
							<div ><h4 class="text-center text-uppercase purchace_it">Early bird discount, Use coupon code " EarlyBee " & avail 15% discount </h4>
							<p>  </p>	</div>						
						</div>				
					</section>
					<div class="clearfix"></div>
					<section class="fashion_pro_image">
						<h2 class="text-center title">Features Of Fashionair Premium Theme</h2>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/fashionair-fetures.jpg" class="img-responsive">		
					</section>
				</div>			
				
			</div>
		<?php
	}
}
?>