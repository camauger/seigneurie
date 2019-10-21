<?php
/*
Plugin Name: WooCommerce Monetico(Classic) Gateway
Plugin URI: http://www.elsner.com/
Description: Extends WooCommerce by Adding the Monetico Gateway.
Version: 1.3
Author: Elsner Technologies Pvt. Ltd.
Author URI: http://www.elsner.com/
*/

// Include our Gateway Class and register Payment Gateway with WooCommerce
add_action( 'plugins_loaded', 'monetico_init', 0 );
function monetico_init() {
	// If the parent WC_Payment_Gateway class doesn't exist
	// it means WooCommerce is not installed on the site
	// so do nothing
	if ( ! class_exists( 'WC_Payment_Gateway' ) ) return;
	
	// If we made it this far, then include our Gateway Class
	include_once( 'monetico.php' );

	// Now that we have successfully included our class,
	// Lets add it too WooCommerce
	add_filter( 'woocommerce_payment_gateways', 'add_monetico_gateway' );
	function add_monetico_gateway( $methods ) {
		$methods[] = 'Monetico';
		return $methods;
	}
}

// Add custom action links
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'monetico_action_links' );
function monetico_action_links( $links ) {
	$plugin_links = array(
		'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout' ) . '">' . __( 'Settings', 'monetico' ) . '</a>',
	);

	// Merge our new link with the default ones
	return array_merge( $plugin_links, $links );	
}