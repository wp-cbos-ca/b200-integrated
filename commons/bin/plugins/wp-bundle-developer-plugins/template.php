<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_developer_plugins_html() {
	if ( current_user_can( 'manage_options' ) )  {
		if ( $msg = check_wp_bundle_developer_plugins() ) { }
		else {
			$msg = "";
		}
		
		$items = get_wp_bundle_plugins_form_data();
		
		$str = '<div class="wrap">';
		$str .= sprintf( '<p>%s</p>%s', $items['desc'], PHP_EOL );
		$str .= '<form action="" method="post">';
		$str .= sprintf('<button class="button button-primary" name="developer-plugins">%s</button>', $items['button_text'], PHP_EOL );
		$str .= wp_nonce_field( 'developer-plugins', 'developer-plugins', true, false );
		$str .= '</form>';
		$str .= '<p>' . $msg . '</p>' . PHP_EOL;
		$str .= get_wp_bundle_developer_plugins_footer();
		$str .= '</div>';
		return $str;
	}
	else {
		exit( 'Insufficient permission' );
	}
}

function the_wp_bundle_developer_plugins_html() {
	echo get_wp_bundle_developer_plugins_html();
}
	
function check_wp_bundle_developer_plugins() {
	if ( ! empty( $_POST ) && check_admin_referer( 'developer-plugins', 'developer-plugins' ) ) {
		$msg = run_wp_bundle_developer_plugins();
		return $msg;
	}
	else {
		return false;
	}
}

function get_wp_bundle_plugins_form_data(){
	$items = array(
		'title' => 'Run WP Bundle Developer Plugins',
		'desc' => 'Creates a file with a list of plugins and associated data: active, folder size, and number of files.',
		'button_text' => 'Run',
		'help' => '',
	);
	return $items;
}

function get_wp_bundle_developer_plugins_footer(){
	$str = '<p><small>Do not use on a production site.<br />Delete after use.</small></p>';
	return $str;
}
