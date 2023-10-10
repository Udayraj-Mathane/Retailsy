<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content" slider-loop="<?php echo esc_html(get_theme_mod('fashion_estore_slider_loop')); ?>">
  <section id="slide_cat">
     <?php if(get_theme_mod('fashion_estore_slider_show_setting') != ''){ ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4">
          <?php if(class_exists('woocommerce')){ ?>
            <div class="home_product_cat">
              <?php $fashion_estore_product_args = array(
                  'number'     => '',
                  'orderby'    => 'title',
                  'order'      => 'ASC',
                  'hide_empty' => '',
                  'include'    => ''
              );
              $fashion_estore_product_categories = get_terms( 'product_cat', $fashion_estore_product_args );
              $count = count($fashion_estore_product_categories);
                if ( $count > 0 ){
                  foreach ( $fashion_estore_product_categories as $fashion_estore_product_category ) {
                  echo '<h4><a href="' . get_term_link( $fashion_estore_product_category ) . '">' . $fashion_estore_product_category->name . '</a></h4>';
                  $fashion_estore_product_args = array(
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      'relation' => 'AND',
                      array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $fashion_estore_product_category->slug
                      )
                    ),
                    'post_type' => 'product',
                    'orderby' => 'title,'
                  );
                }
              }?>
            </div>
          <?php }?>
        </div>
        <div class="col-lg-9 col-md-8">
          <div id="top-slider">
            <?php $fashion_estore_slide_pages = array();
              for ( $count = 1; $count <= 3; $count++ ) {
                $fashion_estore_mod = intval( get_theme_mod( 'fashion_estore_top_slider_page' . $count ));
                if ( 'page-none-selected' != $fashion_estore_mod ) {
                  $fashion_estore_slide_pages[] = $fashion_estore_mod;
                }
              }
              if( !empty($fashion_estore_slide_pages) ) :
                $fashion_estore_product_args = array(
                  'post_type' => 'page',
                  'post__in' => $fashion_estore_slide_pages,
                  'orderby' => 'post__in'
                );
                $query = new WP_Query( $fashion_estore_product_args );
                if ( $query->have_posts() ) :
                  $i = 1;
            ?>
            <div class="owl-carousel" role="listbox">
              <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="slider-box">
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                  <div class="slider-inner-box">
                    <h2><?php the_title(); ?></h2>
                    <div class="slide-btn"><a href="<?php the_permalink(); ?>"><?php esc_html_e('SHOP NOW','fashion-estore'); ?></a></div>
                  </div>
                </div>
              <?php $i++; endwhile;
              wp_reset_postdata();?>
            </div>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
            endif;?>
          </div>
        </div>
      </div>
    </div>
    <?php }?>
  </section>
  <section id="content-section" class="container">
    <?php
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          the_content();
        endwhile;
      endif;
    ?>
  </section>
</main>

<?php get_footer(); ?>
