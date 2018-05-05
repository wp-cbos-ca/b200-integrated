<?php
/**
Plugin Name: WP Bundle Developer Plugins
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-developer-plugins/
Description: Creates a file with a list of plugins and active/inactive status.
Version: 2018.05.05
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_plugins_add_dashboard_widget() {

	if ( 1 ) {
		require_once( __DIR__ . '/data.php' );
		require_once( __DIR__ . '/template.php' );
		require_once( __DIR__ . '/logic.php' );
	}

	if ( 1 && current_user_can( 'manage_options' ) ) {
		$args = array( 'slug' => 'wp_bundle_developer_dashboard_widget', 'title' => 'WP Bundle Developer Plugins', 'function' => 'the_wp_bundle_developer_plugins_html' );
		wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );
	}
}
add_action( 'wp_dashboard_setup', 'wp_bundle_plugins_add_dashboard_widget' );
