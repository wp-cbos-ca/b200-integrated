<?php

defined( 'ABSPATH' ) || exit;

if ( 0 ) {
	get_wp_bundle_plugins();
}

function get_wp_bundle_plugins(){

	if ( ! function_exists( 'get_plugins' ) ) {
		
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
		
		$plugins = get_plugins();
		
		$file = (__DIR__ . '/data/plugins.php' );
		
		$str = '<?php' . PHP_EOL;

		$str .= PHP_EOL;
		
		$str .= '$items = array( ' . PHP_EOL;
		
		foreach ( $plugins as $k => $plugin ){
			
			$str .= "\t" . '[ ' . $k . ', ';
			
			if ( is_plugin_active( $k ) ){
			
				$str .= 'active => 1, ';
			
			} else {
			
				$str .= 'active => 0, ';
			}
			
			$str .= '],' . PHP_EOL;
		}
		$str .= ' ); '. PHP_EOL;
		var_dump( $file );
		$result = file_put_contents( $file, $str );
		var_dump( $result );
	}
	else {
		return false;
	}
}

/*
<?php
$items = array( 
[ backupwordpress/backupwordpress.php, active => 0 ],

"
*/