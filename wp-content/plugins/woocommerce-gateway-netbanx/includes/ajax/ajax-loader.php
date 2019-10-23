<?php

namespace WcPaysafe\Ajax;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Ajax Loader Class
 *
 * @since  3.3.0
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2018 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
class Ajax_Loader {
	
	/**
	 * Registers all Ajax classes and initializes them.
	 */
	public function register() {
		$classes = array(
			'admin_ajax'        => '\\WcPaysafe\\Ajax\\Admin\\Ajax',
			'frontend_payments' => '\\WcPaysafe\\Ajax\\Frontend\\Payments',
		);
		
		foreach ( $classes as $prop => $class ) {
			$this->{$prop} = new $class;
			$this->{$prop}->hooks();
		}
	}
}