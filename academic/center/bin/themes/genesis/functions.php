<?php
/**
 * Genesis Framework
 * @package Genesis
 * @author StudioPress
 * @license GPL-2.0+
 * @link http://my.studiopress.com/themes/genesis/
 */

/**
 * Note:
 * 
 * The init file has been placed here: /bin/frameworks/genesis/lib/init.php
 * This is so the framework can act as a framework and be independent of the theme.
 * 
 * Calls the init.php file, but only if the child theme hasn't called it first.
 *
 * This method allows the child theme to load
 * the framework so it can use the framework
 * components immediately.
 */

if ( defined( 'SITE_FRAMEWORK_PATH' ) ){
	if ( file_exists( SITE_FRAMEWORK_PATH . '/genesis/lib/init.php' ) ){
		require_once( SITE_FRAMEWORK_PATH . '/genesis/lib/init.php' );
	}
	else {
		error_log( 'Genesis Framework init file not available.' );
	}
}
else {
	error_log( 'Site Framework Path not available');
}
