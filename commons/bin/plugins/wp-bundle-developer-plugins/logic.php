<?php

defined( 'ABSPATH' ) || exit;

if ( 1 ) {
	get_wp_bundle_plugins();
}

function get_wp_bundle_plugins(){
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
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

/*
<?php
$items = array( 
[ backupwordpress/backupwordpress.php, active => 0 ],

"
*/