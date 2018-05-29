<?php
/*
Plugin Name:    2D Community
Plugin URI:     http://wp.cbos.ca/plugins/2d-community/
Description:    2D Community Design.
Version:        2018.02.03
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || exit;

add_shortcode( 'two-dee-community', 'get_2d_community' );

function get_2d_community(){
	require_once( __DIR__ . '/data/role/role-1.php' );
	require_once( __DIR__ . '/template.php' );

	$html = '';
	
	echo get_2d_community_css();
	$str = get_2d_community_html();
	return $str;
}
