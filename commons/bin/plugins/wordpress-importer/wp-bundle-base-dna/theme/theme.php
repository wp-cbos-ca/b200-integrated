<?php

defined( 'ABSPATH' ) || exit;

function configure_theme_plugins(){
	require_once( dirname(__FILE__) . '/data.php' );
	$plugins = get_plugin_theme_data();
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
