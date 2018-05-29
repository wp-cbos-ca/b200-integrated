<?php
/**
Plugin Name: WP Bundle Base Security
Plugin URI: http://wp.cbos.ca
Description: Maintains the security features in the Integrated WordPress Bundle package by deleting xmlrpc.php and .wpcli after an upgrade. Deactivate this plugin if you wish to use these features.
Version: 2018.03.10
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_enforce_security_post_upgrade( $bool, $args, $result ){
	$file = ABSPATH . 'xmlrpc.php';
	if ( file_exists( $file ) ) {
		$bool = unlink( $file );
	}
	$file = ABSPATH . '.wpcli';
	if ( file_exists( $file ) ) {
		$bool = unlink( $file );
	}
	return $bool;
}
add_filter( 'upgrader_post_install', 'wp_bundle_enforce_security_post_upgrade', 10, 3 );
