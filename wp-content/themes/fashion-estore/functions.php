<?php
/**
 * Fashion Estore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fashion Estore
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/Fashion_Estore_Loader.php' );

$fashion_estore_loader = new \WPTRT\Autoload\Fashion_Estore_Loader();

$fashion_estore_loader->fashion_estore_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$fashion_estore_loader->fashion_estore_register();

if ( ! function_exists( 'fashion_estore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fashion_estore_setup() {

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_theme_support( 'responsive-embeds' );

		add_theme_support( 'woocommerce' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        add_image_size('fashion-estore-featured-header-image', 2000, 660, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary','fashion-estore' ),
	        'footer'=> esc_html__( 'Footer Menu','fashion-estore' ),
        ) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fashion_estore_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 50,
			'flex-width'  => true,
		) );

		add_editor_style( array( '/editor-style.css' ) );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'fashion_estore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fashion_estore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fashion_estore_content_width', 1170 );
}
add_action( 'after_setup_theme', 'fashion_estore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fashion_estore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fashion-estore' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'fashion-estore' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'fashion-estore' ),
		'id'            => 'fashion-estore-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'fashion-estore' ),
		'id'            => 'fashion-estore-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'fashion-estore' ),
		'id'            => 'fashion-estore-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="footer-column-widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'fashion_estore_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fashion_estore_scripts() {

	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'montserrat',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style( 'fashion-estore-block-editor-style', get_theme_file_uri('/assets/css/block-editor-style.css') );

	// load bootstrap css
    wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri()) . '/assets/css/bootstrap.css');

	wp_enqueue_style( 'fashion-estore-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom-option.php' );
	wp_add_inline_style( 'fashion-estore-style',$fashion_estore_theme_css );

	wp_style_add_data('fashion-estore-basic-style', 'rtl', 'replace');

	// fontawesome
	wp_enqueue_style( 'fontawesome-css', esc_url(get_template_directory_uri()).'/assets/css/fontawesome/css/all.css' );

	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri()).'/assets/css/owl.carousel.css' );

    wp_enqueue_script('owl.carousel-js', esc_url(get_template_directory_uri()) . '/assets/js/owl.carousel.js', array('jquery'), '', true );

    wp_enqueue_script('fashion-estore-theme-js', esc_url(get_template_directory_uri()) . '/assets/js/theme-script.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fashion_estore_scripts' );

/**
 * Enqueue theme color style.
 */
function fashion_estore_theme_color() {

    $theme_color_css = '';
    $fashion_estore_theme_color = get_theme_mod('fashion_estore_theme_color');
     $fashion_estore_theme_color_2 = get_theme_mod('fashion_estore_theme_color_2');
    $fashion_estore_preloader_bg_color = get_theme_mod('fashion_estore_preloader_bg_color');
    $fashion_estore_preloader_dot_1_color = get_theme_mod('fashion_estore_preloader_dot_1_color');
    $fashion_estore_preloader_dot_2_color = get_theme_mod('fashion_estore_preloader_dot_2_color');
    $fashion_estore_logo_max_height = get_theme_mod('fashion_estore_logo_max_height');

	if(get_theme_mod('fashion_estore_logo_max_height') == '') {
		$fashion_estore_logo_max_height = '24';
	}

    if(get_theme_mod('fashion_estore_preloader_bg_color') == '') {
			$fashion_estore_preloader_bg_color = '#000';
	}
	if(get_theme_mod('fashion_estore_preloader_dot_1_color') == '') {
		$fashion_estore_preloader_dot_1_color = '#fff';
	}
	if(get_theme_mod('fashion_estore_preloader_dot_2_color') == '') {
		$fashion_estore_preloader_dot_2_color = '#ff5353';
	}

	$theme_color_css = '
	.custom-logo-link img{
			max-height: '.esc_attr($fashion_estore_logo_max_height).'px;
		 }
		.sidebar h5,span.cart-value,.sticky .entry-title::before,#button,.sidebar input[type="submit"], .sidebar button[type="submit"],.comment-respond input#submit,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover,.pro-button a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce .woocommerce-ordering select,.main-navigation .sub-menu,.woocommerce-account .woocommerce-MyAccount-navigation ul li,.toggle-nav i,.wp-block-button__link,.menu_cat,.slider-inner-box,.sidebar .tagcloud a:hover,a.added_to_cart.wc-forward{
			background: '.esc_attr($fashion_estore_theme_color).';
		}
		a,#colophon a:hover, #colophon a:focus,.sidebar ul li a:hover,p.price, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce-message::before, .woocommerce-info::before,.call-info i,.social-link i{
			color: '.esc_attr($fashion_estore_theme_color).';
		}
		.woocommerce-message, .woocommerce-info,.wp-block-pullquote,.wp-block-quote, .wp-block-quote:not(.is-large):not(.is-style-large), .wp-block-pullquote,.btn-primary,.post-navigation .nav-previous a:hover, .post-navigation .nav-next a:hover, .posts-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover{
			border-color: '.esc_attr($fashion_estore_theme_color).';
		}
		.main-navigation .sub-menu > li > a:hover, .main-navigation .sub-menu > li > a:focus,#button:hover,#button:active,.slide-btn a,.pro-button a:hover,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce-account .woocommerce-MyAccount-navigation ul li:hover,.menu_cat i,a.added_to_cart.wc-forward:hover{
			background: '.esc_attr($fashion_estore_theme_color_2).';
		}
		a:hover,h1,h2,h3,h4,h5,h6,.navbar-brand a,.navbar-brand p,a.cart-customlocation i,button.cat_btn,.product_cat h4 a,.home_product_cat h4 a,.slide-btn a:hover,.woocommerce ul.products li.product .onsale,.woocommerce span.onsale,.main-navigation .menu > li > a,.main-navigation .sub-menu,.sidebar li,.sidebar ul li,.sidebar select,.sidebar .tagcloud a,.call-info p,.social-link i:hover,.woocommerce ul.products li.product .star-rating, .woocommerce .star-rating{
			color: '.esc_attr($fashion_estore_theme_color_2).';
		}
		.loading{
			background-color: '.esc_attr($fashion_estore_preloader_bg_color).';
		 }
		 @keyframes loading {
		  0%,
		  100% {
		  	transform: translatey(-2.5rem);
		    background-color: '.esc_attr($fashion_estore_preloader_dot_1_color).';
		  }
		  50% {
		  	transform: translatey(2.5rem);
		    background-color: '.esc_attr($fashion_estore_preloader_dot_2_color).';
		  }
		}
	';
    wp_add_inline_style( 'fashion-estore-style',$theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'fashion_estore_theme_color' );

/**
 * Enqueue S Header.
 */
function fashion_estore_sticky_header() {

	$fashion_estore_sticky_header = get_theme_mod('fashion_estore_sticky_header');

	$fashion_estore_custom_style= "";

	if($fashion_estore_sticky_header != true){

		$fashion_estore_custom_style .='.stick_header{';

			$fashion_estore_custom_style .='position: static;';

		$fashion_estore_custom_style .='}';
	}

	wp_add_inline_style( 'fashion-estore-style',$fashion_estore_custom_style );

}
add_action( 'wp_enqueue_scripts', 'fashion_estore_sticky_header' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */


/*
** Incs: Theme Customizer
*/

// Customizer
require get_parent_theme_file_path('/inc/customizer.php');

/*dropdown page sanitization*/
function fashion_estore_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function fashion_estore_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function fashion_estore_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/*radio button sanitization*/
function fashion_estore_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function fashion_estore_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function fashion_estore_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function fashion_estore_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

 //Float
function fashion_estore_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/**
 * Get CSS
 */

function fashion_estore_getpage_css($hook) {
	if ( 'appearance_page_fashion-estore-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'fashion-estore-demo-style', get_template_directory_uri() . '/assets/css/demo.css' );
}
add_action( 'admin_enqueue_scripts', 'fashion_estore_getpage_css' );

function fashion_estore_page_redirection() {
	global $pagenow;
		if (isset($_GET['activated']) && ('themes.php' == $pagenow) && is_admin()) {
		wp_safe_redirect(admin_url("themes.php?page=fashion-estore-info.php"));
	}
}
add_action('after_setup_theme', 'fashion_estore_page_redirection');

if ( ! defined( 'FASHION_ESTORE_CONTACT_SUPPORT' ) ) {
define('FASHION_ESTORE_CONTACT_SUPPORT',__('https://wordpress.org/support/theme/fashion-estore','fashion-estore'));
}
if ( ! defined( 'FASHION_ESTORE_REVIEW' ) ) {
define('FASHION_ESTORE_REVIEW',__('https://wordpress.org/support/theme/fashion-estore/reviews/#new-post','fashion-estore'));
}
if ( ! defined( 'FASHION_ESTORE_LIVE_DEMO' ) ) {
define('FASHION_ESTORE_LIVE_DEMO',__('https://themagnifico.net/demo/fashion-estore/','fashion-estore'));
}
if ( ! defined( 'FASHION_ESTORE_GET_PREMIUM_PRO' ) ) {
define('FASHION_ESTORE_GET_PREMIUM_PRO',__('https://www.themagnifico.net/themes/fashion-store-wordpress-theme/','fashion-estore'));
}
if ( ! defined( 'FASHION_ESTORE_PRO_DOC' ) ) {
define('FASHION_ESTORE_PRO_DOC',__('https://www.themagnifico.net/eard/wathiqa/fashion-store-pro-doc/','fashion-estore'));
}

add_action('admin_menu', 'fashion_estore_themepage');
function fashion_estore_themepage(){
	$theme_info = add_theme_page( __('Theme Options','fashion-estore'), __('Theme Options','fashion-estore'), 'manage_options', 'fashion-estore-info.php', 'fashion_estore_info_page' );
}

function fashion_estore_info_page() {
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	?>
	<div class="wrap about-wrap fashion-estore-add-css">
		<div>
			<h1>
				<?php esc_html_e('Welcome To ','fashion-estore'); ?><?php echo esc_html( $theme ); ?>
			</h1>
			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Contact Support", "fashion-estore"); ?></h3>
						<p><?php esc_html_e("Thank you for trying Fashion Estore , feel free to contact us for any support regarding our theme.", "fashion-estore"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FASHION_ESTORE_CONTACT_SUPPORT ); ?>" class="button button-primary get">
							<?php esc_html_e("Contact Support", "fashion-estore"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Checkout Premium", "fashion-estore"); ?></h3>
						<p><?php esc_html_e("Our premium theme comes with extended features like demo content import , responsive layouts etc.", "fashion-estore"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FASHION_ESTORE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
							<?php esc_html_e("Get Premium", "fashion-estore"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php esc_html_e("Review", "fashion-estore"); ?></h3>
						<p><?php esc_html_e("If You love Fashion Estore theme then we would appreciate your review about our theme.", "fashion-estore"); ?></p>
						<p><a target="_blank" href="<?php echo esc_url( FASHION_ESTORE_REVIEW ); ?>" class="button button-primary get">
							<?php esc_html_e("Review", "fashion-estore"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<h2><?php esc_html_e("Free Vs Premium","fashion-estore"); ?></h2>
		<div class="fashion-estore-button-container">
			<a target="_blank" href="<?php echo esc_url( FASHION_ESTORE_PRO_DOC ); ?>" class="button button-primary get">
				<?php esc_html_e("Checkout Documentation", "fashion-estore"); ?>
			</a>
			<a target="_blank" href="<?php echo esc_url( FASHION_ESTORE_LIVE_DEMO ); ?>" class="button button-primary get">
				<?php esc_html_e("View Theme Demo", "fashion-estore"); ?>
			</a>
		</div>
		<table class="wp-list-table widefat">
			<thead class="table-book">
				<tr>
					<th><strong><?php esc_html_e("Theme Feature", "fashion-estore"); ?></strong></th>
					<th><strong><?php esc_html_e("Basic Version", "fashion-estore"); ?></strong></th>
					<th><strong><?php esc_html_e("Premium Version", "fashion-estore"); ?></strong></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php esc_html_e("Header Background Color", "fashion-estore"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Navigation Logo Or Text", "fashion-estore"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Hide Logo Text", "fashion-estore"); ?></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Premium Support", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Fully SEO Optimized", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Recent Posts Widget", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>

				<tr>
					<td><?php esc_html_e("Easy Google Fonts", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Pagespeed Plugin", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Header Image On Front Page", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Show Header Everywhere", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Custom Text On Header Image", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Full Width (Hide Sidebar)", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Only Show Upper Widgets On Front Page", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Replace Copyright Text", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Upper Widgets Colors", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Navigation Color", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Post/Page Color", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Blog Feed Color", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Footer Color", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Sidebar Color", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Customize Background Color", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
				<tr>
					<td><?php esc_html_e("Importable Demo Content	", "fashion-estore"); ?></td>
					<td><span class="cross"><span class="dashicons dashicons-dismiss"></span></span></td>
					<td><span class="tick"><span class="dashicons dashicons-yes-alt"></span></span></td>
				</tr>
			</tbody>
		</table>
		<div class="fashion-estore-button-container">
			<a target="_blank" href="<?php echo esc_url( FASHION_ESTORE_GET_PREMIUM_PRO ); ?>" class="button button-primary get">
				<?php esc_html_e("Go Premium", "fashion-estore"); ?>
			</a>
		</div>
	</div>
	<?php
}


//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'fashion_estore_shop_per_page', 9 );
function fashion_estore_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'fashion_estore_product_per_page', 9 );
	return $cols;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'fashion_estore_loop_columns');
if (!function_exists('fashion_estore_loop_columns')) {
	function fashion_estore_loop_columns() {
		$columns = get_theme_mod( 'fashion_estore_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}
