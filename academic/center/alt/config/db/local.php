<?php

/** Database Name */
define( 'DB_NAME', 'storefront' );

/** Database User */
define( 'DB_USER', 'storefront' );

/** Database Password */
define( 'DB_PASSWORD', '3knJw-kA4rZ-PTXLY' );

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
define('AUTH_KEY',         '] I17~~OjX_iD~80F!.X=JWt|s+#bn=s51oX+7-9NB8!NY{A&H.!B<2GRyvK{G9t');
define('SECURE_AUTH_KEY',  '~)66T@YZjU55t-P:-YlA-h.grK*y)e8`(hZIS;6q=C.v+-NROSSFsy,%*+XN${.e');
define('LOGGED_IN_KEY',    'A(,3^.M4>;@5#R`834_afy/QrR5{Ax`!wJ@3.CJRPa+&Zc:Z#X9uHip!z5!-Y[LY');
define('NONCE_KEY',        'jF},r_U]=_BCqg| g!@#|Z+!x|+]pVeYat$6b]e7bONyC:#[zVX6[3sNobWEPri7');
define('AUTH_SALT',        'GG8ISOn*a>+t5RUPyn^$F1:3tN1xoEYyg[]0V4XqYPyQ^,>Jabu;)sTIc{=~6h+Z');
define('SECURE_AUTH_SALT', '`vAr-,PoQ{xluzZ!+1:-]>Qj_ez(^WfSFJ9wb$x;]F1[pK}TVa*x~3Z_jaqgstl`');
define('LOGGED_IN_SALT',   'Q4#m]/8d4]S3~Lny$Bse2Z2tOt8dBIN;/E&(uq=csN*gNq8JW C@z`i/D8y@Po,1');
define('NONCE_SALT',       '/<tcU.LlbBpCV|(Z{=P@@`+m<Xy|*<rWpKA1)`XuV+7w^;TqD6qm~e]Inp>tv8;*');

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

