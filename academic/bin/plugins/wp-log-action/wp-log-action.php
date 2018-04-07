<?php 
/*
Plugin Name: WP Log Action
Description: Provides a common interface to log messages the WordPress way.
Author: Webhead LLC
Author URI: http://webheadcoder.com 
Version: 0.22
*/

define( 'WPLA_VERSION', '0.22');

define( 'WPLA_PLUGIN', __FILE__);
define( 'WPLA_DIR', dirname( WPLA_PLUGIN ) );

define( 'WPLA_OPTIONS_NAME', 'wpla_options' );
define( 'WPLA_OPTIONS_PAGE_ID', 'wpla-options' );

require_once( WPLA_DIR . '/WPLA_Logger.php' );
require_once( plugin_dir_path( WPLA_PLUGIN ) . 'options-page.php' );


/**
 * Initialize the logger
 */
function wpla_setup() {
    $wpla = WPLA_Logger::get_instance();
    $levels = $wpla->get_log_types();
    foreach( $levels as $level ) {
        add_action( 'wp_log_' . $level, array( $wpla, $level ), 10, 2 );   
    }

    add_action( 'wp_log_debug_hook', array( $wpla, 'debug_hook' ), 10 );

    add_action( 'wp_log_debug_query_start', array( $wpla, 'debug_query_start' ), 10 );
    add_action( 'wp_log_debug_query_stop', array( $wpla, 'debug_query_stop' ), 10 );
    
    if ( wpla_option( 'log_doing_it_wrong', true ) ) {
        add_action( 'doing_it_wrong_run', 'wpla_doing_it_wrong_run', 10, 3 );
    }
    if ( wpla_option( 'log_deprecated', true ) ) {
        add_action( 'deprecated_function_run', 'wpla_deprecated_function_run', 10, 3 );
    }
}
add_action( 'plugins_loaded', 'wpla_setup' );


register_activation_hook( WPLA_PLUGIN, 'wpla_activation' );

/**
 * Setup the tables.
 */
function wpla_activation() {
    $wpla = WPLA_Logger::get_instance();
    $wpla->setup_table();
}
add_action( 'wpla_activation', 'wpla_activation' );

/**
 * Add a menu item to the tools menu.
 */
function wpla_add_menu() {
    add_management_page( 'Logs', 'Logs', 'manage_options', 'wpla', 'wpla_output' );
}
add_action( 'admin_menu', 'wpla_add_menu' );


/**
 * Output the log page.
 */
function wpla_output() {
    require_once(dirname(__FILE__) . '/wpla-output-table.php');

    $wp_list_table = new WPLA_Options_Table();
    $wp_list_table->prepare_items();

    echo '<div class="wrap"><h2>WP Log Action</h2>';

    echo '<form method="post">'; //for search
    echo '<input type="hidden" name="page" value="wh-debug">';
    $wp_list_table->display();
    echo '</form></div><!-- .wrap -->';
}

/**
 * Enqueue the styls.
 */
function wpla_admin_enqueue($hook) {
    if( stripos($hook, 'wpla' ) === FALSE)
        return;

    wp_enqueue_style( 'datepicker', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' );
    wp_enqueue_style( 'wpla_style', 
        plugins_url('/css/wpla.css', __FILE__), 
        WPLA_VERSION 
    );

    wp_enqueue_script( 'wpla_script', 
        plugins_url('/js/wpla.js', __FILE__) , 
        array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
        WPLA_VERSION,
        true 
    );
}
add_action( 'admin_enqueue_scripts', 'wpla_admin_enqueue' );


/**
 * Add Settings link to plugins
 */
function wpla_settings_link($links, $file) {
    static $this_plugin;
    if (!$this_plugin) $this_plugin = plugin_basename( WPLA_PLUGIN );
    if ($file == $this_plugin){
        $settings_link = '<a href="' . admin_url( 'options-general.php?page=' . WPLA_OPTIONS_PAGE_ID . ' ' ) . '">'.__( 'Settings' ).'</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
 }
add_filter('plugin_action_links', 'wpla_settings_link', 10, 2 );

/**
 * Get option
 */
function wpla_option( $name, $default = false ) {
    $options = get_option( WPLA_OPTIONS_NAME );
    if ( !empty( $options ) && isset( $options[$name] ) ) {
        $ret = $options[$name];
    }
    else {
        $ret = $default;
    }
    return $ret;
}

/**
 * Log doing it wrong runs.
 */
function wpla_doing_it_wrong_run( $function, $message, $version ) {
    $version = is_null( $version ) ? '' : sprintf( __( '(This message was added in version %s.)' ), $version );
    /* translators: %s: Codex URL */
    $message .= ' ' . sprintf( __( 'Please see <a href="%s">Debugging in WordPress</a> for more information.' ),
        __( 'https://codex.wordpress.org/Debugging_in_WordPress' )
    );
    $log_message = sprintf( __( '%1$s was called <strong>incorrectly</strong>. %2$s %3$s' ), $function, $message, $version );

    do_action( 'wp_log_error', __( sprintf( 'Doing it wrong: %s ', $function ) ), $log_message );
}

/**
 * Log deprecated function runs.
 */
function wpla_deprecated_function_run( $function, $replacement, $version ) {
    $log_message = '';
    if ( ! is_null( $replacement ) )
        $log_message = sprintf( __('%1$s is <strong>deprecated</strong> since version %2$s! Use %3$s instead.'), $function, $version, $replacement );
    else
        $log_message = sprintf( __('%1$s is <strong>deprecated</strong> since version %2$s with no alternative available.'), $function, $version );

    do_action( 'wp_log_warning', __( sprintf( 'Deprectated: %s ', $function ) ), $log_message );
}

