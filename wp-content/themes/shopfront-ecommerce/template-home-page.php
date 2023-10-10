<?php
/**
 * The Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Shopfront Ecommerce
 */

get_header(); ?>

<div id="content">
  <?php
    $hidcatslide = get_theme_mod('shopfront_ecommerce_hide_categorysec', true);
    if( $hidcatslide != ''){
  ?>
    <section id="catsliderarea">
      <div class="catwrapslider">
        <div class="owl-carousel">
          <?php if( get_theme_mod('shopfront_ecommerce_slidersection',false) ) { ?>
          <?php $queryvar = new WP_Query('cat='.esc_attr(get_theme_mod('shopfront_ecommerce_slidersection',true)));
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
              <div class="slidesection"> 
                <?php
                  if (has_post_thumbnail()) {
                      the_post_thumbnail('full');
                  } else {
                      echo '<div class="slider-img-color"></div>';
                  }
                ?>
                <div class="slider-box">
                  <h1><?php the_title(); ?></h1>
                  <?php if ( get_theme_mod('shopfront_ecommerce_button_text') != "") { ?>
                    <div class="shop-now">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('shopfront_ecommerce_button_text','SHOP NOW','shopfront-ecommerce')); ?></a>
                    </div>
                  <?php }?>
                </div>
              </div>
            <?php endwhile; wp_reset_postdata(); ?>
          <?php } ?>
        </div>
      </div>
      <div class="clear"></div>
    </section>
  <?php } ?>

  <section id="product_cat_slider" class="py-4">
    <div class="container">
      <?php if (class_exists('woocommerce')) { ?>
        <?php
        $shopfront_ecommerce_prod_categories = get_terms('product_cat', array(
          'number'     => get_theme_mod('shopfront_ecommerce_product_category_number'),
          'orderby'    => 'name',
          'order'      => 'ASC',
          'hide_empty' => 0
        ));
        $column_counter = 0;
        foreach ($shopfront_ecommerce_prod_categories as $shopfront_ecommerce_prod_cat) :
          $shopfront_ecommerce_cat_thumb_id = get_term_meta($shopfront_ecommerce_prod_cat->term_id, 'thumbnail_id', true);
          $shopfront_ecommerce_cat_thumb_url = wp_get_attachment_thumb_url($shopfront_ecommerce_cat_thumb_id);
          $shopfront_ecommerce_term_link = get_term_link($shopfront_ecommerce_prod_cat, 'product_cat');
          ?>
          <?php if ($column_counter % 4 === 0) : ?>
            <div class="row">
          <?php endif; ?>
          <div class="col-lg-3 col-md-6 my-5">
            <div class="product_cat_box text-center">
              <a href="<?php echo esc_url($shopfront_ecommerce_term_link); ?>"><img src="<?php echo esc_url($shopfront_ecommerce_cat_thumb_url); ?>" alt="<?php echo esc_attr($shopfront_ecommerce_prod_cat->name); ?>" /></a>
              <a href="<?php echo esc_url($shopfront_ecommerce_term_link); ?>"><h3 class="pt-3"><?php echo esc_html($shopfront_ecommerce_prod_cat->name); ?></h3></a>
            </div>
          </div>
          <?php if ($column_counter % 4 === 3) : ?>
            </div><!-- .row -->
          <?php endif; ?>
          <?php $column_counter++; ?>
        <?php endforeach;
        if ($column_counter % 4 !== 0) {
          echo '</div><!-- .row -->';
        }
        wp_reset_query();
        ?>
      <?php } ?>
    </div>
  </section>

</div>

<?php get_footer(); ?>