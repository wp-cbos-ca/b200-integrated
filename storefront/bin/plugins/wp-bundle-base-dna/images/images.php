<?php

defined( 'ABSPATH' ) || exit;

function install_featured_images() {
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_images_data();
	set_featured_image( $items['attach_id'] );
}

function set_featured_image( $attach_id = '' ) {
	if ( $posts = get_posts_by_post_type_images( '15' ) ) {
		foreach ( $posts as $post ) {
			set_post_thumbnail( $post->ID, $attach_id );
		}	
	}
}

function upload_featured_image() {
	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents( $image_url );
	$filename = basename( $image_url );
	if( wp_mkdir_p( $upload_dir['path'] ) ) {
		$file = $upload_dir['path'] . '/' . $filename;
	}
	else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}
	file_put_contents( $file, $image_data );
	$wp_filetype = wp_check_filetype( $filename, null );
	$attachment = array(
		'post_mime_type' => $wp_filetype['type'],
		'post_title' => sanitize_file_name( $filename ),
		'post_content' => '',
		'post_status' => 'inherit'
	);
	$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	return $attach_id;
}

function get_posts_by_post_type_images( $numposts = '15' ) {
	$args = array(
		'posts_per_page'   => $numposts,
		'offset'		   => 0,
		'category'		 => '',
		'category_name'	=> '',
		'orderby'		  => 'date',
		'order'			=> 'DESC',
		'include'		  => '',
		'exclude'		  => '',
		'meta_key'		 => '',
		'meta_value'	   => '',
		'post_type'		=> WP_POST_TYPE,
		'post_mime_type'   => '',
		'post_parent'	  => '',
		'author'	   => '',
		'post_status'	  => 'publish',
		'suppress_filters' => true 
	);
	$arr = get_posts( $args ); 
	if ( ! empty ( $arr ) ) {
		return $arr;
	} 
	else {
		return false;
	}
}
