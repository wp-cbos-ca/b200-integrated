<?php 

function html5_footer_social() {
	 
	$args = array(
			'id'			=> 'footer-social',
			'name'		  => __( 'Social', 'social' ),
			'description'   => __( 'Social', 'social' ),
			'before_widget' => '<div class="social">',
			'after_widget'  => '</social>',
	);
	register_sidebar( $args );
}
