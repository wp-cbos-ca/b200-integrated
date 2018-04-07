<?php
/**
Plugin Name: WP Bundle Social Address
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-social-address/
Description: Adds address fields to the user profile. Shortcode: [address]. Does not display empty fields. Not formatted. Wrapped in div with class="address".
Version: 2018.03.11
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

add_action( 'show_user_profile', 'wp_bundle_user_profile_address', 1 );
add_action( 'edit_user_profile', 'wp_bundle_user_profile_address', 1 );
add_action( 'personal_options_update', 'save_wp_bundle_address' );
add_action( 'edit_user_profile_update', 'save_wp_bundle_address' );
add_shortcode( 'address', 'wp_bundle_user_address' );

function wp_bundle_user_address( $args ){
	require_once( dirname(__FILE__) . '/template.php' );	
	$str = get_wp_bundle_address_html( $args );
	return $str;
}

function wp_bundle_user_profile_address( $user ) { 
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_wp_bundle_address_data(); 
	if ( $items ) { 
		$str = '<h3>' .  _("Address" ) . '</h3>';
		$str .= '<table class="form-table">';
		foreach ( $items as $item ) {
			if ( $item['display'] ) { 
				$str .= '<tr>';
				$str .= '<th><label for="address">' . _( $item['title'] ) .'</label></th>';
				$str .= '<td>';
				$str .= '<input type="text" name="' . $item['name'] .'" ';
				$str .= 'id="' . $item['name'] . '"';
				$str .= ' value="' . esc_attr( get_the_author_meta( $item['name'], $user->ID ) ) . '" ';
				$str .= 'class="regular-text" /><br />';
				$str .= '</td>';
				$str .= '</tr>';
				}
		} 
		$str .= '</table>';
	}
	echo $str;   
}

function save_wp_bundle_address( $user_id ) {
	require_once( dirname(__FILE__) . '/data.php' );
	if ( current_user_can( 'edit_user', $user_id ) ) { 
		if ( $items = get_wp_bundle_address_data() ) {
			foreach ( $items as $item ) {
				if ( $item['display'] ) {
					$value = isset( $_POST[ $item['name'] ] ) ? esc_attr( $_POST[ $item['name'] ] ) : '';
					if ( ! empty ( $value ) ) {
						update_user_meta( $user_id, $item['name'], $value );
					}					
				}
			}
		}
	}
	else {
		return false;
	}
}
