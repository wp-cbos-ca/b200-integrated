<?php
/**
Plugin Name: WP Bundle Social Maps
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-social-maps/
Description: Displays a Google Map: [map lat=xx lng=xx] or just [map]. Uses Restrained Address lat lng coordinates if installed and defined.
Version: 2018.03.10
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function register_wp_bundle_map_scripts() {
	wp_register_style( 'wp-bundle-maps', plugin_dir_url(__FILE__) . 'css/style.css' );
	wp_register_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3', array( 'jquery' ), '1.0', true );
	wp_register_script( 'wp-bundle-maps-js', plugin_dir_url(__FILE__) . 'js/map.js', array( 'google-maps-api' ), '1.0', true );
}
add_action( 'init', 'register_wp_bundle_map_scripts' );

function print_wp_bundle_map_scripts() {
	global $add_wp_bundle_maps_script;
	if ( $add_wp_bundle_maps_script ) {	   
		echo get_wp_bundle_map_script_data();
		wp_enqueue_style( 'wp-bundle-maps' ); //this is css, yes, but it works...
		wp_print_scripts( 'google-maps-api' );
		wp_print_scripts( 'restrained-maps-js' );
	}
}
add_action('wp_footer', 'print_wp_bundle_map_scripts');
 
function wp_bundle_maps( ){
	require_once( dirname(__FILE__) . '/data.php' );
	global $add_wp_bundle_maps_script;
	$add_wp_bundle_maps_script = true;
	$items = get_wp_bundle_maps_data();
	$str = sprintf( '<div id="map-canvas" class="%s;" style="max-width: %s; height: %s;"></div>', $items['align'], $items['width'], $items['height']);
	return $str;
}
add_shortcode( 'map', 'wp_bundle_maps', 15 );

function get_wp_bundle_map_script_data() {
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_wp_bundle_maps_data();
	$str = '<script>' . PHP_EOL;
	$str .= 'var center = Array();' . PHP_EOL;
	$str .= sprintf( 'center.lat = %s;%s',  $items['center']['lat'], PHP_EOL );
	$str .= sprintf( 'center.lng = %s;%s', $items['center']['lng'], PHP_EOL );
	$str .= sprintf( 'var zoom = %s;%s', $items['zoom'], PHP_EOL );
	$str .= sprintf( 'var url = "%s";%s', plugin_dir_url(__FILE__), PHP_EOL );
	$str .= sprintf( 'var title = "%s";%s', $items['info_window']['company'], PHP_EOL );
	$str .= sprintf( 'var contentString = \'' . $items['info_window']['content_string'] . '\';' . PHP_EOL );
	$str .= '</script>' . PHP_EOL;
	return $str;
}
