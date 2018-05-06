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

function get_wp_bundle_plugins_form_data(){
	$items = array(
		'title' => 'WP Bundle Developer Plugins',
		'desc' => 'Creates a file with a list of plugins and active/inactive status.<br />Default is to leave active status unchanged when printing.',
		'print_plugins' => 'Print Plugins',
		'activate_all' => 'Activate All',
		'deactivate_all' => 'Deactivate All',
		'activate_select' => 'Activate Select',
		'help' => '',
		'footer' => '<p>"Activate Select" will activate only the plugins selected in the <code>data/activate.php</code> file (copy manually from the <code>data/printed.php</code> file created by this plugin.</p> <p><small>Do not use on a production site.<br />Delete after use.</small></p>',
	);
	return $items;
}

