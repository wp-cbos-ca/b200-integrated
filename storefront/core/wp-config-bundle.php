<?php

/** Default: false */
define( 'WP_CACHE', true );

if ( file_exists( __DIR__ . '/../bin/alt/config/config-site.php' ) ) {
	require_once( __DIR__ . '/../bin/alt/config/config-site.php' );
}
else {
	echo "Please check the path to the config file.";
}

// The rest can be found in the file referenced above.

// Copy this file to /core/wp-config.php as is for use with the Integrated Bundle Package.
