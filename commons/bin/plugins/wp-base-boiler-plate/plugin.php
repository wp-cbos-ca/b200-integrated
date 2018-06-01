<?php

/**
Plugin Name: WP Bundle Boiler Plate
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-boiler-plate
Description: A boiler plate plugin using a class.
Version: 2018.05.30
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/

defined( 'ABSPATH' ) || exit;

class WP_Bundle_Boiler_Plate {
		
	/**
	 * Initializes the class.
	 *
	 * @since 1.0.0
	 */
	public static function init() {
		/*
		if ( null === self::$class ) { 
			self::$class = new self;
		}
		return self::$class;
		*/
	}
	
	/**
	 * Starts the class
	 *
	 * @since 1.0.0
	 */
    public function on_loaded() {
		
	}
	
} // end class

//decouple class from WordPress hook to increase portability of class.
add_action( 'init', array ( 'WP_Bundle_Boiler_Plate', 'init' ), 0 );

//see: https://carlalexander.ca/designing-class-wordpress-hooks/

