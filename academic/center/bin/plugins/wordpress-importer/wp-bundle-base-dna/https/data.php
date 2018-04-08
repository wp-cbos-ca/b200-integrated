<?php

defined( 'ABSPATH' ) || exit;

function get_https_data(){
	$items = array( 
		'https' => 0,
		'subdomain' => 0,
		'www' => 0,
		);
	return $items;
}

function get_https_on_arr(){
	$arr = array( 
		'<IfModule mod_rewrite.c>',
		'  RewriteEngine On',
		'  # RewriteCond %{HTTP_HOST} !^www\.',
		'  # RewriteRule ^(.*)$ https://www.%{HTTP_HOST}/$1 [R=301,L]',
		'  RewriteCond %{HTTPS} off',
		'  RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]',
		'</IfModule>',
		);
	return $arr;
}

function get_https_off_arr(){
	$arr = array( 
		'<IfModule mod_rewrite.c>',
		'  # RewriteEngine On',
		'  # RewriteCond %{HTTP_HOST} !^www\.',
		'  # RewriteRule ^(.*)$ https://www.%{HTTP_HOST}/$1 [R=301,L]',
		'  # RewriteCond %{HTTPS} off',
		'  # RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]',
		'</IfModule>',
		);
	return $arr;
}
