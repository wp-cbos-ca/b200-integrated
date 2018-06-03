<?php

/***** WORDPRESS SPECIFIC CONSTANTS BEGIN *****/

/** Uncomment only if using https. Default: false  */
// define( 'FORCE_SSL_ADMIN', true );

/** Example: https://www.example.ca (The URL of your domain) */
define( 'WP_HOME', SITE_ROOT_URL );

/** Where the core WordPress files reside, relative to site root. */
define( 'WP_SITEURL', SITE_ROOT_URL . SITE_CORE_DIR );

/** Default: post (Other examples: "books", "cars" or "spaceships") */
define( 'WP_POST_TYPE', 'post' );

/** A "Catch All" for everything "not core". A path, not a directory */
define( 'WP_CONTENT_DIR', SITE_ROOT_PATH . SITE_BIN_DIR );

/** Absolute path based on location of this file. */
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . SITE_PLUGIN_DIR );

/** Absolute path based on location of this file. A path, not a directory */
define( 'WP_LANG_DIR', WP_CONTENT_DIR . SITE_LANG_DIR );

/** Important if different than default. */
define( 'WP_CONTENT_URL', SITE_ROOT_URL . SITE_BIN_DIR );

/** Important if different than default. */
define( 'WP_PLUGIN_URL', WP_CONTENT_URL . SITE_PLUGIN_DIR );

/** Default: uploads */
define( 'UPLOADS', '..' . SITE_MEDIA_DIR );

/** Default: 'latest bundled theme' */
// define( 'WP_DEFAULT_THEME', 'twentyseventeen' );

/** Useful constants that can't be overriden */

/** Parent theme (wp-includes/default-constants.php) */
// 'TEMPLATEPATH' : get_template_directory();

/** Child theme (wp-includes/default-constants.php)  */
// 'STYLESHEETPATH' : get_stylesheet_directory();

/*** WORDPRESS FINE TUNING BEGIN ***/

/* FILE MANAGEMENT */

/**Values: true|false|int (Default: true)
//Maximum amount post revisions stored. If true, no limit? */
define( 'WP_POST_REVISIONS', 5 );

/** Values 0.. Default: 60)(seconds) */
define( 'AUTOSAVE_INTERVAL', 180 );

/** Default: false (Overwrites image edits) */
define( 'IMAGE_EDIT_OVERWRITE', true );

/** Default: 30 */
define( 'EMPTY_TRASH_DAYS', 30 );

/* SECURITY */

/** Default: false */
define( 'DISALLOW_UNFILTERED_HTML', true );

/** Default: false (true: Disable plugin and theme file editing) */
define( 'DISALLOW_FILE_EDIT', true );

/** Default: false. (true: Disable plugin updating and deleting) */
define( 'DISALLOW_FILE_MODS', true );

/** Default: false (When true, disables plugin updating & deleting) */
define( 'WP_AUTO_UPDATE_CORE', false );

/**
 * Block requests through the proxy.
 *
 * Those who are behind a proxy and want to prevent access to certain hosts may do so. This will
 * prevent plugins from working and core functionality, if you don't include api.wordpress.org.
 *
* You block external URL requests by defining WP_HTTP_BLOCK_EXTERNAL as true in your wp-config.php
* file and this will only allow localhost and your site to make requests. The constant
* WP_ACCESSIBLE_HOSTS will allow additional hosts to go through for requests. The format of the
* WP_ACCESSIBLE_HOSTS constant is a comma separated list of hostnames to allow, wildcard domains
* are supported, eg *.wordpress.org will allow for all subdomains of wordpress.org to be contacted.
*
* see: core/wp-includes/class-http.php
*/

/** Default: undefined (When true, blocks external requests */
// define( 'WP_HTTP_BLOCK_EXTERNAL', true );

/** Default: undefined  (a comma seperated list of allowable hostnames) */
// define( 'WP_ACCESSIBLE_HOSTS', 'api.wordpress.org' );

/* OPTIMIZATION */

/** Default: false (Disable virtual cron for better performance)
// Set up server side cron for automatic backups (for example) */
define( 'DISABLE_WP_CRON', true );

/** Default: 60 (seconds). */
define( 'WP_CRON_LOCK_TIMEOUT', 60 );

/* MEMORY */

/** Default: 40M */
define( 'WP_MEMORY_LIMIT', '40M' );

/** Last Default: 256M */
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

// From wp-includes.php/default-constants.php

/*** WORDPRESS FINE TUNING END ***/

/*** OTHER BEGIN ***/

/** Default: 'wp-content/mu-plugins' (Must Use Plugin Directory) */
define( 'MUPLUGINDIR', SITE_BIN_DIR . '/required' );

/** Default: 'wp-content/mu-plugins' (Must Use Plugins Directory) */
define( 'WPMU_PLUGIN_DIR', SITE_BIN_PATH . '/required' ); 

/** Default: 'wp-content/mu-plugins' (Must Use Plugins URL) */
define( 'WPMU_PLUGIN_URL', WP_CONTENT_URL . '/required' );


/*** OTHER END ***/

/***** WORDPRESS SPECIFIC CONSTANTS END *****/