<?php
/**
Plugin Name: WP Bundle Developer Plugins
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-developer-plugins/
Description: Creates a list of plugins. Shows plugin folder size, number of files. Selectively activate/deactivate plugins.
Version: 2018.05.05
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

if ( file_exists( __DIR__ . '/logic.php' ) ) {
	require_once( __DIR__ . '/logic.php' );
}

if ( 0 ) {
	
function wp_bundle_plugins_add_dashboard_widget() {
	if ( current_user_can( 'manage_options' ) ) {
		$args = array( 'slug' => 'wp_bundle_dashboard_widget', 'title' => 'WP Bundle Developer Plugins', 'function' => 'wp_bundle_plugins_get_dashboard_html' );
		wp_add_dashboard_widget( $args['slug'], $args['title'], $args['function'] );
	}
}
add_action( 'wp_dashboard_setup', 'wp_bundle_plugins_add_dashboard_widget' );

function wp_bundle_plugins_get_dashboard_html() {
	$str = get_wp_bundle_maintenance_header();   
	$str .= get_wp_bundle_maintenance_plugins();
	$str .= get_wp_bundle_maintenance_footer();   
	echo $str;
}

function get_wp_bundle_plugins_header(){
	$str = '<p>Recommended</p>';
	return $str;
}

function get_wp_bundle_plugins_footer(){
	$str = '<p><small>Delete this plugin after use to reduce server load and security risk. Do not use on a production site.</small></p>';
	return $str;
}

function get_wp_bundle_plugins_list(){
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

function get_wp_bundle_plugins_notes_html( $notes ) {
	$show_notes = false;
	if ( ! empty( $notes ) && $show_notes ) {
		$str = sprintf( '&nbsp;<small>(%s)</small>', $notes );
	  return $str;
	}
	else {
		return false;
	}
}

function get_wp_bundle_plugins_plugin_detail_link( $plugin_name ){
	$query = sprintf('?tab=plugin-information&amp;plugin=%s&amp;TB_iframe=true&amp;width=600&amp;height=550', $plugin_name ); 
	$str = admin_url( '/plugin-install.php' . $query );
	return $str;
}

}