<?php

function html5_footer_menu() {
	
	$args = array(
			'id'			=> 'footer-menu',
			'name'		  => __( 'Footer Menu', 'footer-menu' ),
			'description'   => __( 'Footer menu', 'footer-menu' ),
			'before_widget' => '<nav>',
			'after_widget'  => '</nav>',
	);
	register_sidebar( $args );
}
