<?php 
/**
 * The Content File
 *
 * 
 * @package WordPress
 * @subpackage fashionair
 * @since 2.0
 * @version 2.0
 */
?>
<div class="col-md-12 blog-desc-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<?php if(has_post_thumbnail()) { ?>
		<div class="img-thumbnail" ><?php $data= array('class' =>'img-responsive '); the_post_thumbnail('fashionair_post_thumb', $data); ?></div>
	<?php } ?>
	<div class="col-md-12 the-title entry-title"><a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a></div>
	<div class="col-md-12 col-sm-12 cor_dates">
		
		<div class="year">
			<span class="fa fa-comment-o icon"></span><span> <?php esc_attr(comments_number('no Comments','1 Comments','% Comments'),'fashionair');?></span>
		</div>
	</div>
	<?php if(get_the_tag_list() != '') { ?>
		<div class="col-md-12 cor_tags">		
			<span><?php the_tags( __('Tags : ','fashionair'), '', '<br/>'); ?></span>	
		</div>
	<?php } ?>
	<?php if(get_the_category_list() != '') { ?>
	<div class="col-md-12 cor_tags">
		<span class="fashionair_category"><?php _e('Category:','fashionair'); ?><?php the_category(', '); ?></span>
	</div>
	<?php } ?>
	<div class="col-md-12 col-sm-12 post-content">
        <div class="col-md-12"><?php the_excerpt(__('Read More','fashionair')); ?></div>
    </div>
	<?php comments_template( '', true ); ?>
</div>