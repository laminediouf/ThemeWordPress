<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
get_header(); ?>
 <div class="breadcrumb-cover">
	<div class="container-fluid fashion-breadcrumb">
		<div class="container">
			<div class="fashion-bredcum-title">
				<h1><?php the_title() ?></h1>
				<?php if(get_theme_mod('fashionair_options_breadcrumb')!=''){ ?>
				<ul class="fashion-bredcum">
					 <li><?php fashionair_breadcrumb_trail(); ?> </li>
				</ul>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="container blogs space">
		<div class="row fashion-blog-3 blog_gallery">
			<div class="col-md-8 col-sm-12">
				<div class=" fashion-blog-desc">	<?php 
					if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
						<div class="col-md-12  fashionair_blog_full blog-desc-border""><?php 
							if(has_post_thumbnail()): 
							$fashionair_defalt_arg = array('class' => "fashionair_img_responsive"); ?>
							<div class="fashionair_blog_thumb_wrapper_showcase">						
								<div class="fashionair_blog-img img-thumbnail">
								<a class="img-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('fashionair_post_thumb',$fashionair_defalt_arg); ?></a>						
								</div>						
							</div>
							<?php endif; ?>
							<div class="fashionair_blog_post_content ">
								<?php if(get_the_category_list() != '') { ?>
								<span class="fashionair_category cor_tags"><?php __('Category:','fashionair'); ?><?php the_category(', '); ?></span>
								<?php } ?>
								<?php if(get_the_tag_list() != '') { ?>
								<span class="fashionair_tags cor_tags"><?php the_tags( __('Tags : ','fashionair'), ', ', '<br/>'); ?></span>	
								<?php } ?>
								<?php the_content( __( 'Read More' , 'fashionair' ) ); ?>
							</div>
						
						</div>	
							<div class="col-md-12 fashionair_blog_pagination">
								 <div class="fashionair_blog_pagi"> 
									 <p class="single-next"><?php previous_post_link('%link'); ?></p>	
									 <p class="single-prev"> <?php next_post_link('%link'); ?></p>
								</div> 
							</div>
						<div class="push-right fashion-blog"><hr class="blog-sep header-sep"></div>
						<?php comments_template( '', true ); 
						endwhile;
					endif; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>