<?php

defined( 'ABSPATH' ) || exit;

function process_wp_bundle_contact_form(){
	require_once( dirname(__FILE__) . '/data.php' );
	$data = get_wp_bundle_mailer_data();
	if ( ! empty( $_POST ) && check_admin_referer( 'contact-form', 'contact-form' ) ) {
		if ( strlen( $_POST['contact_best_time'] ) > 0 ){
			return;
		}
		$items = array( 'contact_name', 'contact_email', 'contact_subject', 'contact_message' );
		$response['form_response'] = '';
		foreach ( $_POST as $key => $value ) {
			if ( in_array( $key, $items ) ){
				$response[$key] = esc_attr( $_POST[$key] );
			}
		}
		if ( ! empty ( $response ) ){
			$email = get_wp_bundle_mailer_data_email();
			$response['contact_subject'] = $email['sent_from'];
			$r = mail_wp_bundle_message( get_mail_admin(), $response );
			$meta = get_wp_bundle_mailer_data_meta();
			if ( $r === true ){
				$response['form_response'] = $meta['success']['text'];
				$response['contact_name'] = '';
				$response['contact_email'] = '';
				$response['contact_subject'] = '';
				$response['contact_message'] = '';
				$response['message'] = '';
			}
			else {
				$response['form_response'] = $meta['failure']['text'];
			}
			
		}
		return $response;
	}
	else {
		return false;
	}
}

/**
* Create a user with the login id "mailer"
* to mail to someone other then the admin email.
* The admin email is an option value that may be different
* than the administrator, even if there is only one.
* This setting is found in Settings: General and labelled: 
* E-mail address ... This address is used for admin purposes, like new user notification.
*/
	
function get_wp_bundle_mail_admin() {
	$mailer = get_user_by( 'login', 'mailer' );
	if ( ! empty ( $mailer->user_email ) ){
		return $mailer->user_email;
	}
	else {
		return get_option( 'admin_email' );
	}
}

function mail_wp_bundle_message( $mail_admin, $items ) {
	$data = get_mailer_data_email();
	$str = isset( $items['contact_name'] ) ? $data['from'] . $items['contact_name'] . "\r\n" : $data['from'] . ' ' . $data['na'];
	$str .= isset( $items['contact_email'] ) ? $data['email'] . $items['contact_email'] . "\r\n" : $data['email'] . ' ' . $data['na'];
	$str .= isset( $items['contact_message'] ) ? $items['contact_message'] . "\r\n" : $data['message'] . ' ' . $data['na']; 
	$str .= sprintf( '%s %s.', $data['message_sent_from'], get_bloginfo(' title' ) , "\r\n" ) ;
	$contact_name = isset( $items['contact_name'] ) ? $items['contact_name'] : $data['na'];
	$contact_email = isset( $items['contact_email'] ) ? $items['contact_email'] : $data['na'];
	$headers = 'From: ' . $contact_name . ' <' . $contact_email . '>' . "\r\n";
	$contact_subject = isset( $items['contact_subject'] ) ? $items['contact_subject'] : $data['no_subject'];
	$r = wp_mail( $mail_admin, $contact_subject, $str, $headers );
	return $r;
}

/**
* Sets value to "From" value set above. 
* see: http://abdussamad.com/archives/567-Fixing-the-WordPress-Email-Return-Path-Header.html
*/

class email_return_path {
	function __construct() {
	add_action( 'phpmailer_init', array( $this, 'fix_return_path' ) );	
	}

	function fix_return_path( $phpmailer ) {
		$phpmailer->Sender = $phpmailer->From;
		}
}
new email_return_path();
