<?php
/**
 * Storefront Child functions.php
 */

function enqueue_storefront_child_scripts() {

	wp_enqueue_style( 'storefront-child', '/theme/css/style.css' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_storefront_child_scripts' );