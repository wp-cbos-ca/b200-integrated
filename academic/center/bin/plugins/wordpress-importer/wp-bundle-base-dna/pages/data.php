<?php

defined( 'ABSPATH' ) || exit;

function get_pages_data() {
	$pages = array ( 
		array ( 
			'build' => 1, 
			'post_title' => 'Home', 'post_name' => 'home', 'template' => 'front-page',
			'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam risus tortor, commodo a massa non, varius convallis lectus. Suspendisse ut convallis odio. Nulla et eros lacinia, posuere tortor et, gravida nunc. Interdum et malesuada fames ac ante.',
		),
		array ( 
			'build' => 1,
			'post_title' => 'Blog', 'post_name' => 'blog', 'template' => 'default',
			'post_content' => '',
		),
		array ( 
			'build' => 1,
			'post_title' => 'About', 'post_name' => 'about', 'template' => 'default',
			'post_content' => '',
		),
		array ( 
			'build' => 1,
			'post_title' => 'Contact', 'post_name' => 'contact', 'template' => 'default',
			'post_content' => '[mailer]',
		), 
		array ( 
			'build' => 1,
			'post_title' => 'Terms', 'post_name' => 'terms', 'template' => 'default',
			'post_content' => '',
		),  
		array ( 
			'build' => 1,
			'post_title' => 'Privacy', 'post_name' => 'privacy', 'template' => 'default',
			'post_content' => '',
		), 
		array ( 
			'build' => 1,
			'post_title' => 'Site Map', 'post_name' => 'site-map', 'template' => 'default',
			'post_content' => '[site-map]',
		), 

	);
	return $pages;
}
