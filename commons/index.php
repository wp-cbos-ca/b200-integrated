<?php

/** Set a timer to measure performance. */
global $site_elapsed;

/** Store the starting time to four decimal places in seconds (float) */
$site_elapsed['start'] = microtime( true );

/** Record which directory we are in, for later. */
define( 'SITE_DIR', '/' . basename(__DIR__) );

/** Decide if we should use the core. We will start without it and add it if needed. */
define( 'SITE_USE_CORE', true );

/** Use the core to handle requests or not. Default is true. */
define( 'SITE_USE_CORE_POST', true );

/** Use the core if we have decided to. If we have decided to for a request and if it is there. */
if 	( SITE_USE_CORE
	 && SITE_USE_CORE_POST && (
		! empty( $_GET )
		|| $_SERVER['REQUEST_METHOD'] === 'POST' )
		&& file_exists( __DIR__ . '/core/index.php' ) )  {

	require_once( __DIR__ . '/core/index.php' );
	
}
/** If the core is not used, use an alternate framework, if it is available. */
else if ( file_exists( __DIR__ . '/alt/framework/index.php' ) ) {

	require_once( __DIR__ . '/alt/framework/index.php' );
	
}
/** Otherwise, look for a plain text index.html file and serve that. */
else if ( file_exists( __DIR__ . "/index.html" ) ){

	header( "Location: " . __DIR__ . "/index.html" );
	exit;
	
}
/** If not, bail and ask for help. */
else {
	
	echo "<div style='font:16px/1.6 sans-serif;text-align:center;'><br>'";
	echo "Nothing here.</div>" . PHP_EOL;
	
}
