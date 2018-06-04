<?php
/*
Plugin Name: WP Bundle Required Plugin Test
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-required-plugin-test/
Description: Required plugin test.
Version: 2018.06.03
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

function wp_bundle_required_plugin(){
	if ( current_user_can( 'manage_options' ) ) {
		$args = wp_bundle_get_menu_data();
		add_management_page( $args['page_title'], $args['menu_title'], $args['capability'], $args['menu_slug'], $args['function'] );
	}
}
add_action( 'admin_menu', 'wp_bundle_required_plugin' );

function wp_bundle_get_menu_data() {
	$args = array(
		'page_title' => 'WP Bundle Required',
		'menu_title' => 'WP Bundle Required',
		'capability' => 'manage_options',
		'menu_slug' => 'wp-bundle-required',
		'function' => 'wp_bundle_required_template',
		);
		return $args;
}

function wp_bundle_required_template(){
	if ( current_user_can( 'manage_options' ) )  {
		$items = wp_bundle_get_template_data();
		$msg = "Here";
		$str = '<div class="wrap" style="width: 50%;">';
		$str .= sprintf('<h1>%s</h1>%s', $items['title'], PHP_EOL );
		$str .= sprintf( '<p>%s</p>%s', $items['desc'], PHP_EOL );
		$str .= '<p>' . $msg . '</p>';
		$str .= '</div>';
		echo $str;
	} else {
		wp_die( __( 'Unauthorized.' ) );
	}
}

function wp_bundle_get_template_data(){
	$items = array(
		'title' => 'WP Bundle Required',
		'desc' => 'A test of the required plugin plugin.',
		'button_text' => 'Run Quickly',
	);
	return $items;
}


