<?php

defined( 'ABSPATH' ) || exit;

function install_pages ( $user_id = 1 ) {
	global $wpdb;
	$now = date( 'Y-m-d H:i:s' );
	$now_gmt = date( 'Y-m-d H:i:s' );
	require_once dirname( __FILE__) . '/data.php';
	$pages = get_pages_data();
	if ( ! empty( $pages ) ) foreach ( $pages as $page ) {
		if ( $page['build'] ) {
			if ( ! get_page_by_title ( $page['post_title'], OBJECT, 'page' ) ) {
			$guid = get_option( 'home' ) . '/' . $page['post_name'];
			$wpdb->insert( $wpdb->posts,
				array(
					'post_author' => $user_id,
					'post_date' => $now,
					'post_date_gmt' => $now_gmt,
					'post_content' => $page['post_content'],
					'post_excerpt' => '',
					'post_title' => $page['post_title'],
					'post_name' => $page['post_name'],
					'post_modified' => $now,
					'post_modified_gmt' => $now_gmt,
					'guid' => $guid,
					'post_type' => 'page',
					'comment_count' => 0,
					'to_ping' => '',
					'pinged' => '',
					'post_content_filtered' => '',
				));
			}
		}
	}
}
