<?php

defined( 'ABSPATH' ) || exit;

function get_writing_data() {
	$items = array (
		0 => array ( 'title' => 'Convert emoticons to graphics on display', 'option_name' => 'use_smilies', 'option_value' => 0, 'update' => 0 ),
		1 => array ( 'title' => 'Default Post Category', 'option_name' => 'default_category', 'option_value' => 1, 'update' => 0 ),
		2 => array ( 'title' => 'Default Post Format', 'option_name' => 'default_post_format', 'option_value' => 0, 'update' => 0 ),
		//mailserver_url mail.example.ca
		//mailserver_login login@example.ca
		//mailserver_pass password
		//mailserver_port 110
		//default_email_category 1
		);
	return $items;
}
