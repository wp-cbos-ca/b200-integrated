<?php

/** Go to the commons first for directions. Do not pass go. */

/** This is used in the directory below. */
define ( 'SITE_USE_COMMONS', false );

if ( SITE_USE_COMMONS && file_exists( __DIR__ . '/commons/index.php' ) ) {

	require_once( __DIR__ . '/commons/index.php' );

}
/** Otherwise, look for a plain text index.html file and serve that. */
else if ( file_exists( __DIR__ . '/index.html' ) ){

	echo file_get_contents( __DIR__ . '/index.html' );
	
}
/** If not, bail and ask for help. */
else {
	
	echo "<div style='font:16px/1.6 sans-serif;text-align:center;'><br>'";
	echo "Nothing here.</div>" . PHP_EOL;
	
}
