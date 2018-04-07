<?php

/** Default: false */
define( 'WP_CACHE', true );

if ( file_exists( __DIR__ . '/../alt/config/site.php' ) ) {

	require_once( __DIR__ . '/../alt/config/site.php' );
}
else {
	echo "Please check the path to the config file.";
}

// The rest can be found in the file referenced above.

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
