<?php

/** Used as a check to ensure files are being called correctly */
define( 'FIREFLY', true );

/** Set this according to the configs available below */
define( 'SITE_PRODUCTION', true );

if ( ! defined( 'SITE_ROOT_PATH' ) ){
	define( 'SITE_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] . SITE_DIR );
}

if ( file_exists ( SITE_ROOT_PATH . '/alt/config/site.php' ) ){
	require_once( SITE_ROOT_PATH . '/alt/config/site.php' );
}
else {
	echo "Please check the path to the config file";
}
require_once( __DIR__ . '/firefly/engine.php' );

echo get_firefly_html();