<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_exclude_site_map_pages(){
	$items = array( 
		array( 'title' => 'Site Map', 'exclude' => 1 ),
		);
	return $items;
}

function get_wp_bundle_site_map_data(){
	$items = array(
		'authors'	  => '',
		'child_of'	 => 0,
		'date_format'  => get_option('date_format'),
		'depth'		=> 0,
		'echo'		 => 0,
		'exclude'	  => get_exclude_site_map_page_ids(),
		'include'	  => '',
		'link_after'   => '',
		'link_before'  => '',
		'post_type'	=> 'page',
		'post_status'  => 'publish',
		'show_date'	=> '',
		'sort_column'  => 'post_title',
		'sort_order'   => 'ASC',
		'title_li'	 => __(''), 
		'walker'	   => new Walker_Page
	);
	return $items;
}
