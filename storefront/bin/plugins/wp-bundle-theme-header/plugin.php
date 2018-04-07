<?php
/**
Plugin Name: WP Bundle Theme Header
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-theme-header/
Description: Integrated header combining logo, menu and search (with CSS & JS as needed).
Author: wp.cbos.ca
Version: 2017.12.20
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function enqueue_wp_bundle_header_scripts() {
	wp_enqueue_style( 'integrated-header', plugin_dir_url(__FILE__) . 'style/header.css?' . time() );
	wp_enqueue_script( 'integrated-header', plugin_dir_url(__FILE__) . 'script/header.js' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_wp_bundle_header_scripts', 50 );

function get_wp_bundle_header(){
	if ( file_exists( dirname(__FILE__) . '/html/header.html' ) ) {
		$file = dirname(__FILE__) .  '/html/header.html';
		$str = file_get_contents( $file );
		return $str;
	}
	else {
		return false;
	}
}

function the_wp_bundle_header(){
	echo get_wp_bundle_header();
}
