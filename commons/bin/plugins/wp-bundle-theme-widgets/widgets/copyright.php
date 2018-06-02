<?php 

function html5_copyright() {
	
	$args = array(
			'id'			=> 'footer-copyright',
			'name'		  => __( 'Copyright', 'copyright' ),
			'description'   => __( 'Copyright', 'copyright' ),
			'before_widget' => '<span class="copyright">',
			'after_widget'  => '</span>',
	);
	register_sidebar( $args );
}

function get_bundle_copyright_text(){
	$site_end_year = date( 'Y' );
	if ( defined( 'SITE_START_YEAR' ) && SITE_START_YEAR == $site_end_year ) {
		$years = SITE_START_YEAR;
	} else {
		$years = sprintf( '%s-%s', SITE_START_YEAR, $site_end_year );
	}
	$str = sprintf( 'Copyright &copy; %s %s', $years, get_bloginfo( 'name' ) );
	return $str;
}

class HTML5_Copyright_Widget extends WP_Widget {
	
	function __construct() {
		parent::__construct(false, $name = 'Copyright Widget');
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$text 	= $instance['html'];
		
		$str = $before_widget . PHP_EOL;
		$str .= get_bundle_copyright_text();
		$str .= $after_widget . PHP_EOL;
		echo $str;
	}
	
	function update( $new, $old ) {
		$instance = $old;
		$instance['html'] = wp_kses_post( $new['html'] );
		return $instance;
	}
	
	function form( $instance ) {
		$str = get_bundle_copyright_text();
		echo $str; 
	}
 
 
} 
add_action( 'widgets_init', create_function( '', 'return register_widget("HTML5_Copyright_Widget");' ) );
