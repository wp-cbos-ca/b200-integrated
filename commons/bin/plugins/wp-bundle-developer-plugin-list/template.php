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
		$str .= sprintf( '<h1>%s</h1>%s', $items['title'], PHP_EOL );
		$str .= sprintf( '<p>%s</p>%s', $items['desc'], PHP_EOL );
		$str .= '<p><form action="" method="post">';
		$str .= wp_nonce_field( 'print-plugins', 'print-plugins', true, false );
		if ( 1 ){
			$str .= '<p><button class="button button-primary" ';
			$str .= sprintf( 'name="plugins-list">%s</button></p>', $items['print_plugins'], PHP_EOL );
			}
		if ( 1 ){
			$str .= '<p><button class="button button-primary" ';
			$str .= sprintf( 'name="plugins-activate-all">%s</button>', $items['activate_all'], PHP_EOL );
		}
		if ( 1 ){
			$str .= '&nbsp;&nbsp;&nbsp;';
			$str .= '<button class="button button-primary" ';
			$str .= sprintf( 'name="plugins-deactivate-all">%s</button></p>', $items['deactivate_all'], PHP_EOL );
		}
		if ( 1 ){
			$str .= '<p><button class="button button-primary" ';
			$str .= sprintf( 'name="plugins-activate-select">%s</button></p>', $items['activate_select'], PHP_EOL );
		}
		$str .= '</form></p>';
		$str .= '<p>' . $msg . '</p>' . PHP_EOL;
		$str .= $items['footer'];
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
