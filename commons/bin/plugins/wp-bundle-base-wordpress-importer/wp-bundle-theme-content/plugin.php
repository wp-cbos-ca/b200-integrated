<?php
/*
Plugin Name: WP Bundle Theme Content
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-theme-content/
Description: WP Bundle Theme Content. Switch for wpautop filter, for example.
Author: wp.cbos.ca
Version: 2018.03.15
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

if ( defined( SITE_USE_WP_AUTO_PARA ) && ! SITE_USE_WP_AUTO_PARA ){
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );
}
//https://codex.wordpress.org/Function_Reference/wpautop
