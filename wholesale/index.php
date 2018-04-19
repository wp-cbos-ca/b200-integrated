<?php

/** Global variable to capture elapsed time */
global $site_elapsed;

/** Start time to four decimal places in seconds (float) */
$site_elapsed['start'] = microtime( true );

/** The name of the directory in which this file resides */
define( 'SITE_SUB_DOMAIN', basename(__DIR__) );

/** The name of the directory in which this file resides */
define( 'SITE_DIR_SLUG', '/' . basename(__DIR__) );

/** Default: false (Load core|minimal) */
define( 'SITE_USE_CORE', false );

if ( file_exists( __DIR__ . '/core/index.php' ) && ( SITE_USE_CORE || 
	$_SERVER['REQUEST_METHOD'] === 'POST' ) ) {
	
	require_once( __DIR__ . '/core/index.php' );
	
}
else if ( file_exists( __DIR__ . '/alt/framework/index.php' ) ) {

	require_once( __DIR__ . '/alt/framework/index.php' ); 
	
} else {
	header( "Location: " . SITE_DIR_SLUG . "/index.html" );
	exit;
}
