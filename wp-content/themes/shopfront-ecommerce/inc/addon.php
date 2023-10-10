<?php
/*
 * @package Car Service
 */

function shopfront_ecommerce_admin_enqueue_scripts() {
	wp_enqueue_style( 'shopfront-ecommerce-admin-style', esc_url( get_template_directory_uri() ).'/css/addon.css' );
}
add_action( 'admin_enqueue_scripts', 'shopfront_ecommerce_admin_enqueue_scripts' );

add_action('after_switch_theme', 'shopfront_ecommerce_options');

function shopfront_ecommerce_options () {
	global $pagenow;
	if( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && current_user_can( 'manage_options' ) ) {
		wp_redirect( admin_url( 'themes.php?page=shopfront-ecommerce' ) );
		exit;
	}
}

function shopfront_ecommerce_theme_info_menu_link() {

	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'shopfront-ecommerce' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'shopfront-ecommerce' ),'edit_theme_options','shopfront-ecommerce','shopfront_ecommerce_theme_info_page'
	);
}
add_action( 'admin_menu', 'shopfront_ecommerce_theme_info_menu_link' );

function shopfront_ecommerce_theme_info_page() {

	$theme = wp_get_theme();
	?>
<div class="wrap theme-info-wrap">
	<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'shopfront-ecommerce' ), esc_html($theme->display( 'Name', 'shopfront-ecommerce'  )),esc_html($theme->display( 'Version', 'shopfront-ecommerce' ))); ?>
	</h1>
	<p class="theme-description">
	<?php esc_html_e( 'Do you want to configure this theme? Look no further, our easy-to-follow theme documentation will walk you through it.', 'shopfront-ecommerce' ); ?>
	</p>
	<hr>
	<div class="important-links clearfix">
		<p><strong><?php esc_html_e( 'Theme Links', 'shopfront-ecommerce' ); ?>:</strong>
			<a href="<?php echo esc_url( SHOPFRONT_ECOMMERCE_THEME_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'shopfront-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( SHOPFRONT_ECOMMERCE_SUPPORT ); ?>" target="_blank"><?php esc_html_e( 'Contact Us', 'shopfront-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( SHOPFRONT_ECOMMERCE_REVIEW ); ?>" target="_blank"><?php esc_html_e( 'Rate This Theme', 'shopfront-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( SHOPFRONT_ECOMMERCE_PRO_DEMO ); ?>" target="_blank"><?php esc_html_e( 'Premium Demo', 'shopfront-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( SHOPFRONT_ECOMMERCE_PREMIUM_PAGE ); ?>" target="_blank"><?php esc_html_e( 'Go To Premium', 'shopfront-ecommerce' ); ?></a>
			<a href="<?php echo esc_url( SHOPFRONT_ECOMMERCE_THEME_DOCUMENTATION ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'shopfront-ecommerce' ); ?></a>
		</p>
	</div>
	<hr>
	<div id="getting-started">
		<h3><?php printf( esc_html__( 'Getting started with %s', 'shopfront-ecommerce' ), 
		esc_html($theme->display( 'Name', 'shopfront-ecommerce' ))); ?></h3>
		<div class="columns-wrapper clearfix">
			<div class="column column-half clearfix">
				<div class="section">
					<h4><?php esc_html_e( 'Theme Description', 'shopfront-ecommerce' ); ?></h4>
					<div class="theme-description-1"><?php echo esc_html($theme->display( 'Description' )); ?></div>
				</div>
			</div>
			<div class="column column-half clearfix">
				<img src="<?php echo esc_url( $theme->get_screenshot() ); ?>" alt="" />
				<div class="section">
					<h4><?php esc_html_e( 'Theme Options', 'shopfront-ecommerce' ); ?></h4>
					<p class="about">
					<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'shopfront-ecommerce' ),esc_html($theme->display( 'Name', 'shopfront-ecommerce' ))); ?></p>
					<p>
					<a href="<?php echo esc_attr(wp_customize_url()); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Customize Theme', 'shopfront-ecommerce' ); ?></a>
					<a href="<?php echo esc_url( SHOPFRONT_ECOMMERCE_PREMIUM_PAGE ); ?>" target="_blank" class="button button-secondary premium-btn"><?php esc_html_e( 'Checkout Premium', 'shopfront-ecommerce' ); ?></a></p>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div id="theme-author">
	  <p><?php
		printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'shopfront-ecommerce' ),
			esc_html($theme->display( 'Name', 'shopfront-ecommerce' )),
			'<a target="_blank" href="' . esc_url( 'https://www.theclassictemplates.com/', 'shopfront-ecommerce' ) . '">classictemplate</a>',
			'<a target="_blank" href="' . esc_url( SHOPFRONT_ECOMMERCE_REVIEW ) . '" title="' . esc_attr__( 'Rate it', 'shopfront-ecommerce' ) . '">' . esc_html_x( 'rate it', 'If you like this theme, rate it', 'shopfront-ecommerce' ) . '</a>'
		)
		?></p>
	</div>
</div>
<?php
}
