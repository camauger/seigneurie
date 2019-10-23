/* global paysafe_checkoutjs_params, Paysafe Checkout */
/* global paysafe_iframe_params */
(function ($) {
	$(document).ready(function () {
		wcPaysafeCheckout.onInit();
	});

	$(document.body).on('updated_checkout', function () {
		wcPaysafeCheckout.onUpdateCheckout();
	});

	var wcPaysafeCheckout = {
		gatewayId: paysafe_checkoutjs_params.gatewayId || 'netbanx',

		/**
		 * Loads the form
		 */
		onInit: function () {
			wcPaysafeCheckout.bindFormSubmissions();

			wcPaysafeCheckout.mimicCreateAccountToSaveToAccountCheckbox();
			wcPaysafeCheckout.hideEmptySavedMethodsInput();
			wcPaysafeCheckout.onSavedPaymentMethodInputsChange();

			$(document.body)
				.on('paysafeErrored', wcPaysafeCheckout.onError)
				.on('checkout_error', wcPaysafeCheckout.resetErrors);

			wcPaysafeCheckout.getFormElement().on('change', wcPaysafeCheckout.resetErrors);
		},

		/**
		 * Actions performed when the checkout is updated
		 */
		onUpdateCheckout: function () {
			wcPaysafeCheckout.mimicCreateAccountToSaveToAccountCheckbox();
			wcPaysafeCheckout.hideEmptySavedMethodsInput();
			wcPaysafeCheckout.onCreateAccountCheckboxChange();
		},

		bindFormSubmissions: function () {
			var form = $('#paysafe_checkout_payment_form');
			form.on('submit', wcPaysafeCheckout.makeToken);

			if (wcPaysafeCheckout.isAddPaymentMethodPage()) {
				// Add payment method form
				var addMethodForm = wcPaysafeCheckout.getFormElement();

				// Remove the submit action, which adds an overlay over the form
				addMethodForm.off('submit');

				addMethodForm.on('submit', function (e) {
					if (!wcPaysafeCheckout.isPaysafeChecked()) {
						return true;
					}

					wcPaysafeCheckout.makeToken(e);

					return false;
				});
			}

			if (wcPaysafeCheckout.isChangePaymentMethodPage()) {
				var changeMethodForm = wcPaysafeCheckout.getFormElement();

				// Remove the submit action, which adds an overlay over the form
				changeMethodForm.off('submit');

				changeMethodForm.on('submit', function (e) {
					if (!wcPaysafeCheckout.isPaysafeChecked()) {
						return true;
					}

					if (!wcPaysafeCheckout.isPayingWithNewMethod()) {
						return true;
					}

					wcPaysafeCheckout.makeToken(e);

					return false;
				});
			}
		},

		makeToken: function (e) {
			e.preventDefault();

			var options = {
				amount                : parseInt(!wcPaysafeCheckout.isUndefined(paysafe_iframe_params.options.amount) ? paysafe_iframe_params.options.amount : 0),
				currency              : paysafe_iframe_params.options.currency,
				companyName           : paysafe_iframe_params.options.companyName,
				holderName            : paysafe_iframe_params.options.holderName,
				environment           : paysafe_iframe_params.options.environment,
				locale                : paysafe_iframe_params.options.locale,
				preferredPaymentMethod: paysafe_iframe_params.options.preferredPaymentMethod,
			};

			if (!wcPaysafeCheckout.isUndefined(paysafe_iframe_params.options.accounts)) {
				options.accounts = {
					CC: parseInt(paysafe_iframe_params.options.accounts.CC)
				};
			}

			if (!wcPaysafeCheckout.isUndefined(paysafe_iframe_params.options.billingAddress)) {
				options.billingAddress = paysafe_iframe_params.options.billingAddress;
			}
			if ('' !== paysafe_iframe_params.options.imageUrl) {
				options.imageUrl = paysafe_iframe_params.options.imageUrl;
			}
			if ('' !== paysafe_iframe_params.options.buttonColor) {
				options.buttonColor = paysafe_iframe_params.options.buttonColor;
			}

			wcPaysafeCheckout.consoleLog('maketoken: options: ', options);

			$(document.body).triggerHandler('wc_paysafe_chechout_iframe_options', options);

			wcPaysafeCheckout.block(wcPaysafeCheckout.getFormElement());

			var paymentSuccess = false;
			paysafe.checkout.setup(
				paysafe_checkoutjs_params.publicKey,
				options,
				function (instance, error, result) {
					wcPaysafeCheckout.consoleLog('maketoken: result: ', {
						instance: instance,
						error   : error,
						result  : result,
					});

					wcPaysafeCheckout.unblock(wcPaysafeCheckout.getFormElement());

					/**
					 * error.code - Short error code identifying the error type.
					 * error.displayMessage - Provides an error message that can be displayed to users.
					 * error.detailedMessage - Provides a detailed error message that can be logged.
					 * error.correlationId - Unique ID which can be provided to the Paysafe Support team as a reference for investigation.
					 */

					if (null != result && result.token) {
						var action = paysafe_iframe_params.processAction || 'process_payment';

						var saveToAccount = $("input[name='wc-" + wcPaysafeCheckout.gatewayId + "-save-to-account']").prop('checked');
						var data = {
							security       : paysafe_checkoutjs_params.nonce[action],
							token          : result.token,
							payment_method : result.paymentMethod,
							save_to_account: saveToAccount,
						};

						if ('process_payment' === action) {
							data.order_id = paysafe_iframe_params.options.orderId;
						} else if ('update_payment_method' === action) {
							data.user_id = paysafe_iframe_params.options.userId;
							data.update_token_id = paysafe_iframe_params.options.update_token_id;
						} else if ('add_payment_method' === action) {
							data.user_id = paysafe_iframe_params.options.userId;
						} else if ('change_payment_method' === action) {
							data.order_id = paysafe_iframe_params.options.orderId;
						}

						$.ajax({
							type   : 'POST',
							data   : data,
							url    : wcPaysafeCheckout.formatAjaxURL(action),
							success: function (response) {
								// 1. Display the correct screen and message after the payment
								// 2. Set global state of the payment, so we can use it after the iframe is closed

								if (true == response.success) {
									// Show the success screen message
									instance.showSuccessScreen(response.data.message);
									paymentSuccess = true;
								} else {
									// Show the fail screen message
									instance.showFailureScreen(response.data.message);

								}
							}
						});
					} else {
						// Show the fail screen message
						if (null != instance) {
							instance.showFailureScreen(' Error: ' + error.displayMessage);
						} else {
							$(document.body).trigger('paysafeErrored', error.displayMessage + ' ' + error.detailedMessage);
						}

						wcPaysafeCheckout.unblock(wcPaysafeCheckout.getFormElement());
					}
				},
				function (stage) {
					/**
					 * stage==BeforePayment - No payment have been made
					 * stage==DuringPayment - Token have been issued, but the checkout overlay was closed from the user before instance flow control method was invoked
					 * stage==AfterPayment - Closed either via instance.close method or by the user from the success screen
					 */

					// Trigger action when the iframe is closed
					$(document.body).triggerHandler('wc_paysafe_iframe_closed', [stage, paymentSuccess]);

					if (stage === "AfterPayment") {

						// 1. If the payment is successful, redirect to the  Thank You page
						if (paymentSuccess) {
							var blockForm = wcPaysafeCheckout.getFormElement();

							// Block the area to prevent the customer from clicking the pay button again
							wcPaysafeCheckout.block(blockForm);

							window.parent.location.href = paysafe_iframe_params.urls.successRedirectPage;
						}
					} else {
						wcPaysafeCheckout.unblock(wcPaysafeCheckout.getFormElement());
					}
				}
			);
		},

		/**
		 * Binds the create account checkbox change.
		 * @since 3.3.0
		 */
		onCreateAccountCheckboxChange: function () {
			$('form.woocommerce-checkout').on('change', 'input#createaccount', wcPaysafeCheckout.mimicCreateAccountToSaveToAccountCheckbox);
		},

		/**
		 * Binds the Saved methods selection with the actions needed to be performed on change
		 */
		onSavedPaymentMethodInputsChange: function () {
			// Bind all inputs
			wcPaysafeCheckout.getFormElement().on('change', '.woocommerce-' + wcPaysafeCheckout.gatewayId + '-SavedPaymentMethods-tokenInput', function () {

				if (wcPaysafeCheckout.isPayingWithNewMethod()) {
					wcPaysafeCheckout.maybeShowSaveToAccountCheckbox();
				} else {
					wcPaysafeCheckout.hideSaveToAccountCheckbox();
				}
			});
		},

		maybeShowSaveToAccountCheckbox: function () {
			var account_el = $('input#createaccount');

			wcPaysafeCheckout.showSaveToAccountCheckbox();

			if (0 < account_el.length) {
				wcPaysafeCheckout.mimicCreateAccountToSaveToAccountCheckbox();
			}
		},

		/**
		 * Mimics the create account checkbox and if the customer is a guest,
		 * we will not show the save to account option
		 */
		mimicCreateAccountToSaveToAccountCheckbox: function () {
			var account = $('input#createaccount');

			if (0 >= account.length) {
				return;
			}

			if (account.is(':checked')) {
				wcPaysafeCheckout.showSaveToAccountCheckbox();
			} else {
				wcPaysafeCheckout.hideSaveToAccountCheckbox();
			}
		},

		showSaveToAccountCheckbox: function () {
			var el = $('.wc-' + wcPaysafeCheckout.gatewayId + '-save-to-account');

			if (0 === el.length) {
				return;
			}

			// Hide them all first
			wcPaysafeCheckout.hideSaveToAccountCheckbox();

			el.show();
		},

		hideSaveToAccountCheckbox: function () {
			var el = $('.wc-' + wcPaysafeCheckout.gatewayId + '-save-to-account');

			if (0 === el.length) {
				return;
			}

			el.hide();
		},

		/**
		 * Hides the "New" radio button, if there are no saved payment methods
		 */
		hideEmptySavedMethodsInput: function () {
			var savedMethodsWrapper = $('.woocommerce-' + wcPaysafeCheckout.gatewayId + '-SavedPaymentMethods-token-wrapper');

			if (0 === savedMethodsWrapper.data('count')) {
				savedMethodsWrapper.hide();
			}
		},

		/**
		 * Get WC AJAX endpoint URL.
		 *
		 * @param  {String} endpoint Endpoint.
		 * @return {String}
		 */
		formatAjaxURL: function (endpoint) {
			return paysafe_checkoutjs_params.ajaxUrl
				.toString()
				.replace('%%endpoint%%', 'paysafe_' + endpoint);
		},

		block: function (el, message) {
			if (wcPaysafeCheckout.isUndefined(el)) {
				return false;
			}

			if (!wcPaysafeCheckout.isMobile()) {
				message = !wcPaysafeCheckout.isUndefined(message) ? '<p>' + message + '</p>' : '';

				el.block({
					message   : message,
					overlayCSS: {
						background: '#fff',
						opacity   : 0.6
					}
				});
			}
		},

		unblock: function (el) {
			if (wcPaysafeCheckout.isUndefined(el)) {
				return false;
			}

			el.unblock();
		},

		isMobile: function () {
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				return true;
			}

			return false;
		},

		consoleLog: function (message, object) {
			object = object || {};

			if (wcPaysafeCheckout.isScriptDev()) {
				console.log(message, object);
			}
		},

		isScriptDev: function () {
			return !wcPaysafeCheckout.isUndefined(paysafe_checkoutjs_params.scriptDev) && '1' === paysafe_checkoutjs_params.scriptDev;
		},

		isUndefined: function (e) {
			return 'undefined' === typeof (e);
		},

		/**
		 * @returns {*}
		 */
		isPaysafeChecked: function () {
			return $('#payment_method_' + paysafe_checkoutjs_params.gatewayId).is(':checked');
		},

		isPayingWithNewMethod: function () {
			return $('#wc-' + paysafe_checkoutjs_params.gatewayId + '-payment-token-new').is(':checked');
		},

		isAddPaymentMethodPage: function () {
			return !wcPaysafeCheckout.isUndefined(paysafe_checkoutjs_params.isAddPaymentMethodPage) && '1' === paysafe_checkoutjs_params.isAddPaymentMethodPage;
		},

		isUpdatePaymentMethodPage: function () {
			return !wcPaysafeCheckout.isUndefined(paysafe_checkoutjs_params.isUpdatePaymentMethodPage) && '1' === paysafe_checkoutjs_params.isUpdatePaymentMethodPage;
		},

		isPayForOrderPage: function () {
			return !wcPaysafeCheckout.isUndefined(paysafe_checkoutjs_params.isPayForOrderPage) && '1' === paysafe_checkoutjs_params.isPayForOrderPage;
		},

		isCheckoutPage: function () {
			return !wcPaysafeCheckout.isUndefined(paysafe_checkoutjs_params.isCheckoutPage) && '1' === paysafe_checkoutjs_params.isCheckoutPage;
		},

		isChangePaymentMethodPage: function () {
			return !wcPaysafeCheckout.isUndefined(paysafe_checkoutjs_params.isChangePaymentMethodPage) && '1' === paysafe_checkoutjs_params.isChangePaymentMethodPage;
		},

		/**
		 * Resets the displayed errors
		 */
		resetErrors: function () {
			$('.wc-paysafe-error').remove();
		},
		/**
		 * Displays the errors
		 * @param e
		 * @param result
		 */
		onError    : function (e, result) {
			var message = result;

			wcPaysafeCheckout.resetErrors();

			var form = wcPaysafeCheckout.getFormElement();
			form.append('<ul class="woocommerce_error woocommerce-error wc-paysafe-error"><li>' + message + '</li></ul>');

			var error = $('.wc-paysafe-error');
			if (error.length) {
				$('html, body').animate({
					scrollTop: (error.offset().top - 200)
				}, 200);
			}
		},

		getFormElement: function () {
			var form = $('#paysafe_checkout_payment_form');
			if (wcPaysafeCheckout.isAddPaymentMethodPage()) {
				form = $('#add_payment_method');
			} else if (wcPaysafeCheckout.isChangePaymentMethodPage()) {
				form = $('#order_review');
			}

			return form;
		}
	};


})(jQuery);