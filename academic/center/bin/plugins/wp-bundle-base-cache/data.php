<?php 

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_cache_data() {
	$items = [
		'root-pages' => [ 'about', 'contact', 'update', 'news', 'blog' ],
	];
	return $items;
}
