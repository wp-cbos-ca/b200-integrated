<?php

/*
Plugin Name: WP Bundle Monitor Sitemap XML
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-monitor-sitemap-xml
Description: This plugin improves SEO using sitemaps for best indexation by search engines like Google, Bing, Yahoo and others.
Version: 2018.06.01
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca/
Text Domain: sitemap
Domain Path: /lang
License: GPLv2+

Original Plugin Name: Google XML Sitemaps
Original Plugin URI: http://www.arnebrachhold.de/redir/sitemap-home/
Original Description: This plugin improves SEO using sitemaps for best indexation by search engines like Google, Bing, Yahoo and others.
Original Version: 4.0.9
Original Author: Arne Brachhold
Original Author URI: http://www.arnebrachhold.de/
Original Text Domain: sitemap
Original Domain Path: /lang

Copyright 2005 - 2014 ARNE BRACHHOLD  (email : himself - arnebrachhold - de)

*/

define("SM_SUPPORTFEED_URL","https://wordpress.org/support/plugin/google-sitemap-generator/feed/");

/**
 * Check if the requirements of the sitemap plugin are met and loads the actual loader
 *
 * @package sitemap
 * @since 4.0
 */
function sm_Setup() {

	$fail = false;

	//Check minimum PHP requirements, which is 5.2 at the moment.
	if (version_compare(PHP_VERSION, "5.2", "<")) {
		add_action('admin_notices', 'sm_AddPhpVersionError');
		$fail = true;
	}

	//Check minimum WP requirements, which is 3.3 at the moment.
	if (version_compare($GLOBALS["wp_version"], "3.3", "<")) {
		add_action('admin_notices', 'sm_AddWpVersionError');
		$fail = true;
	}

	if (!$fail) {
		require_once(trailingslashit(dirname(__FILE__)) . "sitemap-loader.php");
	}

}

/**
 * Adds a notice to the admin interface that the WordPress version is too old for the plugin
 *
 * @package sitemap
 * @since 4.0
 */
function sm_AddWpVersionError() {
	echo "<div id='sm-version-error' class='error fade'><p><strong>" . __('Your WordPress version is too old for XML Sitemaps.', 'sitemap') . "</strong><br /> " . sprintf(__('Unfortunately this release of Google XML Sitemaps requires at least WordPress %4$s. You are using Wordpress %2$s, which is out-dated and insecure. Please upgrade or go to <a href="%1$s">active plugins</a> and deactivate the Google XML Sitemaps plugin to hide this message. You can download an older version of this plugin from the <a href="%3$s">plugin website</a>.', 'sitemap'), "plugins.php?plugin_status=active", $GLOBALS["wp_version"], "http://www.arnebrachhold.de/redir/sitemap-home/","3.3") . "</p></div>";
}

/**
 * Adds a notice to the admin interface that the WordPress version is too old for the plugin
 *
 * @package sitemap
 * @since 4.0
 */
function sm_AddPhpVersionError() {
	echo "<div id='sm-version-error' class='error fade'><p><strong>" . __('Your PHP version is too old for XML Sitemaps.', 'sitemap') . "</strong><br /> " . sprintf(__('Unfortunately this release of Google XML Sitemaps requires at least PHP %4$s. You are using PHP %2$s, which is out-dated and insecure. Please ask your web host to update your PHP installation or go to <a href="%1$s">active plugins</a> and deactivate the Google XML Sitemaps plugin to hide this message. You can download an older version of this plugin from the <a href="%3$s">plugin website</a>.', 'sitemap'), "plugins.php?plugin_status=active", PHP_VERSION, "http://www.arnebrachhold.de/redir/sitemap-home/","5.2") . "</p></div>";
}

/**
 * Returns the file used to load the sitemap plugin
 *
 * @package sitemap
 * @since 4.0
 * @return string The path and file of the sitemap plugin entry point
 */
function sm_GetInitFile() {
	return __FILE__;
}

//Don't do anything if this file was called directly
if (defined('ABSPATH') && defined('WPINC') && !class_exists("GoogleSitemapGeneratorLoader", false)) {
	sm_Setup();
}

