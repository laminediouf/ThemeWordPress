<?php //Template Name: Product Page
get_header();  ?>
<?php 
if (function_exists('fashionair_slider')) fashionair_slider();
if(fashionair_is_woocommerce_activated()) {  ?>
<div class="container product"> <h1> <?php echo esc_attr(get_theme_mod('fashionair_options_prodcut'),'fashionair'); ?> </h1>
	<?php 
	// check for plugin using plugin name
	 $args = array( 'post_type' => 'product','orderby' => 'rand' );
	   $fashionair_loop = new WP_Query( $args ); ?>
	   <?php if( $fashionair_loop->have_posts() ){ $count=1; ?>
	   <?php  while ( $fashionair_loop->have_posts() ) : $fashionair_loop->the_post(); global $product; ?>
		<div class="col-md-3 about-men-top">
			<div class="img-thumbnail gallery">
				<?php if (has_post_thumbnail( $fashionair_loop->post->ID )) echo get_the_post_thumbnail($fashionair_loop->post->ID, 'shop_catalog'); else echo '<img
				src="'.esc_url(wc_placeholder_img_src()).'" alt="Placeholder" class="img-responsive" />'; ?>
			</div>
			<div class="col-md-12 col-sm-12 about-men-name">
				<h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
				<span class="price"><?php echo $product->get_price_html(); ?></span> <br>
				<div class="col-md-12 pro_btn">
				<?php woocommerce_template_loop_add_to_cart($fashionair_loop->post,$product); ?>
				</div>
			</div>    
	   </div>
	 <?php if($count%4==0){ echo '<div class="col-md-12 col-sm-12 col-xs-12 "></div>'; }  $count++; endwhile; ?>
	<?php } else {
		echo "<p class='title' style='color:#029fb2;font-size: 20px;font-weight: 600;-webkit-box-flex: 1;-ms-flex: 1 1 auto;flex: 1 1 auto;padding: 4.25rem;border: 2px dashed #199fb3;;'>". __('No Products Added Yet..!!','fashionair')."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$user = wp_get_current_user();
		$allowed_roles = array('editor', 'administrator');
		 if( array_intersect($allowed_roles, $user->roles ) ) { 
		   ?><a class='btn btn-info' href="<?php home_url( '/' ); ?>/wp-admin/edit.php?post_type=product">Add Procuct</a><?php
		 } 
		 echo "</p>";
	} } ?>
</div>
<?php get_footer(); ?>	




 