<?php
/**
Plugin Name: WP Bundle Theme Footer
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-theme-footer/
Description: WP Bundle footer. Use as needed.
Author: wp.cbos.ca
Version: 2018.03.15
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'enqueue_wp_bundle_footer_scripts', 50 );

function enqueue_wp_bundle_footer_scripts() {
	wp_enqueue_style( 'bundle-footer', plugin_dir_url(__FILE__) . 'style/footer.css' );
}

function get_wp_bundle_footer(){
	if ( file_exists( dirname(__FILE__) .  '/html/footer.html' ) ) {
		$str = file_get_contents( dirname(__FILE__) .  '/html/footer.html' );
		return $str;
	}
	else {
		return false;
	}
}

function the_wp_bundle_footer(){
	echo get_wp_bundle_footer();
}
