<?php

defined( 'ABSPATH' ) || exit;

function install_tags() {
	require_once dirname( __FILE__) . '/data.php';
	$tags = get_tags_data();
	if ( ! empty ( $tags ) ) foreach ( $tags as $tag ){
		wp_insert_term( $tag, 'post_tag' );	
	}
}
