<?php

<?php

function run_cron(){
	//
}

function wp_bundle_cron() {
	//run cron
}

function wp_bundle_cron_activate() {
	wp_schedule_event( time(), 'weekly', 'wp_bundle_weekly_backup' );
	wp_schedule_event( time(), 'daily', 'wp_bundle_daily_backup' );
}

function wp_bundle_cron_deactivate() {
	wp_clear_scheduled_hook( 'wp_bundle_weekly_backup' );
	wp_clear_scheduled_hook( 'wp_bundle_daily_backup' );
}

// HM\BackUpWordPress\Plugin->schedule_hook_run()
// Daily. "id": "1521138476"

// HM\BackUpWordPress\Plugin->schedule_hook_run()
// Weekly. "id": "1521138477"

//wp_scheduled_delete()

//delete_expired_transients()

//wp_delete_auto_drafts()
