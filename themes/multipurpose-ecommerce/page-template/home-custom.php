<?php
/**
 * Template Name: Home Custom Page
 */
?>
<?php
    // Get pages set in the customizer (if any)
    $pages = array();
    for ( $count = 1; $count <= 5; $count++ ) {
    $mod = absint( get_theme_mod( 'multipurpose_ecommerce_slide_page' . $count ));
    if ( 'page-none-selected' != $mod ) {
      $pages[] = $mod;
    }
    }
    if( !empty($pages) ) :
      $args = array(
        'posts_per_page' => 5,
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 1;
        ?>
      <div class="slider-main">
          <div id="slider" class="nivoSlider">
            <?php
              $multipurpose_ecommerce_n = 0;
          while ( $query->have_posts() ) : $query->the_post();
            
            $multipurpose_ecommerce_n++;
            $multipurpose_ecommerce_slideno[] = $multipurpose_ecommerce_n;
            $multipurpose_ecommerce_slidetitle[] = get_the_title();
            ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $multipurpose_ecommerce_n ); ?>" />
            <?php
          $count++;
          endwhile;
            wp_reset_postdata();?>
          </div>

        <?php
        $multipurpose_ecommerce_k = 0;
          foreach( $multipurpose_ecommerce_slideno as $multipurpose_ecommerce_sln ){ ?>
          <div id="slidecaption<?php echo esc_attr( $multipurpose_ecommerce_sln ); ?>" class="nivo-html-caption">
            <div class="slide-cap  ">
              <div class="container">
                <h2><?php echo esc_html($multipurpose_ecommerce_slidetitle[$multipurpose_ecommerce_k] ); ?></h2>               
              </div>
            </div>
          </div>
            <?php $multipurpose_ecommerce_k++;
        } ?>
      </div>
        <?php else : ?>
          <div class="header-no-slider"></div>
        <?php
      endif;
    endif;
  ?>

<?php do_action( 'multipurpose_ecommerce_after_slider' ); ?>

<section id="our-category">
  <div class="container">
    <?php $pages = array();
    for ( $count = 0; $count <= 0; $count++ ) {
      $mod = absint( get_theme_mod( 'multipurpose_ecommerce_category_page' . $count ));
      if ( 'page-none-selected' != $mod ) {
        $pages[] = $mod;
      }
    }
    if( !empty($pages) ) :
      $args = array(
        'post_type' => 'page',
        'post__in' => $pages,
        'orderby' => 'post__in'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
        $count = 0;
        while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php the_content(); ?>
        <?php $count++; endwhile; ?>
      <?php else : ?>
          <div class="no-postfound"></div>
      <?php endif;
    endif;
    wp_reset_postdata()?>
      <div class="clearfix"></div> 
  </div>
</section>

<?php get_footer(); ?>