<?php
/**
Plugin Name: WP Bundle Social Mailer
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-social-mailer/
Description: Just a contact form and mailer. Shortcode: [mailer]
Version: 2018.03.10
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_mailer_style() {
	wp_enqueue_style( 'mailer', plugin_dir_url(__FILE__) . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'wp_bundle_mailer_style', 25 );

function wp_bundle_mailer_script() {
	wp_register_script( 'mailer-js', plugin_dir_url(__FILE__) . 'js/javascript.js', array( 'jquery' ), '1.0', true );
}
add_action( 'init', 'wp_bundle_mailer_script' );

function print_wp_bundle_mailer_script() {
	global $add_wp_bundle_mailer_script;
	if ( $add_wp_bundle_mailer_script ) {	   
		wp_print_scripts( 'mailer-js' );
	}
}
add_action( 'wp_footer', 'print_wp_bundle_mailer_script' );

function wp_bundle_mailer_form( $args ){
	global $add_wp_bundle_mailer_script;
	$add_wp_bundle_mailer_script = true;
	require_once( dirname(__FILE__) . '/includes/data.php' );
	require_once( dirname(__FILE__) . '/includes/mailer.php' );
	require_once( dirname(__FILE__) . '/includes/template.php' );	
	$str = get_wp_bundle_mailer_form( $args );
	return $str;
}
add_shortcode( 'mailer', 'wp_bundle_mailer_form' );
