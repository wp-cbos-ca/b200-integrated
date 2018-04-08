<?php

/**
* This will work only if configure_dashboard is called
* on every admin page load.  Call or drop in functions.php
* file or equivalent, making sure to use corresponding data
*  file in data.php.
*	  
*/
function configure_dashboard(){
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_dashboard_data();
	
	if ( ! empty( $items ) ) foreach ( $items as $item ) {
		if ( ! $item['show'] ) {
			if ( $item['name'] == 'dashboard_show_welcome_panel' ) {
			   add_action( 'wp_dashboard_setup', 'remove_welcome_panel' );
		   }
		   else {
			   remove_meta_box( $item['name'], 'dashboard', $item['location'] );
		   }
		}
	}
}

function configure_dashboard_user(){
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_dashboard_user_data();
	$hide = array();
	if ( ! empty( $items ) ) foreach ( $items as $item ) {
		if ( ! $item['show'] ) {
			$hide[] = $item['name'];
		}
	}
	update_user_meta( get_current_user_id(), 'metaboxhidden_dashboard', $hide );
}

function remove_welcome_panel() {
	global $wp_filter;
	unset( $wp_filter['welcome_panel'] );
}

function remove_welcome_panel_current_user(){
	update_user_meta( get_current_user_id(), 'show_welcome_panel', false );										  
}
