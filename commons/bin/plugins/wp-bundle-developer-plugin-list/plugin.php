<?php
/**
Plugin Name: WP Bundle Developer Plugin List
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-developer-plugin-list/
Description: Creates a file with a list of plugins and active/inactive status.
Version: 2018.05.05
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_developer_plugins_menu(){
	if ( 1 && current_user_can( 'manage_options' ) ) {
		if ( 1 ) {
			require_once( __DIR__ . '/data.php' );
			require_once( __DIR__ . '/template.php' );
			require_once( __DIR__ . '/logic.php' );
		}
		if ( 1 ) {
			$args = get_wp_bundle_developer_data();
			add_management_page( $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
		}
	}
}
add_action( 'admin_menu', 'wp_bundle_developer_plugins_menu' );

function get_wp_bundle_developer_data() {
	$items = array( 
		'page_title' => 'WP Bundle Plugins',
		'menu_title' => 'WP Bundle Plugins',
		'capability' => 'manage_options',
		'menu_slug' => 'wp-bundle-developer-plugins',
		'function' => 'the_wp_bundle_developer_plugins_html',
	);
	return $items;
}
