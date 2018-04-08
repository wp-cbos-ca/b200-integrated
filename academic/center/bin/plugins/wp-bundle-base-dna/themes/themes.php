<?php

defined( 'ABSPATH' ) || exit;

function activate_themes() {
	require_once dirname( __FILE__) . '/data.php';
	$template = get_theme_template();
	$stylesheet = get_theme_stylesheet();
	if( $template['activate'] && ! $stylesheet['activate'] ) {
		switch_theme( $template['option_value'] );
	}
	else if ( ! $template['activate'] && $stylesheet['activate'] ) {
		switch_theme( $template['option_value'], $stylesheet['option_value'] );
	}
	else if ( $template['activate'] && $stylesheet['activate'] ) {
		switch_theme( $template['option_value'], $stylesheet['option_value'] );
	}
	else {}
}
