<?php

defined( 'ABSPATH' ) || exit;

function install_post_type ( $user_id = 1 ) {
	require_once dirname( __FILE__) . '/data.php';
	global $wpdb;
	$now = date( 'Y-m-d H:i:s' );
	$now_gmt = date( 'Y-m-d H:i:s' ); //adjust
	
	$posts = get_post_type_data();
	foreach ( $posts as $post ) {
		if ( $post['build'] &&  ( !  get_page_by_title ( $post['post_name'], WP_POST_TYPE_ALT ) ) ) { 
			   $guid = get_option( 'home' ) . '/' . $post['post_name'];
			   $wpdb->insert( $wpdb->posts, 
				array(
					'post_author' => $user_id, 
					'post_date' => $now, 
					'post_date_gmt' => $now_gmt, 
					'post_content' => $post['post_content'],
					'post_excerpt' => '', 
					'post_title' => $post['post_title'], 
					'post_name' => $post['post_name'],
					'post_modified' => $now, 
					'post_modified_gmt' => $now_gmt, 
					'guid' => $guid, 
					'post_type' => $post_type,
					'comment_count' => 0, 
					'to_ping' => '', 
					'pinged' => '', 
					'post_content_filtered' => '' 
				));								
		}
	}						
}
