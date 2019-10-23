<?php

namespace WcPaysafe;

use WcPaysafe\Compatibility\WC_Compatibility;
use WcPaysafe\Gateways\Redirect\Gateway;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Handles script loading
 *
 * @since  3.2.0
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2018 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
class Scripts {
	
	public function __construct() {
		$this->suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$this->version = $this->suffix ? WC_PAYSAFE_PLUGIN_VERSION : rand( 1, 999 );
	}
	
	public function hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
	}
	
	/**
	 * Adds admin scripts
	 *
	 * @since 3.2.0
	 */
	public function admin_scripts() {
		$screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';
		
		wp_register_script( 'paysafe-admin', Paysafe::plugin_url() . '/assets/js/admin' . $this->suffix . '.js', array( 'jquery' ), $this->version, true );
		
		if ( in_array( str_replace( 'edit-', '', $screen_id ), wc_get_order_types( 'order-meta-boxes' ) ) ) {
			wp_enqueue_script( 'paysafe-admin' );
		}
		
		wp_localize_script( 'paysafe-admin', 'wc_paysafe_params', array(
			'i18n_capture_payment'      => _x( 'Are you sure you want to capture the payment?', 'capture payment', 'wc_paysafe' ),
			'ajax_url'                  => admin_url( 'admin-ajax.php' ),
			'capture_payment'           => wp_create_nonce( 'capture-payment' ),
			'il8n_integration_changed'  => __( '<span>Integration Type changed!</span> <span>Save the change before you continue.</span >', 'wc_paysafe' ),
			'il8n_dd_refund_action'     => __( 'To refund a Direct Debit purchase we will issue the customer a Standalone Credit against their Vault payment method. Are you sure you want to proceed?', 'wc_paysafe' ),
			'il8n_confirm_pair_removal' => __( 'Are you sure you want to remove the account pair?', 'wc_paysafe' ),
		) );
	}
	
	public function frontend_scripts() {
		if ( ! is_cart()
		     && ! is_checkout()
		     && ! isset( $_GET['pay_for_order'] )
		     && ! is_add_payment_method_page()
		     && ! wc_paysafe_is_update_payment_method_page()
		     && ! isset( $_GET['change_payment_method'] )
		) {
			return;
		}
		
		$class = wc_paysafe_instance()->get_gateway_class( 'hosted' );
		/**
		 * @var Gateway $gateway
		 */
		$gateway = new $class();
		
		if ( 'no' === $gateway->enabled ) {
			return;
		}
		
		// Make sure the gateway will be showing up on the checkout page
		if ( ! $gateway->is_available() ) {
			wc_paysafe_add_debug_log( 'Gateway is not setup correctly.' );
			
			return;
		}
		
		// Check the integration, since not all integrations need scripts
		if ( 'checkoutjs' != $gateway->integration ) {
			return;
		}
		
		wp_enqueue_script( 'paysafe-checkout-js', 'https://hosted.paysafe.com/checkout/v1/latest/paysafe.checkout.min.js', array( 'jquery' ), $this->version, true );
		
		wp_enqueue_script( 'paysafe-checkout', Paysafe::plugin_url() . '/assets/js/paysafe-checkout' . $this->suffix . '.js', array(
			'jquery',
			'paysafe-checkout-js',
		), rand( 1, 999 ), true );
		
		$checkout_data = apply_filters( 'wc_paysafe_checkout_js_variables', array(
			'ajaxUrl'                   => \WC_AJAX::get_endpoint( '%%endpoint%%' ),
			'gatewayId'                 => $gateway->id,
			'isWc3_0'                   => WC_Compatibility::is_wc_3_0(),
			'scriptDev'                 => defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG,
			'isAddPaymentMethodPage'    => is_add_payment_method_page(),
			'isUpdatePaymentMethodPage' => wc_paysafe_is_update_payment_method_page(),
			'isPayForOrderPage'         => is_checkout_pay_page(),
			'isCheckoutPage'            => is_checkout(),
			'isChangePaymentMethodPage' => wc_paysafe_is_change_method_page(),
			'nonce'                     => array(
				'process_payment'       => wp_create_nonce( 'wc-paysafe-process-payment' ),
				'update_payment_method' => wp_create_nonce( 'wc-paysafe-update-payment-method' ),
				'add_payment_method'    => wp_create_nonce( 'wc-paysafe-add-payment-method' ),
				'change_payment_method' => wp_create_nonce( 'wc-paysafe-change-payment-method' ),
			),
			'il8n'                      => array(
				'cardNumberNotValid'  => __( 'Card Number is invalid', 'wc_paysafe' ),
				'cardExpiryNotValid'  => __( 'Expiry date is invalid', 'wc_paysafe' ),
				'cardCvcNotValid'     => __( 'Card Code is invalid', 'wc_paysafe' ),
				'publicKeyLoadFailed' => __( 'Failed to load the public key', 'wc_paysafe' ),
				'publicKeyNotLoaded'  => __( 'No encryption public key was provided', 'wc_paysafe' ),
			),
			'publicKey'                 => base64_encode( $gateway->get_option( 'single_use_token_user_name' ) . ':' . $gateway->get_option( 'single_use_token_password' ) ),
			'errors'                    => array(
				'9012' => esc_js( __( 'Invalid setup. The supplied number of arguments is neither 3 nor 4.', 'wc_paysafe' ) ),
				'9062' => esc_js( __( 'Invalid setup. Setup function has been invoked and Paysafe Checkout is already opened or is loading at the moment.', 'wc_paysafe' ) ),
				'9013' => esc_js( __( 'The supplied apiKey parameter is not a string, is in invalid format or is not configured for Paysafe Checkout', 'wc_paysafe' ) ),
			),
		) );
		
		wp_localize_script( 'paysafe-checkout', 'paysafe_checkoutjs_params', $checkout_data );
	}
}