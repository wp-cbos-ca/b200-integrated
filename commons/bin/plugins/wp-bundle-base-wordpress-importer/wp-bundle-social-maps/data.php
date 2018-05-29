<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_maps_data() {
	$default['lat'] = '42.5';
	$default['lng'] = '-82.5';
	$user_id = get_wp_bundle_admin_id_maps();
	$lat = ! empty( get_user_meta( $user_id, 'lat', true ) ) ? get_user_meta( $user_id, 'lat', true ): $default['lat'];
	$lng = ! empty( get_user_meta( $user_id, 'lng', true ) ) ? get_user_meta( $user_id, 'lng', true ): $default['lng'];
	$items = array( 
		'zoom' => '7',
		'center' => array( 
			'lat' => $lat, 
			'lng' => $lng
		),
		'width' => '800px',
		'height' => '400px',
		'align' => 'aligncenter',
		'info_window' => get_maps_info_window(),
		
	);
	return $items;
}

function get_wp_bundle_maps_info_window(){
	$items = get_wp_bundle_maps_address_fields();
	$arr = array( 
			'company' => $items['company'],
			'content_string' => get_content_string_html( $items ),
			'load' => 1 
		);
	return $arr;
}

function get_wp_bundle_content_string_html( $items = Array() ){
	$str = '<div class="info-window">';
	$str .= ! empty( $items['company'] ) ? sprintf( '<h4>%s</h4>', $items['company'] ) : '';
	$str .= '<p>';
	$str .= ! empty( $items['address_1'] ) ? sprintf( '%s<br />', $items['address_1'] ) : '';
	$str .= ! empty( $items['address_2'] ) ? sprintf( '%s<br />', $items['address_2'] ) : '';
	$str .= ! empty( $items['city'] ) ? sprintf( '%s ', $items['city'] ) : '';
	$str .= ! empty( $items['zip_postal'] ) ? $items['zip_postal'] : '';
	$str .= '</p>';
	$str .= '</div>';
	return $str;
}

function get_wp_bundle_maps_address_fields(){
	$items = get_wp_bundle_maps_address_data();
	$user_id = get_wp_bundle_admin_id_maps();
	$name = 'user_name';
	if ( ! empty( $items ) ) {
		$arr = Array();
		foreach ( $items as $k => $v ){
			if ( $v['show'] ) {
				$arr[ $v['name'] ] = empty( get_user_meta( $user_id, $v['name'], true ) ) ? get_user_meta( $v['name'], $name, true ): $v['default'];
				if( empty ( $arr[ $k ] ) ){ 
					unset( $arr[ $k ] );
				}
			}
		}
		return $arr;
	}
	else {
		return false;
	}
}

function get_wp_bundle_maps_address_data(){
	$items = array( 
		array( 'name' => 'company', 'default' => 'Company', 'show' => 1 ),
		array( 'name' => 'address_1', 'default' => 'Address 1', 'show' => 1 ),
		array( 'name' => 'address_2', 'default' => 'Address 2', 'show' => 1 ),
		array( 'name' => 'city', 'default' => 'City', 'show' => 1 ),
		array( 'name' => 'state_prov', 'default' => 'State/Prov.', 'show' => 1 ),
		array( 'name' => 'zip_postal', 'default' => 'Zip/Postal', 'show' => 1 ),
		array( 'name' => 'country', 'default' => 'Country', 'show' => 1 ),
		);
	return $items;
}

function get_wp_bundle_page_list_maps(){
	$items = array( 'maps' );
	return $items;
}

function get_wp_bundle_admin_id_maps(){
	$email = get_option( 'admin_email' );
	$user = get_user_by( 'email', $email );	
	$user_id = $user->ID;
	return $user_id;
}

