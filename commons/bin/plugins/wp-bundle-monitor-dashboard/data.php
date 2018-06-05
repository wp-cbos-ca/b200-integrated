<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_dashboard_molecule(){
	$molecule = array( 
		'backup' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'A backup plugin is active.' ),
		'address' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'An address plugin is active.' ),
		'debug' => array( 'run' => 1, 'resp' => array( 'ON', 'OFF' ), 'desc' => 'WP_DEBUG is &quot;ON&quot;' ),
		'security' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'A security plugin is active.' ),
		'mailer' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'A contact form plugin with a &quot;mailer&quot; is active.' ),
		'wp_cron' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'The WP &quot;Virtual&quot; CRON is active. Consider using a &quot;real&quot; cron for a faster site.' ),
		'maintain' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'A maintenance plugin is active, or you are on scheduled maintenance (SCH).' ),
		'maps' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'An maps plugin is active.' ),
		'file_edits' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'File edits are allowed in the theme and plugin editors. Recommended to turn off for greater security.' ),
		'caching' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'A caching plugin is present.' ),
		'video' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'A video plugin is active.' ),
		'xmlrpc' => array( 'run' => 1, 'resp' => array( 'PRESENT', 'ABSENT' ), 'desc' => 'The xmlrpc.php file was found. Currently a security risk (as of 10/2015).' ),
		'optimization' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'An optimization plugin is active.' ),
		'social' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'A social plugin is active.' ),
		'analytics' => array( 'run' => 1, 'resp' => array( 'YES', 'NO' ), 'desc' => 'An analytics plugin is active.' ),
		'display_debug' => array( 'run' => 1, 'resp' => array( 'ON', 'OFF' ), 'desc' => 'WP_DISPLAY_DEBUG is &quot;ON&quot;' ),
		);
	return $molecule;
}
