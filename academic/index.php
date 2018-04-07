<?php

/** Global variable to capture elapsed time */
global $site_elapsed;

/** Start time to four decimal places in seconds (float) */
$site_elapsed['start'] = microtime( true );

/** Default: false (Load core|minimal) */
define( 'SITE_USE_CORE', false );

/** The directory in which this file resides. Prefixed with a forward slash. */
define( 'SITE_DIR', '/' . basename(__DIR__) );

//|| $_SERVER['REQUEST_METHOD'] === 'POST' 

if ( file_exists( __DIR__ . '/core/index.php' ) && ( SITE_USE_CORE ) ) {

	require_once( __DIR__ . '/core/index.php' );
}
else if ( file_exists( __DIR__ . '/alt/framework/index.php' ) ) {

	require_once( __DIR__ . '/alt/framework/index.php' );
	
} else if ( file_exists( __DIR__ . "/index.html" ) ){

	header( "Location: " . __DIR__ . "/index.html" );
	exit;
	
} else {
	
	echo "<div style='font:16px/1.6 sans-serif;text-align:center;'><br>'";
	echo "Nothing here.</div>" . PHP_EOL;
}
