<?php
/**
Plugin Name: WP Bundle Base Ice Age
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-base-ice-age/
Description: Freezes all core, theme and plugin updates, and hides <strike>all</strike> (most) update notices.
Version: 2017.12.15
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_quiet_notices() {
	remove_action( 'admin_notices', 'update_nag', 3 );
	remove_action( 'admin_notices', 'genesis_update_nag' );
}  
add_action( 'admin_init', 'wp_bundle_quiet_notices', 1 );

function wp_bundle_disable_updates(){
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_wp_bundle_core_update_data();
	wp_bundle_run_disable_filter( $items );
	$items = get_wp_bundle_theme_update_data();
	wp_bundle_run_disable_filter( $items );
	$items = get_wp_bundle_plugin_update_data();
	wp_bundle_run_disable_filter( $items );
	$items = get_wp_bundle_translation_update_data();
	wp_bundle_run_disable_filter( $items );
	$items = get_wp_bundle_email_update_data();
	wp_bundle_run_disable_filter( $items );
}
add_action( 'init', 'wp_bundle_disable_updates' );

function wp_bundle_run_disable_filter( $items = Array() ){
	if ( ! empty ( $items ) ) foreach ( $items as $item ) {
		if ( $item['engage'] ) {
			if ( $item['disable'] ){
				add_filter( $item['slug'], '__return_false' );
			}
			else {
				add_filter( $item['slug'], '__return_true' );
			}
		}
	}	 
}

function admin_footer_text_override () {
	echo '<span id="footer-thankyou">This WordPress installation is currently experiencing an "ice age". Please check back in 10,000 years. Thank you.</span>';
}
add_filter('admin_footer_text', 'admin_footer_text_override');

function admin_footer_version_override() {
	echo sprintf('<p id="footer-upgrade" class="alignright">Version %s</p>%s', get_bloginfo('version'), PHP_EOL );
}
add_filter( 'update_footer', 'admin_footer_version_override', 9999 );

function wp_bundle_hide_update_counts(){
	wp_register_style( 'wp-hide-update-notices', plugins_url( 'css/style.css' , __FILE__) );
	wp_enqueue_style( 'wp-hide-update-notices' );
}
add_action('admin_init' , 'wp_bundle_hide_update_counts' );

function wp_bundle_auto_update_specific_plugins ( $update, $item ) {
	$plugins = array ( 'akismet', 'buddypress' );
	if ( in_array( $item->slug, $plugins ) ) {
		return true;
	} else {
		return $update;
	}
}
add_filter( 'auto_update_plugin', 'wp_bundle_auto_update_specific_plugins', 10, 2 );

