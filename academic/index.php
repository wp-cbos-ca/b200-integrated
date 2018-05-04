<?php

/** Set a constant for security. Use it to ensure files are not accessed directly. */
define( 'SITE', true );

/** Set a timer to measure performance. */
global $site_elapsed;

/** Store the starting time to four decimal places in seconds (float) */
$site_elapsed['start'] = microtime( true );

/** Record the path we are in, for later. */
define( 'SITE_PATH', __DIR__ );

/** Record which directory we are in, for later. */
define( 'SITE_DIR', '/' . basename(__DIR__) );

if ( $_SERVER['REQUEST_URI'] == '/' ) {
	/* If we are in the root directory (of the sub domain), use the "center" directory. */
	define( 'SITE_DEPT_DIR', '/center' );
} else {
	/* Else, use the folder we are in, which is leftmost in the URI requested. */ 
	define( 'SITE_DEPT_DIR', substr( $_SERVER['REQUEST_URI'], 0, strpos( $_SERVER['REQUEST_URI'], '/', 1 ) ) );
}

/* To assist in cross disciplinary interaction. */
global $department;
$department['mathematics'] = '/mathematics';
$department['chemistry'] = '/chemistry';
$department['cognition'] = '/cognition';
$department['genetics'] = '/genetics';
$department['geology'] = '/geology';
$department['physics'] = '/physics';
$department['logic'] = '/logic';

/** Use this directory as the domain name. Comment out if not. */
define( 'SITE_DOMAIN_NAME', basename(__DIR__) );

/** Use the core, if available. Start by using only if needed. */
define( 'SITE_USE_CORE', false );

/** Use the core to handle requests or not. Default is true. */
define( 'SITE_USE_CORE_POST', true );

/** Use the alternative framework, if available. */
define( 'SITE_USE_ALT', true );

/** Use the core if we have decided to. If we have decided to for a request and if it is there. */

/** [ true && ( true: ALWAYS ) ][ ( true && ( false||* ): SOMETIMES ][ false && (*): NEVER ) ] */
if 	( 	SITE_USE_CORE && ( SITE_USE_CORE_POST
		|| ( ! empty( $_GET ) || $_SERVER['REQUEST_METHOD'] === 'POST' )
		&& file_exists( __DIR__ . '/center/core/index.php' ) ) )  {

	require_once( __DIR__ . '/center/core/index.php' );

}
/** If the core is not used, use an alternate framework, if it is available. */
else if ( SITE_USE_ALT && file_exists( __DIR__ . '/center/alt/framework/index.php' ) ) {

	require_once( __DIR__ . '/center/alt/framework/index.php' );
	
}
/** Otherwise, look for a plain text index.html file and serve that. */
else if ( file_exists( __DIR__ . "/index.html" ) ){
	
	echo file_get_contents( __DIR__ . '/index.html' );
	
}
/** If not, bail and ask for help. */
else {
	
	echo "<div style='font:16px/1.6 sans-serif;text-align:center;'><br>'";
	echo "Nothing here.</div>" . PHP_EOL;
	
}
