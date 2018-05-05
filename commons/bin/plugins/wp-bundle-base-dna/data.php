<?php

defined( 'ABSPATH' ) || exit;

function get_installer_run_data(){
	$items = array(
		'site_one'  => array ( 'run' => 1, 'ran' => 0 ),
		'site_two'  => array ( 'run' => 0, 'ran' => 0 ),
		'settings'  => array ( 'run' => 0, 'ran' => 0 ),
		'content'   => array ( 'run' => 0, 'ran' => 0 ),
		'images'	=> array ( 'run' => 0, 'ran' => 0 ),
		'sorting'   => array ( 'run' => 0, 'ran' => 0 ),
	);
	return $items;
}

function get_site_one_data(){
	$items = array(
		array( 'name' => 'https',		 'run' => 0, 'ran' => 0 ),
		array( 'name' => 'dashboard',	 'run' => 0, 'ran' => 0 ),
		array( 'name' => 'themes',		'run' => 0, 'ran' => 0 ),
		array( 'name' => 'theme',		 'run' => 0, 'ran' => 0 ),
		array( 'name' => 'plugins',	   'run' => 1, 'ran' => 0 ),
		array( 'name' => 'users',		 'run' => 0, 'ran' => 0 ),
	);
	return $items;
}

function get_site_two_data(){
	$items = array(
		array( 'name' => 'clean',		   'run' => 1, 'ran' => 0 ),
		array( 'name' => 'menus',		   'run' => 1, 'ran' => 0 ),
		array( 'name' => 'menu-locations',  'run' => 1, 'ran' => 0 ),
		array( 'name' => 'widgets',		 'run' => 1, 'ran' => 0 ),
		);
	return $items;
}

function get_settings_data() {
	$items = array(
		array( 'name' => 'general',	 'run' => 1, 'ran' => 0 ),
		array( 'name' => 'writing',	 'run' => 1, 'ran' => 0 ),
		array( 'name' => 'reading',	 'run' => 1, 'ran' => 0 ),
		array( 'name' => 'discussion',  'run' => 1, 'ran' => 0 ),
		array( 'name' => 'media',	   'run' => 1, 'ran' => 0 ),
		array( 'name' => 'permalinks',  'run' => 1, 'ran' => 0 ),
		array( 'name' => 'timezone',	'run' => 1, 'ran' => 0 ),
	);
	return $items;
}

function get_content_data(){
	$items = array(
		array( 'name' => 'pages',		   'run' => 1, 'ran' => 0 ),
		array( 'name' => 'page-block',	  'run' => 0, 'ran' => 0 ),
		array( 'name' => 'posts',		   'run' => 1, 'ran' => 0 ),
		array( 'name' => 'post-block',	  'run' => 0, 'ran' => 0 ),
		array( 'name' => 'post-type',	   'run' => 0, 'ran' => 0 ),
		array( 'name' => 'post-type-block', 'run' => 0, 'ran' => 0 ),
	);
	return $items;
}

function get_image_data(){
	$items = array(
		array( 'name' => 'images',		  'run' => 1, 'ran' => 0 ),
	);
	return $items;
}

function get_sorting_data(){
	$items = array(
		array( 'name' => 'categories',			  'run' => 1, 'ran' => 0 ),
		array( 'name' => 'categories-assign',	   'run' => 1, 'ran' => 0 ),
		array( 'name' => 'tags',					'run' => 1, 'ran' => 0 ),
		array( 'name' => 'tags-assign',			 'run' => 1, 'ran' => 0 ),
	);
	return $items;
}
