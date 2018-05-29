<?php

defined( 'ABSPATH' ) || exit;

function install_general_settings() {
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_general_data();
	if ( ! empty ( $items ) ) foreach ( $items as $item ) {
		if( $item['update'] ) {
			update_option( $item['option_name'], $item['option_value'] );
		}
	}	
	 install_other_data();
}

function install_other_data(){
	$site_title = get_site_title();
	if ( $site_title['update'] ) {
		update_option( $site_title['option_name'], $site_title['option_value'] );
	}
	$tagline = get_tagline();
	if ( $site_title['update'] ) {
		update_option( $tagline['option_name'], $tagline['option_value'] );
	}
	$root_url = get_root_url();
	if ( $site_title['update'] ) {
		update_option( $root_url['option_name'], $root_url['option_value'] );
	}
	$install_url = get_install_url();
	if ( $install_url['update'] ) {
		update_option( $install_url['option_name'], $install_url['option_value'] );
	}
	$admin_email = get_admin_email();
	if ( $admin_email['update'] ) {
		update_option( $admin_email['option_name'], $admin_email['option_value'] );
	}
	$site_language = get_site_language();
	if ( $site_language['update'] ) {
		update_option( $site_language['option_name'], $site_language['option_value'] );
	}
}
