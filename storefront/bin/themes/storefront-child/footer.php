<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' ); ?>
	<?php echo get_site_elapsed(); ?>
		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>
<?php echo get_site_elapsed(); ?>
</body>
</html>
<?php
/** Get the elapsed time from when the request first reached the server, to just before the end */
function get_site_elapsed(){
	
	global $site_elapsed;
	
	/** Explains the meaning of the time to the end user */
	$msg = 'Time (in milliseconds) to process the underlying code from when the request reaches the server to just before it leaves the server. Lower numbers are better.';
	
	/** End time to four decimal places in seconds (float) */
	$site_elapsed['end'] = microtime( true );
	
	/** Calculates elapsed time (accurate to 1/10000 seconds). Expressed as milliseconds */
	$time = number_format( ( $site_elapsed['end'] - $site_elapsed['start'] ) * 1000, 2, '.', ',' );
	
	$str = '<div id="elapsed-time" class="elapsed-time" style="font-size: smallest; opacity: 0.5;"';
	$str .= sprintf( 'title="%s">Elapsed: %s ms</div>%s', $msg, $time , PHP_EOL ) ;
	
	if ( defined( 'SITE_USE_ELAPSED' ) && SITE_USE_ELAPSED ) {
		return $str;
	}
	else {
		return false;
	}
}
