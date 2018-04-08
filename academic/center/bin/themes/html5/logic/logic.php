<?php

defined( 'ABSPATH' ) || exit;

function get_bundle_css_url(){
	$str = 'N/A';
	if ( defined( 'SITE_USE_CDN' ) && SITE_USE_CDN ) {
		if ( defined( 'SITE_CDN_URL' ) ) {
			$url = SITE_CSS_IS_MIN ? SITE_CDN_URL . SITE_CSS_FILE_MIN : SITE_CDN_URL . SITE_CSS_FILE_MIN;
			$str = printf( '<link rel="stylesheet" href="%s">', $url );
		} else {
			$cdn_css_url = SITE_CSS_IS_MIN ? SITE_ROOT_URL . SITE_CSS_FILE_MIN : SITE_ROOT_URL . SITE_CSS_FILE_MIN;
			$str = sprintf( '<link rel="stylesheet" href="%s">', $url );
		}
	} else {
		$str = sprintf( '<link rel="stylesheet" href="%s">', '/theme/css/style.css' );
	}
	return $str;
}
