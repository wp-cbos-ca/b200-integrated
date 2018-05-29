<?php
/**
Plugin Name: WP Bundle Monitor Analytics
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-monitor-analtyics/
Description: Delays analytics with a three second delay to enhance performance. Add your code snippet and turn on in code editor.
Version: 2018.03.11
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
*/ 

defined( 'ABSPATH') || exit;

define( 'WP_BUNDLE_ANALTYICS_DELAY', 3000 ); 
//milliseconds

define( 'WP_BUNDLE_ANALTYICS_BREAKER', false ); 
//turn "ON" by setting to "true" (no quotes).

function the_wp_bundle_analytics_script() {?>
  <!-- ADD YOUR ANALYTICS SCRIPT HERE -->
<?php 
}

//NON EDITABLE 
function load_wp_bundle_analytics() {
	if ( WP_BUNDLE_ANALTYICS_BREAKER && ! current_user_can( 'manage_options' ) ) {
		the_wp_bundle_analytics_timer();
	}
}
add_action( 'wp_footer', 'load_wp_bundle_analytics' );

function the_wp_bundle_analytics_timer(){
	echo '<script>' . PHP_EOL;
	echo 'setTimeout(function(){ ';
	the_wp_bundle_analytics_script();
	printf( '}, %s)', WP_BUNDLE_ANALTYICS_DELAY, PHP_EOL );
	echo '</script>' . PHP_EOL;
}
