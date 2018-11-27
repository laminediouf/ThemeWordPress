<?php
/**
 * The template for displaying Author Post
 *
 * @package WordPress
 * @subpackage Fashionair
 * @since 2.0
 * @version 2.0
 */
 get_header(); ?>
<div class="breadcrumb-cover">
	<div class="container-fluid fashion-breadcrumb">
		<div class="container">
			<div class="fashion-bredcum-title">
				<h1><?php echo get_the_author(); ?></h1>
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
				<div class="row fashion-blog-desc">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="col-md-12 col-sm-12 fashion-blog-text blog-gallerys">
						<?php if(have_posts()):
							while(have_posts()): the_post();
							get_template_part( '/assets/template-parts/content');							
							endwhile; 
							else : 
							get_template_part('/assets/template-parts/nocontent');	
							endif; ?>
						</div>
					</div>
				</div>
				<div class="fashionair_blog_pagination">
					<?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
				</div>
			</div>
			<?php get_sidebar(); ?>	
        </div>
	</div>
</div>	
<?php get_footer(); ?>