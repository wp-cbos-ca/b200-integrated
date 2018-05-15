<?php

defined( 'ABSPATH' ) || exit;

function get_menus_data() {
	$items = array (
		array (
			'name' => 'Header Menu', 'slug' => 'header-menu', 'build' => 1,
			'items' => array (
				array ( 'title' => 'Home', 'slug' => '', 'build' => 1 ), //slug should be empty
				array ( 'title' => 'Catalog', 'slug' => 'catalog', 'build' => 1 ),
				array ( 'title' => 'Shipping', 'slug' => 'shipping', 'build' => 1 ),
				array ( 'title' => 'Contact', 'slug' => 'contact', 'build' => 1 ),
				),
		),
		array (
			'name' => 'Cart', 'slug' => 'cart', 'build' => 0,
			'items' => array (
				array ( 'title' => 'My Account', 'slug' => 'my-account', 'build' => 1 ),
				array ( 'title' => 'Cart', 'slug' => 'cart', 'build' => 1 ),
				),
			),
		array (
			'name' => 'Footer Menu', 'slug' => 'footer-menu', 'build' => 0,
			'items' => array (
				array ( 'title' => 'About', 'slug' => 'about', 'build' => 1 ),
				array ( 'title' => 'Terms and Conditions', 'slug' => 'terms', 'build' => 1 ),
				array ( 'title' => 'Privacy Policy', 'slug' => 'privacy', 'build' => 1 ),
				array ( 'title' => 'Site Map', 'slug' => 'site-map', 'build' => 1 ),
				),
			),
	);
	return $items;
}
