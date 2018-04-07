<?php

/* WordPress Configuration */

if ( $_SERVER['SERVER_ADDR'] == '127.0.0.1' ) {
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );
	define( 'SITE_DIR_STUB', '' );
	define( 'SITE_ROOT_URL', '' );
	$table_prefix  = 'change_';
}
else {
	define( 'DB_NAME', '' );
	define( 'DB_USER', '' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );
	define( 'SITE_DIR_STUB', '' );
	define( 'SITE_ROOT_URL', '' );
	$table_prefix  = 'change_';
}
// localhost || online

define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );
// Don't touch, unless very good reason to do so.

/**#@+
 * Authentication Unique Keys and Salts. Generate from:
 * 
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 *
 * Change to force a re-login, or when changing from development to production.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

$table_prefix  = 'change_';
// Database prefix. Change to make more secure.

// The following is a subset from the Integrated Bundle Package.

/* GENERIC CONSTANTS BEGIN */

define( 'SITE_ROOT_URL', '' );
//

define( 'SITE_ROOT_PATH', $_SERVER['DOCUMENT_ROOT'] );
//

define( 'SITE_BIN_DIR', '/wp-content' );
//

define( 'SITE_PLUGIN_DIR', '/plugins' );
//

define( 'SITE_LANG_DIR', '/languages' );
//

define( 'SITE_MEDIA_DIR', '/uploads' );
//

/* GENERIC CONSTANTS END */

/* WORDPRESS SPECIFIC CONSTANTS BEGIN */

define( 'WP_HOME', SITE_ROOT_URL );
// What people expect to see when they visit your domain.
// SITE_ROOT_URL defined in wp-config.php.

define( 'WP_SITEURL', SITE_ROOT_URL . SITE_CORE_DIR );
// Where core WordPress files reside, relative to site root.

define( 'WP_POST_TYPE', 'post' );
// Change the default internal "feel" to "books", "cars" or "spaceships".
// Values: string (Default: post)

define( 'WP_CONTENT_DIR', SITE_ROOT_PATH . SITE_BIN_DIR );
// Default: '/path/../wp-content' (A path, not a directory).

define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . SITE_PLUGIN_DIR );
// Default: '/plugins'

define( 'WP_LANG_DIR', WP_CONTENT_DIR . SITE_LANG_DIR );
// Default: '/plugins'

define( 'WP_CONTENT_URL', SITE_ROOT_URL . SITE_BIN_DIR );
//

define( 'WP_PLUGIN_URL', SITE_ROOT_URL . SITE_PLUGIN_DIR );
//

define( 'UPLOADS', '..' . SITE_MEDIA_DIR );
//

//define( 'FORCE_SSL_ADMIN', true );
// Uncomment only if using https. Default: false

/*** WORDPRESS FINE TUNING BEGIN ***/

/* FILE MANAGEMENT */

define( 'WP_POST_REVISIONS', 5 );
//Values: true|false|int (Default: true)
//Maximum amount post revisions stored. If true, no limit?

define( 'AUTOSAVE_INTERVAL', 180 );
//Values 0.. Default: 60)(seconds)

define( 'IMAGE_EDIT_OVERWRITE', true );
//Overwrites image edits (for cleaner folders)
//Values: true|false  (Default: false)

define( 'EMPTY_TRASH_DAYS', 30 );
// Default: 30

/* SECURITY */

define( 'DISALLOW_UNFILTERED_HTML', true );
// Values: true|false (Default: false)

define( 'DISALLOW_FILE_EDIT', true );
// Removes ability to edit files from admin.
// Values: true|false (Default: true)

define( 'DISALLOW_FILE_MODS', true );
// Disables plugin updating from admin.
// Values: true|false (Default: false)

define( 'WP_AUTO_UPDATE_CORE', false );
// Values: true|false|minor (Default: true)

/* OPTIMIZATION */

define( 'DISABLE_WP_CRON', true );
// WordPress uses a virtual cron, set for every page load.
// Disable and use server side cron to improve performance.

define( 'WP_CRON_LOCK_TIMEOUT', 60 );
// Default: 60 (seconds).

/* MEMORY */

define( 'WP_MEMORY_LIMIT', '40M' );
// Default: 40M

define( 'WP_MAX_MEMORY_LIMIT', '256M' );
// Last Default: 256M

define( 'WP_DEFAULT_THEME', 'twentyseventeen' );
// Default for new sites and fallback. Default: twentysixteen

// From wp-includes.php/default-constants.php

/*** WORDPRESS FINE TUNING END ***/

/*** SERVER FINE TUNING BEGIN **/

/* FILE UPLOAD SIZE */

if ( false ) {
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );
}
// Set to true to override default. Adjust as necessary.

define( 'WP_DEBUG', false );
// Default: false. Shows errors if set to true. (See below for hiding these errors).

define( 'SITE_LOG_PATH', WP_CONTENT_DIR . '/logs' );
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
	
	// Note: WordPress specific constants are set in wp-includes/default-constants.php
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
