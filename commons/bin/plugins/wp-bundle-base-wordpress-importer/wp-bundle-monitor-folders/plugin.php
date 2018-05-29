<?php
/**
Plugin Name: WP Bundle Monitor Folders
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-monitor-folders/
Description: Monitors folder sizes for the total install, the wp-content and uploads dirs and a count of active and inactive plugins.
Version: 2018.03.17
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+

Credit: http://wordpress.stackexchange.com/users/23888/nils-chr-svihus
*/

defined( 'ABSPATH' ) || exit;

add_action( 'wp_dashboard_setup', 'wp_bundle_statistics' );

function wp_bundle_statistics() {
	if( current_user_can( 'install_plugins' ) ) {
		wp_add_dashboard_widget( 'wp_bundle_statistics', __( 'WP Bundle Statistics' ), 'wp_bundle_add_dashboard_statistics' );
	}
}
function wp_bundle_add_dashboard_statistics() {
	//Three column table for more statistics, as needed.
	$upload_dir	 = wp_upload_dir();
	$upload_space   = wp_bundle_folder_size( $upload_dir['basedir'] );
	$content_space  = wp_bundle_folder_size( WP_CONTENT_DIR );
	$wp_space	   = wp_bundle_folder_size( ABSPATH );
	$plugins_count = wp_bundle_get_active_inactive_plugins_count();
	$str = '<table style="width: 100%;">' . PHP_EOL;
	$str .= '<tr><td style="width: 33%;"></td><td style="width: 33%;"></td><td style="width: 33%;"></td></tr>' . PHP_EOL;
	$str .= '<tr>' . PHP_EOL;
	$str .=  sprintf( '<td>Total Install: %s</td>%s', wp_bundle_format_size( $wp_space ), PHP_EOL );
	$str .=  sprintf( '<td>Active Plugins: %s</td>%s', $plugins_count['active'], PHP_EOL );
	$str .= '<td>&nbsp;</td>' . PHP_EOL;
	$str .= '</tr>' . PHP_EOL;
	$str .= '<tr>' . PHP_EOL;
	$str .= sprintf( '<td>wp-content: %s</td>%s', wp_bundle_format_size( $content_space ), PHP_EOL );
	$str .=  sprintf( '<td>Inactive Plugins: %s</td>%s', $plugins_count['inactive'], PHP_EOL );
	$str .= '<td>&nbsp;</td>' . PHP_EOL;
	$str .= '</tr>' . PHP_EOL;
	$str .= sprintf( '<tr><td>Uploads: %s</td>%s', wp_bundle_format_size( $upload_space ), PHP_EOL );
	$str .= '<td>&nbsp;</td>' . PHP_EOL;
	$str .= '<td>&nbsp;</td>' . PHP_EOL;
	$str .= '</tr>' . PHP_EOL;
	$str .= '</table>' . PHP_EOL;
	echo $str;
}

function wp_bundle_folder_size( $path ) {
	$total_size = 0;
	$files = scandir( $path );
	$path = rtrim( $path, '/' ) . '/';
	foreach( $files as $t ) {
		if ( '.' != $t && '..' != $t ) {
			$file = $path . $t;
			if ( is_dir( $file ) ) {
				$size = wp_folder_size( $file );
				$total_size += $size;
			}
 			else {
 				$size = filesize( $file );
				$total_size += $size;
			}
		}
	}
	return $total_size;
}

function wp_bundle_format_size( $size ) {
	$units = explode( ' ', 'B KB MB GB TB PB' );
	$mod = 1024;
	for ( $i = 0; $size > $mod; $i++ ) {
		$size /= $mod;
	}
	$end_index = strpos( $size, "." ) + 3;
	return substr( $size, 0, $end_index ) . ' ' . $units[$i];
}

function wp_bundle_get_active_inactive_plugins_count(){
	$plugins_all = get_plugins();
	$plugins_active = wp_get_active_and_valid_plugins();
	$count['all'] = count( $plugins_all );
	$count['active'] = count( $plugins_active );
	$count['inactive'] = $count['all'] - $count['active'];
	return $count;
}
