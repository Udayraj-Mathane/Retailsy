/*
** Scripts within the customizer controls window.
*/

(function( $ ) {
	wp.customize.bind( 'ready', function() {

	/*
	** Reusable Functions
	*/
		var optPrefix = '#customize-control-fashion_estore_options-';
		
		// Label
		function fashion_estore_customizer_label( id, title ) {

			// Colors

			if ( id === 'fashion_estore_theme_color' || id === 'background_color' || id === 'background_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Site Identity

			if ( id === 'custom_logo' || id === 'site_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Top Header

			if ( id === 'fashion_estore_phone_number_text' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Post Setting

			if ( id === 'fashion_estore_post_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Single Post Setting

			if ( id === 'fashion_estore_single_post_thumb' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Page Setting

			if ( id === 'fashion_estore_single_page_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// General Setting

			if ( id === 'fashion_estore_preloader_hide' || id === 'fashion_estore_sticky_header' || id === 'fashion_estore_scroll_hide' || id === 'fashion_estore_products_per_row' || id === 'fashion_estore_scroll_top_position') {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Social Icon

			if ( id === 'fashion_estore_facebook_icon' || id === 'fashion_estore_twitter_icon' || id === 'fashion_estore_twitter_icon' || id === 'fashion_estore_linkedin_icon' || id === 'fashion_estore_pintrest_icon' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Slider

			if ( id === 'fashion_estore_top_slider_page1' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Header Image

			if ( id === 'header_image' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Footer

			if ( id === 'fashion_estore_footer_text_setting' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Service Setting

			if ( id === 'cosmetic_ecommerce_store_shop_services_icon1' || id === 'cosmetic_ecommerce_store_shop_services_icon2' || id === 'cosmetic_ecommerce_store_shop_services_icon3' || id === 'cosmetic_ecommerce_store_shop_services_icon4' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}

			// Product

			if ( id === 'cosmetic_ecommerce_store_new_product_title' ) {
				$( '#customize-control-'+ id ).before('<li class="tab-title customize-control">'+ title  +'</li>');
			} else {
				$( '#customize-control-fashion_estore_options-'+ id ).before('<li class="tab-title customize-control">'+ title +'</li>');
			}
			
		}


	/*
	** Tabs
	*/

		// Colors
		fashion_estore_customizer_label( 'fashion_estore_theme_color', 'Theme Color' );
		fashion_estore_customizer_label( 'background_color', 'Colors' );
		fashion_estore_customizer_label( 'background_image', 'Image' );

		// Site Identity
		fashion_estore_customizer_label( 'custom_logo', 'Logo Setup' );
		fashion_estore_customizer_label( 'site_icon', 'Favicon' );

		// Top Header
		fashion_estore_customizer_label( 'fashion_estore_phone_number_text', 'Phone' );

		// Post Setting
		fashion_estore_customizer_label( 'fashion_estore_post_page_title', 'Post Setting' );

		// Single Post  Setting
		fashion_estore_customizer_label( 'fashion_estore_single_post_thumb', 'Single Post Setting' );

		// Page Setting
		fashion_estore_customizer_label( 'fashion_estore_single_page_title', 'Page Setting' );

		// General Setting
		fashion_estore_customizer_label( 'fashion_estore_preloader_hide', 'Preloader' );
		fashion_estore_customizer_label( 'fashion_estore_sticky_header', 'Sticky Header' );
		fashion_estore_customizer_label( 'fashion_estore_scroll_hide', 'Scroll To Top' );
		fashion_estore_customizer_label( 'fashion_estore_products_per_row', 'Woocommerce Setting');
		fashion_estore_customizer_label( 'fashion_estore_scroll_top_position', 'Scroll to top Position' );

		// Social Icon
		fashion_estore_customizer_label( 'fashion_estore_facebook_icon', 'Facebook' );
		fashion_estore_customizer_label( 'fashion_estore_twitter_icon', 'Twitter' );
		fashion_estore_customizer_label( 'fashion_estore_intagram_icon', 'Intagram' );
		fashion_estore_customizer_label( 'fashion_estore_linkedin_icon', 'Linkedin' );
		fashion_estore_customizer_label( 'fashion_estore_pintrest_icon', 'Pinterest' );

		//Slider
		fashion_estore_customizer_label( 'fashion_estore_top_slider_page1', 'Slider' );

		//Header Image
		fashion_estore_customizer_label( 'header_image', 'Header Image' );

		//Footer
		fashion_estore_customizer_label( 'fashion_estore_footer_text_setting', 'Footer' );

		//Service Setting
		fashion_estore_customizer_label( 'cosmetic_ecommerce_store_shop_services_icon1', 'Service 1' );
		fashion_estore_customizer_label( 'cosmetic_ecommerce_store_shop_services_icon2', 'Service 2' );
		fashion_estore_customizer_label( 'cosmetic_ecommerce_store_shop_services_icon3', 'Service 3' );
		fashion_estore_customizer_label( 'cosmetic_ecommerce_store_shop_services_icon4', 'Service 4' );

		//Product
		fashion_estore_customizer_label( 'cosmetic_ecommerce_store_new_product_title', 'Featured Product' );
	

	}); // wp.customize ready

})( jQuery );
