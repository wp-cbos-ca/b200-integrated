<?php

defined( 'ABSPATH' ) || exit;

function configure_plugins(){
	require_once( dirname(__FILE__) . '/data.php' );
	$plugins = get_plugins_data();
	if ( ! empty ( $plugins ) )  {
		foreach ( $plugins as $plugin ) {
			$file = WP_PLUGIN_DIR  . '/' .  $plugin['folder'] . '/' . $plugin['file'];
			if ( file_exists( $file ) ) {
				if ( $plugin['activate'] ) {
					if ( ( $plugin['local'] && is_localhost() ) || ( $plugin['online'] && ! is_localhost() ) ) {
						activate_plugin( $file );
						if ( isset( $plugin['configure'] ) && $plugin['configure'] && isset( $plugin['settings'] ) ) {
							foreach ( $plugin['settings'] as $setting ) {
								update_option( $setting['option_name'], $setting['option_value'] );
							}
						}
					}
				}
			}
		}
	}
}

function wp_bundle_dna_activate_plugins(){
	require_once( __DIR__ . '/activate.php' );
	$plugins = get_wp_bundle_dna_plugins_data();
	if ( ! empty ( $plugins ) )  {
		$self = 'wp-bundle-base-dna-plugins/plugin.php';
		foreach ( $plugins as $plugin ) {
			$file = WP_PLUGIN_DIR . '/' . $plugin['plugin'];
			if ( ! is_plugin_active( $plugin['plugin'] ) && $plugin['active'] ) {
				activate_plugin( $file );
			}
		}
	}
}
