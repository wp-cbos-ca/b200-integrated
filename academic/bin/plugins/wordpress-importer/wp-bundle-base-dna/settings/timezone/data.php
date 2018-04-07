<?php

defined( 'ABSPATH' ) || exit;

function get_timezone_data() {
	 //the first timezone with 'selected' => 1 is chosen. America/Toronto is the default.
	 $timezone = array (	//option_name => timezone_string
			array ( 'option_value' => 'America/Toronto', 'selected' =>  1 ),
			array ( 'option_value' => 'America/Vancouver', 'selected' =>  0 ),
			array ( 'option_value' => 'America/New_York', 'selected' =>  0 ),
			array ( 'option_value' => 'America/Chicago', 'selected' =>  0 ),
			array ( 'option_value' => 'America/Denver', 'selected' =>  0 ),
			array ( 'option_value' => 'America/Los_Angeles', 'selected' =>  0 ),
			//add your own here as needed...
			);
	 return $timezone;
} 
