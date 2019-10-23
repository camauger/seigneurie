<?php

namespace WcPaysafe\Ajax\Admin;

use WcPaysafe\Paysafe;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Ajax class to handle ajax requests
 *
 * TODO: Extend the abstract Ajax class and adopt the structure
 *
 * @since  3.2.0
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2017 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

/**
 * TODO: Extend the abstract ajax class and use it
 */
class Ajax {
	
	public function hooks() {
		add_action( 'wp_ajax_wc_paysafe_capture_payment', array( $this, 'capture_payment' ) );
		
		add_action( 'wp_ajax_wc_paysafe_reset_profiles', array( $this, 'reset_profiles' ) );
	}
	
	/**
	 * Handle a refund via the edit order screen.
	 *
	 * @since 2.0
	 */
	public function capture_payment() {
		ob_start();
		
		check_ajax_referer( 'capture-payment', 'security' );
		
		if ( ! current_user_can( 'edit_shop_orders' ) ) {
			wp_die( - 1 );
		}
		
		// TODO: Use the plugin methods for the posts
		$order_id       = (int) Paysafe::get_field( 'order_id', $_POST, 0 );
		$capture_amount = wc_format_decimal( sanitize_text_field( Paysafe::get_field( 'capture_amount', $_POST, 0 ) ), wc_get_price_decimals() );
		try {
			$order = wc_get_order( $order_id );
			
			// Init the gateways
			WC()->payment_gateways();
			
			if ( ! $capture_amount ) {
				throw new \Exception( __( 'Invalid capture amount', 'wc_paysafe' ) );
			}
			
			// Run the capture payment action
			$result = apply_filters( 'wc_paysafe_capture_payment_for_order', $order, $capture_amount );
			
			if ( true !== $result ) {
				wp_send_json_error( array( 'message' => $result ) );
			}
			
			wp_send_json_success( array( 'message' => __( 'Amount was successfully captured', 'wc_paysafe' ) ) );
		}
		catch ( \Exception $e ) {
			wp_send_json_error( array( 'error' => $e->getMessage() ) );
		}
	}
	
	/**
	 * Watches for ajax reset profile request and resets the Nebtanx Profiles.
	 *
	 * @since 2.3
	 */
	public function reset_profiles() {
		$action = Paysafe::get_field( '_wpnonce', $_GET, '' );
		
		if ( ! wp_verify_nonce( $action, 'wc-paysafe-reset' ) ) {
			die( __( 'Cannot verify the request, please refresh the page and try again.', 'wc_paysafe' ) );
		}
		
		global $wpdb;
		
		$profile_query = "UPDATE
			{$wpdb->prefix}usermeta as meta
			SET meta.meta_value = ''
			WHERE meta.meta_key = '_netbanx_hosted_customer_profile_id';";
		
		$wpdb->get_results( $profile_query );
		
		$token_query = "UPDATE
			{$wpdb->prefix}usermeta as meta
			SET meta.meta_value = ''
			WHERE meta.meta_key = '_netbanx_hosted_customer_profile_token';";
		
		$wpdb->get_results( $token_query );
		
		wp_safe_redirect( wp_get_referer() );
		exit;
	}
}