<?php
/**
 * Allow Contact Form 7 submissions on the Wakoen staging hostname.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter(
	'wpcf7_recaptcha_verify_response',
	static function ( $is_human ) {
		$host = strtolower( (string) wp_parse_url( home_url( '/' ), PHP_URL_HOST ) );

		if ( 'wakoen.wiz-services.com' === $host ) {
			return true;
		}

		return $is_human;
	},
	PHP_INT_MAX
);
