<?php
/**
Plugin Name: WP Bundle Developer Constants
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-developer-constants/
Description: Lists specified constants in the Dashboard. Useful for development. Should not use on production site.
Version: 2018.03.11
Plugin Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

add_action( 'wp_dashboard_setup', 'wp_bundle_constants' );

function wp_bundle_constants() {
	if ( current_user_can( 'manage_options' ) ) { //@TODO check
		wp_add_dashboard_widget( 'wp_bundle_constants', __( 'WP Bundle Constants' ), 'get_wp_bundle_constants' );
	}
}
function get_wp_bundle_constants() {
	if ( file_exists( __DIR__ . '/data.php' ) ){
		require_once( __DIR__ . '/data.php' );
		$items = get_bundle_constants_data();
	}
	$str = '<table style="width: 100%;">' . PHP_EOL;
	if ( ! empty( $items ) ) {
		$str .= '<tr><th>No.</th><th style="text-align: left;">Name: Value</th></tr>';
		foreach ( $items as $k => $item ) {
			$k = $k + 1; // adjust from 0 based to 1 based.
			$str .=  sprintf( '<tr><td>%s</td><td><span style="font-weight: bold;">%s</span> : %s</td></tr>%s', $k, $item, constant( $item ), PHP_EOL );
		}
	}
	else {
		$str .= 'N/A' . PHP_EOL;
	}
	$str .= '</table>' . PHP_EOL;
	echo $str;
}
