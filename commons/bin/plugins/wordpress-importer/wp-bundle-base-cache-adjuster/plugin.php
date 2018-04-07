<?php
/**
Plugin Name: WP Bundle Base Cache Adjuster
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-base-cache-adjuster/
Description: Copies the cached index files from the cache folder several levels deep to where they can be accessed directly.
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
Version: 2018.03.24
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

if ( ! defined ('SITE_CACHE_PATH_INDEX' ) ) {
	exit( 'Please define SITE_CACHE_PATH_INDEX.' );
}
if ( ! defined ('SITE_INDEX_FILE' ) ) {
	define( 'SITE_INDEX_FILE', 'index.html' );
}

add_action( 'save_post', 'wp_bundle_cache_adjuster_save_post' );

function wp_bundle_cache_adjuster_save_post( $post_id ) {
	if ( ! wp_is_post_revision( $post_id ) && ! wp_is_post_autosave( $post_id ) ) {
		$post = get_post( $post_id );
		wp_bundle_cache_adjuster_file( $post );
	}
}

function wp_bundle_cache_adjuster_file( $post ){
	
	$slug = get_post_field( 'post_name', $post -> ID );
	
	$post_type = get_post_field( 'post_type', $post_id );
	
	///var/www/html/1/bundle/b200-wp-4.9/bin/page/cache-enabler/bundles.local/page/background/index.html
	///var/www/html/1/bundle/b200-wp-4.9/bin/page/cache-enabler/bundles.local/background/index.html
	$source = SITE_CACHE_PATH_INDEX . '/' . $slug . '/' . SITE_INDEX_FILE;
	$dest = SITE_ROOT_PATH . '/' . $post_type . '/' . $slug . '/' . SITE_INDEX_FILE;
	//do_action( 'wp_log_info', 'source:36', $source );
	//do_action( 'wp_log_info', 'dest:37', $dest );
	if ( file_exists( $source ) ){
		if ( $result = wp_bundle_refresh_cache_path( $path, $source ) ){
			$result = copy ( $source, $dest );
			//do_action( 'wp_log_info', 'result:36', $result );
		}
	}
	else {
		//do_action( 'wp_log_info', 'result:36', 'file did not exist' );
	}
}
/*
function wp_bundle_get_cached_file_sub_path( $post_id, $slug ){
	$sub_path =  '/' . $post_type . '/' . $slug;
	return $sub_path;
}
*/
function wp_bundle_refresh_cache_path( $path, $file ){
	if( $mkdir = wp_mkdir_p( $path ) ) {
		return true;
	}
	else {
		return false;
	}
}

function wp_bundle_copy_front_page( $file, $slug ){
	if ( $slug == 'front-page' || $slug == 'home' ) {
		$dest = SITE_ROOT_PATH . '/' . SITE_INDEX_FILE;
		if ( $result = copy( $file, $dest ) ) {
			//do_action( 'wp_log_info', 'front-page:115', $file );
		}
		else {
			//do_action( 'wp_log_error', 'copy:118', $result );
		}
	}
}
