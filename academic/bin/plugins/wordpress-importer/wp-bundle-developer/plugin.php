<?php
/**
Plugin Name: WP Bundle Developer
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-developer/
Description: Some useful functions for a developer
Version: 2017.12.15
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_modify_admin_bar( $wp_admin_bar ){
	if ( $title = get_wp_bundle_online_status() ) {
		$args = array(
			'id' => 'developer',
			'href' => false,
			'title' => __( $title ),
			'meta'  => array( 'class' => 'developer' ),
			); 
		$wp_admin_bar->add_node( $args );
	}
	if ( $title = get_wp_bundle_debug_status() ) {
	$args = array(
			'id' => 'developer',
			'href' => false,
			'title' => __( $title ),
			'meta'  => array( 'class' => 'developer' )
		
		); 
		$wp_admin_bar->add_node( $args );
	}
}
add_action( 'admin_bar_menu', 'wp_bundle_modify_admin_bar', 999 );

function get_wp_bundle_debug_status(){   
	if ( defined( 'WP_DEBUG' ) ) {
	   if ( WP_DEBUG ) {
		$title = '<span style="background: #aa5939; display: inline-block; padding: 0 15px;">';
		$title .= "DEBUG ON";
		$title .= '</span>';
		}
		else {
		$title = '<span style="background: #6e858d; display: inline-block; padding: 0 15px;">';
		$title .= "DEBUG OFF";
		$title .= '</span>';
		$title = '';
		}
	}
	else {
		$title = '<span style="background: #6e858d; display: inline-block; padding: 0 15px;">';
		$title .= "DEBUG N/A";
		$title .= '</span>';
		$title = '';
	}
	return $title;
}

function get_wp_bundle_online_status(){
	if ( is_localhost() ) {
		$title = '<span style="background: #aa5939; display: inline-block; padding: 0 15px;">';
		$title .= "localhost";
	}
	else {
		$title = '<span style="background: #6e858d; display: inline-block; padding: 0 15px;">';
		$title .= "online";
	}
	$title .= '</span>';
	return $title;
}

if ( ! function_exists( 'is_localhost' ) ) { 
	function is_localhost(){
		if ( $_SERVER['HTTP_HOST'] =='localhost' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {
			return true;
		}
		else {
			return false;
		}
	}
}

if ( ! function_exists( 'str_dump' ) ) {
	function str_dump( $str ) {
		if ( defined( 'SITE_LOG_PATH' ) ) {
		$file = SITE_LOG_PATH . '/developer-error.log';
		error_log( $str, 3, $file );
		//3: append to file desitination (add newline).
		}
		else {
			echo '<!-- ' . $str . '-->' . PHP_EOL;
		}
	}
}

if ( ! function_exists( 'pre_dump' ) ) {
	function pre_dump( $arr, $output = 1 ) {
		if ( $output ) {
			echo '<!--<pre>' . PHP_EOL;
			var_dump( $arr );
			echo '</pre>-->' . PHP_EOL;
		}
	}
}

/*
 0	message is sent to PHP's system logger, using the Operating System's system logging mechanism or a file, depending on what the error_log configuration directive is set to. This is the default option.
 1	message is sent by email to the address in the destination parameter. This is the only message type where the fourth parameter, extra_headers is used.
 2	No longer an option.
 3	message is appended to the file destination. A newline is not automatically added to the end of the message string.
 */
