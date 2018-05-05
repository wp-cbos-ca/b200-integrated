<?php
/**
Plugin Name: WP Bundle Developer Optimizer
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-developer-optimizer/
Description: Recommended plugins to assist in site optimization.
Version: 2018.05.05
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

function wp_bundle_add_dashboard_widget() {
	$args = array( 'slug' => 'wp_bundle_optimizer_dashboard_widget', 'title' => 'WP Bundle Developer Optimizer', 'function' => 'wp_bundle_function' );
	wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );																				
}
add_action( 'wp_dashboard_setup', 'wp_bundle_add_dashboard_widget' );

function wp_bundle_function() {
	$str = get_wp_bundle_maintenance_header();   
	$str .= get_wp_bundle_maintenance_plugins();
	$str .= get_wp_bundle_maintenance_footer();   
	echo $str;
}

function get_wp_bundle_maintenance_header(){
	$str = '<p>Recommended</p>';
	return $str;
}

function get_wp_bundle_maintenance_footer(){
	$str = '<p><small>For best results, delete listed plugins after use (Decreases server load and security risk).</small></p>';
	return $str;
}

function get_wp_bundle_maintenance_plugins(){
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_wp_bundle_maintenance_plugins_data();
	if ( ! empty( $items ) ) {
		$str = '';
		foreach ( $items as $item ) {
			if ( $item['display'] && ! empty( $item['title'] ) ) {
				$str .= sprintf('<p><strong><a href="%s" target="_blank">%s</a>:</strong> [<a href="%s">Details and Install</a>] %s</p>', 
						$item['uri'], $item['title'],  get_wp_bundle_plugin_detail_link( $item['name'] ), get_wp_bundle_notes_html( $item['notes'] ), PHP_EOL 
				);
			}
		}
		return $str;
	}
	else {
		return false;
	}
}

function get_wp_bundle_notes_html( $notes ) {
	$show_notes = false;
	if ( ! empty( $notes ) && $show_notes ) {
		$str = sprintf( '&nbsp;<small>(%s)</small>', $notes );
	  return $str;
	}
	else {
		return false;
	}
}

function get_wp_bundle_plugin_detail_link( $plugin_name ){
	$query = sprintf('?tab=plugin-information&amp;plugin=%s&amp;TB_iframe=true&amp;width=600&amp;height=550', $plugin_name ); 
	$str = admin_url( '/plugin-install.php' . $query );
	return $str;
}
