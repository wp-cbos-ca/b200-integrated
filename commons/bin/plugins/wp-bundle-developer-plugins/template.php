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
		if ( 1 ){
			$str .= '<p><form action="" method="post">';
			$str .= sprintf('<button class="button button-primary" name="print-plugins">%s</button>', $items['button_text'], PHP_EOL );
			$str .= wp_nonce_field( 'print-plugins', 'print-plugins', true, false );
			$str .= '</form></p>';
		}
		if ( 1 ){
			$str .= '<p><form action="" method="post">';
			$str .= sprintf('<button class="button button-primary" name="plugins-activate">%s</button>', $items['activate_text'], PHP_EOL );
			$str .= wp_nonce_field( 'plugins-activate', 'plugins-activate', true, false );
			$str .= '</form></p>';
		}
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
	if ( ! empty( $_POST ) ) {
	if ( isset( $_POST['print-plugins'] ) && check_admin_referer( 'print-plugins', 'print-plugins' ) ) {
		$msg = wp_bundle_developer_plugins_print();
		return $msg;
	}
	else if ( isset( $_POST['plugins-activate'] ) && check_admin_referer( 'plugins-activate', 'plugins-activate' ) ) {
		$msg = wp_bundle_developer_plugins_activate();
		return $msg;
	}
	}else {
		return false;
	}
}

function get_wp_bundle_plugins_form_data(){
	$items = array(
		'title' => 'Run WP Bundle Developer Plugins',
		'desc' => 'Creates a file with a list of plugins and associated data: active, folder size, and number of files.',
		'button_text' => 'Create File',
		'activate_text' => 'Activate Plugins',
		'help' => '',
	);
	return $items;
}

function get_wp_bundle_developer_plugins_footer(){
	$str = '<p><small>Do not use on a production site.<br />Delete after use.</small></p>';
	return $str;
}
