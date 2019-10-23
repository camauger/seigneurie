<?php

namespace WcPaysafe\Api\Config;

use WcPaysafe\Api\Data_Sources\Data_Source_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Implementation of the Redirect Gateway class
 *
 * @since  3.3.0
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2018 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
class Redirect extends Configuration_Abstract {
	
	/**
	 * @param null|Data_Source_Interface $data_source
	 * @param string                     $payment_type cards|directdebit|interac
	 *
	 * @return int
	 */
	public function get_account_id( $data_source = null, $payment_type = null ) {
		return $this->get_gateway()->get_account_id( $data_source, $payment_type );
	}
	
	public function get_user_ip_addr() {
		$ip = '127.0.0.1';
		
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif ( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		if ( false !== strpos( $ip, ',' ) ) {
			$split = explode( ',', $ip );
			$ip    = trim( $split[0] );
		}
		
		return apply_filters( 'wc_paysafe_redirect_user_ip_address', $ip, $this );
	}
	
	public function send_customer_ip() {
		return 'yes' == $this->get_gateway()->get_option( 'send_ip_address', '' );
	}
	
	public function is_testmode() {
		return 'yes' == $this->get_gateway()->get_option( 'testmode', 'yes' );
	}
	
	public function get_authorization_type() {
		return $this->get_gateway()->get_option( 'authorization_type', 'sale' );
	}
	
	public function get_layover_image_url() {
		return $this->get_gateway()->get_option( 'layover_image_url', '' );
	}
	
	public function get_layover_button_color() {
		$value = str_replace( '#', '', $this->get_gateway()->get_option( 'layover_button_color', '' ) );
		
		if ( $value && 0 !== strpos( '#', trim( $value ) ) ) {
			$value = '#' . $value;
		}
		
		return $value;
	}
	
	public function get_layover_preferred_payment_method() {
		return $this->get_gateway()->get_option( 'layover_preferred_payment_method', '' );
	}
	
	public function get_company_name() {
		$name = '' != $this->get_gateway()->get_option( 'layover_merchant_name', '' ) ? $this->get_gateway()->get_option( 'layover_merchant_name', '' ) : get_bloginfo( 'name' );
		
		return apply_filters( 'wc_paysafe_redirect_company_name', $name, $this->get_gateway() );
	}
	
	public function get_locale() {
		return $this->get_gateway()->get_option( 'locale', 'en_US' );
	}
	
	public function get_user_prefix() {
		return $this->get_gateway()->get_option( 'user_prefix' );
	}
}