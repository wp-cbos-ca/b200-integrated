<?php

defined( 'ABSPATH' ) || exit;

function run_wp_bundle_developer_plugins(){
	
	if ( 1 && current_user_can( 'manage_options' ) ) {
		if ( function_exists( 'get_plugins' ) ) {
			$plugins = get_plugins();
			$switch = get_wp_bundle_developer_plugins_switch();
			$file = ( __DIR__ . '/data/printed.php' );
			$str = '<?php' . PHP_EOL;
			$str .= PHP_EOL;
			$str .= 'defined( \'ABSPATH\' ) || exit;' . PHP_EOL;
			$str .= PHP_EOL;
			$str .= 'function get_wp_bundle_developer_plugins_data() {' . PHP_EOL;
			$str .= PHP_EOL;
			$str .= "\t" . '$items = [ ' . PHP_EOL;
			foreach ( $plugins as $k => $plugin ){
				$str .= "\t\t" . '[ \'plugin\' => \'' . $k . '\', ';
				if ( is_plugin_active( $k ) && $switch['keep'] ){
					$str .= '\'active\' => 1, ';
				} else {
					$str .= '\'active\' => 0, ';
				}
				$str .= '],' . PHP_EOL;
			}
			$str .= "\t" . ']; '. PHP_EOL;
			$str .= '};'. PHP_EOL;
			$result = file_put_contents( $file, $str );
		}
		else {
			return false;
		}
	}
}

function wp_bundle_developer_plugins_activate( $plugins ){
	require_once( dirname(__FILE__) . '/data/plugins.php' );
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

