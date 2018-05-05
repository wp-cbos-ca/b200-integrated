<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_plugins_html() {
	if ( current_user_can( 'manage_options' ) )  {
		if ( $msg = check_wp_bundle_developer_plugins() ) { }
		else {
			$msg = "";
		}
		
		$items = get_wp_bundle_plugins_form_data();
		
		$str = '<div class="wrap" style="width: 50%;">';
		$str .= sprintf('<h1>%s</h1>%s', $items['title'], PHP_EOL );
		$str .= sprintf( '<p>%s</p>%s', $items['desc'], PHP_EOL );
		$str .= '<form action="" method="post">';
		$str .= sprintf('<button class="button button-secondary" name="site-installer" >%s</button>', $items['button_text'], PHP_EOL );
		$str .= wp_nonce_field( 'developer-plugins', 'developer-plugins' );
		$str .= '</form>';
		$str .= '<p>' . $msg . '</p>';
		$str .= '</div>';
		return $str;
	}
	else {
		exit( 'Insufficient permission' );
	}
}

function the_wp_bundle_developer_plugins_html() {
	echo the_wp_bundle_developer_plugins_html();
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
		'desc' => 'See plugin file for more information.',
		'button_text' => 'Run',
		'help' => '',
	);
	return $items;
}

