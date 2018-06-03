<?php

( defined( 'SITE' ) || defined( 'WP_ADMIN' ) ) || exit;

/***** BACKUP WORDPRESS *****/

/** Site backup path */
define( 'HMBKP_PATH', SITE_BACKUP_PATH );

/** Backup Zip Path */
//define( 'HMBKP_ZIP_PATH', SITE_BIN_PATH . SITE_BACKUP_DIR );

/***** AUTOPTIMIZE *****/

/**  Default: '/cache/autoptimize/' */
define('AUTOPTIMIZE_CACHE_CHILD_DIR','');

/** Default: '/wp-content'); */
define( 'AUTOPTIMIZE_WP_CONTENT_NAME', 'cache' );

/** Default: 'autoptimize_ */
define('AUTOPTIMIZE_CACHEFILE_PREFIX', '' );

/** define( 'AUTOPTIMIZE_CACHE_DIR', SITE_CACHE_PATH ); */
define( 'AUTOPTIMIZE_CACHE_URL', SITE_SCRIPT_URL );

/***** W3 TOTAL CACHE *****/

/** W3TC_CACHE_DIR */
define( 'W3TC_CACHE_DIR', SITE_ROOT_PATH . SITE_CACHE_DIR );

/** Default: SITE_CONFIG_PATH . '/w3tc' */
define( 'W3TC_CONFIG_DIR', SITE_CONFIG_PATH . '/w3tc' );

/** Default: SITE_SCRIPT_PATH  . '/min' */
define( 'W3TC_CACHE_MINIFY_DIR', SITE_SCRIPT_PATH  . '/min' );

/** Default: W3TC_CACHE_DIR  . SITE_PAGE_DIR */
define( 'W3TC_CACHE_PAGE_ENHANCED_DIR', W3TC_CACHE_DIR  . SITE_PAGE_DIR );

/** Default: W3TC_CACHE_DIR . '/tmp' */
define( 'W3TC_CACHE_TMP_DIR', W3TC_CACHE_DIR . '/tmp' );

/** Default W3TC_CACHE_DIR . '/blogs.php' */
define( 'W3TC_CACHE_BLOGMAP_FILENAME', W3TC_CACHE_DIR . '/blogs.php' );

/** Default: 864000 */
define( 'W3TC_CACHE_FILE_EXPIRE_MAX', 864000 );
