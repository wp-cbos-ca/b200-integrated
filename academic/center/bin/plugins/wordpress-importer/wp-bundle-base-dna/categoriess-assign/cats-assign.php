<?php
  
defined( 'ABSPATH' ) || exit;

function assign_categories() {
	$args = array(
		'type'		  => WP_POST_TYPE,
		'taxonomy'	  => 'category',
		'hide_empty'	=> 0,
		'parent'		=> 0,
		'orderby'	   => 'name',
		
	); 
	$cats = get_categories( $args );
	if ( ! empty ( $cats ) ) {
		if ( $posts = get_posts_by_post_type_cat( 15 ) ) {
			foreach ( $posts as $post ) {
				$random_key = rand( 0, count( $cats ) - 1 );
				$cat_id = $cats[ $random_key ] -> term_id;
				wp_set_post_categories( $post->ID, $cat_id, false );
			}
		}
	}
}

function save_to_category_by_post_type ( $post_ID ) {
	global $wpdb;
	if( wp_is_post_autosave( $post_ID ) || wp_is_post_revision( $post_ID ) ) {
	  return $post_ID;
	}
	$ccat_id = intval( get_cat_ID( $cat_name ) );
	wp_set_object_terms( $post_ID, $ccat_id, 'category' );
}

function get_posts_by_post_type_cat( $numposts = 15 ) {
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
		'post_type'		=> WP_POST_TYPE,
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
