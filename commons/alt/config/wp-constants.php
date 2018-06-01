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

/** Must use Plugin Directory URL */
define( 'WPMU_PLUGIN_URL', SITE_ROOT_URL . SITE_BIN_DIR . 'mu-' . SITE_PLUGIN_DIR );

/** Important if different than default. */
define( 'WP_CONTENT_URL', SITE_ROOT_URL . SITE_BIN_DIR );

/** Important if different than default. */
define( 'WP_PLUGIN_URL', WP_CONTENT_URL . SITE_PLUGIN_DIR );

/** Default: uploads */
define( 'UPLOADS', '..' . SITE_MEDIA_DIR );

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

/***** WORDPRESS SPECIFIC CONSTANTS END *****/