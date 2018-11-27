<?php
/**
 * The main template file
 */

get_header(); ?>

<div class="container">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php else : ?>
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Posts', 'multipurpose-ecommerce' ); ?></h2>
	</header>
	<?php endif; ?>		
		<?php
		    $layout_setting = get_theme_mod( 'multipurpose_ecommerce_layout_settings','Right Sidebar');
		    if($layout_setting == 'Left Sidebar'){ ?>
		    <div class="row">
			    <div id="sidebox" class="col-md-4 col-sm-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
				<div class="col-md-8 col-sm-8">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();
							
							get_template_part( 'template-parts/post/content' );

						endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<div class="navigation">
		                <?php
		                    
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'multipurpose-ecommerce' ),
		                        'next_text'          => __( 'Next page', 'multipurpose-ecommerce' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>',
		                    ) );
		                ?>
		   	 		</div>
				</div>
			</div>
		<?php }else if($layout_setting == 'Right Sidebar'){ ?>
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();
							
							get_template_part( 'template-parts/post/content' );

						endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<div class="navigation">
		                <?php
		                    
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'multipurpose-ecommerce' ),
		                        'next_text'          => __( 'Next page', 'multipurpose-ecommerce' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>',
		                    ) );
		                ?>
	       	 		</div>
				</div>
				<div id="sidebox" class="col-md-4 col-sm-4">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
			</div>
		<?php }else if($layout_setting == 'One Column'){ ?>
			<div class="col-md-12 col-sm-12">
				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) : the_post();
						
						get_template_part( 'template-parts/post/content' );

					endwhile;

					else :

						get_template_part( 'template-parts/post/content', 'none' );

					endif;
				?>
				<div class="navigation">
	                <?php
	                    
	                    the_posts_pagination( array(
	                        'prev_text'          => __( 'Previous page', 'multipurpose-ecommerce' ),
	                        'next_text'          => __( 'Next page', 'multipurpose-ecommerce' ),
	                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>',
	                    ) );
	                ?>
       	 		</div>
			</div>
		<?php }else if($layout_setting == 'Three Columns'){ ?>
			<div class="row">
				<div id="sidebox" class="col-md-3 col-sm-3">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
				<div class="col-md-6 col-sm-6">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();
							
							get_template_part( 'template-parts/post/content' );

						endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<div class="navigation">
		                <?php
		                    
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'multipurpose-ecommerce' ),
		                        'next_text'          => __( 'Next page', 'multipurpose-ecommerce' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>',
		                    ) );
		                ?>
	       	 		</div>
				</div>
				<div id="sidebox" class="col-md-3 col-sm-3">
					<?php dynamic_sidebar('sidebox-2'); ?>
				</div>
			</div>
		<?php }else if($layout_setting == 'Four Columns'){ ?>
			<div class="row">
				<div id="sidebox" class="col-md-3 col-sm-3">
					<?php dynamic_sidebar('sidebox-1'); ?>
				</div>
				<div class="col-md-3 col-sm-3">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();
							
							get_template_part( 'template-parts/post/content' );

						endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<div class="navigation">
		                <?php
		                    
		                    the_posts_pagination( array(
		                        'prev_text'          => __( 'Previous page', 'multipurpose-ecommerce' ),
		                        'next_text'          => __( 'Next page', 'multipurpose-ecommerce' ),
		                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>',
		                    ) );
		                ?>
	       	 		</div>
				</div>
				<div id="sidebox" class="col-md-3 col-sm-3">
					<?php dynamic_sidebar('sidebox-2'); ?>
				</div>
				<div id="sidebox" class="col-md-3 col-sm-3">
					<?php dynamic_sidebar('sidebox-3'); ?>
				</div>
			</div>
		<?php }else if($layout_setting == 'Grid Layout'){ ?>
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="row">
						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();
								
								get_template_part( 'template-parts/post/gridlayout' );

							endwhile;

							else :

								get_template_part( 'template-parts/post/content', 'none' );

							endif;
						?>
						<div class="navigation">
			                <?php
			                    
			                    the_posts_pagination( array(
			                        'prev_text'          => __( 'Previous page', 'multipurpose-ecommerce' ),
			                        'next_text'          => __( 'Next page', 'multipurpose-ecommerce' ),
			                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>',
			                    ) );
			                ?>
	       	 			</div>
	       	 		</div>
				</div>
				<div id="sidebox" class="col-md-4 col-sm-4">
					<?php dynamic_sidebar('sidebox-2'); ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<?php get_footer();