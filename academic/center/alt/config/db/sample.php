<?php

/** Database Name */
define( 'DB_NAME', 'change_this' );

/** Database User */
define( 'DB_USER', 'change_this' );

/** Database Password */
define( 'DB_PASSWORD', 'change_this' );

/** Database Host */
define( 'DB_HOST', 'localhost' );

/** Database table prefix (unique) */
$table_prefix  = 'change_';
// Keep the same for all environments for better compatibility.

/** Default Theme */
define( 'WP_DEFAULT_THEME', 'html5' );

/** May be needed if root of site is in a sub-directory. */
define( 'SITE_DIR_STUB', '' );

/** The Fully Qualified Domain Name */
define( 'SITE_ROOT_URL', 'https://www.example.ca' );

/** May be the same as the domain. */
define( 'SITE_CACHE_SLUG', '/example.ca' );

/** Default: false */
define( 'SITE_USE_ANALYTICS', false );

/**#@+
 * Authentication Unique Keys and Salts. Change to force a re-login.
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         'copy_from_above_link');
define('SECURE_AUTH_KEY',  'copy_from_above_link');
define('LOGGED_IN_KEY',    'copy_from_above_link');
define('NONCE_KEY',        'copy_from_above_link');
define('AUTH_SALT',        'copy_from_above_link');
define('SECURE_AUTH_SALT', 'copy_from_above_link');
define('LOGGED_IN_SALT',   'copy_from_above_link');
define('NONCE_SALT',       'copy_from_above_link');
/**#@-*/

/**
 * Notes: Copy this file to:
 *
 * config-db-local.php
 * config-db-staging.php
 * config-db-production.php
 *
 * as needed.
 * */
