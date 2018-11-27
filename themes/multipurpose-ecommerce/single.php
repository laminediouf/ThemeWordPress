<?php
/**
 * The template for displaying all single posts
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<?php
	    $layout_settings = get_theme_mod( 'multipurpose_ecommerce_layout_settings','Right Sidebar');
		if($layout_settings == 'Left Sidebar'){ ?>
		    <div id="sidebox" class="col-md-4 col-sm-4">
				<?php dynamic_sidebar('sidebox-1'); ?>
			</div>
			<div class="col-md-8 col-sm-8">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'multipurpose-ecommerce' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'multipurpose-ecommerce' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'multipurpose-ecommerce' ) . '</span>',
					) );

				endwhile; // End of the loop.

				the_tags(); s

				?>
			</div>
		<?php }else if($layout_settings == 'Right Sidebar'){ ?>
			<div class="col-md-8 col-sm-8">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'multipurpose-ecommerce' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'multipurpose-ecommerce' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'multipurpose-ecommerce' ) . '</span>',
					) );

				endwhile; // End of the loop.

				the_tags(); 

				?>
			</div>
			<div id="sidebox" class="col-md-4 col-sm-4">
				<?php dynamic_sidebar('sidebox-1'); ?>
			</div>
		<?php }else if($layout_settings == 'One Column'){ ?>
			<div class="col-md-12 col-sm-12">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'multipurpose-ecommerce' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'multipurpose-ecommerce' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'multipurpose-ecommerce' ) . '</span>',
					) );

				endwhile; // End of the loop.

				the_tags(); 

				?>
			</div>
		<?php }else if($layout_settings == 'Three Columns'){ ?>
			<div id="sidebox" class="col-md-3 col-sm-3">
				<?php dynamic_sidebar('sidebox-1'); ?>
			</div>
			<div class="col-md-6 col-sm-6">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'multipurpose-ecommerce' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'multipurpose-ecommerce' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'multipurpose-ecommerce' ) . '</span>',
					) );

				endwhile; // End of the loop.

				the_tags(); 				

				?>
			</div>
			<div id="sidebox" class="col-md-3 col-sm-3">
				<?php dynamic_sidebar('sidebox-2'); ?>
			</div>
		<?php }else if($layout_settings == 'Four Columns'){ ?>
			<div id="sidebox" class="col-md-3 col-sm-3">
				<?php dynamic_sidebar('sidebox-1'); ?>
			</div>
			<div class="col-md-3 col-sm-3">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'multipurpose-ecommerce' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'multipurpose-ecommerce' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'multipurpose-ecommerce' ) . '</span>',
					) );

				endwhile; // End of the loop.

				the_tags(); 

				?>
			</div>
			<div id="sidebox" class="col-md-3 col-sm-3">
				<?php dynamic_sidebar('sidebox-2'); ?>
			</div>
			<div id="sidebox" class="col-md-3 col-sm-3">
				<?php dynamic_sidebar('sidebox-3'); ?>
			</div>
		<?php }else if($layout_settings == 'Grid Layout'){ ?>
			<div class="col-md-8 col-sm-8">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/post/single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'multipurpose-ecommerce' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'multipurpose-ecommerce' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );

					the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'multipurpose-ecommerce' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'multipurpose-ecommerce' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'multipurpose-ecommerce' ) . '</span>',
					) );

				endwhile; // End of the loop.

				the_tags(); 

				?>
			</div>
			<div id="sidebox" class="col-md-4 col-sm-4">
				<?php dynamic_sidebar('sidebox-1'); ?>
			</div>
		<?php }?>
	</div>
</div>

<?php get_footer();
