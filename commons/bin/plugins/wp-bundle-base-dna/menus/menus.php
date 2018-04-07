<?php

defined( 'ABSPATH' ) || exit;

function install_menus() {
	require_once dirname( __FILE__) . '/data.php';
	$menus = get_menus_data();
	if ( ! empty ( $menus ) ) foreach ( $menus as $menu ) {
		if ( $menu['build'] ) {
			$menu_id = create_nav_menu( $menu );
			add_items_to_menu( $menu_id, $menu['slug'], $menu['items'] );
		}
	}
}
	
function create_nav_menu( $menu ) {
	if ( $exists = wp_get_nav_menu_object( $menu['name'] ) ) {
		$menu_id = $exists -> term_id;
		  if ( empty ( $menu_id ) ) {
			$menu_id = wp_create_nav_menu( $menu['name'] );
		} 
	}
	else {
		$menu_id = wp_create_nav_menu( $menu['name'] );
	}
	return $menu_id;
}

function add_items_to_menu( $menu_id, $slug, $items ) {
	if ( $items ) foreach ( $items as $item ) {
		if ( $item['build'] ) {
			$slug = ( $item['title'] == 'Home' ) ? 'home' : $item['slug'];
			if ( ! menu_item_exists( $slug, $menu_id ) ) {
				wp_update_nav_menu_item( $menu_id, 0, array (
					'menu-item-title' =>  __( $item['title'] ),
					'menu-item-classes' => '',
					'menu-item-url' => home_url( $item['slug'] . '/' ), 
					'menu-item-status' => 'publish'
					) );
			}
		}
	}
}

function menu_item_exists( $slug, $menu_id ) {
	$args = array(
		'order'				  => 'ASC',
		'orderby'				=> 'menu_order',
		'post_type'			  => 'nav_menu_item',
		'post_status'			=> 'publish',
		'output'				 => ARRAY_A,
		'output_key'			 => 'menu_order',
		'nopaging'			   => true,
		'update_post_term_cache' => false ); 
	
	$existing = wp_get_nav_menu_items( $menu_id, $args );
	$found = false;
	foreach ( $existing as $exists ) {
		if( strpos( $exists->post_name, $slug ) !== FALSE  ) {  //pretty good search (not exact).
			$found = true;
			break;
		}
	 
	}
	return $found;
}
