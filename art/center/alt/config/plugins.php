<?php

( defined( 'SITE' ) || defined( 'WP_ADMIN' ) ) || exit;

/* BACKUP WORDPRESS */

define( 'HMBKP_PATH', SITE_BIN_PATH. SITE_BACKUP_DIR );
//

//define( 'HMBKP_ZIP_PATH', SITE_BIN_PATH . SITE_BACKUP_DIR );
// Backup Path.

/* AUTOPTIMIZE */

// wp-content dir, dirname of AO cache dir and AO-prefix can be overridden in wp-config.php

define('AUTOPTIMIZE_CACHE_CHILD_DIR','');
//  Default: '/cache/autoptimize/'

define('AUTOPTIMIZE_WP_CONTENT_NAME','cache');
// Default: '/wp-content');

define('AUTOPTIMIZE_CACHEFILE_PREFIX', '' );
// Default: 'autoptimize_'

define( 'AUTOPTIMIZE_CACHE_URL', SITE_SCRIPT_URL );
//define( 'AUTOPTIMIZE_CACHE_DIR', SITE_CACHE_PATH );

//define( 'OPTIMIZE_WP_CONTENT_NAME', SITE_BIN_DIR );
//define( 'OPTIMIZE_CACHE_CHILD_DIR', SITE_CACHE_DIR );
//define( 'OPTIMIZE_CACHEFILE_PREFIX', '' );

/* W3 TOTAL CACHE */

define( 'W3TC_CACHE_DIR', SITE_ROOT_PATH . SITE_CACHE_DIR );
define( 'W3TC_CONFIG_DIR', SITE_CONFIG_PATH . '/w3tc' );
define( 'W3TC_CACHE_MINIFY_DIR', SITE_SCRIPT_PATH  . '/min' );
define( 'W3TC_CACHE_PAGE_ENHANCED_DIR', W3TC_CACHE_DIR  . SITE_PAGE_DIR );
define( 'W3TC_CACHE_TMP_DIR', W3TC_CACHE_DIR . '/tmp' );
define( 'W3TC_CACHE_BLOGMAP_FILENAME', W3TC_CACHE_DIR . '/blogs.php' );
define( 'W3TC_CACHE_FILE_EXPIRE_MAX', 864000 );
