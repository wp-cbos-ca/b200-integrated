<?php

defined( 'ABSPATH' ) || exit;

function is_backup_on(){
	if ( is_plugin_active( 'backupwordpress/backupwordpress.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_security_on(){
	if ( is_plugin_active( 'wp-bundle-base-security/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_xmlrpc_on(){
	$file = ABSPATH . 'xmlrpc.php';
	if ( file_exists( $file ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_maintenance_on(){
	if ( is_plugin_active( 'wp-bundle-maintenance-scheduled/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_wp_cron_on(){
	if ( defined ( 'DISABLE_WP_CRON' ) && DISABLE_WP_CRON ) {
		return false;
	}
	else {
		return true;
	}
}

function is_debug_on(){
	if ( defined ( 'WP_DEBUG' ) && WP_DEBUG ) {
		return true;
	}
	else {
		return false;
	}
}

function is_display_debug_on(){
	if ( defined ( 'WP_DEBUG_DISPLAY' ) && WP_DEBUG_DISPLAY ) {
		return true;
	}
	else {
		return false;
	}
}

function is_optimization_on(){
	if ( is_plugin_active( 'autoptimize/autoptimize.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_caching_present(){
	if ( is_plugin_active( 'wp-bundle-base-cache/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_analytics_on(){
	if ( is_plugin_active( 'wp-bundle-monitor-analytics/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_maps_on(){
	if ( is_plugin_active( 'wp-bundle-social-maps/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_address_on(){
	if ( is_plugin_active( 'wp-bundle-social-address/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_mailer_on(){
	if ( is_plugin_active( 'wp-bundle-social-mailer/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_social_on(){
	if ( is_plugin_active( 'wp-bundle-social-media/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_video_on(){
	if ( is_plugin_active( 'wp-bundle-social-video/plugin.php' ) ) {
		return true;
	}
	else {
		return false;
	}
}

function is_file_edits_on(){
	if ( defined( 'DISALLOW_FILE_EDIT' ) && DISALLOW_FILE_EDIT ) {
		return false;
	}
	else {
		return true;
	}
}
