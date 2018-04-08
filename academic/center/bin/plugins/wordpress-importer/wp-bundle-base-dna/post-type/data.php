<?php

defined( 'ABSPATH' ) || exit;

function get_post_type_data(){
	$items = array ( 
		1 => array ( 
			'build' => 1, 'post_title' => 'Post Type 01', 'post_name' => 'post-type-01', 'template' => '',
			'post_content' => '',
		),
		2 => array ( 
			'build' => 1, 'post_title' => 'Post Type 02', 'post_name' => 'post-type-02', 'template' => '', 
			'post_content' => '',
		),
		3 => array ( 
			'build' => 1, 'post_title' => 'Post Type 03', 'post_name' => 'post-type-03', 'template' => '',
			'post_content' => '',
		),
		4 => array ( 
			'build' => 1, 'post_title' => 'Post Type 04', 'post_name' => 'post-type-04', 'template' => '',
			'post_content' => '',
		) 
	);
	return $items;
 }
