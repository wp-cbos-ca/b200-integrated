<?php

defined( 'ABSPATH' ) || exit;

function get_theme_template(){
	$template = array ( 'activate' => 1, 'title' => 'The Plugin Theme', 'option_name' => 'template', 'option_value' => 'the-plugin-theme', );
	return $template;
}

function get_theme_stylesheet(){
	$stylesheet = array ( 'activate' => 0, 'title' => 'The Plugin Theme Child', 'option_name' => 'stylesheet', 'option_value' => 'the-plugin-theme-child', );
	return $stylesheet;
}
