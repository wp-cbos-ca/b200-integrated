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
	require_once( __DIR__ . '/data/active.php' );
	$plugins = get_wp_bundle_developer_plugins_data();
	if ( ! empty ( $plugins ) )  {
		$self = 'wp-bundle-developer-plugins/plugin.php';
		foreach ( $plugins as $plugin ) {
			$file = WP_PLUGIN_DIR . '/' . $plugin['plugin'];
			if ( $plugin['active'] ) {
				activate_plugin( $file );
			}
			else if ( is_plugin_active( $plugin['plugin'] ) ){
				if ( $plugin['plugin'] !== $self ) {
					deactivate_plugins( $file );
				}
			}
			else {
				//do nothing;
			}
		}
	}
}

