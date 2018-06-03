<?php

defined( 'ABSPATH' ) || exit;

function get_bundle_constants_data(){
	
	/** Get an array of constants defined in WordPress. */
	$items = get_defined_constants();
	
	$includes = array(
		array( 'name' => 'SITE_', 'include' => 0 ),
		array( 'name' => 'WP_', 'include' => 0 ),
		array( 'name' => 'W3TC_', 'include' => 0 ),
		);
	
	$excludes = array(
		'DB_', 'AUTH_', 'LOGGED_IN_', 'NONCE_',
		'HASH', 'USER_COOKIE', 'PASS_COOKIE',
		);
	$arr = array();
	if( ! empty( $items ) ) {
		foreach ( $items as $key => $item ) {
			if ( 0 ){
				foreach( $includes as $include ) {
					if ( strpos( $key, $include['name'] ) !== FALSE && $include['include'] ) {
						//$arr[] = $key;
					}
				}
			}
			if ( 0 ){
				foreach( $excludes as $exclude ) {
					if ( strpos( $key, $exclude ) === FALSE ){
						$arr[] = $key;
					}
				}
			}
			if ( 1 ){
				if (
					strpos( $key, $excludes[0] ) === FALSE 
					&& strpos( $key, $excludes[1] ) === FALSE
					&& strpos( $key, $excludes[2] ) === FALSE
					&& strpos( $key, $excludes[3] ) === FALSE
					&& strpos( $key, $excludes[4] ) === FALSE
					&& strpos( $key, $excludes[5] ) === FALSE
					&& strpos( $key, $excludes[6] ) === FALSE
					){
					$arr[] = $key;
				}
			}
		}
		if ( ! empty( $arr ) ){
			// Unsorted returns in order created. Can be useful.
			if ( 0 ){
				// Sort in alphabetical order.
				sort( $arr );
			}
			return $arr;
		}
		else {
			return false;
		}
	}
	else {
		return false;
	}
}
