<?php

defined( 'ABSPATH' ) || exit;

function get_social_media_html( $args='' ){
	require_once( dirname(__FILE__) . '/data.php' );
	$items = get_social_data();
	if ( ! empty( $items ) ) {
		$str = '<ul class="social-media">' . PHP_EOL;
		foreach ( $items as $item ) {		
			if ( $item['display'] ) {
				$url = get_user_meta( get_admin_id_social(), $item['name'], true );
				if ( ! empty( $url ) ) {
					$str .= sprintf( '<li><a class="genericon genericon-%s" href="%s" title="%s"></a></li>%s',  $item['name'], $url, $item['title'], PHP_EOL );
				}
			}
		}
		$str .= '</ul>' . PHP_EOL;
		return $str;
	}	
	else {
		return false;
	}
}

function get_admin_id_social(){
	$email = get_option( 'admin_email' );
	$user = get_user_by( 'email', $email );
	$user_id = $user->ID;
	return $user_id;
}
