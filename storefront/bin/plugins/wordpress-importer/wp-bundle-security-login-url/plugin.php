<?php
/**
Plugin Name: WP Bundle Security Login URL
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-security-login-url/
Description: Secures the login page by changing its location. Do not cache this location.
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
Version: 2018.03.14
License: GPLv2+

Original Name: Lockdown WP Admin
Original URI: http://seanfisher.co/lockdown-wp-admin/
Original Donate link: http://seanfisher.co/donate/
Original Description: Securing the WordPress Administration interface by concealing the administration dashboard and changing the login page URL.
Original Version: 2.3.2
Original Author: Sean Fisher
Author URI: http://seanfisher.co/
Original License: GPL
Original Text Domain: lockdown-wp-admin
*/

defined( 'ABSPATH' ) || exit;

// Lockdown WP Admin File Name.
define( 'LD_FILE_NAME', __FILE__ );
define( 'LD_PLUGIN_DIR', dirname( __FILE__ ) );

/**
 * The function called at 'init'.
 * Sets up the object
 *
 * One can overwrite the class used by Lockdown WP Admin by filtering `ld_class`.
 * Adding a filter must be done before `init`.
 *
 * @return object
 * @access private
 * @since 1.0
 * @see do_action() Called by the 'init' action.
 * @throws Exception
 */
function ld_setup_auth() {
	// Include Manager
	require_once( LD_PLUGIN_DIR . '/src/Lockdown/Manager.php' );

	// Instantiate the object
	$class = apply_filters( 'ld_class', 'Lockdown_Manager' );
	$object = call_user_func( $class.'::instance' );

	// Ensure application integrity
	if ( ! ( $object instanceof Lockdown_Manager ) ) {
		throw new Exception( __( 'Lockdown Manager Class must be instance of Lockdown_Manager.', 'lockdown-wp-admin' ) );
	}

	return $object;
}

// Add default action to `init`
add_action( 'init', 'ld_setup_auth', 20 );
