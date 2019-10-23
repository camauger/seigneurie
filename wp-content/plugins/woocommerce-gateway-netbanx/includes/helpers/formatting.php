<?php

namespace WcPaysafe\Helpers;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Description
 *
 * @since
 * @author VanboDevelops | Ivan Andreev
 *
 *        Copyright: (c) 2018 VanboDevelops
 *        License: GNU General Public License v3.0
 *        License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
class Formatting {
	
	/**
	 * Format amount for requests. Amount should be with no decimals and no leading 0.
	 *
	 * @since 2.0
	 *
	 * @param $amount
	 *
	 * @return string
	 */
	public static function format_amount( $amount ) {
		$formatted = ltrim( number_format( $amount, 2, '', '' ), '0' );
		
		// Since we are trimming 0 we can end up with an empty string on free orders
		// so in this case make sure amount is 0.
		if ( '' == $formatted ) {
			$formatted = 0;
		}
		
		return $formatted;
	}
	
	/**
	 * Convert string to UTF-8
	 *
	 * @since 2.0
	 *
	 * @param string $str
	 *
	 * @return string
	 */
	public static function convert_to_utf( $str ) {
		return mb_convert_encoding( $str, 'utf-8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS,windows-1251' );
	}
	
	/**
	 * Formats and returns a the passed string
	 *
	 * @since 2.0
	 *
	 * @param string $string            String to be formatted
	 * @param int    $limit             Limit characters of the string
	 * @param bool   $remove_restricted Whether to remove restricted characters
	 * @param string $suffix            Add to the end of the string
	 *
	 * @return string
	 */
	public static function format_string( $string, $limit, $remove_restricted = true, $suffix = '' ) {
		if ( function_exists( 'wc_trim_string' ) ) {
			$string = wc_trim_string( $string, $limit, $suffix );
		} else {
			if ( strlen( $string ) > $limit ) {
				$string = substr( $string, 0, ( $limit - 3 ) ) . $suffix;
			}
		}
		
		if ( $remove_restricted ) {
			$string = self::remove_restricted_characters( $string );
		}
		
		return html_entity_decode( self::convert_to_utf( $string ), ENT_NOQUOTES, 'UTF-8' );
	}
	
	/**
	 * Removes Paysafe request restricted characters from a string.
	 *
	 * 'paysafe_restricted_characters' - can be used to add to the restricted characters
	 *
	 * @since 2.1
	 *
	 * @param string $string
	 *
	 * @return string
	 */
	public static function remove_restricted_characters( $string ) {
		/**
		 * @deprecated netbanx_restricted_characters is deprecated use the filter below
		 */
		$restricted_characters = apply_filters(
			'netbanx_restricted_characters',
			array( '"', ';', '^', '*', '<', '>', '/', '[', ']', "\\", PHP_EOL )
		);
		
		$restricted_characters = apply_filters(
			'paysafe_restricted_characters',
			$restricted_characters
		);
		
		return str_replace( $restricted_characters, '', $string );
	}
	
	/**
	 * Returns the allowed order statuses, in which we can save the customer Paysafe profile to the order.
	 * We don't want to save the profiles too early in the order process.
	 * We want to make sure that the order is at least in a status that will not get overwritten by the WC order generation process.
	 *
	 * @since. 2.3
	 *
	 * @return mixed
	 */
	public static function allowed_order_status_to_save_profile() {
		/**
		 * @deprecated wc_netbanx_allowed_order_status_to_save_profile is deprecated use the action below
		 */
		$status = apply_filters(
			'wc_netbanx_allowed_order_status_to_save_profile',
			array(
				'processing',
				'on-hold',
				'completed'
			)
		);
		
		$status = apply_filters(
			'wc_paysafe_allowed_order_status_to_save_profile',
			$status
		);
		
		return $status;
	}
	
	/**
	 * Remove empty array elements from the array, recursively.
	 *
	 * @since 3.3.0
	 *
	 * @param array    $input
	 * @param callable $callback Additional callback to apply to the array_filter
	 *
	 * @return array
	 */
	public static function array_filter_recursive( array $input, callable $callback = null ) {
		foreach ( $input as &$value ) {
			if ( is_array( $value ) ) {
				$value = self::array_filter_recursive( $value );
			}
		}
		
		return array_filter( $input );
	}
}