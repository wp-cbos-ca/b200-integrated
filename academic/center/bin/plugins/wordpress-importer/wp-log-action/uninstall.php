<?php
// if uninstall.php is not called by WordPress, die
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}
define( 'WPLA', __FILE__);
define( 'WPLA_DIR', dirname( WPLA ) );

require_once( 'WPLA_Logger.php' );
$wpla = WPLA_Logger::get_instance();
$wpla->teardown_table();
