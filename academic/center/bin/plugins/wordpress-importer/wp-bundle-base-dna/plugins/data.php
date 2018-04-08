<?php

defined( 'ABSPATH' ) || exit;

function get_plugins_data() {
	$items = array (
		array (
		'name' => 'BackUpWordPress', 'folder' => 'backupwordpress', 'file' => 'backupwordpress.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'OK',
		),
		array (
		'name' => 'Sucuri Scanner', 'folder' => 'sucuri-scanner', 'file' => 'sucuri.php', 'status' => 'N/A',
		'activate' => 1, 'local' => 0, 'online' => 1, 'configure' => 1, 'settings' => array (
				array ( 'option_name' => 'sucuriscan_dns_lookups', 'option_value' => 'disabled', 'set' => 1 ),
		),
		'status' => 'N/A',
		),
		array (
		'name' => 'Velvet Blues Update URLs', 'folder' => 'velvet-blues-update-urls', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WordPress Importer', 'folder' => 'wordpress-importer', 'file' => 'parsers.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Base Cache', 'folder' => 'wp-bundle-base-cache', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Base Cron', 'folder' => 'wp-bundle-base-ice-age', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Base Ice Age', 'folder' => 'wp-bundle-base-ice-age', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Base Limit Logins', 'folder' => 'wp-bundle-base-limit-logins', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle-Base Media', 'folder' => 'wp-bundle-base-media', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle-Base Optimize', 'folder' => 'wp-bundle-base-optimize', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Base Security', 'folder' => 'wp-bundle-base-security', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle Developer', 'folder' => 'wp-bundle-developer', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Developer Constants', 'folder' => 'wp-bundle-developer-analytics', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Developer Plugins', 'folder' => 'wp-bundle-developer-plugins', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Maintenance Mode', 'folder' => 'wp-bundle-maintenance-mode', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Monitor Analytics', 'folder' => 'wp-bundle-monitor-analytics', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Monitor Dashboard', 'folder' => 'wp-bundle-monitor-dashboard', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Monitor Site Map', 'folder' => 'wp-bundle-monitor-site-map', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Monitor Statistics', 'folder' => 'wp-bundle-monitor-site-map', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Security Login URL', 'folder' => 'wp-bundle-security-login-url', 'file' => 'plugin.php',
		'activate' => 0, 'local' => 0, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Security Site Password', 'folder' => 'wp-bundle-security-site-password', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Social Address', 'folder' => 'wp-bundle-social-address', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Social Mailer', 'folder' => 'wp-bundle-social-mailer', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle Social Maps', 'folder' => 'wp-bundle-social-maps', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle Social Media', 'folder' => 'wp-bundle-social-media', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,		 
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Social Video', 'folder' => 'wp-bundle-social-video', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'WP Bundle Theme Footer', 'folder' => 'wp-bundle-theme-footer', 'file' => 'plugin.php', 
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Theme Header', 'folder' => 'wp-bundle-theme-header', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Theme Menus', 'folder' => 'wp-bundle-theme-menus', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Theme Sidebar', 'folder' => 'wp-bundle-theme-sidebar', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Theme Style', 'folder' => 'wp-bundle-theme-style', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Theme Widgets', 'folder' => 'wp-bundle-theme-widgets', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Theme Wireframe', 'folder' => 'wp-bundle-theme-wireframe', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Write Charts', 'folder' => 'wp-bundle-write-charts', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Write Equations', 'folder' => 'wp-bundle-write-equations', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Write Footnotes', 'folder' => 'wp-bundle-write-footnotes', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Bundle Write Import HTML', 'folder' => 'wp-bundle-write-import-html', 'file' => 'plugin.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Dashboard Notes', 'folder' => 'wp-dashboard-notes', 'file' => 'wp-dashboard-notes.php',
		'activate' => 1, 'local' => 1, 'online' => 1,
		'status' => 'N/A',
		),
		array ( 
		'name' => 'Autoptimize', 'folder' => 'autoptimize', 'file' => 'autoptimize.php', 
		'activate' => 1, 'local' => 1, 'online' => 1, 'configure' => 1, 'settings' => array (
			array ( 'option_name' => 'autoptimize_html', 'option_value' => 'on', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_html_keepcomments', 'option_value' => '','set' => 1 ),
			array ( 'option_name' => 'autoptimize_js', 'option_value' => 'on', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_js_exclude',
			'option_value' => 's_sid,smowtion_size,sc_project,WAU_,wau_add,comment-form-quicktags,edToolbar,ch_client,seal.js', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_js_trycatch', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_js_justhead', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_js_forcehead', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_css', 'option_value' => 'on', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_css_exclude',
			'option_value' => 'admin-bar.min.css,dashicons.min.css,fonts.googleapis.com', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_css_justhead', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_css_datauris', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_css_defer', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_css_defer_inline', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_css_inline', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_cdn_url', 'option_value' => '', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_cache_clean', 'option_value' => '0', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_cache_nogzip', 'option_value' => 'on', 'set' => 1 ),
			array ( 'option_name' => 'autoptimize_show_adv', 'option_value' => '1', 'set' => 1 ),
			),
		'status' => 'N/A',
		),
		array (
		'name' => 'WP Super Cache', 'folder' => 'wp-super-cache', 'file' => 'wp-cache.php',
		'activate' => 0, 'local' => 0, 'online' => 0, 'configure' => 0, 'settings' => array (
				array ( 'option_name' => 'gzipcompression', 'option_value' => 1, 'set' => 1 ),
		),
		'status' => 'N/A',
		),
	); 
	return $items;
}
