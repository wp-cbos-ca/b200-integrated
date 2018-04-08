<?php 

function twentyseventeen_scripts() {

	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	wp_enqueue_style( 'custom-style', get_theme_file_uri( '/css/custom.css' ), array( 'twentyseventeen-style' ), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );