<?php

defined( 'ABSPATH' ) || exit;

function install_users() {
	require_once dirname( __FILE__) . '/data.php';
	$client_id = 1;
	$users = get_users_data();
	if ( $users ) foreach  ( $users as $user ) {
	if ( ( ! $user_id = username_exists( $user['user_login'] ) ) && $user['create'] ) {
		 $user_display_name = $user['first_name'] . ' ' . $user['last_name'];
		 empty( $user['user_password']) ? $user_password = wp_generate_password( 12, false ) : $user_password = $user['user_password'];
		 $user_id = wp_create_user( $user['user_login'], $user_password, $user['user_email'] );
		 update_user_option( $user_id, 'default_password_nag', true, true );
		 empty( $user['user_password']) ? wp_new_user_notification( $user_id, $user_password ) : '';
		 update_user_meta( $user_id, 'admin_color', $user['admin_color'] );
		 update_user_meta( $user_id, 'show_welcome_panel', 0 );
		 update_user_meta( $user_id, 'rich_editing', 0 );
		 update_user_meta( $user_id, 'first_name', $user['first_name'], 0 );
		 update_user_meta( $user_id, 'last_name', $user['last_name'], 0 );
		 update_user_meta( $user_id, 'display_name', $user_display_name, 0 );
		 assign_user_role( $user_id, $user['role'] );
	}
	if ( $user['user_login'] == 'client' )  {
		$client_id = $user_id;
	}
	$new_user = new WP_User( $user_id );
	$new_user->set_role( $user['role'] );
	//adjust for client if needed
	if ( $user['user_login'] == $users[1]['user_login'] ) {
		update_option( 'admin_email', $user['user_email'] );
	}
	}
	$user_id = get_current_user();
	update_user_meta( $user_id, 'admin_color', 'sunrise' );
	return $client_id;		 
}
 
function assign_user_role( $user_id, $role ) {
	$user = new WP_User( $user_id );
	$user->set_role( $role );
}

function wp_new_blog_notification( $blog_title, $blog_url, $user_id, $password ) {
	$user = new WP_User( $user_id );
	$email = $user->user_email;
	$name = $user->user_login;
	$message = sprintf(__("Your new WordPress site has been successfully set up at:
		%1\$s
		You can log in to your account with the following information:
		Username: %2\$s
		Password: %3\$s
		We hope you enjoy your new site. Thanks!
		"), $blog_url, $name, $password );
	@wp_mail( $email, __( 'WP 4.3 B100 LTS'), $message );
}
