<?php
/**
Plugin Name: WP Bundle Theme Menu
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-theme-menu/
Description: Reworked menus to remove extra classes and format the HTML for improved readability. Caches the menu to disk.
Version: 2018.03.27
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

add_action( 'wp_update_nav_menu', 'wp_bundle_cache_menu_on_save' );

function wp_bundle_cache_menu_on_save( $nav_id ){
	$menu = wp_get_nav_menu_object( $nav_id );
	$str = get_wp_bundle_menu_foldable( $menu->slug );
	if ( ! empty ( $str ) && defined ( 'SITE_MENU_PATH' ) ) {
		file_put_contents( SITE_MENU_PATH . SITE_MENU_DIR . SITE_HTML_EXT,  $str );
	}
}

function get_wp_bundle_menu(){
	$str = get_wp_bundle_menu_foldable( 'top' );
	return $str;
}

function get_wp_bundle_footer_menu(){
	$str = get_wp_bundle_menu_flat( 'footer' );
	return $str;
}

function get_wp_bundle_menu_foldable( $theme_location ) {
	
	$str = "menu";
	
	//$locations = get_nav_menu_locations();
	
	if ( ( $theme_location ) && ( $locations = get_nav_menu_locations()) && isset( $locations[$theme_location] ) ) {
		
		$nav_menu = get_term( $locations[$theme_location], 'nav_menu' );
		
		$items = wp_get_nav_menu_items( $nav_menu -> term_id );
		
		$nopen = '<nav>' . PHP_EOL;
		$hopen = '<ul class="horizontal-menu">' . PHP_EOL;
		$vopen = '<ul id="more-menu" class="more-menu vertical-menu has-parent">' . PHP_EOL;
		
		$count = 0;
		$count_sub = 0;
		$submenu = false;
		$parent_id = 0;
		$num_children = 0;
		$menu = '';
		
		if ( 0 ) {
			echo '<pre>';
			var_dump( $items );
			echo '</pre>';
		}
		
		foreach( $items as $item ) {
			
			$link = $item -> url;
			
			$title = $item -> title;
			
			if ( $item -> menu_item_parent == 0 ) { 
				
				$parent_id = $item -> ID;
				
				if ( isset(  $items[ $count + 1 ] ) && $items[ $count + 1 ] -> menu_item_parent ){
				//no closing </li>!!! close it below
					$menu .= sprintf( '<li class="has-children num-children"><a href="%s">%s<b class="caret"></b></a>%s', $link, $title, PHP_EOL );
				} else {
					$menu .= sprintf( '<li><a href="%s">%s</a></li>%s', $link, $title, PHP_EOL );
					}
			}else {
				$parent_id = $item -> menu_item_parent;
			}
			
			if ( $parent_id == $item -> menu_item_parent ) {
				//sub menu here...
				if ( ! $submenu ) {
					$submenu = true;
					$menu .= '<ul class="has-parent">' . PHP_EOL;
				}
				
				$menu .= sprintf( '<li><a href="%s">%s</a></li>', $link, $title );
				$num_children++;
				$count_sub++;
				
				//end of submenu
				if ( $items[ $count + 1 ] -> menu_item_parent != $parent_id && $submenu ){
					$menu .= '</ul>' . PHP_EOL;
					$menu .= '</li>' . PHP_EOL; //close the submenu list item
					$submenu = false;
				}
			}
			
			//close the menu
			if ( ! empty ( $items ) && isset( $items[ $count + 1 ] ) && $items[ $count + 1 ] -> menu_item_parent != $parent_id ) {
				$submenu = false;
			}
			$count++;
		}
		
		$vclose = '</ul>' . PHP_EOL . '</li>' . PHP_EOL;
		$vmenu = $menu;
		$menu .= get_wp_bundle_more_link();
		$hclose = '</ul>' . PHP_EOL;
		$nclose = '</nav>' . PHP_EOL;
		$menu = str_replace( 'num-children', 'children-' . $num_children, $menu );
		$vmenu = str_replace( 'num-children', 'children-' . $num_children, $vmenu );
		$str = $nopen;
		$str .= $hopen;
		$str .= $menu;
		$str .= $vopen;
		$str .= $vmenu;
		$str .= $vclose;
		$str .= $hclose;
		$str .= $nclose;
		
		return $str;
		
	} else {
		$str = sprintf( '<!-- no menu defined in location "%s" -->%s', $theme_location, PHP_EOL );
	}
	
	return $str;
}

function get_wp_bundle_more_link() {
	
	$str = '<li class="more has-children">' . PHP_EOL;
	$str .= '<a>' . PHP_EOL;
	$str .= '<span class="more-text inline">More <b class="caret"></b></span>' . PHP_EOL;
	$str .= '<span class="menu-bar inline">' . PHP_EOL;
	$str .= '<span class="icon-bar"></span>' . PHP_EOL;
	$str .= '<span class="icon-bar"></span>' . PHP_EOL;
	$str .= '<span class="icon-bar"></span>' . PHP_EOL;
	$str .= '</span>' . PHP_EOL;
	$str .= '</a>' . PHP_EOL;
	return $str;
}

function get_wp_bundle_menu_flat( $theme_location ) {
	
	$str = '';
	
	if ( ( $theme_location ) && ( $locations = get_nav_menu_locations()) && isset( $locations[$theme_location] ) ) {
		
		$nav_menu = get_term( $locations[$theme_location], 'nav_menu' );
		
		$items = wp_get_nav_menu_items( $nav_menu -> term_id );
		
		$str = '<nav>' . PHP_EOL;
		$str .= '<ul class="horizontal-menu">' . PHP_EOL;
		
		foreach( $items as $item ) {
			
			$link = $item -> url;
			$title = $item -> title;
			$str .= sprintf( '<li><a href="%s">%s</a></li>%s', $link, $title, PHP_EOL );
			
		}
		
		$str .= '</ul>' . PHP_EOL;
		$str .= '</nav>' . PHP_EOL;
		
		return $str;
		
	} else {
		$str = sprintf( '<!-- no menu defined in location "%s" -->%s', $theme_location, PHP_EOL );
	}
	
	return $str;
}

//Adapted from: https://developer.wordpress.org/reference/functions/wp_get_nav_menu_items/#comment-832 (2018)