<?php

defined( 'ABSPATH' ) || exit;

function get_wp_bundle_dna_plugins_data() {

	$items = [ 
		[ 'plugin' => 'backupwordpress/backupwordpress.php', 'active' => 1, ],
		[ 'plugin' => 'cache-enabler/cache-enabler.php', 'active' => 1, ],
		[ 'plugin' => 'wordpress-importer/wordpress-importer.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-cache/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-cache-adjuster/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-cron/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-dna/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-ice-age/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-limit-logins/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-media/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-optimizer/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-base-security/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-developer/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-developer-constants/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-developer-optimizer/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-developer-plugins/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-maintenance-mode/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-maintenance-scheduled/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-monitor-analytics/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-monitor-dashboard/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-monitor-folders/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-monitor-site-map/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-security-login-url/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-security-site-password/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-social-address/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-social-mailer/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-social-maps/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-social-media/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-social-video/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-content/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-footer/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-header/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-menu/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-sidebar/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-style/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-widgets/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-theme-wireframe/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-write-charts/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-write-equations/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-write-footnotes/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-bundle-write-import-html/plugin.php', 'active' => 1, ],
		[ 'plugin' => 'wp-crontrol/wp-crontrol.php', 'active' => 1, ],
		[ 'plugin' => 'wp-dashboard-notes/wp-dashboard-notes.php', 'active' => 1, ],
	]; 
	return $items;
};
