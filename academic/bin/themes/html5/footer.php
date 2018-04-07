<?php if ( ! empty( $switch ) && isset( $switch['footer'] ) && $switch['footer'] ){ ?>
<footer>
<div class="inner">
<?php if ( function_exists( 'get_bundle_footer' ) ) {
	echo get_bundle_footer();
	} ?>
</footer>
<?php } ?>
<?php if ( ! empty( $switch ) && isset( $switch['wrap'] ) && $switch['wrap'] ) { echo '</div>'; } ?> 
<?php if ( defined( 'SITE_USE_WP_FOOTER' && SITE_USE_WP_FOOTER ) ) { wp_footer(); } ?>
<?php if( defined( 'SITE_USE_JQUERY' ) && SITE_USE_JQUERY ) {
	echo '<script src="/script/js/jquery-latest.min.js" defer></script>';
} ?>
<?php if( defined( 'SITE_USE_JAVASCRIPT' ) && SITE_USE_JAVASCRIPT ) {
	echo '<script src="/script/js/javascript.js" defer></script>';
} ?>
</body>
</html>