<?php

defined( 'ABSPATH' ) || exit;

function get_menus_data() {
	$items = array (
		array (
			'name' => 'Header Menu', 'slug' => 'header-menu', 'build' => 1,
			'items' => array (
				array ( 'title' => 'Home', 'slug' => '', 'build' => 1 ), //slug should be empty
				array ( 'title' => 'Blog', 'slug' => 'blog', 'build' => 1 ),
				array ( 'title' => 'About', 'slug' => 'about', 'build' => 1 ),
				array ( 'title' => 'Contact', 'slug' => 'contact', 'build' => 1 ),
				),
		),
		array (
			'name' => 'Footer Menu', 'slug' => 'footer-menu', 'build' => 1,
			'items' => array (
				array ( 'title' => 'Terms', 'slug' => 'terms', 'build' => 1 ),
				array ( 'title' => 'Privacy', 'slug' => 'privacy', 'build' => 1 ),
				array ( 'title' => 'Contact', 'slug' => 'contact', 'build' => 1 ),
				),
			),
	);
	return $items;
}
