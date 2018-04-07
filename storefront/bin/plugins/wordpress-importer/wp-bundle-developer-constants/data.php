<?php

defined( 'ABSPATH' ) || exit;

function get_bundle_constants_data(){
	
	$items = get_defined_constants();
	
	$prefixes = array(
		array( 'name' => 'SITE_', 'show' => 1 ),
		array( 'name' => 'WP_', 'show' => 1 ),
		array( 'name' => 'W3TC_', 'show' => 1 ),
		);
	if( ! empty( $items ) ) {
		foreach ( $items as $key => $item ) {
			foreach( $prefixes as $prefix ) {
				if ( strpos( $key, $prefix['name'] ) !== FALSE && $prefix['show'] ) {
					$arr[] = $key;
				}
			}
		}
		sort( $arr );
		return $arr;
	}
	else {
		return false;
	}
}
