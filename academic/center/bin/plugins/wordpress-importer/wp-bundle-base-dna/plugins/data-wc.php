<?php

defined( 'ABSPATH' ) || exit;

function get_plugins_data() {
	$items = array (
		array ( 
		'name' => 'Advanced Woo Search', 'folder' => 'advanced-woo-search', 'file' => 'plugin.php', 
			'activate' => 1, 'local' => 1, 'online' => 1,
			'status' => 'OK',
		),
		array (
		'name' => 'Alphabet Listing', 'folder' => 'alphabet-listing', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'Gravity Forms', 'folder' => 'gravity-forms', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'Regenerate Thumbnails', 'folder' => 'regenerate-thumbnails', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'Seedprod Coming Soon Page Pro', 'folder' => 'seedprod-coming-soon-page-pro', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'Simple Page Ordering', 'folder' => 'simple-page-ordering', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle Store API', 'folder' => 'store-api', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'Sucuri Security', 'folder' => 'sucuri-security', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'Testimonial Rotator', 'folder' => 'testimonial-rotator', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle Developer', 'folder' => 'wp-bundle-developer', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Developer Plugins', 'folder' => 'wp-bundle-developer-plugins', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle Base Security', 'folder' => 'wp-bundle-base-security', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1, 
		'status' => 'N/A',
		),
	); 
	return $items;
}
