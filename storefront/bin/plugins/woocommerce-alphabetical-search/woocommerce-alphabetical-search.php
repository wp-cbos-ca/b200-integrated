<?php
/*
Plugin Name: Woocommerce Alphbetical Search
Plugin URI: http://magnigenie.com
Description: This plugin allows you to add a different type of filter to your site where the users can filter the results based on the first letter of product name.
Version: 1.1
Author: Magnigenie
Author URI: http://magnigenie.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// No direct file access
! defined( 'ABSPATH' ) and exit;

define( 'WOOAS_FILE', __FILE__ );
define( 'WOOAS_PATH', plugin_dir_path( __FILE__ ) );
define( 'WOOAS_BASE', plugin_basename( __FILE__ ) );


require WOOAS_PATH . '/includes/functions.php';

new woo_Alphabetical_Search();
