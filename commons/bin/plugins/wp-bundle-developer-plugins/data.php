<?php

defined( 'ABSPATH' ) || exit;

/**
 * all_active and all_inactive must be
 * the inverse of the other for it to work.
 */
function get_wp_bundle_developer_plugins_switch(){
	$items = [ 
		'leave_unchanged' => 0,
		'all_active' => 0,
		'all_inactive' => 1,
	];
	return $items;
}
