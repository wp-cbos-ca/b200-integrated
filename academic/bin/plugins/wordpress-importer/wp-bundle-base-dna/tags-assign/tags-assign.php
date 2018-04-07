<?php

defined( 'ABSPATH' ) || exit;

function assign_tags_to_posts() {
	require_once dirname( __FILE__) . '/data.php';
	$tags = get_terms( 'post_tag', 'orderby=count&hide_empty=0' ); 
	if ( $posts = get_posts_by_post_type( WP_POST_TYPE, 15 ) ) {
		foreach ( $posts as $post ) {
			generate_tag_data( $post, $tags );
		}
	}
}

function generate_tag_data( $post, $tags ) {
	$random_key = rand( 0, count( $tags ) - 1 );
	$tag = $tags[ $random_key ] -> name;
	wp_set_post_tags( $post -> ID, $tag, false ); 
}

function get_posts_by_post_type( $post_type = 'post', $numposts = '' ) {
	$args = array(
		'posts_per_page'   => $numposts,
		'offset'		   => 0,
		'category'		 => '',
		'category_name'	=> '',
		'orderby'		  => 'date',
		'order'			=> 'DESC',
		'include'		  => '',
		'exclude'		  => '',
		'meta_key'		 => '',
		'meta_value'	   => '',
		'post_type'		=> $post_type,
		'post_mime_type'   => '',
		'post_parent'	  => '',
		'author'	   => '',
		'post_status'	  => 'publish',
		'suppress_filters' => true 
	);
	$arr = get_posts( $args ); 
	if ( ! empty ( $arr ) ) {
		return $arr;
	} 
	else {
		return false;
	}
}

