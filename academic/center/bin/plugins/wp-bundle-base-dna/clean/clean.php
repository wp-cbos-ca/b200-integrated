<?php

defined( 'ABSPATH' ) || exit;

function default_cleaner() {
	if ( $page = get_page_by_title( 'Sample Page' ) ){
		wp_delete_post( $page->ID, true );
	}
	if ( $post = get_page_by_title( 'Hello World!', OBJECT, 'post' ) ){
		wp_delete_post( $post->ID, true );
	}
}
