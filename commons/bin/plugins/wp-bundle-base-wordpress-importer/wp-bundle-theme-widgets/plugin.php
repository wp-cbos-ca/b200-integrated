<?php 
/**
 Plugin Name: WP Bundle Theme Widgets
 Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-theme-widgets/
 Description: Adds a sidebar and an HTML compatible widget.
 Version: 2017.12.30
 Author: wp.cbos.ca
 Author URI: http://wp.cbos.ca
 License: GPLv2+
 */

defined( 'ABSPATH' ) || exit;

if ( 1 ){
	require_once( __DIR__ . '/unregister.php' );
	add_action( 'widgets_init' , 'bundle_unregister_default_widgets' );
}

if ( 1 ){
	require_once( __DIR__ . '/widgets/aside.php' );
	//add body class aside
	add_action( 'widgets_init', 'html5_aside' );
}

if ( 1 ){
	require_once( __DIR__ . '/widgets/copyright.php' );
	add_action( 'widgets_init', 'html5_copyright' );
}

if ( 1 ){
	require_once( __DIR__ . '/widgets/footer-menu.php' );
	add_action( 'widgets_init', 'html5_footer_menu' );
}

if ( 1 ){
	require_once( __DIR__ . '/widgets/footer-credits.php' );
	add_action( 'widgets_init', 'html5_footer_credits' );
}

if ( 1 ){
	require_once( __DIR__ . '/widgets/footer-social.php' );
	add_action( 'widgets_init', 'html5_footer_social' );
}

/**
Notes: 

https://core.trac.wordpress.org/ticket/38614 (Can't easily replace internal widget wrap.)
Therefore, must extend widget and do what we need there. See /widgets.php.

*/

class html5_widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(false, $name = 'HTML5 Widget');
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$text 	= $instance['html'];
		
		$str = $before_widget . PHP_EOL;
		if ( $title ){
			$str .= $before_title . $title . $after_title . PHP_EOL;
		}
		$str .= $text . PHP_EOL;
		$str .= $after_widget . PHP_EOL;
		echo $str;
	}
	
	function update( $new, $old ) {
		$instance = $old;
		$instance['title'] = wp_kses_post( $new['title'] );
		$instance['html'] = wp_kses_post( $new['html'] );
		return $instance;
	}
	
	function form( $instance ) {	
		$title = wp_kses_post( $instance['title'] );
		$text = wp_kses_post( $instance['html'] );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'html' ); ?>"><?php _e( 'Valid HTML:' ); ?></label>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id( 'html' ); ?>" name="<?php echo $this->get_field_name( 'html' ); ?>"><?php echo esc_textarea( $instance['html'] ); ?></textarea>
		</p>
		<?php 
	}
}
add_action( 'widgets_init', create_function( '', 'return register_widget("html5_widget");' ) );

//(2017)
//See also: /core/wp-includes/widgets/class-wp-widget-text.php and similar.