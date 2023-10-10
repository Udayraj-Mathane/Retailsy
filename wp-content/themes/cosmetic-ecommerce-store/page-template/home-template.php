<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="slide_cat">
    <?php if(get_theme_mod('fashion_estore_slider_show_setting') != ''){ ?>
    <div class="container">
      <div class="row slider-border">
        <div class="col-lg-3 col-md-4">
          <?php if(class_exists('woocommerce')){ ?>
            <div class="home_product_cat">
              <?php $cosmetic_ecommerce_store_product_args = array(
                  'number'     => '',
                  'orderby'    => 'title',
                  'order'      => 'ASC',
                  'hide_empty' => '',
                  'include'    => ''
              );
              $cosmetic_ecommerce_store_product_categories = get_terms( 'product_cat', $cosmetic_ecommerce_store_product_args );
              $count = count($cosmetic_ecommerce_store_product_categories);
                if ( $count > 0 ){
                  foreach ( $cosmetic_ecommerce_store_product_categories as $cosmetic_ecommerce_store_product_category ) {
                  echo '<h4><a href="' . get_term_link( $cosmetic_ecommerce_store_product_category ) . '">' . $cosmetic_ecommerce_store_product_category->name . '</a></h4>';
                  $cosmetic_ecommerce_store_product_args = array(
                    'posts_per_page' => -1,
                    'tax_query' => array(
                      'relation' => 'AND',
                      array(
                        'taxonomy' => 'product_cat',
                        'field' => 'slug',
                        'terms' => $cosmetic_ecommerce_store_product_category->slug
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
                $mod = intval( get_theme_mod( 'fashion_estore_top_slider_page' . $count ));
                if ( 'page-none-selected' != $mod ) {
                  $fashion_estore_slide_pages[] = $mod;
                }
              }
              if( !empty($fashion_estore_slide_pages) ) :
                $cosmetic_ecommerce_store_product_args = array(
                  'post_type' => 'page',
                  'post__in' => $fashion_estore_slide_pages,
                  'orderby' => 'post__in'
                );
                $cosmetic_ecommerce_store_query = new WP_Query( $cosmetic_ecommerce_store_product_args );
                if ( $cosmetic_ecommerce_store_query->have_posts() ) :
                  $i = 1;
            ?>
            <div class="owl-carousel" role="listbox">
              <?php  while ( $cosmetic_ecommerce_store_query->have_posts() ) : $cosmetic_ecommerce_store_query->the_post(); ?>
                <div class="slider-box">
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                  <div class="slider-inner-box">
                    <h2><?php the_title(); ?></h2>
                    <div class="slide-btn"><a href="<?php the_permalink(); ?>"><?php esc_html_e('SHOP NOW','cosmetic-ecommerce-store'); ?></a></div>
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

<?php if(get_theme_mod('cosmetic_ecommerce_store_shop_services_show_setting') != ''){ ?>
  <section id="shop_services" class="py-4">
    <div class="container">
      <div class="row">
        <?php for ($i=1; $i <= 4; $i++) { ?>
          <div class="col-lg-3 col-md-6 col-sm-6 align-self-center">
            <div class="services-box">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
                  <?php if( get_theme_mod('cosmetic_ecommerce_store_shop_services_icon'.$i) != '' ){ ?>
                    <i class="<?php echo esc_html(get_theme_mod('cosmetic_ecommerce_store_shop_services_icon'.$i)); ?>"></i>
                  <?php }?>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 align-self-center">
                  <?php if( get_theme_mod('cosmetic_ecommerce_store_shop_services_title'.$i) != '' ){ ?>
                    <h4><?php echo esc_html(get_theme_mod('cosmetic_ecommerce_store_shop_services_title'.$i)); ?></h4>
                  <?php }?>
                  <?php if( get_theme_mod('cosmetic_ecommerce_store_shop_services_text'.$i) != '' ){ ?>
                    <p class="mb-0"><?php echo esc_html(get_theme_mod('cosmetic_ecommerce_store_shop_services_text'.$i)); ?></p>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php }?>

<?php if(get_theme_mod('cosmetic_ecommerce_store_new_product_show_setting') != ''){ ?>
  <section id="new-products" class="py-5">
    <div class="container">
      <?php if(get_theme_mod('cosmetic_ecommerce_store_new_product_title') != ''){ ?>
        <h3 class="text-center"><?php echo esc_html(get_theme_mod('cosmetic_ecommerce_store_new_product_title','')); ?></h3>
      <?php }?>
      <div class="row mt-4">
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
          $cosmetic_ecommerce_store_args = array(
            'post_type' => 'product',
            'posts_per_page' => get_theme_mod('cosmetic_ecommerce_store_new_product_number'),
            'product_cat' => get_theme_mod('cosmetic_ecommerce_store_new_product_category'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $cosmetic_ecommerce_store_args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="col-lg-3 col-md-4 col-sm-4">
              <div class="product-box mb-4">
                <div class="product-image">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                </div>
                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                <div class="row p-2">
                  <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="mb-0"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-6">
                    <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        <?php } ?>
      </div>
    </div>
  </section>
<?php }?>

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
