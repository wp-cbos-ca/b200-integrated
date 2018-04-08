<?php

defined( 'ABSPATH' ) || exit;

function install_categories() {
	require_once dirname( __FILE__) . '/data.php';
	$items = get_categories_data();
	if ( ! empty( $items ) ) foreach ( $items as $item ) {
		if( $item['build'] ) {
			wp_insert_term( $item['name'], 'category' );
		}
	}
}
