<?php

/** Used as a check to ensure files are being called correctly */
define( 'FIREFLY', true );

if ( defined( 'SITE_PATH' ) ) {
	
	if ( file_exists ( SITE_PATH . '/center/alt/config/site.php' ) ){
	
		require_once( SITE_PATH . '/center/alt/config/site.php' );
	}
	else {
		exit( 'Please check the path to the config file.' );
	}
	
	require_once( __DIR__ . '/firefly/engine.php' );
	
	echo get_firefly_html();
	
} else {
	
	exit( 'The SITE_PATH needs to be set in the index.php file in the root directory of this site.' );

}