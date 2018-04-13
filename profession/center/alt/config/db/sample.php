<?php

( defined( 'SITE' ) || defined( 'WP_ADMIN' ) ) || exit;

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
