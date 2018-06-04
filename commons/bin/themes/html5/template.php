<?php

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'SITE_DOCTYPE' ) ) {
	define( 'SITE_DOCTYPE', 'html' );
}

if ( ! defined( 'SITE_LANG' ) ) {
	define( 'SITE_LANG', 'en-CA' );
}

if ( ! defined( 'SITE_CHARSET' ) ) {
	define( 'SITE_CHARSET', 'UTF-8' );
}

// Hook and Crate Method: The first function is the "hook".

function get_html5_page( $post = '' ){
	global $post;
	$str = get_html5_head( $post );
	$str .= get_html5_header( $post );
	$str .= get_html5_article( $post );
	$str .= get_html5_aside( $post );
	$str .= get_html5_footer( $post );
	return $str;
}

function get_html5_head( $post = '' ){
	global $post;
	$switch = get_html5_theme_switch();
	$str = '';
	$str .= sprintf( '<!DOCTYPE %s>%s', SITE_DOCTYPE, PHP_EOL );
	$str .= sprintf( '<html lang="%s">%s', SITE_LANG, PHP_EOL );
	$str .= '<head>' . PHP_EOL;
	$str .= sprintf( '<meta charset="%s" />%s', SITE_CHARSET, PHP_EOL );
	if ( defined ( 'SITE_INDEX_ALLOW' ) && ! SITE_INDEX_ALLOW ) {
		$str .= '<meta name="robots" content="noindex,nofollow" />' . PHP_EOL;
	}
	$title = get_html5_page_title( $post );
	$str .= sprintf( '<title>%s</title>%s', $title, PHP_EOL );
	$str .= '<link rel="stylesheet" href="/theme/css/style.css">' . PHP_EOL;
	$str .= '</head>' . PHP_EOL;
	$str .= sprintf( '<body%s>%s', get_html5_body_class( $switch ), PHP_EOL );
	$str .= $switch['wrap'] ? '<div class="wrap">' : '';
	return $str;
}

function get_html5_page_title( $post = '' ){
	global $post;
	if( $post -> post_name == 'front-page' ) {
		$title = get_bloginfo( 'name' );
	}
	else {
		$title = $post -> post_title;
	}
	return $title;
}

function get_html5_header( $post = '' ){
	global $post;
	if ( file_exists( dirname(__FILE__) .  '/html/header.html' ) ) {
		$file = dirname(__FILE__) .  '/html/header.html';
		$str = '<header class="site-header">' . PHP_EOL;
		$str .= file_get_contents( $file );
		$str .= get_html5_primary_nav( $post );
		$str .= '</header>' . PHP_EOL;
		return $str;
	}
	else {
		return '<!-- N/A -->';
	}
}

function get_html5_primary_nav( $post = '' ){
	$str = '';
	if ( function_exists( 'get_wp_bundle_primary_menu' ) ) {
		$str .= get_wp_bundle_primary_menu();
		return $str;
	} else if ( file_exists( dirname(__FILE__) .  '/html/menus/primary.html' ) ) {
		$str .= file_get_contents( dirname(__FILE__) .  '/html/menus/primary.html'  );
		return $str;
	}
	else {
		return '<!-- Menu not available -->' . PHP_EOL;
	}
}

function get_html5_body_class( $switch ){
	$arr[] = $switch['aside'] ? 'aside' : '';
	if ( ! empty ( $arr ) && ! empty( $arr[0] ) ){
		$str = ' class="' . join( ' ', $arr ) . '"';
		return $str;
	}
	else {
		return false;
	}
}

function get_html5_footer( $post = '' ){
	$switch = get_html5_theme_switch();
	$str = '';
	if  ( $switch['footer'] ){
		$str .= '<footer class="site-footer">' . PHP_EOL;
		$str .= '<div class="inner">' . PHP_EOL;
		$str .= get_html5_footer_inner();
		$str .= '</footer>' . PHP_EOL;
	}
	$str .= $switch['wrap'] ? '</div>' : '';
	if( defined( 'SITE_USE_JQUERY' ) && SITE_USE_JQUERY ) {
		$str .= '<script src="/script/js/jquery-latest.min.js" defer></script>' . PHP_EOL;
	}
	if( defined( 'SITE_USE_JAVASCRIPT' ) && SITE_USE_JAVASCRIPT ) {
		$str .= '<script src="/script/js/javascript.js" defer></script>';
	}
	$str .= '</body>' . PHP_EOL;
	$str .= '</html>';
	return $str;
}

/** Get elapsed formatted time in milliseconds */
function get_html5_microtime(){
	global $site_elapsed;
	$site_elapsed['end'] = microtime( true );

	$str .= SITE_ELAPSED_TIME ? sprintf( '<div id="elapsed-time" class="subdued text-center" title="Time (in milliseconds) to process the underlying code from when the request reaches the server to just before it leaves the server. Lower numbers are better.">Elapsed: %s ms</div>%s', number_format( ( $site_elapsed['end'] - $site_elapsed['start'] ) * 1000, 2, '.', ',' ) , PHP_EOL ) : '';
return $str;
}

function get_html5_footer_inner( $post = '' ){
	
	$str = get_html5_footer_copyright();
	$str .= get_html5_footer_menu();
	$str .= get_html5_footer_credits();
	$str .= get_html5_footer_social();
	return $str;
}

function get_html5_aside( $post = '' ){
	if ( is_active_sidebar( 'aside' ) ) {
		ob_start();
		dynamic_sidebar( 'aside' );
		$str = ob_get_clean();
		return $str;
	}
	else {
		return false;
	}
}

function get_html5_footer_copyright( $post = '' ){
	if ( is_active_sidebar( 'footer-copyright' ) ) {
		ob_start();
		dynamic_sidebar( 'footer-copyright' );
		$str = ob_get_clean();
		return $str;
	}
	else {
		return false;
	}
}

function get_html5_footer_menu( $post = '' ){
	if ( is_active_sidebar( 'footer-menu' ) ) {
		if ( function_exists( 'get_bundle_footer_menu' ) ) {
			$str = get_bundle_footer_menu();
			return $str;
		} else {
			return '<!-- Not available -->' . PHP_EOL;
		}
	}
	else {
		return false;
	}
}

function get_html5_footer_credits( $post = '' ){
	if ( is_active_sidebar( 'footer-credits' ) ) {
		ob_start();
		dynamic_sidebar( 'footer-credits' );
		$str = ob_get_clean();
		return $str;
	}
	else {
		return false;
	}
}

function get_html5_footer_social( $post = '' ){
	if ( is_active_sidebar( 'footer-social' ) ) {
		ob_start();
		dynamic_sidebar( 'footer-social' );
		$str = ob_get_clean();
		return $str;
	}
	else {
		return false;
	}
}

function get_html5_article( $post = '' ){
	global $post;
	$str = '<article>' . PHP_EOL;
	$str .= ! $post -> post_name == 'front-page' ? sprintf('<h1>%s</h1>', $post -> post_title ) : '';
	$html = wpautop( $post -> post_content );
	$str .= do_shortcode( $html, true );
	$str .= sprintf( '<footer>Last Updated: %s</footer>%s', $post -> post_modified, PHP_EOL );
	$str .= '</article>' . PHP_EOL;
	$str = str_replace( "\r\n", '', $str );
	return $str;
}

add_filter( 'body_class', 'aside' );

//$classes = apply_filters( 'body_class', $classes, 'aside' );
//post-template.php:570 get_body_classes();
