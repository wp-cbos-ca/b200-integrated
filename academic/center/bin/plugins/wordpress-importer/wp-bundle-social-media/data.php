<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_social_data() {
	$items = array( 
		array( 'name' => 'twitter', 'title' => 'Twitter', 'display' => 1 ),
		array( 'name' => 'facebook',  'title' => 'Facebook', 'display' => 1 ),
		array( 'name' => 'linkedin',  'title' => 'LinkedIn', 'display' => 1 ),
		array( 'name' => 'googleplus', 'title' => 'Google+', 'display' => 1 ),
		array( 'name' => 'instagram', 'title' => 'Instagram', 'display' => 0 ),
	);
	return $items;
}
