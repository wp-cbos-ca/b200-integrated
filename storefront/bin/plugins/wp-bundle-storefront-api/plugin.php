<?php

/*
Plugin Name:    WP Bundle Storefront API
Plugin URI:     http://wp.cbos.ca/plugins/wp-bundle-storefront-api/
Description:    Additional functionality for WooCommerce and the Storefront Theme.
Version:        2018.05.09
License:        GPLv2+
*/

defined( 'ABSPATH' ) || die();

add_action( 'admin_menu', 'rename_woocoomerce_admin_menu_item', 999 );

function rename_woocoomerce_admin_menu_item() {
	global $menu;
	$item = recursive_array_search_php( 'WooCommerce', $menu );
 
	if ( item ) {
		$menu[$item][0] = 'Orders';
	}
	else {
		return;
	}
}

function recursive_array_search_php( $needle, $haystack ) {
	foreach( $haystack as $key => $value ) {
		$current_key = $key;
		if ( $needle === $value || ( is_array( $value ) && recursive_array_search_php( $needle, $value ) !== false ) ) {
			return $current_key;
		}
	}
	return false;
}

add_shortcode( 'basket', 'wp_bundle_storefront_basket' );
add_shortcode( 'layered-nav', 'wp_bundle_storefront_layered_nav' );
add_shortcode( 'layered-nav-filters', 'wp_bundle_storefront_layered_nav_filters' );
add_shortcode( 'price-filter', 'wp_bundle_storefront_price_filter' );
add_shortcode( 'product-categories', 'wp_bundle_storefront_product_categories' );
add_shortcode( 'products', 'wp_bundle_storefront_products' );
add_shortcode( 'product-search', 'wp_bundle_storefront_product_search' );
add_shortcode( 'product-tags', 'wp_bundle_storefront_product_tags' );
add_shortcode( 'recently-viewed', 'wp_bundle_storefront_recently_viewed' );
add_shortcode( 'recent-reviews', 'wp_bundle_storefront_recent_reviews' );
add_shortcode( 'top-rated-products', 'wp_bundle_storefront_top_rated_products' );

function wp_bundle_storefront_basket(){
	ob_start();
	the_widget( 'woocommerce_widget_cart' );
	return ob_get_clean();
}

function wp_bundle_storefront_layered_nav(){
	ob_start();
	the_widget( 'woocommerce_layered_nav' );
	return ob_get_clean();
}

function wp_bundle_storefront_layered_nav_filters(){
	ob_start();
	the_widget( 'woocommerce_layered_nav_filters' );
	return ob_get_clean();
}

function wp_bundle_storefront_price_filter(){
	ob_start();
	the_widget( 'woocommerce_price_filter' );
	return ob_get_clean();
}

function wp_bundle_storefront_product_categories(){
	ob_start();
	the_widget( 'woocommerce_product_categories' );
	return ob_get_clean();
}

function wp_bundle_storefront_products(){
	ob_start();
	the_widget( 'woocommerce_products' );
	return ob_get_clean();
}

function wp_bundle_storefront_product_search(){
	ob_start();
	the_widget( 'woocommerce_product_search' );
	return ob_get_clean();
}

function wp_bundle_storefront_product_tags(){
	ob_start();
	the_widget( 'woocommerce_product_tags' );
	return ob_get_clean();
}

function wp_bundle_storefront_recently_viewed(){
	ob_start();
	the_widget( 'woocommerce_recently_viewed' );
	return ob_get_clean();
}

function wp_bundle_storefront_recent_reviews(){
	ob_start();
	the_widget( 'woocommerce_recent_reviews' );
	return ob_get_clean();
}

function wp_bundle_storefront_top_rated_products(){
	ob_start();
	the_widget( 'woocommerce_top_rated_products' );
	return ob_get_clean();
}
