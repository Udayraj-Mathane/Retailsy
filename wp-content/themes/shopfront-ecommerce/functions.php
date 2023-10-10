<?php
/**
 * Shopfront Ecommerce functions and definitions
 *
 * @package Shopfront Ecommerce
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'shopfront_ecommerce_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function shopfront_ecommerce_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	load_theme_textdomain( 'shopfront-ecommerce', get_template_directory() . '/languages' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'shopfront-ecommerce' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // shopfront_ecommerce_setup
add_action( 'after_setup_theme', 'shopfront_ecommerce_setup' );

function shopfront_ecommerce_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'shopfront-ecommerce' ),
		'description'   => __( 'Appears on blog page sidebar', 'shopfront-ecommerce' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'shopfront-ecommerce' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'shopfront-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'shopfront-ecommerce' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'shopfront-ecommerce' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'shopfront-ecommerce' ),
		'description'   => __( 'Appears on footer', 'shopfront-ecommerce' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'shopfront-ecommerce' ),
		'description'   => __( 'Appears on footer', 'shopfront-ecommerce' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'shopfront-ecommerce' ),
		'description'   => __( 'Appears on footer', 'shopfront-ecommerce' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'shopfront-ecommerce' ),
		'description'   => __( 'Appears on footer', 'shopfront-ecommerce' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'shopfront_ecommerce_widgets_init' );

function shopfront_ecommerce_scripts() {
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style( 'shopfront-ecommerce-style', get_stylesheet_uri() );
	wp_style_add_data('shopfront-ecommerce-style', 'rtl', 'replace');
	wp_enqueue_style( 'shopfront-ecommerce-responsive', esc_url(get_template_directory_uri())."/css/responsive.css" );
	wp_enqueue_style( 'shopfront-ecommerce-default', esc_url(get_template_directory_uri())."/css/default.css" );

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'shopfront-ecommerce-style',$shopfront_ecommerce_color_scheme_css );
	
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'shopfront-ecommerce-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );

	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$headings_font = esc_html(get_theme_mod('shopfront_ecommerce_headings_fonts'));
	$body_font = esc_html(get_theme_mod('shopfront_ecommerce_body_fonts'));

	if( $headings_font ) {
		wp_enqueue_style( 'shopfront-ecommerce-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	} else {
		wp_enqueue_style( 'oswald', '//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700');
	}
	if( $body_font ) {
		wp_enqueue_style( 'poppins', '//fonts.googleapis.com/css?family='. $body_font );
	} else {
		wp_enqueue_style( 'shopfront-ecommerce-source-body', '//fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'shopfront_ecommerce_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Google Fonts
 */
require get_template_directory() . '/inc/gfonts.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Theme Info Page.
 */
if ( ! defined( 'SHOPFRONT_ECOMMERCE_PRO_NAME' ) ) {
	define( 'SHOPFRONT_ECOMMERCE_PRO_NAME', __( 'About Shopfront Ecommerce', 'shopfront-ecommerce' ));
}

if ( ! defined( 'SHOPFRONT_ECOMMERCE_THEME_PAGE' ) ) {
define('SHOPFRONT_ECOMMERCE_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','shopfront-ecommerce'));
}
if ( ! defined( 'SHOPFRONT_ECOMMERCE_SUPPORT' ) ) {
define('SHOPFRONT_ECOMMERCE_SUPPORT',__('https://wordpress.org/support/theme/shopfront-ecommerce/','shopfront-ecommerce'));
}
if ( ! defined( 'SHOPFRONT_ECOMMERCE_REVIEW' ) ) {
define('SHOPFRONT_ECOMMERCE_REVIEW',__('https://wordpress.org/support/theme/shopfront-ecommerce/reviews/#new-post','shopfront-ecommerce'));
}
if ( ! defined( 'SHOPFRONT_ECOMMERCE_PRO_DEMO' ) ) {
define('SHOPFRONT_ECOMMERCE_PRO_DEMO',__('https://www.theclassictemplates.com/trial/shopfront-ecommerce-pro/','shopfront-ecommerce'));
}
if ( ! defined( 'SHOPFRONT_ECOMMERCE_PREMIUM_PAGE' ) ) {
define('SHOPFRONT_ECOMMERCE_PREMIUM_PAGE',__('https://theclassictemplates.com/wp-themes/wordpress-ecommerce-theme/','shopfront-ecommerce'));
}
if ( ! defined( 'SHOPFRONT_ECOMMERCE_THEME_DOCUMENTATION' ) ) {
define('SHOPFRONT_ECOMMERCE_THEME_DOCUMENTATION',__('http://theclassictemplates.com/documentation/shopfront-ecommerce-free/','shopfront-ecommerce'));
}

if ( ! function_exists( 'shopfront_ecommerce_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function shopfront_ecommerce_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

$woocommerce_sidebar = get_theme_mod( 'shopfront_ecommerce_woocommerce_sidebar_product' );
	if ( 'false' == $woocommerce_sidebar ) {
$woo_product_column = 'col-lg-12 col-md-12';
	} else {
$woo_product_column = 'col-lg-9 col-md-9';
}

$woocommerce_shop_sidebar = get_theme_mod( 'shopfront_ecommerce_woocommerce_sidebar_shop' );
	if ( 'false' == $woocommerce_shop_sidebar ) {
$woo_shop_column = 'col-lg-12 col-md-12';
	} else {
$woo_shop_column = 'col-lg-9 col-md-9';
}
