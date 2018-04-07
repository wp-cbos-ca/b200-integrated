<?php

defined( 'ABSPATH' ) || exit;

function install_writing_settings() {
	require_once dirname( __FILE__) . '/data.php';
	$items = get_writing_data();
	if ( ! empty ( $items ) ) foreach ( $items as $item ) {
		if( $item['update'] ) {
			update_option( $item['option_name'], $item['option_value'] );
		}
	}
}
