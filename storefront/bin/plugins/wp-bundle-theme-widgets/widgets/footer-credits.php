<?php 

function html5_footer_credits() {
	
	$args = array(
			'id'			=> 'footer-credits',
			'name'		  => __( 'Credits', 'credits' ),
			'description'   => __( 'Credits', 'credits' ),
			'before_widget' => '<div class="credits">',
			'after_widget'  => '</div>',
	);
	register_sidebar( $args );
}
