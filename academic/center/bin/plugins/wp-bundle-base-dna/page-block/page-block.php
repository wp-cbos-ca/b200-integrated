<?php

defined( 'ABSPATH' ) || exit;

function install_page_block( $user_id = 1 ){
	require_once( dirname(__FILE__) . '/data.php' );
	global $wpdb;  
	$now = date( 'Y-m-d H:i:s' );
	$now_gmt = date( 'Y-m-d H:i:s' ); 
	$items = get_page_block_data();
	if ( ! empty ( $items ) ) for ( $i=0; $i < $items['cnt']; $i++ ) {
			$title = build_page_block_title( $items['title_prefix'], $i );
			if ( ! get_page_by_title( $title, OBJECT, 'page' ) ) {
				$post_name = sanitize_title( $title );
				$guid = get_option( 'home' ) . '/' . $post_name;
				$wpdb->insert( $wpdb->posts, 
				array(
					'post_author' => $user_id, 
					'post_date' => $now, 
					'post_date_gmt' => $now_gmt, 
					'post_content' => '',
					'post_excerpt' => '', 
					'post_title' => $title, 
					'post_name' =>  $post_name,
					'post_modified' => $now, 
					'post_modified_gmt' => $now_gmt, 
					'guid' => $guid, 
					'post_type' => 'page',
					'comment_count' => 0, 
					'to_ping' => '', 
					'pinged' => '', 
					'post_content_filtered' => '' 
				) );				  
			}
	}
}

function build_page_block_title( $title_prefix, $i ) {
	if ( $i < 10 ) {
		$n = $i + 1;
		$page_num = '0' . $n;
	}
	else {
		$page_num = $n;		
	}
	 $title = sprintf( '%s %s', $title_prefix, $page_num );
	 return $title;
}
