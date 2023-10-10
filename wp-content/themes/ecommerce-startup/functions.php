<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) )exit;


function ecommerce_startup_settings( $values ) {
    
    
$values['timer_year'] = '';
$values['timer_month'] = ''; 
$values['timer_date'] = ''; 
$values['timer_message'] = ''; 
    
$values['header_layout'] = 'default';     
$values['menu_layout'] = 'full_width';  
    

    
$values[ 'primary_color' ] = '#0064ff';
$values[ 'secondary_color' ] = '#1f5ac1';
$values[ 'heading_font' ] = "Jost, sans-serif";
$values[ 'body_font' ] = 'Jost, sans-serif';

$values[ 'woo_bar_color' ] = '#ffffff';
$values[ 'woo_bar_bg_color' ] = '#0064ff';

$values[ 'preloader_enabled' ] = false;

$values[ 'logo_width' ] = 130;
$values[ 'layout_width' ] = 1280;


$values[ 'enable_search' ] = true;
$values[ 'ed_social_links' ] = true;

$values[ 'subscription_shortcode' ] = '';

$values[ 'enable_top_bar' ] = true;
$values[ 'top_bar_left_content' ] = 'contacts';
$values[ 'top_bar_left_text' ] = esc_html__( 'edit top bar text', 'ecommerce-startup' );
$values[ 'top_bar_right_content' ] = 'menu_social';
$values[ 'enable_top_bar' ] = true;  
$values[ 'topbar_bg_color' ] = '#f2f2f2';  
$values[ 'topbar_text_color' ] = '#111111';   


$values[ 'footer_text_color' ] = '#f4f4f4';
$values[ 'footer_color' ] = '#212121';
$values[ 'footer_link' ] = 'https://gradientthemes.com/';
$values[ 'footer_copyright' ] =  esc_html__( 'A theme by GradientThemes', 'ecommerce-startup' ); 

$values[ 'page_sidebar_layout' ] = 'right-sidebar';
$values[ 'post_sidebar_layout' ] = 'right-sidebar';
$values[ 'layout_style' ] = 'right-sidebar';
$values[ 'woo_sidebar_layout' ] = 'left-sidebar';

return $values;

}


add_filter( 'best_shop_settings', 'ecommerce_startup_settings' );


//  PARENT ACTION

if ( !function_exists( 'ecommerce_startup_cfg_locale_css' ) ):
function ecommerce_startup_cfg_locale_css( $uri ) {
  if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
    $uri = get_template_directory_uri() . '/rtl.css';
  return $uri;
}
endif;

add_filter( 'locale_stylesheet_uri', 'ecommerce_startup_cfg_locale_css' );

if ( !function_exists( 'ecommerce_startup_cfg_parent_css' ) ):
function ecommerce_startup_cfg_parent_css() {
  wp_enqueue_style( 'ecommerce_startup_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array() );
}
endif;

add_action( 'wp_enqueue_scripts', 'ecommerce_startup_cfg_parent_css', 10 );

// Add prealoder js
function ecommerce_startup_custom_scripts() {
wp_enqueue_script( 'ecommerce-startup', get_stylesheet_directory_uri() . '/assests/preloader.js', array( 'jquery' ), '', true );
}

add_action( 'wp_enqueue_scripts', 'ecommerce_startup_custom_scripts' );

// END ENQUEUE PARENT ACTION

if ( !function_exists( 'ecommerce_startup_customize_register' ) ):
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ecommerce_startup_customize_register( $wp_customize ) {

  $wp_customize->add_section(
    'subscription_settings',
    array(
      'title' => esc_html__( 'Email Subscription', 'ecommerce-startup' ),
      'priority' => 199,
      'capability' => 'edit_theme_options',
      'panel' => 'theme_options',
      'description' => __( 'Add email subscription plugin shortcode.', 'ecommerce-startup' ),

    )
  );

  /** Footer Copyright */
  $wp_customize->add_setting(
    'subscription_shortcode',
    array(
      'default' => best_shop_default_settings( 'subscription_shortcode' ),
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );

  $wp_customize->add_control(
    'subscription_shortcode',
    array(
      'label' => esc_html__( 'Subscription Plugin Shortcode', 'ecommerce-startup' ),
      'section' => 'subscription_settings',
      'type' => 'text',
    )
  );

  //preloader
  $wp_customize->add_section(
    'preloader_settings',
    array(
      'title' => esc_html__( 'Preloader', 'ecommerce-startup' ),
      'priority' => 200,
      'capability' => 'edit_theme_options',
      'panel' => 'theme_options',

    )
  );

  $wp_customize->add_setting(
    'preloader_enabled',
    array(
      'default' => best_shop_default_settings( 'preloader_enabled' ),
      'sanitize_callback' => 'best_shop_sanitize_checkbox',
      'transport' => 'refresh'
    )
  );

  $wp_customize->add_control(
    'preloader_enabled',
    array(
      'label' => esc_html__( 'Enable Preloader', 'ecommerce-startup' ),
      'section' => 'preloader_settings',
      'type' => 'checkbox',
    )
  );
    
    
    
/*
 * Countdown timer
 */
  $wp_customize->add_section(
    'timer_settings',
    array(
      'title' => esc_html__( 'Countdown Timer', 'ecommerce-startup' ),
      'priority' => 199,
      'capability' => 'edit_theme_options',
      'panel' => 'theme_options',
      'description' => __( 'Add email subscription plugin shortcode.', 'ecommerce-startup' ),

    )
  );

  //
  $wp_customize->add_setting(
    'timer_year',
    array(
      'default' => best_shop_default_settings( 'timer_year' ),
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage'
    )
  );

  $wp_customize->add_control(
    'timer_year',
    array(
      'label' => esc_html__( 'Year', 'ecommerce-startup' ),
      'section' => 'timer_settings',
      'type' => 'number',
    )
  );    
    
  //
  $wp_customize->add_setting(
    'timer_month',
    array(
      'default' => best_shop_default_settings( 'timer_month' ),
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage'
    )
  );

  $wp_customize->add_control(
    'timer_month',
    array(
      'label' => esc_html__( 'Month', 'ecommerce-startup' ),
      'section' => 'timer_settings',
      'type' => 'number',
    )
  );   
    
  //
  $wp_customize->add_setting(
    'timer_date',
    array(
      'default' => best_shop_default_settings( 'timer_date' ),
      'sanitize_callback' => 'absint',
      'transport' => 'postMessage'
    )
  );

  $wp_customize->add_control(
    'timer_date',
    array(
      'label' => esc_html__( 'Date', 'ecommerce-startup' ),
      'section' => 'timer_settings',
      'type' => 'number',
    )
  );   

  //
  $wp_customize->add_setting(
    'timer_message',
    array(
      'default' => best_shop_default_settings( 'timer_message' ),
      'sanitize_callback' => 'sanitize_text_field',
      'transport' => 'postMessage'
    )
  );

  $wp_customize->add_control(
    'timer_message',
    array(
      'label' => esc_html__( 'Message', 'ecommerce-startup' ),
      'section' => 'timer_settings',
      'type' => 'text',
    )
  );

}
endif;
add_action( 'customize_register', 'ecommerce_startup_customize_register' );

/*
 * Add default header image
 */

function ecommerce_startup_header_style() {
  add_theme_support(
    'custom-header',
    apply_filters(
      'ecommerce_startup_custom_header_args',
      array(
        'default-text-color' => '#000000',
        'width' => 1920,
        'height' => 760,
        'flex-height' => true,
        'video' => true,
        'wp-head-callback' => 'ecommerce_startup_header_style',
      )
    )
  );
  add_theme_support( 'automatic-feed-links' );
}

add_action( 'after_setup_theme', 'ecommerce_startup_header_style' );


