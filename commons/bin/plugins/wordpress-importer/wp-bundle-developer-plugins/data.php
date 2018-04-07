<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_maintenance_plugins_data(){
	$items = array( 
		array ( 
			'display' => 1,
			'category' => 'optimization', 
			'title' => 'P3 (Plugin Performance Profiler)', 
			'name' => 'p3-profiler', 
			'uri' => 'https://wordpress.org/plugins/p3-profiler/', 
			'notes' => '',			 
		),
		array( 
			'display' => 1,
			'category' => 'optimization', 
			'title' => 'Image Cleanup', 
			'name' => 'image-cleanup', 
			'uri' => 'https://wordpress.org/plugins/image-cleanup/', 
			'details' => 'image+cleanup',
			'notes' => 'DB and file backup recommended.', 
			),
		array( 
			'display' => 1,
			'category' => 'optimization', 
			'title' => 'WP-Sweep', 
			'name' => 'wp-sweep', 
			'uri' => 'https://wordpress.org/plugins/wp-sweep/', 
			'notes' => 'DB backup recommended.', 
			),
		array( 
			'display' => 1,
			'category' => 'optimization', 
			'title' => 'WP Smush', 
			'name' => 'wp-smushit', 
			'uri' => 'https://wordpress.org/plugins/wp-smushit/', 
			'notes' => 'DB and file backup suggested.',
			),		
		);
		return $items;
}

