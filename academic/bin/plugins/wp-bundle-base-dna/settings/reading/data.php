<?php

defined( 'ABSPATH' ) || exit;

function get_reading_data() {
	$items = array(
		array ( 'title' => 'Front page displays', 'option_name' => 'show_on_front', 'option_value' => 'page', 'update' => 1 ),
		array ( 'title' => 'Front page', 'option_name' => 'page_on_front', 'option_value' => 'home', 'update' => 1 ),
		array ( 'title' => 'Posts page', 'option_name' => 'page_for_posts', 'option_value' => 'blog', 'update' => 1 ),
		array ( 'title' => 'Blog pages show at most', 'option_name' => 'posts_per_page', 'option_value' => 10, 'update' => 0 ),
		array ( 'title' => 'Syndication feeds show the most recent', 'option_name' => 'posts_per_rss', 'option_value' => 10, 'update' => 0 ),
		array ( 'title' => 'For each article in a feed show', 'option_name' => 'rss_use_excerpt', 'option_value' => 1, 'update' => 0, 'desc' => '0 = Full Text; 1 = Summary' ),
		array ( 'title' => 'Search Engine Visibility', 'option_name' => 'blog_public', 'option_value' => 0, 'update' => 1 ),  
	);
	return $items;
}
