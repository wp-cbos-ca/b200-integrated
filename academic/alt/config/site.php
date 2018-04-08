<?php

defined( 'SITE' ) || exit;

/***** USER EDITABLE VARIABLES BEGIN *****/

/** If not defined from the directory above. We define it here */
if ( ! defined( 'SITE_DOMAIN_NAME' ) ){
	/** The second level domain of the site. This needs to be unique. */
	define( 'SITE_DOMAIN_NAME', 'academic' );
}

/** Example: 'en-CA'  Used in the HTML Page. Default Below. */
//define( 'SITE_LANG', '' );

/** Used in the browser tab and site header. Default Below. */
//define( 'SITE_TITLE', '' );

/** Tagline. Used in site header. Default Below. */
//define( 'SITE_DESCRIPTION', '' );

/** If set, overrides default below. Examples: .com, .ca, .org, .info */
//define( 'SITE_DOMAIN_EXT', '' );

/** Sub domain. Could be 'www'. */
//define( 'SITE_SUB_DOMAIN', '' );

/** Site start year. Example: Copyright: START YEAR - END YEAR. Default Below. */
//define( 'SITE_START_YEAR', '' );

/** Default: false */
//define( 'SITE_USE_ANALYTICS', false );

/** Values: UA00-0000-00 (Default: '' ) */
//define( 'SITE_ANALYTICS_ID', '' );

/** Define SITE_USE_CORE as true, if not defined already. */
if ( ! defined( 'SITE_USE_CORE' ) ){
	define( 'SITE_USE_CORE', true );
}

/***** USER EDITABLE VARIABLES END *****/

if ( ! defined( 'SITE_LANG' ) ){
	/** Default: en-CA (Used in the HTML Page) */
	define( 'SITE_LANG', 'en-CA' );
}

if ( ! defined( 'SITE_TITLE' ) ){
	/** Used in the browser tab and site header. */
	define( 'SITE_TITLE', 'Integrated Bundle: Commons' );
}
if ( ! defined( 'SITE_DESCRIPTION' ) ){	
	/** Tagline. Used in site header. */
	define( 'SITE_DESCRIPTION', 'Optimized, Backed Up, Secured and Cached' );
}

if ( ! defined( 'SITE_START_YEAR' ) ){
	/** Site start year. Example: Copyright: START YEAR - END YEAR */
	define( 'SITE_START_YEAR', '2018' );
}

/** If the root path is not defined from the root path, define it from the server variable. */
if ( ! defined( 'SITE_ROOT_PATH' ) ){
	define( 'SITE_ROOT_PATH', $_SERVER['DOCUMENT_ROOT']  );
}

/** From right to left:  Top Level Domain. (Include leading dot). */
if ( file_exists( SITE_ROOT_PATH . '/.localhost' ) ){
	
	/** Can use http:// if local. */
	define( 'SITE_PROTOCOL', 'http://' );

	/** .local if we are on a local machine */
	define( 'SITE_DOMAIN_EXT', '.local' );
}
else {
	/** Should be https if production. No override provided.*/
	define( 'SITE_PROTOCOL', 'https://' );

	/** Localized according to region emanating from. Override above. */
	if ( ! defined( 'SITE_DOMAIN_EXT') ) {
		define( 'SITE_DOMAIN_EXT', '.ca' );
	}
}

if ( ! defined( 'SITE_SUB_DOMAIN' ) ){
	/** Empty, unless otherwise noted. */
	define( 'SITE_SUB_DOMAIN', '' );
}

if ( ! defined( 'SITE_DOMAIN' ) ){
	/** Domain of the site (top, second, sub). */
	define( 'SITE_DOMAIN', SITE_SUB_DOMAIN . SITE_DOMAIN_NAME . SITE_DOMAIN_EXT );
}
	   
/** The URL to the base of the site. */
define( 'SITE_ROOT_URL', SITE_PROTOCOL . SITE_DOMAIN );

/** The URL to the base of the site. */
define( 'SITE_URL', SITE_PROTOCOL . SITE_DOMAIN );

/** May be the same as the domain. With leading forward slash. */
define( 'SITE_CACHE_SLUG', '/' . SITE_DOMAIN );

if ( ( defined( 'SITE_USE_CORE' ) && SITE_USE_CORE ) || ( defined( 'WP_ADMIN' ) && WP_ADMIN ) ) {

	if ( $_SERVER['SERVER_ADDR'] == '127.0.0.1' 
	&& file_exists( __DIR__ . '/db/local.php' ) ) {

		/** Eliminate or rename this file if on a production or staging site */
		require_once( __DIR__ . '/db/local.php' );

	/** Eliminate or rename this file if on a production site */
	} else if ( file_exists( __DIR__ . '/db/staging.php' ) ) {

		require_once( __DIR__ . '/db/staging.php' );

	/** Ensure this file is available for use on a production site. */
	} else if ( file_exists( __DIR__ . '/db/production.php' ) ) {
	
		require_once( __DIR__ . '/db/production.php' );

	}
	else {
		echo 'The database settings are not available!';
	}
	
	/** Default: InnoDB (Alt: MyISAM. InnoDB may be better) */
	define( 'DB_ENGINE', 'InnoDB' );
	
	/** Default: utf8 (Used in the Database) */
	define( 'DB_CHARSET', 'utf8' );
	
	/** Change only if needed (Ambiguous) */
	define( 'DB_COLLATE', '' );
}

/** Default: html (Used in the HTML Page) */
define( 'SITE_DOCTYPE', 'html' );

/** Default: UTF-8 (Used in the HTML Page) */
define( 'SITE_CHARSET', 'UTF-8' );

define( 'BUNDLE_VER', 'B200-WP-4.9' );
// Values: B000-AA-0.0 (Default: B200-WP-4.9)

define( 'BUNDLE_UNIQUE_ID', BUNDLE_VER . ':' . '2018.03.31:1910' );
// Bundle Version, plus date and time stamp at time of installation
		
if ( file_exists( __DIR__ . '/enhanced.php' ) ) {
	require_once( __DIR__ . '/enhanced.php' );
}
else if ( file_exists( __DIR__ . 'wp-settings.php' ) ) {
	require_once( __DIR__ . 'wp-settings.php' );
}
else {
	exit( 'Cannot serve your files. No configuration available.' );
}
