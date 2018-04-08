<?php

defined( 'ABSPATH' ) || exit;

function install_timezone_settings() {
	require_once dirname( __FILE__) . '/data.php';
	$items = get_timezone_data();
	if ( ! empty ( $items ) ) foreach ( $items as $item ) { 
		if ( $item['selected'] ) {
			update_option( 'timezone_string', $item['option_value'] );
			break;
		}
	}
}
