<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Shopfront Ecommerce
 */
?>
<div id="footer">
	<div class="container">
    <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
    <?php endif; // end footer widget area ?>
              
    <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
    <?php endif; // end footer widget area ?>
  
    <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
    <?php endif; // end footer widget area ?>
    
    <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
    <?php endif; // end footer widget area ?>      
    <div class="clear"></div>
  </div>    
  <div class="copywrap">
  	<div class="container">
      <p><a href="<?php echo esc_html(get_theme_mod('shopfront_ecommerce_copyright_link',__('https://www.theclassictemplates.com/free-ecommerce-wordpress-theme/','shopfront-ecommerce'))); ?>" target="_blank"><?php echo esc_html(get_theme_mod('shopfront_ecommerce_copyright_line',__('Shopfront Ecommerce WordPress Theme','shopfront-ecommerce'))); ?></a> <?php echo esc_html('By Classic Templates','shopfront-ecommerce'); ?></p>
    </div>
  </div>
</div>

<?php if(get_theme_mod('shopfront_ecommerce_scroll_hide',false)){ ?>
 <a id="button"><?php esc_html_e('TOP', 'shopfront-ecommerce'); ?></a>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>