<?php

defined( 'ABSPATH' ) || exit;

/**
 * In order:
 * leave_unchanged
 * all_active
 * all_inactive
 * Leave unchanged takes precedence.
 */
function get_wp_bundle_developer_plugins_print_switch(){
	$items = [ 
		'leave_unchanged' => 1,
		'all_active' => 0,
		'all_inactive' => 1,
	];
	return $items;
}
