<?php

defined( 'ABSPATH' ) || exit;

function the_html5_head() {
	echo get_html5_head();
}

function the_html5_header() {
	echo get_html5_header();
}

function the_html5_footer() {
	echo get_html5_footer();
}

function the_html5_aside() {
	echo get_html5_aside();
}

function the_html5_article() {
	echo get_html5_article();
}

add_action( 'html5_head', 'the_html5_head' );

add_action( 'html5_header', 'the_html5_header' );

add_action( 'html5_footer', 'the_html5_footer' );

add_action( 'html5_aside', 'the_html5_aside' );

add_action( 'html5_article', 'the_html5_article' );
