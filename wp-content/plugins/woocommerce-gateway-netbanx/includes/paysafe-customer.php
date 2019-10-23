<?php

namespace WcPaysafe;

use WcPaysafe;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Order wrapper for gateway order data
 *
 * @since  3.3.0
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2018 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
class Paysafe_Customer {
	
	/**
	 * @var \WP_User
	 */
	public $customer;
	
	/**
	 * Paysafe_Order constructor.
	 *
	 * TODO: Why not make the user WC_Customer instead of WP_User. It will allow be much easier method transitions
	 *
	 * @param \WP_User $customer
	 */
	public function __construct( $customer ) {
		$this->customer = $customer;
	}
	
	/**---------------------------------
	 * GETTERS
	 * -----------------------------------*/
	
	/**
	 * Returns the user ID
	 * @return int
	 */
	public function get_id() {
		return $this->customer->ID;
	}
	
	public function get_meta_prop( $key, $single = true ) {
		return get_user_meta( $this->get_id(), $key, $single );
	}
	
	/**
	 * Generates a profile ID for the customer
	 *
	 * @param string $prefix
	 *
	 * @return string
	 */
	public function generate_merchant_customer_id( $prefix = 'wc-paysafe-' ) {
		$id = uniqid( apply_filters( 'wc_paysafe_merchant_customer_id_prefix', $prefix, $this->get_id() ) ) . '-' . $this->get_id();
		
		$this->save_merchant_customer_id( $id );
		
		return $id;
	}
	
	/**
	 * Returns the customer unique merchant customer ID
	 * @since 3.3.0
	 *
	 * @param string $prefix
	 *
	 * @return mixed
	 */
	public function get_merchant_customer_id( $prefix = 'wc-paysafe-' ) {
		$id = $this->get_meta_prop( '_paysafe_merchant_customer_id' );
		if ( empty( $id ) ) {
			return $this->generate_merchant_customer_id( $prefix );
		}
		
		return $id;
	}
	
	/**
	 *
	 *
	 * @return bool|mixed
	 */
	public function get_vault_profile_id() {
		$id = $this->get_meta_prop( $this->get_vault_profile_id_field_name() );
		if ( empty( $id ) ) {
			return false;
		}
		
		return $id;
	}
	
	/**
	 * @param string $gateway_id
	 * @param array  $args
	 *
	 * @throws \Exception
	 * @return WcPaysafe\Api\Vault\Responses\Profiles
	 */
	public function get_vault_sources( $gateway_id, $args = array() ) {
		$gateway = WcPaysafe\Helpers\Factories::get_gateway( $gateway_id );
		
		$api_client = WcPaysafe\Helpers\Factories::get_api_client( $gateway, 'directdebit' );
		
		$defaults = array(
			'addresses' => false,
			'cards'     => false,
			'ach'       => false,
			'eft'       => false,
			'bacs'      => false,
			'sepa'      => false,
		);
		
		$params = wp_parse_args( $args, $defaults );
		
		$profile = $api_client->get_vault_service()->profile()->get(
			array( 'id' => $this->get_vault_profile_id() ),
			$params['addresses'],
			$params['cards'],
			$params['ach'],
			$params['eft'],
			$params['bacs'],
			$params['sepa']
		);
		
		return $profile;
	}
	
	
	/**---------------------------------------------------
	 * CREATE
	 * ---------------------------------------------------*/
	
	/**
	 * @since 3.3.0
	 *
	 * @param        $key
	 * @param        $value
	 * @param bool   $unique (False)
	 *
	 * @return bool|int
	 */
	public function add_meta_prop( $key, $value, $unique = false ) {
		return add_user_meta( $this->get_id(), $key, wc_clean( $value ), $unique );
	}
	
	/**---------------------------------------------------
	 * UPDATE
	 * ---------------------------------------------------*/
	
	/**
	 * @since 3.3.0
	 *
	 * @param        $key
	 * @param        $value
	 * @param string $prev_value
	 *
	 * @return bool|int
	 */
	public function update_meta_prop( $key, $value, $prev_value = '' ) {
		return update_user_meta( $this->get_id(), $key, wc_clean( $value ), $prev_value );
	}
	
	/**
	 * @since 3.3.0
	 *
	 * @param string $value
	 * @param string $prev_value
	 */
	public function save_merchant_customer_id( $value, $prev_value = '' ) {
		$this->update_meta_prop( '_paysafe_merchant_customer_id', $value, $prev_value );
	}
	
	/**
	 * TODO: IMPORTANT: Make a note to the Admin in the admin settings that changing the live account can result in failure all saved tokens!!!
	 *
	 * @since 3.3.0
	 *
	 * @param        $value
	 * @param string $prev_value
	 */
	public function save_vault_profile_id( $value, $prev_value = '' ) {
		$this->update_meta_prop( $this->get_vault_profile_id_field_name(), $value, $prev_value );
	}
	
	/**
	 * Returns the meta field name of the vault profile ID.
	 * We need this because a merchant can have two or more completely separate accounts for testing and live transactions.
	 * Profiles on the testing account will not work on the live account because the system sees them as separate merchants.
	 * To make it easier for the merchant to work with those accounts, we will use separate profile account id meta names.
	 * This is not a foolproof way to handle the separate accounts, but it will help.
	 *
	 * @since 3.3.0
	 *
	 * @return mixed
	 */
	public function get_vault_profile_id_field_name() {
		$gateway = WcPaysafe\Helpers\Factories::get_gateway( 'netbanx' );
		
		if ( 'yes' == $gateway->testmode ) {
			$field_name = '_paysafe_testmode_vault_profile_id';
		} else {
			$field_name = '_paysafe_vault_profile_id';
		}
		
		return apply_filters( 'wc_paysafe_vault_profile_field_name', $field_name, $gateway );
	}
	
	/**---------------------------------------------------
	 * DELETE
	 * ---------------------------------------------------*/
	/**
	 * Deletes user meta value
	 *
	 * @param $key
	 * @param $value
	 *
	 * @return bool
	 */
	public function delete_meta_prop( $key, $value = '' ) {
		return delete_user_meta( $this->get_id(), $key, $value );
	}
	
	/**
	 * @since 3.3.0
	 *
	 * @param $value
	 *
	 * @return bool|int
	 */
	public function delete_merchant_customer_id( $value = '' ) {
		return $this->delete_meta_prop( '_paysafe_merchant_customer_id', $value );
	}
	
	/**
	 * @param string $value
	 *
	 * @return bool
	 */
	public function delete_vault_profile_id( $value = '' ) {
		return $this->delete_meta_prop( $this->get_vault_profile_id_field_name(), $value );
	}
	
	/**
	 * Returns profile ID saved to the user meta
	 *
	 * @since 3.3.0
	 *
	 * @return mixed
	 */
	public function get_legacy_profile_id() {
		return get_user_meta( $this->get_id(), '_netbanx_hosted_customer_profile_id', true );
	}
	
	/**
	 * @since 3.3.0
	 *
	 * @param $value
	 */
	public function save_legacy_profile_id( $value ) {
		update_user_meta( $this->get_id(), '_netbanx_hosted_customer_profile_id', $value );
	}
	
	/**
	 * Returns profile token saved to the user meta
	 *
	 * @since 3.3.0
	 *
	 * @return mixed
	 */
	public function get_legacy_profile_token() {
		return get_user_meta( $this->get_id(), '_netbanx_hosted_customer_profile_token', true );
	}
	
	/**
	 * @since 3.3.0
	 *
	 * @param $value
	 */
	public function save_legacy_profile_token( $value ) {
		update_user_meta( $this->get_id(), '_netbanx_hosted_customer_profile_token', $value );
	}
}