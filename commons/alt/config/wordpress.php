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
//define( 'UPLOADS', '..' . SITE_MEDIA_DIR );

/** Default: uploads */
//define( 'BLOGUPLOADDIR', SITE_MEDIA_DIR );

/** Default: 'latest bundled theme' Comment out to use different for local, production, etc.*/
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

/* UPDATES */

/** Default: false. (true: Disable plugin updating and deleting) */
define( 'DISALLOW_FILE_MODS', true );

/** Default: false (When true, disables plugin updating & deleting) */
define( 'WP_AUTO_UPDATE_CORE', false );

/* ACCESS */

/**
 * Block requests through the proxy. "Prevents plugins from working and core
 * functionality OR include api.wordpress.org.
 * see: core/wp-includes/class-http.php
 */

/** Default: undefined (When true, blocks external requests. Allows only site and localhost */
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

/*** WORDPRESS FINE TUNING END ***/

/*** MUST-USE (REQUIRED) PLUGINS DIR ***/

/** Default: 'wp-content/mu-plugins' (Must Use Plugin Directory *Stub*) */
define( 'MUPLUGINDIR', SITE_BIN_DIR . SITE_REQUIRED_DIR );

/** Default: 'wp-content/mu-plugins' (Must Use Plugins *Path*) */
define( 'WPMU_PLUGIN_DIR', SITE_BIN_PATH . SITE_REQUIRED_DIR ); 

/** Default: 'wp-content/mu-plugins' (Must Use Plugins URL) */
define( 'WPMU_PLUGIN_URL', WP_CONTENT_URL . SITE_REQUIRED_DIR );

/***** WORDPRESS SPECIFIC CONSTANTS END *****/
