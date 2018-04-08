<?php
/**
Plugin Name: WP Bundle Base Media
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-base-media/
Description: Implementing a reworked directory structure as a peer of the application core. Uploads media per file type.
Version: 2018.03.14
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca/
License: GPLv2+

Adapted from: Standard Upload Dir by Ulf Benjaminsson (ver 3.4.3.1).
http://wordpress.org/extend/plugins/custom-upload-dir/
Keeps your uploaded files organized in smart folder structures.
*/

global $wp_bundle_media_dir;

function wp_bundle_upload_prefilter( $file ){
	global $wp_bundle_media_dir;
	if( ! empty( $file['name'] ) ){
		$wp_file_type = wp_check_filetype( $file['name'] );
		$file_type = ( ! empty( $wp_file_type['type'] ) ) ? $wp_file_type['type'] : 'image';
		$arr = explode( '/', $file_type );
		$wp_bundle_media_dir = $file_type == 'application' ? $arr[1] : $arr[0];
	}
	return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'wp_bundle_upload_prefilter' );

/*
On success, the returned array will have many indices:
 * 'path' - base directory and sub directory or full path to upload directory.
 * 'url' - base url and sub directory or absolute URL to upload directory.
 * 'subdir' - sub directory if uploads use year/month folders option is on.
 * 'basedir' - path without subdir.
 * 'baseurl' - URL path without subdir.
 * 'error' - false or error message.
*/

function wp_bundle_adjust_upload_dir( $args ){
	$items = get_wp_bundle_dir_data();
	$arg = array(
	'path'	=> $items['path'],
	'url'	 => $items['url'],
	'subdir'  => $items['subdir'],
	'basedir' => $items['path'],
	'baseurl' => $items['url'],
	'error'   => false,
	);
	return $args;
}
add_filter( 'upload_dir', 'wp_bundle_adjust_upload_dir' );

function get_wp_bundle_dir_data(){  
	global $wp_bundle_media_dir;
	
	$path = SITE_MEDIA_PATH . '/' . $wp_bundle_media_dir;
	$url = SITE_ROOT_URL . SITE_MEDIA_DIR . '/' . $wp_bundle_media_dir;
	$subdir = $wp_bundle_media_dir;
	$basedir = SITE_ROOT_PATH . SITE_MEDIA_DIR;
	$baseurl = SITE_ROOT_URL . SITE_MEDIA_DIR;
	
	$items = array(
	'path' => $path, 
	'url' => $url, 
	'subdir' => $subdir, 
	'basedir' => $basedir, 
	'baseurl' => $baseurl, 
	'error'   => false,
	);
	//pre_dump( $items );
	return $items;
}

//disable 'uploads_use_year_month_folders'

function wp_bundle_adjustment_scripts(){
	wp_register_script( 'wp-bundle-uploads', plugin_dir_url( __FILE__ ) . 'js/adjustments.js' );
	wp_enqueue_script( 'wp-bundle-uploads' );
}
add_action('admin_init' , 'wp_bundle_adjustment_scripts' );

function wp_bundle_filter_post_type_link( $link, $post ) {
	if ( $post -> post_type == 'page' ) {
		if ( $cats = get_the_terms( $post->ID, 'cpt_project_category' ) ) {
			$link = str_replace( '/%postname%/', '/' . $post -> post_type . '/%postname%/' );
		}
	}
	return $link;
}
add_filter( 'post_type_link', 'wp_bundle_filter_post_type_link', 10, 2 );
