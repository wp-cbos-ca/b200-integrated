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
     * The Class Object
     */
    static private $class = null;

	/**
	 * Function description here.
	 *
	 * @since 3.0.0
	 * @var string
	 */
	public static function init() {
		if ( null === self::$class ) { 
			self::$class = new self;
		}
		return self::$class;
	}
	
	/**
	 * Function description here.
	 *
	 * @since 1.0.0
	 * @var string
	 */
    public function __construct() {
		add_action( 'init', array( $this, 'function_one' ) );
	}

	/**
	 * Function description here.
	 *
	 * @since 1.0.0
	 * @var string
	 */
    public function function_one() {
		
	}
	
} // end class

add_action( 'init', array ( 'WP_Bundle_Boiler_Plate', 'init' ), 0 );
