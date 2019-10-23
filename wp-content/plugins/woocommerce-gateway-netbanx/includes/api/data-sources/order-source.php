<?php

namespace WcPaysafe\Api\Data_Sources;

use WcPaysafe\Compatibility\WC_Compatibility;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Implementation of the Order data source
 *
 * @since  3.3.0
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2018 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
class Order_Source extends Data_Source_Abstract {
	
	public $source_type = 'order';
	
	public function __construct( \WC_Order $order ) {
		$this->source = $order;
	}
	
	public function get_address_field( $name, $type = 'billing' ) {
		return WC_Compatibility::get_order_prop( $this->get_source(), $type . '_' . $name );
	}
	
	/**
	 * @return mixed
	 */
	public function get_description() {
		return apply_filters( 'wc_paysafe_request_description', sprintf( __( 'Paying for order #%s', 'wc_paysafe' ), $this->get_source()->get_order_number() ), $this->get_source(), $this->get_source_type() );
	}
	
	public function return_url() {
		return $this->get_source()->get_checkout_order_received_url();
	}
	
	public function get_cancel_url() {
		return $this->get_source()->get_cancel_order_url();
	}
}