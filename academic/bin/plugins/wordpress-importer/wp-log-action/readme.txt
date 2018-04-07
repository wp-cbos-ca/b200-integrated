=== WP Log Action ===
Contributors: webheadllc
Donate link: http://webheadcoder.com/donate-wp-log-action
Tags: actions, activate debugging, activity, admin, alert, log viewer, best error log, best log viewer, best plugin, clear log, critical, custom error, debug, Debug log, debug plugin, debug theme, debug tool, debugging, development, developer tool, display errors, download errors, download log, enable debugging, error, error log, error logging, error reporter, error reporting, error tracker, error tracking, errors, free, free debugging, free error log, log, log monitor, log viewer, log viewing, notice, plugin errors, Plugin Testing, search errors, search log, sort errors, sort log, theme errors, theme testing, track errors, warning, widget error, widget testing, wordpress, wordpress error, wordpress error log, wp error, wp error viewer, wp log viewer, WP_DEBUG
Requires at least: 4.5
Tested up to: 4.9.1
Stable tag: 0.22
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add error or debug logging in your code and leave it there.  Logs will only be recorded with this plugin, otherwise will be ignored.

== Description ==

This plugin uses hooks in the opposite way most plugins do.  You add `do_action` where you want to do some logging and this plugin will save it to the database only when active.

Example:  
`
do_action( 'wp_log_info', 'So far ok', 'Details of what is ok.' );
if ( $something_bad_happened ) {
    do_action( 'wp_log_error', 'This Happened!', 'Details of what happened.' );
    ...
}
`

See Tools->Logs to view the logs on the admin side.

This plugin automatically logs deprecated and doing_it_wrong errors.  The rest is what you add to your code.  

You can log what functions will be run for a specific action or filter.  For example if you want to see what runs in the 'init' hook:

`function check_init_hook() {
    do_action( 'wp_log_debug_hook', 'init' );
}
add_filter( 'init', 'check_init_hook', 0 );`



The following are the different levels of logging to add to your code.  You can use any level how you see fit, the descriptions of each level are just guidelines.

= Emergency =
System is unusable
`do_action( 'wp_log_emergency', $label, $message );`

= Alert =
Action must be taken immediately.
`do_action( 'wp_log_alert', $label, $message );`

= Critical =
Critical conditions.
`do_action( 'wp_log_critical', $label, $message );`

= Error =
Runtime errors that do not require immediate action but should typically be logged and monitored.
`do_action( 'wp_log_error', $label, $message );`

= Warning =
Exceptional occurrences that are not errors.
`do_action( 'wp_log_warning', $label, $message );`

= Notice =
Normal but significant events.
`do_action( 'wp_log_notice', $label, $message );`

= Info =
Interesting events.
`do_action( 'wp_log_info', $label, $message );`

= Debug =
Detailed debug information.
`do_action( 'wp_log_debug', $label, $message );`




== Changelog ==

= 0.22 =
Fix option name not defined.  

= 0.21 =
Fix css and js not loading.  
Add options page.  

= 0.2 =
Change default order of table to descending.  
Print arrays so it's readable even though it's ugly.  
Update readme.

= 0.1 =
Initial release.

