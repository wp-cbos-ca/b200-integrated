<?php

defined( 'ABSPATH' ) || exit;

function wp_bundle_developer_plugins_print(){
	if ( 1 && current_user_can( 'manage_options' ) ) {
		if ( function_exists( 'get_plugins' ) ) {
			$plugins = get_plugins();
			$switch = get_wp_bundle_developer_plugins_print_switch();
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
				if ( is_plugin_active( $k ) && $switch['leave_unchanged'] ){
					$str .= '\'active\' => 1, ';
				} else if ( $switch['all_active'] ) {
					$str .= '\'active\' => 1, ';
				}
				else if ( $switch['all_inactive'] ) {
					$str .= '\'active\' => 0, ';
				}
				else {
					$str .= '\'active\' => 0, ';
				}
				$str .= '],' . PHP_EOL;
			}
			$str .= "\t" . ']; '. PHP_EOL;
			$str .= "\t" . 'return $items;' . PHP_EOL;
			$str .= '};'. PHP_EOL;
			$result = file_put_contents( $file, $str );
		}
		else {
			return false;
		}
	}
}

function wp_bundle_developer_plugins_activate( $type = 0 ){
	require_once( __DIR__ . '/data/activate.php' );
	$plugins = get_wp_bundle_developer_plugins_data();
	if ( ! empty ( $plugins ) )  {
		$self = 'wp-bundle-developer-plugins/plugin.php';
		foreach ( $plugins as $plugin ) {
			$file = WP_PLUGIN_DIR . '/' . $plugin['plugin'];
			if ( $type == 0 && $plugin['plugin'] !== $self ) {
				deactivate_plugins( $file );
			}
			else if ( $type == 1 && $plugin['plugin'] !== $self ) {
				activate_plugin( $file );
			}
			else if ( $type == 2 && $plugin['active'] ) {
				activate_plugin( $file );
			}
			else if ( $type == 2 && is_plugin_active( $plugin['plugin'] ) ){
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

function check_wp_bundle_developer_plugins() {
	if ( ! empty( $_POST ) ) {
		if ( check_admin_referer( 'print-plugins', 'print-plugins' ) ) {
			if ( isset( $_POST['plugins-list'] ) )  {
				$msg = wp_bundle_developer_plugins_print();
				return $msg;
			}
			else if ( isset( $_POST['plugins-deactivate-all'] ) ) {
				$msg = wp_bundle_developer_plugins_activate( 0 );
				return $msg;
			}
			else if ( isset( $_POST['plugins-activate-all'] ) ) {
				$msg = wp_bundle_developer_plugins_activate( 1 );
				return $msg;
			}
			else if ( isset( $_POST['plugins-activate-select'] ) ) {
				$msg = wp_bundle_developer_plugins_activate( 2);
				return $msg;
			}
		} else {
				return false;
		}
	}
}
