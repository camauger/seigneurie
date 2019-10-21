<?php
/* Monetico Payment Gateway Class */
class Monetico extends WC_Payment_Gateway {

	// Setup our Gateway's id, description and other values
	function __construct() {

		// The global ID for this Payment method
		$this->id = "monetico";

		// The Title shown on the top of the Payment Gateways Page next to all the other Payment Gateways
		$this->method_title = __( "Monetico Classic", 'monetico' );

		// The description for this Payment Gateway, shown on the actual Payment options page on the backend
		$this->method_description = __( "Monetico Payment Gateway for WooCommerce", 'monetico' );

		// The title to be used for the vertical tabs that can be ordered top to bottom
		$this->title = __( "Monetico", 'monetico' );

		// If you want to show an image next to the gateway's name on the frontend, enter a URL to an image.
		$this->icon = plugins_url( '/img/credit-card-logos.png', __FILE__ );

		// Bool. Can be set to true if you want payment fields to show on the checkout 
		// if doing a direct integration, which we are doing in this case
		$this->has_fields = true;

		// Supports the default credit card form
		$this->supports = array( 'default_credit_card_form' );

		// This basically defines your settings which are then loaded with init_settings()
		$this->init_form_fields();

		// After init_settings() is called, you can get the settings and load them into variables, e.g:
		// $this->title = $this->get_option( 'title' );
		$this->init_settings();
		
		// Turn these settings into variables we can use
		foreach ( $this->settings as $setting_key => $value ) {
			$this->$setting_key = $value;
		}
		
		// Lets check for SSL
		//add_action( 'admin_notices', array( $this,	'do_ssl_check' ) );
		
		// Save settings
		if ( is_admin() ) {
			// Versions over 2.0
			// Save our administration options. Since we are not going to be doing anything special
			// we have not defined 'process_admin_options' in this class so the method in the parent
			// class will be used instead
			add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		}		
		
		add_action('woocommerce_receipt_monetico', array(&$this, 'receipt_page'));
			
		include_once( dirname( __FILE__ ) . '/class-wc-gateway-monetico-ipn-handler.php' );
		new WC_Gateway_Monetico_IPN_Handler();
			
	} // End __construct()

	// Build the administration fields for this specific Gateway
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title'		=> __( 'Enable / Disable', 'monetico' ),
				'label'		=> __( 'Enable this payment gateway', 'monetico' ),
				'type'		=> 'checkbox',
				'default'	=> 'no',
				
			),
			'title' => array(
				'title'		=> __( 'Title', 'monetico' ),
				'type'		=> 'text',
				'desc_tip'	=> __( 'Payment title the customer will see during the checkout process.', 'monetico' ),
				'default'	=> __( 'Pay Using Monetico', 'monetico' ),
			),
			'description' => array(
				'title'		=> __( 'Description', 'monetico' ),
				'type'		=> 'textarea',
				'desc_tip'	=> __( 'Payment description the customer will see during the checkout process.', 'monetico' ),
				'default'	=> __( 'Pay securely using your credit card.', 'monetico' ),
				'css'		=> 'max-width:350px;'
			),
			'environment' => array(
				'title'		=> __( 'Test Mode', 'monetico' ),
				'label'		=> __( 'Enable Test Mode', 'monetico' ),
				'type'		=> 'checkbox',
				'default'	=> 'no',
			),
			'language' => array(
				'title'    => __( 'Language', 'monetico' ),
				'type'     => 'select',
				'desc_tip' => __( 'Moneris supports only EN and FR', 'monetico' ),
				'default'  => 'EN',
				'options'  => array(
					'EN' => __( 'English', 'monetico' ),
					'FR' => __( 'French', 'monetico' ),
				),
			),
			'tpe' => array(
				'title'		=> __( 'EPT Number', 'monetico' ),
				'type'		=> 'text',
				'desc_tip'	=> __( 'Merchant’s virtual EPT number Example: 1234567.', 'monetico' ),
			),
			'societe' => array(
				'title'		=> __( 'Societe', 'monetico' ),
				'type'		=> 'text',
				'desc_tip'	=> __( 'Alphanumeric code to enable the merchant to use the same virtual EPT for different sites (separate configurations) relating to the same activity. The code is supplied by Monetico.', 'monetico' ),
			),
			'secret_key' => array(
				'title'		=> __( 'Secret Key', 'monetico' ),
				'type'		=> 'password',
				'desc_tip'	=> __( 'Secret Key to generate the seal from the data to certify and the merchant’s security key in its operational form.', 'monetico' ),
			),
		
			
		);		
	}
	
	/**
         *  There are no payment fields for Monetico, but we want to show the description if set.
    **/
    function payment_fields(){
		if($this->description) echo wpautop(wptexturize($this->description));
    }
		
	/**
	 * Receipt Page
	 **/
	function receipt_page($order){
		echo '<p>'.__('Thank you for your order, please click the button below to pay with Monetico.', 'mrova').'</p>';
		echo $this->generate_monetico_form($order);
	}
		
	/**
	 * Generate button link
	 **/
	public function generate_monetico_form($order_id)
	{
		if(!session_id())
			session_start(); 
		
		$_SESSION['monetico_order_id'] = $order_id;
		
		global $woocommerce;
		$order = new WC_Order($order_id);
		$return_url = esc_url_raw( add_query_arg( 'utm_nooverride', '1', $this->get_return_url( $order ) ) );
		
		$order_id = $order->id;     
		$description = $order->customer_note;
		if(empty($description)){
			$description = "Order is ".$order_id;
		}
		
		$tpe = $this->tpe;
			
		if($this->environment == 'yes')
			$redirect_url = 'https://p.monetico-services.com/test/paiement.cgi';
		else
			$redirect_url = 'https://p.monetico-services.com/paiement.cgi';
		
		$email = $order->billing_email;
		$date = current_time('d/m/Y:H:i:s');
		$reference = $order_id;
		$sOptions = "";
		$sNbrEch = "";
		$sDateEcheance1 = "";
		$sMontantEcheance1 = "";
		$sDateEcheance2 = "";
		$sMontantEcheance2 = "";
		$sDateEcheance3 = "";
		$sMontantEcheance3 = "";
		$sDateEcheance4 = "";
		$sMontantEcheance4 = "";
		$order_description = substr( $description, 0, 127 );
		
		// Control String for support
		$CtlHmac = sprintf('V1.04.sha1.php--[CtlHmac%s%s]-%s', '3.0', $this->tpe, $this->computeHmac(sprintf($this->secret_key, '3.0', $this->tpe)));

		// Data to certify
		$PHP1_FIELDS = sprintf('%s*%s*%s%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s*%s',     $this->tpe,
													  $date,
													  $order->order_total,
													  get_woocommerce_currency(),
													  $reference,
													  $order_description,
													  '3.0',
													  $this->language,
													  $this->societe, 
													  $email,
													  $sNbrEch,
													  $sDateEcheance1,
													  $sMontantEcheance1,
													  $sDateEcheance2,
													  $sMontantEcheance2,
													  $sDateEcheance3,
													  $sMontantEcheance3,
													  $sDateEcheance4,
													  $sMontantEcheance4,
													  $sOptions);

		// MAC computation
		$MAC = $this->computeHmac($PHP1_FIELDS);
		$monetico_args = array(
				'montant' => $order->order_total.get_woocommerce_currency(),
				'societe' => $this->societe,
				'version' => '3.0',
				'TPE' => $this->tpe,
				'date' => $date,
				'reference' => $reference,
				'MAC' => $MAC,
				'url_retour' => esc_url_raw( $order->get_cancel_order_url_raw() ),
				'url_retour_ok' => $return_url,
				'url_retour_err' => esc_url_raw( $order->get_cancel_order_url_raw() ),
				'lgue' => $this->language,
				'texte-libre' => $order_description,
				'mail' => $email,
				'nbrech' => $sNbrEch,
				'dateech1' => $sDateEcheance1,
				'montantech1' => $sMontantEcheance1,
				'dateech2' => $sDateEcheance2,
				'montantech2' => $sMontantEcheance2,
				'dateech3' => $sDateEcheance3,
				'montantech3' => $sMontantEcheance3,
				'dateech4' => $sDateEcheance4,
				'montantech4' => $sMontantEcheance4,
		);
				

		$monetico_args_array = array();
		foreach($monetico_args as $key => $value){
			$monetico_args_array[] = "<input type='hidden' name='$key' value='$value'/>";
		}
		return '<form action="'.$redirect_url.'" method="post" id="monetico_payment_form">
		' . implode('', $monetico_args_array) . '
		<input type="submit" class="button-alt" id="submit_monetico_payment_form" value="'.__('Pay via Monetico', 'monetico').'" /> <a class="button cancel" href="'.$order->get_cancel_order_url().'">'.__('Cancel order &amp; restore cart', 'monetico').'</a>
		<script type="text/javascript">
		jQuery(function(){
			jQuery("body").block(
			{
				message: "<img src=\"'.$woocommerce->plugin_url().'/assets/images/ajax-loader.gif\" alt=\"Redirecting…\" style=\"float:left; margin-right: 10px;\" />'.__('Thank you for your order. We are now redirecting you to monetico to make payment.', 'mrova').'",
				overlayCSS:
				{
					background: "#fff",
					opacity: 0.6
				},
				css: {
					padding:        20,
					textAlign:      "center",
					color:          "#555",
					border:         "3px solid #aaa",
					backgroundColor:"#fff",
					cursor:         "wait",
					lineHeight:"32px"
				}
			});
		jQuery("#submit_monetico_payment_form").click();

		});
		</script>
		</form>';
	}

	// Submit payment and handle response
	public function process_payment( $order_id ) {
		global $woocommerce;
		
		$order = new WC_Order($order_id);
		
		if ( version_compare( WOOCOMMERCE_VERSION, '2.1.0', '>=' ) ) { // For WC 2.1.0
			$checkout_payment_url = $order->get_checkout_payment_url( true );
		} else {
			$checkout_payment_url = get_permalink( get_option ( 'woocommerce_pay_page_id' ) );
		}

		return array(
			'result' => 'success', 
			'redirect' => add_query_arg(
				'order', 
				$order->id, 
				add_query_arg(
					'key', 
					$order->order_key, 
					$checkout_payment_url						
				)
			)
		);
		
	}
	
	// Validate fields
	public function validate_fields() {
		return true;
	}
	
	public function get_method()
	{
		if ($_SERVER["REQUEST_METHOD"] == "GET")  
			return $_GET; 

		if ($_SERVER["REQUEST_METHOD"] == "POST")
			return $_POST;

		return array();
	}
	
	public function computeHmac($sData) {

		return strtolower(hash_hmac("sha1", $sData, $this->_getUsableKey()));

		// If you don't have PHP 5 >= 5.1.2 and PECL hash >= 1.1 
		// you may use the hmac_sha1 function defined below
		//return strtolower($this->hmac_sha1($this->_sUsableKey, $sData));
	}
	
	private function _getUsableKey(){

		$hexStrKey  = substr($this->secret_key, 0, 38);
		$hexFinal   = "" . substr($this->secret_key, 38, 2) . "00";
    
		$cca0=ord($hexFinal); 

		if ($cca0>70 && $cca0<97) 
			$hexStrKey .= chr($cca0-23) . substr($hexFinal, 1, 1);
		else { 
			if (substr($hexFinal, 1, 1)=="M") 
				$hexStrKey .= substr($hexFinal, 0, 1) . "0"; 
			else 
				$hexStrKey .= substr($hexFinal, 0, 2);
		}


		return pack("H*", $hexStrKey);
	}

} // End of Monetico