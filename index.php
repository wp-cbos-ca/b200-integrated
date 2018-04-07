<?php

/** Go to the commons first for directions. Do not pass go. */

/** This is used in the directory below. */
define ( 'SITE_ROOT', true );

if ( file_exists( __DIR__ . '/commons/index.php' ) ) {

	require_once( __DIR__ . '/commons/index.php' );

}

