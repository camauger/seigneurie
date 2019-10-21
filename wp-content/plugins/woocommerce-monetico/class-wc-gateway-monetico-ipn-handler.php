<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Gateway_Monetico_IPN_Handler{

	public function __construct() {
		add_action( 'woocommerce_api_monetico', array( $this, 'check_response' ) );
	}

	/**
	 * Check for Monetico IPN Response.
	 */
	public function check_response() {
		if(! empty( $_POST ) && isset($_POST['code-retour']) && $_POST['code-retour'] != '')
		{		
			$posted = $_POST;
			$order = wc_get_order( $posted['reference'] );
			if($_POST['code-retour'] == 'payetest' || $_POST['code-retour'] == 'paiement' || $_POST['code-retour'] == 'paiement_pf2' || $_POST['code-retour'] == 'paiement_pf3' || $_POST['code-retour'] == 'paiement_pf4')
			{
				$this->payment_status_completed( $order, $posted);
				$status = 'completed';
				$response_msg = __( 'Payment Approved', 'woocommerce' );
			}
			else
			{
				$this->payment_status_failed( $order, $posted);
				$status = 'failed'; 
				$response_msg = __( 'Payment Failed', 'woocommerce' );
			}
			
			printf ("version=2\ncdr=%s", "0");
			exit;
		}

		printf ("version=2\ncdr=%s", "1");
		exit;
	}

	/**
	 * Handle a completed payment.
	 * @param WC_Order $order
	 * @param array $posted
	 */
	protected function payment_status_completed( $order, $posted) {
		if ( $order->has_status( wc_get_is_paid_statuses() ) ) {
			exit;
		}

		update_post_meta( $order->get_id(), 'monetico_payment_response', $posted );

		if ( $order->has_status( 'cancelled' ) ) {
			$this->payment_status_paid_cancelled_order( $order, $posted );
		}

		$order->payment_complete( ! empty( $posted['reference'] ) ? wc_clean( $posted['reference'] ) : '');
	}

	/**
	 * Handle a failed payment.
	 * @param WC_Order $order
	 * @param array $posted
	 */
	protected function payment_status_failed( $order, $posted) {
		$order->update_status( 'failed', __( 'Payment failed via IPN.', 'woocommerce' ) );
	}
	
	/**
	 * When a user cancelled order is marked paid.
	 *
	 * @param WC_Order $order
	 * @param array $posted
	 */
	protected function payment_status_paid_cancelled_order( $order, $posted ) {
		$this->send_ipn_email_notification(
			sprintf( __( 'Payment for cancelled order %s received', 'woocommerce' ), '<a class="link" href="' . esc_url( admin_url( 'post.php?post=' . $order->get_id() . '&action=edit' ) ) . '">' . $order->get_order_number() . '</a>' ),
			sprintf( __( 'Order #%1$s has been marked paid by Monetico IPN, but was previously cancelled. Admin handling required.', 'woocommerce' ), $order->get_order_number() )
		);
	}
}
