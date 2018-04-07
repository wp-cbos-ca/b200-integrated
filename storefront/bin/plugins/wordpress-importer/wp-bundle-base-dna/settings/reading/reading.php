<?php

defined( 'ABSPATH' ) || exit;

function install_reading_settings() {
	require_once dirname( __FILE__) . '/data.php';
	$items = get_reading_data();
	if ( ! empty ( $items ) ) foreach ( $items as $item ) {
		if( $item['update'] ) {
			switch( $item['option_name'] ) {
				case 'page_for_posts' :
					update_page_for_posts( $item['option_value'] );
					break;
				case 'page_on_front' :
					update_page_on_front( $item['option_value'] );
					break;
				default:
					update_option( $item['option_name'], $item['option_value'] );	
			}
		}
	}	
}

function update_page_for_posts( $slug ) {
	if ( $page = get_page_by_title ( $slug, OBJECT, 'page' ) ) {
		update_option( 'page_for_posts', $page->ID );
	}
}

function update_page_on_front( $slug ) {
	if ( $page = get_page_by_title ( $slug, OBJECT, 'page' ) ) {
		update_option( 'page_on_front', $page->ID );
	}
}
