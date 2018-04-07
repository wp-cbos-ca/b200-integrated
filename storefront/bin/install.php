<?php

//Can override default install functionality

defined( 'ABSPATH' ) || exit;
 
function activate_wp_bundle_base_dna(){
	$plugin = array( 'folder' => 'wp-bundle-base-dna', 'file' => 'plugin.php', 'activate' => 1 );
	$file = WP_PLUGIN_DIR  . '/' .  $plugin['folder'] . '/' . $plugin['file'];
	if ( file_exists( $file ) ) {
		if ( $plugin['activate'] ) {
			activate_plugin( $file );
		}
	}
}
