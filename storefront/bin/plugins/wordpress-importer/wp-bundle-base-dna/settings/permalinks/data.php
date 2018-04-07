<?php

defined( 'ABSPATH' ) || exit;

function get_permalinks_data() {
	$items = array(
		array ( 'title' => 'Common Settings', 'option_name' => 'permalink_structure', 'option_value' => '/%postname%/', 'update' => 1 ),
		array ( 'title' => 'Category Base', 'option_name' => '', 'option_value' => '', 'update' => 0  ),
		array ( 'title' => 'Tag Base', 'option_name' => 'tag_base', 'option_value' => '', 'update' => 0  ),
	);
	return $items;
}
