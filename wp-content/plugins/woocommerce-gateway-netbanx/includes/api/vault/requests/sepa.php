<?php

namespace WcPaysafe\Api\Vault\Requests;

use Paysafe\CustomerVault\SEPABankaccounts;
use WcPaysafe\Api\Data_Sources\Data_Source_Interface;
use WcPaysafe\Api\Data_Sources\Order_Source;
use WcPaysafe\Api\Data_Sources\User_Source;
use WcPaysafe\Api\Request_Abstract;
use WcPaysafe\Api\Request_Fields\Vault_Fields;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Wrapper for the SDK Vault services.
 *
 * @since  3.3.0
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2018 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
class Sepa extends Request_Abstract {
	
	/**
	 * @param Order_Source|User_Source|Data_Source_Interface $source
	 *
	 * @return \WcPaysafe\Api\Vault\Parameters\Sepa
	 */
	public function get_request_builder( $source ) {
		return new \WcPaysafe\Api\Vault\Parameters\Sepa( new Vault_Fields( $source ), $this->get_configuration() );
	}
	
	/**
	 * @param $params
	 *
	 * @return \WcPaysafe\Api\Vault\Responses\Sepa
	 * @throws \Paysafe\PaysafeException
	 */
	public function create_from_single_use_token( $params ) {
		return new \WcPaysafe\Api\Vault\Responses\Sepa( $this->sdk->customerVaultService()->createSEPABankAccountFromSingleUseToken(
			new SEPABankaccounts( $params )
		) );
	}
	
	/**
	 * @param $params
	 *
	 * @return \WcPaysafe\Api\Vault\Responses\Sepa
	 * @throws \Paysafe\PaysafeException
	 */
	public function create( $params ) {
		return new \WcPaysafe\Api\Vault\Responses\Sepa( $this->sdk->customerVaultService()->createSEPABankAccount(
			new SEPABankaccounts( $params )
		) );
	}
	
	/**
	 *
	 *
	 * @param $params
	 *
	 * @return bool
	 * @throws \Paysafe\PaysafeException
	 */
	public function delete( $params ) {
		return $this->sdk->customerVaultService()->deleteSEPABankAccount(
			new SEPABankaccounts( $params )
		);
	}
	
	/**
	 * @param $params
	 *
	 * @return \WcPaysafe\Api\Vault\Responses\Sepa
	 * @throws \Paysafe\PaysafeException
	 */
	public function update( $params ) {
		return new \WcPaysafe\Api\Vault\Responses\Sepa( $this->sdk->customerVaultService()->updateSEPABankAccount(
			new SEPABankaccounts( $params )
		) );
	}
	
	/**
	 * @param $params
	 *
	 * @return \WcPaysafe\Api\Vault\Responses\Sepa
	 * @throws \Paysafe\PaysafeException
	 */
	public function get( $params ) {
		return new \WcPaysafe\Api\Vault\Responses\Sepa( $this->sdk->customerVaultService()->getSEPABankAccount(
			new SEPABankaccounts( $params )
		) );
	}
}