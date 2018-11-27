<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
				<div class="row fashion-blog-desc">	<?php 
					if ( have_posts()) : while ( have_posts() ) : the_post(); ?>
						<div class="fashionair_blog_full"><?php 
							if(has_post_thumbnail()): 
							$fashionair_defalt_arg = array('class' => "fashionair_img_responsive"); ?>
							<div class="fashionair_blog_thumb_wrapper_showcase">						
								<div class="fashionair_blog-img">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('fashionair_page_thumb',$fashionair_defalt_arg); ?></a>						
								</div>						
							</div>
							<?php endif; ?>
							<div class="fashionair_blog_post_content">
								<?php the_content( __( 'Read More' , 'fashionair' ) ); ?>
							</div>
						</div>	
						<div class="push-right"><hr class="blog-sep header-sep"></div>
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