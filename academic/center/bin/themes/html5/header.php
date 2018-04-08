<?php
if ( file_exists( __DIR__ . '/data.php' ) ) {
	require_once( __DIR__ . '/data.php' );
	$switch = get_html5_theme_data();
}
else {
	$switch = false;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<?php if ( defined ( 'SITE_INDEX_ALLOW' ) && ! SITE_INDEX_ALLOW ) {
	echo '<meta name="robots" content="noindex,nofollow" />' . PHP_EOL;
} ?>
<title><?php if( ! is_front_page() ) { echo get_the_title(); } else { echo get_bloginfo( 'name' ) ; } ?></title>
<link rel="stylesheet" href="/theme/css/style.css">
<?php if ( defined( 'SITE_USE_WP_HEAD' && SITE_USE_WP_HEAD ) ) { wp_head(); } ?>
</head>
<body <?php body_class(); ?>>
<?php if ( $switch && isset( $switch['wrap'] ) && $switch['wrap'] ) { echo '<div class="wrap">'; } ?> 
<?php if ( function_exists( 'get_wp_bundle_header' ) ) {
	echo get_wp_bundle_header();
}
else {
	echo "Please install wp_bundle_header plugin";
}
