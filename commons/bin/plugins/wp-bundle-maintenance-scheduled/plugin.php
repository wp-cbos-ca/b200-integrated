<?php
/**
Plugin Name: WP Bundle Maintenance Scheduled
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-maintenance-scheduled/
Description: Whether or not you are on scheduled maintenance.
Version: 2018.03.15
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_maintenance_dashboard() {
	if ( current_user_can( 'manage_options' ) ) {
		$args = array( 'slug' => 'wp_bundle_dashboard_maintenance', 'title' => 'WP Bundle Maintenance', 'function' => 'get_wp_bundle_scheduled_maintenance' );
		wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );
	}
}
add_action( 'wp_dashboard_setup', 'wp_bundle_maintenance_dashboard' );


function wp_bundle_scheduled_maintenance(){
	//You are/are not signed up for scheduled maintenance.
	//Sign up for scheduled maintenance here.
}
