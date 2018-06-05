<?php

defined( 'ABSPATH' ) || exit;

function get_media_data() {
	if ( defined( 'SITE_MEDIA_PATH' ) && defined( 'SITE_MEDIA_URL' ) ){
		$uploads['path']['text'] = SITE_MEDIA_PATH;
		$uploads['url']['text'] = SITE_MEDIA_URL;
		$uploads['path']['update'] = 1;
		$uploads['url']['text'] = 1;
	}
	else {
		$uploads['path']['text'] = '';
		$uploads['url']['text'] = '';
		$uploads['path']['update'] = 0;
		$uploads['url']['text'] = 0;
	}
	$items = array(
		array ( 'title' => 'Thumbnail size width', 'option_name' => 'thumbnail_size_w', 'option_value' => 150, 'update' => 1 ),
		array ( 'title' => 'Thumbnail size height', 'option_name' => 'thumbnail_size_h', 'option_value' => 9999, 'update' => 1 ),
		array ( 'title' => 'Crop thumbnail to exact dimensions', 'option_name' => 'thumbnail_crop', 'option_value' => 0, 'update' => 1 ),
		array ( 'title' => 'Medium size width', 'option_name' => 'medium_size_w', 'option_value' => 300, 'update' => 1 ),
		array ( 'title' => 'Medium size height', 'option_name' => 'medium_size_h', 'option_value' => 9999, 'update' => 1 ),
		array ( 'title' => 'Large size width', 'option_name' => 'large_size_w', 'option_value' => 400, 'update' => 1 ),
		array ( 'title' => 'Large size height', 'option_name' => 'large_size_h', 'option_value' => 9999, 'update' => 1 ),
		array ( 'title' => 'Month/year based folders', 'option_name' => 'uploads_use_yearmonth_folders', 'option_value' => 1, 'update' => 1 ),
		array ( 'title' => 'Uploads Path', 'option_name' => 'uploads_path', 'option_value' => $uploads['path']['text'], 'update' => $uploads['path']['update'] ),
		array ( 'title' => 'Uploads URL Path', 'option_name' => 'uploads_url_path', 'option_value' => $uploads['url']['text'], 'update' => $uploads['url']['update'] ),
	);
	return $items;
}
