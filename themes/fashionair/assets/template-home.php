<?php //Template Name: HOME
get_header();
if(get_theme_mod('fashionair_options_slider_enable')==1) ?>
<?php if (function_exists('fashionair_slider')) fashionair_slider(); ?>
<?php if(get_theme_mod('fashionair_options_show_blog','1')==1){ ?>
	<div class=" fashion-blog space">
		<div class="container cor_section">
			<div class="cor_section_heading">
				<?php if(get_theme_mod('fashionair_options_blog_title')) { ?>
					<h1 class="head-title">	<?php echo esc_attr( get_theme_mod('fashionair_options_blog_title'),'fashionair'); ?></h1>
				<?php } 
				if(get_theme_mod('fashionair_options_blog_desc')){ ?>
					<p><?php echo wp_kses_post(get_theme_mod('fashionair_options_blog_desc')); ?> </p>
				<?php } ?>
			</div>
		</div>
		<div class="container">
		<?php	
			if(get_theme_mod('fashionair_options_blog_cat')) {
				$args = array( 'post_type' => 'post', 'post__not_in' => get_option( 'sticky_posts' ), 'category_name' =>get_theme_mod('fashionair_options_blog_cat'));
			} else { 
				$args = array( 'post_type' => 'post','posts_per_page'=>4, 'post__not_in' => get_option( 'sticky_posts' ));
			}
			  $blog= new WP_Query( $args );
			  if($blog->have_posts()){ ?>
			<div class="swiper-container home-blog">
				<div class="swiper-wrapper">
					<?php $i=2;
					while($blog->have_posts()): $blog->the_post(); ?>				
					<div class="swiper-slide">	
					<?php if($i%2==0) {  ?>
						<div class="col-md-12 blog-desc align-right">
							<?php if(has_post_thumbnail() !='') { ?>
							<div class="col-md-6 col-sm-12 blog-img">
								<a href="<?php the_permalink(); ?>">
									<?php $data= array('class' =>'img-responsive '); 
									the_post_thumbnail('Fashionair_blog_thumb', $data); ?>
								</a>
							</div>
							<div class="blog-detail col-md-6">
								<div class="col-md-12 col-sm-12 feature-details">
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<div class="blog-detail-ndc">
										<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> 
											<i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
										</span>
										<span>			
											<a href="<?php the_permalink(); ?>">  	<i class="fa fa-calendar"></i>	 <?php echo get_the_date();?> </a>
										</span>
									
										<span>	<i class="fa fa-comments-o"></i> <?php esc_attr(comments_number('no Comments','1 Comments','% Comments'),'fashionair');?></span>
										
									</div>
									
									<?php the_excerpt(__('Read More','fashionair')); ?>
								</div>
							</div>
							<?php } else { ?>
							<div class="col-md-12 col-sm-12 blog-detail">
								<div class="col-md-12 col-sm-12 feature-details">
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

									<div class="blog-detail-ndc">	
										<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> 
											<i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
										</span>
									
										<span><a href="<?php the_permalink(); ?>"> <i class="fa fa-calendar"></i>	 <?php echo get_the_date();?> </a>
										</span>
									
										<span><i class="fa fa-comments-o"></i>  <?php esc_attr(comments_number('no Comments','1 Comments','% Comments'),'fashionair');?></span>
									</div>
								
								<?php the_excerpt(__('Read More','fashionair')); ?>
								
								</div>
								
							</div>
						<?php } ?>
						
						</div>
						<?php } else { 	?>
						 <div class="col-md-12 blog-desc">
							<?php if(has_post_thumbnail() !='') { ?>
							<div class="col-md-6 col-sm-12 blog-detail">
								
								<div class="col-md-12 col-sm-12 feature-details">
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								
								<div class="blog-detail-ndc">
								
									<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> 
											<i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
										</span>
									<span>			
										<a href="<?php the_permalink(); ?>"> <i class="fa fa-calendar"></i>	 <?php echo get_the_date();?> </a>
									</span>
							
									<span>	<i class="fa fa-comments-o"></i><?php esc_attr(comments_number('no Comments','1 Comments','% Comments'),'fashionair');?></span>
							
									</div>
								
									<?php the_excerpt(__('Read More', 'fashionair')); ?>
								</div>
							</div>
						
							<div class="col-md-6 col-sm-12 blog-img">
								<a href="<?php the_permalink(); ?>">
									<?php $data= array('class' =>'img-responsive ');	the_post_thumbnail('Fashionair_blog_thumb', $data); ?>
								</a>								
							</div>
							<?php } else { ?>
							<div class="col-md-12 col-sm-12 blog-detail">
								<div class="col-md-12 col-sm-12 feature-details">
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								
							
								<div class="blog-detail-ndc">
									<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> 
										<i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
									</span>
									<span>					
										<a href="<?php the_permalink(); ?>"> <i class="fa fa-calendar"></i>	 <?php echo get_the_date();?> </a>
									</span>
								
									 <span>	<i class="fa fa-comments-o"></i> <?php esc_attr(comments_number('no Comments','1 Comments','% Comments'),'fashionair');?></span>
								</div>
							
									<?php the_excerpt(__('Read More', 'fashionair')); ?>
								</div>
							</div>
							<?php } ?>
						</div> 
						<?php } ?>
					</div>
					<?php $i++; endwhile; ?>
				</div>
				<div class="wiper-prev-next-btn"> 
					<div class="swiper-button-prev swiper-button-prev5"></div>
					<div class="swiper-button-next swiper-button-next5"></div> 
				 </div>
			</div>
			<?php } ?>
		</div>
	</div>
<?php } 
get_footer(); ?>