<?php

defined( 'ABSPATH' ) || exit;

function get_site_title(){
	$site_title = array( 'title' => 'Site Tite', 'option_name' => 'blogname', 'option_value' => 'WP 4.3 B100 LTS', 'update' => 1 );
	return $site_title;
}

function get_tagline(){
	$tagline = array ( 'title' => 'Tagline', 'option_name' => 'blogdescription', 'option_value' => 'WP 4.3 Optimized, Secured, Backed Up and Cached', 'update' => 1 );
	return $tagline;
}

function get_root_url(){
	$root_url = array ( 'title' => 'Site Address (URL)', 'option_name' => 'siteurl', 'option_value' => '', 'update' => 0, 'desc' => 'This should be the root of the installation'  );
	return $root_url;	
}

function get_install_url(){
	$install_url = array ( 'title' => 'WordPress Address (URL)', 'option_name' => 'home', 'option_value' => '', 'update' => 0, 'desc' => 'This can be a subdirectory' );
	return $install_url;
}

function get_admin_email() {
	$email = array ( 'title' => 'E-mail Address', 'option_name' => 'admin_email', 'option_value' => 'admin@example.ca', 'update' => 0  );
	return $email;
}

function get_general_data() {
	$items = array(
		array ( 'title' => 'Membership', 'option_name' => 'users_can_register', 'option_value' => '0', 'update' => 0  ),
		array ( 'title' => 'New User Default Role', 'option_name' => 'default_role', 'option_value' => 'subscriber', 'update' => 0  ),
		array ( 'title' => 'Date Format', 'option_name' => 'date_format', 'option_value' => 'F j, Y', 'update' => 0  ),
		array ( 'title' => 'Time Format', 'option_name' => 'time_format', 'option_value' => 'g:i a', 'update' => 0  ),
*/0 = Sunday
		//email to post not done
	);
	return $items;
}

function get_site_language() {
	$site_language = array ( 'title' => 'Site Language', 'option_name' => 'WPLANG', 'option_value' => 'en', 'update' => 0  );
	return $site_language;
}
