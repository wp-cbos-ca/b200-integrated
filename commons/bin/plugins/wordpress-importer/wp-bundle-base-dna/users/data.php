<?php

defined( 'ABSPATH' ) || exit;

function get_users_data() {
	$users = array (
		 0 =>  array (
		 'create' => 0,
		 'user_login' => 'admin@example.ca',
		 'user_email' => 'admin@example.ca',
		 'admin_color' => 'coffee',
		 'show_welcome_panel', 0,
		 'rich_editing' => 0,
		 'first_name' => 'Site',
		 'last_name' => 'Administrator',
		 'role' => 'administrator',
		 ),
		 1 =>  array (
		 'create' => 0,
		 'user_login' => 'developer@example.ca',
		 'user_email' => 'developer@example.ca',
		 'admin_color' => 'blue',
		 'show_welcome_panel', 0,
		 'rich_editing' => 0,
		 'first_name' => 'Site',
		 'last_name' => 'Developer',
		 'role' => 'administrator',
		 ),
		 2 =>  array (
		 'create' => 0,
		 'user_login' => 'editor@example.ca',
		 'user_email' => 'editor@example.ca',
		 'admin_color' => 'blue',
		 'show_welcome_panel', 0,
		 'rich_editing' => 0,
		 'first_name' => 'Site',
		 'last_name' => 'Editor',
		 'role' => 'editor',
		 ),
		 3 =>  array (
		 'create' => 0,
		 'user_login' => 'author@example.ca',
		 'user_email' => 'author@example.ca',
		 'admin_color' => 'ocean',
		 'show_welcome_panel', 0,
		 'rich_editing' => 0,
		 'first_name' => 'Site',
		 'last_name' => 'Author',
		 'role' => 'author',
		 ),
		 4 =>  array (
		 'create' => 0,
		 'user_login' => 'contributor@example.ca',
		 'user_email' => 'contributor@example.ca',
		 'admin_color' => 'light',
		 'show_welcome_panel', 0,
		 'rich_editing' => 0,
		 'first_name' => 'Site',
		 'last_name' => 'Contributor',
		 'role' => 'contributor',
		 ),
		 5 =>  array (
		 'create' => 0,
		 'user_login' => 'subscriber@example.ca',
		 'user_email' => 'subscriber@example.ca',
		 'admin_color' => 'light',
		 'show_welcome_panel', 0,
		 'rich_editing' => 0,
		 'first_name' => 'Site',
		 'last_name' => 'Subscriber',
		 'role' => 'subscriber',
		 ) 
	);
	return $users;		 
}
