<?php 
/*
Plugin Name: WP Bundle Theme Widgets
Plugin URI: http://wp.cbos.ca/plugins/wp-bundle-theme-widgets/
Description: Adds a sidebar and an HTML compatible widget. 	Switch on in plugin file if needed (for optimization purposes).
Version: 2018.06.02
Author: wp.cbos.ca
Author URI: http://wp.cbos.ca
License: GPLv2+
 */

defined( 'ABSPATH' ) || exit;

/*
 Switch on (change 0 to 1) as needed.
 Kept off for optimization purposes.
*/

if ( 0 ){
	// This extends the Widget class to deal with the internal widget wrap.
	add_action( 'widgets_init', create_function( '', 'return register_widget("HTML5_Widget");'));
}

if ( 0 ){
	require_once( __DIR__ . '/unregister.php' );
	add_action( 'widgets_init' , 'bundle_unregister_default_widgets' );
}

if ( 0 ){
	require_once( __DIR__ . '/widgets/aside.php' );
	//add body class aside
	add_action( 'widgets_init', 'html5_aside' );
}

if ( 0 ){
	require_once( __DIR__ . '/widgets/copyright.php' );
	add_action( 'widgets_init', 'html5_copyright' );
}

if ( 0 ){
	require_once( __DIR__ . '/widgets/footer-menu.php' );
	add_action( 'widgets_init', 'html5_footer_menu' );
}

if ( 0 ){
	require_once( __DIR__ . '/widgets/footer-credits.php' );
	add_action( 'widgets_init', 'html5_footer_credits' );
}

if ( 0 ){
	require_once( __DIR__ . '/widgets/footer-social.php' );
	add_action( 'widgets_init', 'html5_footer_social' );
}

/**
 The internal widget wrap can't easily be replaced
 (https://core.trac.wordpress.org/ticket/38614) 
 Therefore, we must extend widget and do what we need there.
 See /widgets/.php.
*/
class HTML5_Widget extends WP_Widget {
	
	public function __construct() {
		parent::__construct(false, $name = 'HTML5 Widget');
	}
	
	/**
	 *
	 */
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
} // end class

// See also: /core/wp-includes/widgets/class-wp-widget-text.php and similar.
