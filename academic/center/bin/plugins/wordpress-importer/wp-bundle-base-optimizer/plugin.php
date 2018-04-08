<?php
/**
Plugin Name: WP Bundle Base Optimizer
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-base-optimizer/
Description: Removes script versions, disables emojis, disables a remote call for a gravatar on each page load, removes feed links and disables the XLM-RPC API, among others. An array switch in the plugin for finer grained tuning.
Version: 2018.03.27
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;
  
$_wp_opt = array( 
	'remove_script_version' => 1,
	'deregister_open_sans' => 1,
	'remove_emoji_scripts' => 1,
	'remove_gravatar_useage' => 1,
	'deregister_comment_reply' => 1,
	'remove_wlwmanifest_link' => 1,
	'remove_rsd_link' => 1,
	'remove_feed_links' => 1,
	'remove_feed_links_extra' => 1,
	'remove_wp_generator' => 1,
	'remove_x_pingback' => 1,
	'disable_xmlrpc' => 1,
	'deregister_jquery_ui_core' => 1, //front end
	);

if ( $_wp_opt['remove_script_version'] ) {
	function _remove_script_version( $src ){
		$arr = array( 'fonts.googleapis.com', 'maps.googleapis.com', 'analytics.aweber.com' );
		foreach ( $arr as $exclude ) {
			if ( strpos( $src, $exclude ) !== FALSE ){
				return $src;
			}
			else {
				$parts = explode( '?', $src );
				return $parts[0];
			}
		}
	}	
	add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
	add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
}

if ( $_wp_opt['deregister_open_sans'] ) {
	function deregister_open_sans() {
		if ( ! is_user_logged_in() ) {
			wp_deregister_style( 'open-sans' ) ;
			wp_deregister_style( 'twentytwelve-fonts' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'deregister_open_sans', 15 );
}

if ( $_wp_opt['remove_emoji_scripts'] ) {
	function remove_emoji_scripts() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );	
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
	add_action( 'init', 'remove_emoji_scripts' );

	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
}

if ( $_wp_opt['remove_gravatar_useage'] ) { 
	function remove_gravatar_useage ($avatar, $id_or_email, $size, $default, $alt ) {
		$default = get_template_directory_uri() .'/images/avatar.png';
		return "<img alt='{$alt}' src='{$default}' class='avatar avatar-{$size} photo avatar-default' height='{$size}' width='{$size}' />";
	}
	add_filter('get_avatar', 'remove_gravatar_useage', 1, 5 );
}
	
if ( $_wp_opt[ 'deregister_comment_reply' ] ) { 
	function deregister_comment_reply(){
		wp_deregister_script( 'comment-reply' );
	}
	add_action( 'init','deregister_comment_reply' );
}

if ( $_wp_opt['remove_wlwmanifest_link'] ) { 
	remove_action('wp_head', 'wlwmanifest_link' );
}

if ( $_wp_opt['remove_rsd_link'] ) { 
	remove_action( 'wp_head', 'rsd_link' );
}

if ( $_wp_opt['remove_feed_links'] ) { 
	remove_action( 'wp_head', 'feed_links', 2 );
}

if ( $_wp_opt['remove_feed_links_extra'] ) { 
	function remove_x_pingback( $headers ) {
		unset($headers[ 'X-Pingback' ]);
		return $headers;
	}
	remove_action( 'wp_head', 'feed_links_extra', 3 );
}

if ( $_wp_opt[ 'remove_wp_generator' ] ) { 
	remove_action( 'wp_head', 'wp_generator' );
}

if ( $_wp_opt['remove_x_pingback'] ) { 
	add_filter( 'wp_headers', 'remove_x_pingback' );
}

if ( $_wp_opt['disable_xmlrpc'] ) { 
	add_filter( 'xmlrpc_enabled', '__return_false' );
}

if ( $_wp_opt[ 'deregister_jquery_ui_core' ] ) {
	function deregister_jquery_ui_core() {		
		if ( ! is_admin() ) { 
			wp_deregister_script( 'jquery-ui-core' ); 
		}
	}
	add_action('wp_enqueue_scripts', 'deregister_jquery_ui_core', 15 );	
}

/*
https://orbitingweb.com/blog/remove-unnecessary-tags-wp-head/

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action('wp_head', 'feed_links_extra', 3 );

*/
