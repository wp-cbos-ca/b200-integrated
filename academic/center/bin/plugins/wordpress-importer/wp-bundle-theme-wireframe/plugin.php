<?php
/**
Plugin Name: WP Bundle Theme Wireframe
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-theme-wireframe
Description: Adds a dotted wireframe outline to major site elements to make it easier to determine where they are. CSS only, no jQuery used.
Version: 2018.03.09
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', 'get_wp_bundle_wireframe' );

function get_wp_bundle_wireframe(){
	if ( is_user_logged_in() && isset( $_GET['wireframe'] ) ) {
		$file = dirname(__FILE__) . '/css/style.css';
		$str = '<style type="text/css">';
		$str .= file_get_contents( $file );
		$str .= '</style>';
		echo $str;
	}
}
