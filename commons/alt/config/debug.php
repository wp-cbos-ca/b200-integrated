<?php

( defined( 'SITE' ) || defined( 'WP_ADMIN' ) ) || exit;

// Rename this file to turn WordPress debug mode OFF.

if ( ! defined( 'WP_DEBUG' ) ) {
	
	define( 'WP_DEBUG', true );
	// Default: false. Shows errors if set to true. (See below for hiding these errors).
		
	if ( WP_DEBUG ) {
		
		define( 'WP_DEBUG_DISPLAY', false );
		// WordPress default true. Bundle default: false.
		// Note: Don't display bugs to the public.
		
		define( 'WP_DEBUG_LOG', false );
		// Default value: true. Default location: {wp-content/}debug.log.
		
		define( 'SCRIPT_DEBUG', false );
		// Default: false (check). Uses development versions of core CSS and JS Files.
		
		// SITE SPECIFIC VALUES
		define( 'SITE_DEBUG_LOG', true );
		// Put debug.log in the /logs directory. Makes it easier to find.
		
		if ( SITE_DEBUG_LOG ) {
			ini_set( 'log_errors', 1 );
			ini_set( 'error_log', SITE_LOG_PATH . '/debug.log' );
		}
		// Don't set both WP_DEBUG_LOG and SITE_DEBUG_LOG to the same value.
	}
}
