<?php
function fashionair_slider() { 
if(get_theme_mod('fashionair_options_slider_enable')!= '') { ?>

<!-- banner code start---->
<?php if(get_theme_mod('slider_layout')=='banner') { ?>
	<div class="swiper-slide1">
		<img src="<?php echo esc_url(get_theme_mod('banner_image'),'fashionair'); ?>" class="home_slider img-responsive" />
		<div class="overlay"></div>
		<div class="container">
			<div class="carousel-caption">
			<?php if(get_theme_mod('banner_title')!='') { ?>
			<h1 class="animation animated-item-1"><span><?php echo esc_attr(get_theme_mod('banner_title')); ?></span></h1> <?php } ?>
			<?php if(get_theme_mod('banner_desc')!='') { ?>
				<h2 class="slide-text animation animated-item-2"><?php echo esc_attr(get_theme_mod('banner_desc')); ?></h2>
			<?php } ?>
			</div>
		</div>
	</div> 
<?php } else { ?>
	<div class="row w_slider fashion_slider" id="myCarousel">
		<div class="swiper-container home-slider slide">
			<div class="swiper-wrapper"> 
			<?php if(get_theme_mod('slider_layout')=='slider') {
			if(get_theme_mod('slider_page_1')!='' || get_theme_mod('slider_page_2')!='' || get_theme_mod('slider_page_3')!=''){ $args = array( 'post_type' => 'page','post_status'=>'publish', 'post__in' => array(get_theme_mod('slider_page_1'),get_theme_mod('slider_page_2'),get_theme_mod('slider_page_3')));
            } else { $args = array( 'post_type' => 'page', 'posts_per_page'=>3); }
			$home_slide = new WP_Query( $args );  
				if ( $home_slide->have_posts() ):
				while ( $home_slide->have_posts() ):
				$home_slide->the_post();
				if(has_post_thumbnail() ) { ?>
					<div class="swiper-slide"><?php 
						$data= array('class' =>'img-responsive ');
						the_post_thumbnail('Fashionair_slider_thumb', $data); ?>
						<div class="overlay"></div>
						<div class="container">
							<div class="carousel-caption">
								<h1 class="animation animated-item-1"><?php the_title();?></h1>
								<?php if( '' !== get_post()->post_content ) { ?>
								<div class="slide-text animation animated-item-2"><?php the_excerpt(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } endwhile; 
				wp_reset_postdata();
			endif; }  else { 
			 if(get_theme_mod('fashionair_options_slider_image1')!='' || get_theme_mod('fashionair_options_slider_image2')!='' || get_theme_mod('fashionair_options_slider_image3')!=''){
			$args = array( 'post_type' => 'post','post_status'=>'publish','post__in' => array(get_theme_mod('fashionair_options_slider_image1'), get_theme_mod('fashionair_options_slider_image2'), get_theme_mod('fashionair_options_slider_image3') )); 
			} else { $args = array( 'post_type' => 'post', 'posts_per_page'=>3, 'ignore_sticky_posts' => 1); }
			$home_slider = new WP_Query( $args );
			if ( $home_slider->have_posts() ):?>
			<?php while ( $home_slider->have_posts() ):
				$home_slider->the_post();
					if(has_post_thumbnail() ) { ?>
					<div class="swiper-slide"><?php 
						$data= array('class' =>'img-responsive ');
						the_post_thumbnail('Fashionair_slider_thumb', $data); ?>
						<div class="overlay"></div>
						<div class="container">
							<div class="carousel-caption">
								<h1 class="animation animated-item-1"><?php the_title();?></h1>
								<?php if( '' !== get_post()->post_content ) { ?>
								<div class="slide-text animation animated-item-2"><?php the_excerpt(); ?></div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } endwhile;
				wp_reset_postdata(); 
				endif; } ?> 
			</div>
			<?php } ?>
			<?php if(get_theme_mod('slider_layout')=='slider' || get_theme_mod('slider_layout')=='sliderpost') { ?>
			<!-- Add Pagination -->
			<div class="swiper-button-prev swiper-button-white swiper-button-prev1"></div>
			<div class="swiper-button-next swiper-button-white swiper-button-next1"></div>
			<?php } ?>
		</div>	
	</div>	
<?php } }?>