<?php 

defined( 'SITE' ) || exit;

/***** ROOT DIRECTORY *****/

/** A "catch-all" for things in the bin dept. */
define( 'SITE_ALT_DIR', '/alt' );

/** Replaces {wp-content} */
define( 'SITE_BIN_DIR', '/bin' );

/** Status code directory. */
define( 'SITE_CODE_DIR', '/code' );

/** All configuration files. Sets constants. */
define( 'SITE_CONFIG_DIR', '/config' );

/** The platform core files (WordPress) */
define( 'SITE_CORE_DIR', '/core' );

/** Cron directory */
define( 'SITE_CRON_DIR', '/cron' );

/** For csv, xml and other open sourced data files. */
define( 'SITE_DATA_DIR', '/data' );

/** The directory where static HTML goes. */
define( 'SITE_HTML_DIR', '/html' );

/** The directory root pages go. */
define( 'SITE_ROOT_PAGE_DIR', '/root' );

/** The name of the "Center" directory. */
define( 'SITE_CENTER_DIR', '/center' );

/** Intended for static HTML content. */
define( 'SITE_PAGE_DIR', '/page' );

/** Intended for more informal updates. */
define( 'SITE_POST_DIR', '/post' );

/** Used for traditional cached files. */
define( 'SITE_CACHE_DIR', '/cache' );

/** For media: image/, pdf/, video/, audio/, etc.  */
define( 'SITE_MEDIA_DIR', '/media' );

/** For javascript. From root. */
define( 'SITE_SCRIPT_DIR', '/script' );

/***** THEME DIRECTORY *****/

/** Note the singular "theme". */
define( 'SITE_THEME_DIR', '/theme' );

/** Note the singular "theme". */
define( 'SITE_DEPT_THEME_DIR', '/theme' );

/** Header HTML */
define( 'SITE_HEADER_DIR', '/header' );

/** Menu HTML */
define( 'SITE_MENU_DIR', '/menu' );

/** Footer HTML */
define( 'SITE_FOOTER_DIR', '/footer' );

/** Sidebar HTML  */
define( 'SITE_SIDEBAR_DIR', '/sidebar' );

/***** BIN DIRECTORY (Generally) *****/

/** */
define( 'SITE_FRAMEWORK_DIR', '/frameworks' );

/** */
define( 'SITE_PLUGIN_DIR', '/plugins' );

/** As opposed to root theme directory. */
define( 'SITE_THEMES_DIR', '/themes' );

/** Default: languages  */
define( 'SITE_LANG_DIR', '/languages' );

/** Utilities **/

/** Archives are retained for historical purposes. May be a backup. */
define( 'SITE_ARCHIVE_DIR' , '/archive' );

/** Backups are "point in time". May be deleted. */
define( 'SITE_BACKUP_DIR' , '/backup' );

/** Cron */


/** Logs */
define( 'SITE_LOG_DIR', '/logs' );

// Other
/** For flexibility, with ref. to WP_CONTENT_DIR. */
define( 'SITE_DIR_CLUTCH', '/..' );

/***** BOOLEAN *****/

/** Default: false (Allows indexing by bots) */
define( 'SITE_INDEX_ALLOW', false );

/** Default: false */
define( 'SITE_USE_JQUERY', false );

/** Default: false */
define( 'SITE_USE_JAVASCRIPT', false );

/** Default: false */
define( 'SITE_USE_SIDEBAR', false );

/** Default: false */
define( 'SITE_USE_WP_HEAD', false );

/** Default: false */
define( 'SITE_USE_WP_FOOTER', false );

/** Default: true (Changes double line breaks to paragraph tags) */
define( 'SITE_USE_WP_AUTO_PARA', false );

/** Default: true (Displays code processing time in milliseconds) */
define( 'SITE_ELAPSED_TIME', true );

/***** FILES *****/

/** Default: index.html (Used for caching purposes) */
define( 'SITE_INDEX_FILE', 'index.html' );

/*** AS ABOVE, SO BELOW (CONSTANTS BELOW BASED ON THOSE ABOVE) ***/

/***** WORDPRESS SPECIFIC BEGIN *****/

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
/** Set to true to override default. Adjust as necessary. */

/*** SERVER FINE TUNING END **/

/***** WORDPRESS SPECIFIC CONSTANTS END *****/

/***** PATHS *****/

/** */
define( 'SITE_CSS_DIR', '/css' );

/** */
define( 'SITE_JS_DIR', '/js' );

/** May be the same as WP_CONTENT_DIR. */
define( 'SITE_BIN_PATH', SITE_ROOT_PATH . SITE_BIN_DIR );

/** Contains "backups", "codes", "config", "cron", and "logs". */
define( 'SITE_ALT_PATH', SITE_ROOT_PATH . SITE_BIN_DIR );
			
/** In the "bin" directory. Some plugins assume it is here. */
define( 'SITE_CACHE_PATH', SITE_BIN_PATH . SITE_CACHE_DIR );

/** Folder name used by caching plugin */
define( 'SITE_CACHE_PLUGIN', '/cache-enabler' );

/** Path to the cached root index file. */
define( 'SITE_CACHE_PATH_INDEX', SITE_CACHE_PATH . SITE_CACHE_PLUGIN . SITE_CACHE_SLUG );

/** Frameworks like Laravel, Symfony and Firefly, a lighweight alternative. */
define( 'SITE_FRAMEWORK_PATH', SITE_BIN_PATH . SITE_FRAMEWORK_DIR );

/** {themes} = WP_CONTENT_DIR . '/themes'
 Theme folder hardcoded, relative to {wp-content} */
define( 'SITE_THEMES_PATH', SITE_BIN_PATH . SITE_THEMES_DIR );

/** Stores JavaScript and jQuery. */
define( 'SITE_SCRIPT_PATH', SITE_ROOT_PATH . SITE_SCRIPT_DIR );

/**  JavaSript and jQuery files. */
define( 'SITE_JS_PATH', SITE_SCRIPT_PATH . SITE_JS_DIR );
	
/** Stores images, video, audio, pdfs, etc. */
define( 'SITE_MEDIA_PATH', SITE_ROOT_PATH . SITE_MEDIA_DIR );

/*** PAGE PATH ***/

/** HTML Path */
define( 'SITE_HTML_PATH', SITE_ROOT_PATH . SITE_DEPT_DIR . SITE_HTML_DIR );

/** Page Path */
define( 'SITE_PAGE_PATH', SITE_HTML_PATH . SITE_PAGE_DIR );

/** Article Stub */
define( 'SITE_ARTICLE_STUB', '/article' );

/** Article Stub */
define( 'SITE_HTML_EXT', '.html' );

/*** THEME PATH ***/

/** Theme Path */
define( 'SITE_THEME_PATH', SITE_ROOT_PATH . SITE_THEME_DIR );

/**
 * The HTML files need to be in the appropriate sections folder, but the
 * framework--the codeset--is in the "center" folder. This is not "normal"
 * behaviour. There needs to be some flexibility--yet some structure. We
 * want to imagine cross disciplinary interaction... to a degree.
 *
 * If we gave each department (a half dozen) for each major section (~16-18) its
 * own framework, we would have about a hundred copies of that framework. This isn't
 * efficient... and it isn't how an actual university campus is set up. But this
 * isn't how a codeset is normally set up.
 *
 * So, the picture is of diving into the "center" folder to get our bearings and
 * pick up the configuration constants that we need, while all the "static" content
 * (the HTML pages) are in the folder of the individual department. This is
 * different from otherwise.
 *
 * In addition, sub-domains are used for each individual "domain". So, the sub folder
 * level in the sub domain is actual the first folder level.
 */

/** Department Path. This is because we are drawing from directories peer to the center directory. */
define( 'SITE_DEPT_PATH', SITE_ROOT_PATH . SITE_DEPT_DIR );

/** Site Department HTML Path */
define( 'SITE_DEPT_HTML_PATH', SITE_DEPT_PATH . SITE_HTML_DIR );

/** Site Department Article Path */
define( 'SITE_DEPT_ARTICLE_PATH', SITE_DEPT_PATH . '/article' );

/** Site Department Section Path (Header, Footer, Sidebar, etc.) */
define( 'SITE_DEPT_THEME_PATH', SITE_DEPT_PATH . SITE_DEPT_THEME_DIR );

/** Site Header Path */
define( 'SITE_HEADER_PATH', SITE_DEPT_THEME_PATH . SITE_HTML_DIR . SITE_HEADER_DIR );

/** Site Footer Path */
define( 'SITE_FOOTER_PATH', SITE_DEPT_THEME_PATH . SITE_HTML_DIR . SITE_FOOTER_DIR );

/** Site Sidebar Path */
define( 'SITE_SIDEBAR_PATH', SITE_DEPT_THEME_PATH . SITE_HTML_DIR . SITE_SIDEBAR_DIR );

/** Site Menu Path */
define( 'SITE_MENU_PATH', SITE_DEPT_THEME_PATH . SITE_HTML_DIR . SITE_MENU_DIR );

/** The CSS files that style the site. */
define( 'SITE_CSS_PATH', SITE_DEPT_HTML_PATH . SITE_CSS_DIR );

/*** ALT PATH ***/

/** Backups are "point in time". May be deleted. */
define( 'SITE_BACKUP_PATH' , SITE_ALT_PATH . SITE_BACKUP_DIR );

/** Status codes such as 403, 404, 500, etc. */
define( 'SITE_CODE_PATH', SITE_ALT_PATH . SITE_CODE_DIR );

/** Where most of the site configurations are stored. */
define( 'SITE_CONFIG_PATH', SITE_ALT_PATH . SITE_CONFIG_DIR );

/** Handles server side crons. */
define( 'SITE_CRON_PATH', SITE_ALT_PATH . SITE_CRON_DIR );

/** Default: false. Shows errors if set to true. (See below for hiding these errors). */
define( 'SITE_LOG_PATH', SITE_ALT_PATH . SITE_LOG_DIR );

/***** URLS *****/

/** */
define( 'SITE_THEME_URL', SITE_ROOT_URL . SITE_THEME_DIR );

/** */
define( 'SITE_SCRIPT_URL', SITE_ROOT_URL . SITE_SCRIPT_DIR );

/** */
define( 'SITE_JS_URL', SITE_ROOT_URL . SITE_SCRIPT_DIR . SITE_JS_DIR );

/** */
define( 'SITE_CSS_URL', SITE_ROOT_URL . SITE_SCRIPT_DIR . SITE_CSS_DIR );

/** */
define( 'SITE_CDN_URL', '' );

/** Relative to ABSPATH. No leading slash. */
define( 'SITE_MEDIA_URL', SITE_ROOT_URL . SITE_MEDIA_DIR );
	
/* BUNDLE SPECIFIC CONSTANTS */

/**Values: true|false (Default: N/A) */
define( 'BUNDLE_THIS', true );

/* SELF_IDENTITY */

/** Defines this as a WordPress installation. */
define( 'WP_THIS', true );

/** Unique ID for this WordPress installation. */
define( 'WP_UNIQUE_ID', md5( SITE_ROOT_URL ) );

/** Default: false (Develop first, then turn on) */
// define( 'SITE_CACHING', false );

// We may develop a different caching solution, but will use this for now:

/** Load remaining files, if they exist */

if ( file_exists( __DIR__ . '/plugins.php' ) ) {
	require_once( __DIR__ . '/plugins.php' );
}

if ( file_exists( __DIR__ . '/debug.php' ) ) {
	require_once( __DIR__ . '/debug.php' );
}
