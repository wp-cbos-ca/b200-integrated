<?php
/**
Plugin Name: WP Bundle Social Media
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-social-media/
Description: Adds social fields to the user profile. Call with shortcode: [social-media]. Makes use of Genericons. Does not display empty fields. Lightly styled.
Version: 2018.03.10
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

add_action( 'show_user_profile', 'wp_bundle_user_social_media', 1 );
add_action( 'edit_user_profile', 'wp_bundle_user_social_media', 1 );
add_action( 'personal_options_update', 'save_wp_bundle_social_media' );
add_action( 'edit_user_profile_update', 'save_wp_bundle_social_media' );

function wp_bundle_social_media( $args ){
	require_once( dirname(__FILE__) . '/template.php' );	
	$str = get_social_media_html( $args );
	return $str;
}			
add_shortcode( 'social', 'wp_bundle_social_media' );

function enqueue_wp_bundle_social_scripts() {
	wp_enqueue_style( 'genericons', plugin_dir_url(__FILE__) . 'css/genericons.css', array() );
	wp_enqueue_style( 'social-media', plugin_dir_url(__FILE__) . 'css/style.css' );	
}
add_action( 'wp_enqueue_scripts', 'enqueue_wp_bundle_social_scripts', 30 );

function wp_bundle_user_social_media( $user ) { 
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_wp_bundle_social_data(); 
	if ( $items ) { 
		$str = '<h3>' .  _("Social Media" ) . '</h3>';
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

function save_wp_bundle_social_media( $user_id ) {
	require_once( dirname(__FILE__) . '/data.php' );
	if ( current_user_can( 'edit_user', $user_id ) ) { 
		if ( $items = get_wp_bundle_social_data() ) {
			foreach ( $items as $item ) {
				if ( $item['display'] ) {
					$value = isset( $_POST[ $item['name'] ] ) ? esc_attr( $_POST[ $item['name'] ] ) : '';
					if ( ! empty ( $value )) {
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
