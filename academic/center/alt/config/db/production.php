<?php

/** Database Name */
define( 'DB_NAME', 'cbosca_storefront' );

/** Database User */
define( 'DB_USER', 'cbosca_storefrnt' );

/** Database Password */
define( 'DB_PASSWORD', 'm26bv-74Z$T-6euL#' );

/** Database Host */
define( 'DB_HOST', 'localhost' );

/** Database table prefix (unique) */
$table_prefix  = 'store_';
// Keep the same for all environments for better compatibility.

/** Default Theme */
define( 'WP_DEFAULT_THEME', 'storefront' );

/**#@+
 * Authentication Unique Keys and Salts. Change to force a re-login.
 * @link https://api.wordpress.org/secret-key/1.1/salt/
 */
define('AUTH_KEY',         '%E0l,1oJ|Pk1>TRs]He@T+.ogF #?[_[{]G2Y| xQAeO=J<B-|_7#%Xk?t|OtdOH');
define('SECURE_AUTH_KEY',  'RBF(RdL`hb(QIL}Zua1;`9l7<grV+|yd!iVGkN|Bf;bds m}{,0=uz-BY0uGYj#_');
define('LOGGED_IN_KEY',    ',LkQ+T<h6J( c|)9r/|x[HIM]& anUXq}D0XoG5o^eKR/V e:NLI3}Q:96cx A>T');
define('NONCE_KEY',        'S?PJb,G?RSiXP-+M$j5#~[(n}8.klSY?O,#Jmfrv>53,tr@648l(Rq|g3_)Pk!DD');
define('AUTH_SALT',        '3~)7xTPh`.CA-/-PV!J]x G%vn)ELV6CE +i]aBr^d-sMzz5+2yY]A1x9OqGRW3h');
define('SECURE_AUTH_SALT', 'vUK$ !0}R?73!j15RCpY_<D1EZGw-lfQZnqt5h^J>A@<{+ 7_X0&+uImH)TGBWh[');
define('LOGGED_IN_SALT',   'aHrWw/`Ahtw-u3^Dv)B,a|g#m<1{=-~$Da].i>|J)Uy|ML|jA#+5FZ[.ja1Bc<)h');
define('NONCE_SALT',       'T!+#9*_F-;zD,WQT6uO.<|sKN>-n!N Ezyg~3RKpIG1k*:+a]#,T*9hI/9y97U1$');


/**#@-*/

/**
 * Notes: Copy this file to:
 *
 * config-db-local.php
 * config-db-staging.php
 * config-db-production.php
 *
 * as needed.
 * If the file is not present, it won't be loaded.
 * */