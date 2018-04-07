<?php
 
defined( 'ABSPATH' ) || exit;

function get_wp_bundle_mailer_form() {
	$items = get_wp_bundle_mailer_data();
	$meta = get_wp_bundle_mailer_data_meta();
	$response = process_wp_bundle_contact_form();
	$str = '<div class="contact-form">' . PHP_EOL;
	$str .= sprintf( '<form action="" method="post">%s', PHP_EOL );
	$str .= wp_nonce_field( 'contact-form', 'contact-form', true, false ) . PHP_EOL;
	foreach ( $items as $item ) {
		if ( $item['display'] ) {
			$required = $item['required'] ? 'required' : '';
			$placeholder = ! empty( $item['placeholder'] ) ? 'placeholder="%s"' : '';			
			switch( $item['type'] ) {
				case 'text' :
				$str .= sprintf('<p>%s<br /><input type="text" name="contact_%s" %s maxlength="%s" %s value="%s" /></p>%s', $item['label'], $item['name'], $required, $item['maxlength'], $placeholder, $response[ 'contact_' . $item['name'] ], PHP_EOL );	
				break;
				case 'email' :
				$str .= sprintf('<p>%s<br /><input type="email" name="contact_%s" %s maxlength="%s" %s value="%s" /></p>%s', $item['label'], $item['name'], $required, $item['maxlength'], $placeholder, $response[ 'contact_' . $item['name'] ], PHP_EOL );	
				break;
				case 'textarea' : 
				$str .= sprintf('<p>%s<br /><textarea name="contact_%s" %s maxlength="%s" %s>%s</textarea></p>%s', $item['label'], $item['name'], $required, $item['maxlength'], $placeholder, $response[ 'contact_' . $item['name'] ], PHP_EOL );
				break;
				default:
			}			
		}
	}
	$str .= '<input type="hidden" name="contact_best_time" maxlength="40" placeholder="Best time to call..." value="" />' . PHP_EOL;
	$str .= $meta['submit']['display'] ? sprintf('<p><button id="contact-submit" type="submit" class="button button-primary" disabled="true">%s</button></p>%s', $meta['submit']['title'] ,PHP_EOL ) : '';
	$str .= sprintf('<div class="contact-response">%s</div><!-- .contact-response -->%s', $response['form_response'], PHP_EOL );
	$str .= '</form>' . PHP_EOL;
	$str .= '</div><!-- .contact-form -->' . PHP_EOL; 
	return $str;
}
