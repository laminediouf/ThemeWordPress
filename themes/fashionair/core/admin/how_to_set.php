<?php if (!function_exists('fashionair_set_page')) {
	function fashionair_set_page() {
	$page2=add_theme_page(__('Welcome to Fasionair', 'fashionair'), __('How To Set Homepage', 'fashionair'), 'edit_theme_options', 'setup', 'fashionair_setup_page');
	
	add_action('admin_print_styles-'.$page2, 'fashionair_admin_infohome');
	}	
}
add_action('admin_menu', 'fashionair_set_page');

function fashionair_admin_infohome(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('font-awesome-css',get_template_directory_uri().'/assets/css/font-awesome.css');
	wp_enqueue_style('custom_detail-css',get_template_directory_uri().'/assets/css/pro.css');

	//JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/core/admin/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('jquery');

} 
if (!function_exists('fashionair_setup_page')) {
	function fashionair_setup_page() {
		$theme_data = wp_get_theme(); ?>		
			<div class="Pro_detail_page">
				<section class="setup_page  ">
					<div class=" home-page">
						<h1>How to Setup Homepage </h1>	
					</div>
				</section>	
				<div class="">
					<div class="col-md-6 first_detail">
						<h4>1. Firstly Go to Admin panel->Pages, Create a page and assign it page Template "HOME".</h4>
						<h4>2. If You Want to Show Products on your homepage then assign it page template "Product page"(Add Products using woocommerce plugin.)</h4>
						<h4>3. Then Go to Apperence->Customizer->HomePage Setting</h4>
						<h4>4. Then make your static page(home page).</h4>
						<h4>5. Then select that page you were made it through above steps.</h4>
						<h4>6. Save & Publish.</h4>
					</div>
				<div class="col-md-6">
						<div class="img-thumbnail">
							<img src="<?php echo esc_url(get_template_directory_uri()) ?>/assets/images/home-page.png" class="img-responsive" alt="home-page"/>
						</div>
					</div>
				</div>	
			<!-- 	<section class="setup_page  ">
					<div class=" home-page">
						<h1>How to Use the XML File to Import the Demo Site’s Content</h1>	
					</div>
				</section>
				<div class=" import-page">
					<div class="">
						<div class="col-md-12">
							<div class="col-md-6">
								<h4 >1. Log-in to your WordPress backend and click on Tools -> Import in the left menu. You will see a list of systems that can import posts into WordPress, such as Blogger, Blogroll etc</h4>
								<h4>2. Choose WordPress from the list. Then run WordPress importer.</h4>	
								<h4>3. Upload the demo content .xml using the form provided on that page.</h4>
								<h4>4. Upload the .xml file and import the data and save the changes.</h4>
								<h4>You can download the Explora demo using the below button.</h4>
								<div class="col-md-12 button-home">
								<a class="home-button" href="https://weblizar.com/sample-data/free-theme/explora/explora.zip" download>Download Data</a>
							</div>
							</div>
							<div class="col-md-6">
								<div class="img-thumbnail">
									 <img src="<?php //echo esc_url(get_template_directory_uri()) ?>/assets/images/import-data.jpg" class="img-responsive" alt="import-data"/> 
								</div>
							</div>
						</div>
					</div>
				</div> -->		
				
			</div>
		<?php
	}
}
?>