<?php
/**
 * The template for displaying search forms in Shopfront Ecommerce
 *
 * @package Shopfront Ecommerce
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>		
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'shopfront-ecommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'shopfront-ecommerce' ); ?>">
</form>