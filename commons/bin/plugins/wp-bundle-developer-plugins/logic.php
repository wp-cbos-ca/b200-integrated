<?php

defined( 'ABSPATH' ) || exit;

function run_wp_bundle_developer_plugins(){
	
	if ( 1 && current_user_can( 'manage_options' ) ) {
		if ( function_exists( 'get_plugins' ) ) {
			$plugins = get_plugins();
			$file = ( __DIR__ . '/data/plugins.php' );
			$str = '<?php' . PHP_EOL;
			$str .= PHP_EOL;
			$str .= '$items = [ ' . PHP_EOL;
			foreach ( $plugins as $k => $plugin ){
				$str .= "\t" . '[ ' . $k . ', ';
				if ( is_plugin_active( $k ) ){
					$str .= 'active => 1, ';
				} else {
					$str .= 'active => 0, ';
				}
				$str .= '],' . PHP_EOL;
			}
			$str .= ']; '. PHP_EOL;
			
			$result = file_put_contents( $file, $str );
		}
		else {
			return false;
		}
	}
}
