<?php

/**
 * Plugin Name: WP Bundle Base Cron
 * Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-base-cron/
 * Description: Sets up a server side cron job to replace the virtual cron used by WordPress.
 * Version: 2017.10.27
 * Author: wp.cbos.ca
 * Author URI: http://wp.cbos.ca
 * License: GPLv2+
*/

//https://tommcfarlin.com/wordpress-cron-jobs/

function wp_bundle_cron_activate() {
	wp_schedule_event( time(), 'hourly', 'my_hourly_event' );
}

function wp_bundle_cron_deactivate() {
	wp_clear_scheduled_hook( 'my_hourly_event' );
}

function wp_bundle_run_wp_cron() {

//1. Check for a new file
//2. If it exists, read it, upload it, delete it
//3. Otherwise, do nothing
}
