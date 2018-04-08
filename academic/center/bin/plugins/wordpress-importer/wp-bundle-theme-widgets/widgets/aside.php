<?php 

function html5_aside() {
	
	$args = array(
			'id'			=> 'aside',
			'name'		  => __( 'Aside', 'aside' ),
			'description'   => __( 'Aside', 'aside' ),
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
			'before_widget' => '<aside>',
			'after_widget'  => '</aside>',
	);
	register_sidebar( $args );	
}
