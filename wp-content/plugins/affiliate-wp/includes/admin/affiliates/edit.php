<?php
$affiliate                    = affwp_get_affiliate( absint( $_GET['affiliate_id'] ) );
$user_info                    = get_userdata( $affiliate->user_id );
$rate_type                    = ! empty( $affiliate->rate_type ) ? $affiliate->rate_type : '';
$flat_rate_basis              = ! empty( $affiliate->flat_rate_basis ) ? $affiliate->flat_rate_basis : '';
$rate                         = isset( $affiliate->rate ) ? $affiliate->rate : null;
$rate                         = affwp_abs_number_round( $affiliate->rate );
$default_rate                 = affiliate_wp()->settings->get( 'referral_rate', 20 );
$default_rate                 = affwp_abs_number_round( $default_rate );
$email                        = ! empty( $affiliate->payment_email ) ? $affiliate->payment_email : '';
$reason                       = affwp_get_affiliate_meta( $affiliate->affiliate_id, '_rejection_reason', true );
$promotion_method             = get_user_meta( $affiliate->user_id, 'affwp_promotion_method', true );
$notes                        = affwp_get_affiliate_meta( $affiliate->affiliate_id, 'notes', true );
$payout_service_account       = affwp_get_affiliate_meta( $affiliate->affiliate_id, 'payouts_service_account', true );
$payout_service_payout_method = affwp_get_affiliate_meta( $affiliate->affiliate_id, 'payouts_service_payout_method', true );
?>
<div class="wrap">

	<h2><?php _e( 'Edit Affiliate', 'affiliate-wp' ); ?></h2>

	<form method="post" id="affwp_edit_affiliate">

		<?php
		/**
		 * Fires at the top of the edit-affiliate admin screen, just inside of the form element.
		 *
		 * @param \AffWP\Affiliate $affiliate The affiliate object being edited.
		 */
		do_action( 'affwp_edit_affiliate_top', $affiliate );
		?>

		<table class="form-table">

			<tr class="form-row form-required">

				<th scope="row">
					<label for="affiliate_first_last"><?php _e( 'Affiliate Name', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="regular-text" type="text" name="affiliate_first_last" id="affiliate_first_last" value="<?php echo esc_attr( affwp_get_affiliate_name( $affiliate->affiliate_id ) ); ?>" disabled="1" />
					<p class="description">
						<?php echo sprintf( __( 'The affiliate&#8217;s first and/or last name. Will be empty if no name is specified. This can be changed on the <a href="%1$s" alt="%2$s">user edit screen</a>.', 'affiliate-wp' ),
							esc_url( get_edit_user_link( $affiliate->user_id ) ),
							esc_attr__( 'A link to the user edit screen for this user.', 'affiliate-wp' )
						); ?>
					</p>
				</td>

			</tr>

			<tr class="form-row form-required">

				<th scope="row">
					<label for="affiliate_id"><?php _e( 'Affiliate ID', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="medium-text" type="text" name="affiliate_id" id="affiliate_id" value="<?php echo esc_attr( $affiliate->affiliate_id ); ?>" disabled="1" />
					<p class="description"><?php _e( 'The affiliate&#8217;s ID. This cannot be changed.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row form-required">

				<th scope="row">
					<label for="affiliate_id"><?php _e( 'Affiliate URL', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="large-text" type="text" name="affiliate_url" id="affiliate_url" value="<?php echo esc_attr( affwp_get_affiliate_referral_url( array( 'affiliate_id' => $affiliate->affiliate_id ) ) ); ?>" disabled="1" />
					<p class="description"><?php _e( 'The affiliate&#8217;s referral URL. This is based on global settings.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row form-required">

				<th scope="row">
					<label for="user_id"><?php _e( 'User ID', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="medium-text" type="text" name="user_id" id="user_id" value="<?php echo esc_attr( $affiliate->user_id ); ?>" disabled="1" />
					<p class="description"><?php _e( 'The affiliate&#8217;s user ID. This cannot be changed.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row form-required">

				<th scope="row">
					<label for="user_login"><?php _e( 'Username', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="regular-text" type="text" name="user_login" id="user_login" value="<?php echo esc_attr( $user_info->user_login ); ?>" disabled="1" />
					<p class="description"><?php _e( 'The affiliate&#8217;s username. This cannot be changed.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row form-required">

				<th scope="row">
					<label for="date_registered"><?php _e( 'Registration Date', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="medium-text" type="text" name="date_registered" id="date_registered" value="<?php echo esc_attr( $affiliate->date_i18n( 'datetime' ) ); ?>" disabled="1" />
					<p class="description"><?php _e( 'The affiliate&#8217;s registration date. This cannot be changed.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="status"><?php _e( 'Affiliate Status', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<select name="status" id="status">
						<?php
						$statuses = affwp_get_affiliate_statuses();

						/*
						 * Only include and display the Rejected status if that's the current
						 * status, otherwise hide it as it's part of the approval process.
						 */
						if ( 'rejected' !== $affiliate->status ) {
							unset( $statuses['rejected'] );
						}
						?>

						<?php foreach ( $statuses as $status => $label ) : ?>
							<option value="<?php echo esc_attr( $status ); ?>" <?php selected( $affiliate->status, $status ); ?>>
								<?php echo esc_html( $label ); ?>
							</option>
						<?php endforeach; ?>
					</select>
					<p class="description"><?php _e( 'The status assigned to the affiliate&#8217;s account. Updating the status could trigger account related events, such as email notifications.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="website"><?php _e( 'Website', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="medium-text" type="text" name="website" id="website" value="<?php echo esc_attr( $user_info->user_url ); ?>" disabled="disabled" />
					<p class="description">
						<?php echo wp_sprintf( __( 'The affiliate&#8217;s website. Will be empty if no website is specified. This can be changed on the <a href="%1$s" alt="%2$s">user edit screen</a>.', 'affiliate-wp' ),
							esc_url( get_edit_user_link( $affiliate->user_id ) ),
							esc_attr__( 'A link to the user edit screen for this user.', 'affiliate-wp' )
						); ?>
					</p>
				</td>
			</tr>

			<tr class="form-row">

				<th scope="row">
					<?php _e( 'Referral Rate Type', 'affiliate-wp' ); ?>
				</th>

				<td>
					<fieldset id="rate_type">
						<legend class="screen-reader-text"><?php _e( 'Referral Rate Type', 'affiliate-wp' ); ?></legend>
						<label for="rate_type_default">
							<input type="radio" name="rate_type" id="rate_type_default" value="" <?php checked( $rate_type, '' ); ?>/><?php echo __( 'Site Default', 'affiliate-wp' ); ?>
						</label>
						<br/>
						<?php foreach ( affwp_get_affiliate_rate_types() as $key => $type ) :
							$value = esc_attr( $key ); ?>
							<label for="rate_type_<?php echo $value; ?>">
								<input type="radio" name="rate_type" id="rate_type_<?php echo $value; ?>" value="<?php echo $value; ?>"<?php checked( $rate_type, $key ); ?>><?php echo esc_html( $type ); ?>
							</label>
							<br/>
						<?php endforeach; ?>
					<p class="description"><?php _e( 'The affiliate&#8217;s referral rate type.', 'affiliate-wp' ); ?></p>
					</fieldset>
				</td>

			</tr>

			<tr class="<?php echo $affiliate->rate_type !== 'flat' ? 'form-row affwp-hidden' : 'form-row' ?>">

				<th scope="row">
					<?php _e( 'Flat Rate Referral Basis', 'affiliate-wp' ); ?>
				</th>

				<td>
					<fieldset id="flat_rate_basis">
						<legend class="screen-reader-text"><?php _e( 'Flat Rate Referral Basis', 'affiliate-wp' ); ?></legend>
						<?php foreach ( affwp_get_affiliate_flat_rate_basis_types() as $key => $type ) :
							$value = esc_attr( $key ); ?>
							<label for="rate_type_<?php echo $value; ?>">
								<input type="radio" name="flat_rate_basis" id="rate_type_<?php echo $value; ?>" value="<?php echo $value; ?>" <?php checked( $flat_rate_basis, $key ); ?>><?php echo esc_html( $type ); ?>
							</label>
							<br/>
						<?php endforeach; ?>
					<p class="description"><?php _e( 'The affiliate&#8217;s flat rate referral basis.', 'affiliate-wp' ); ?></p>
					</fieldset>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="rate"><?php _e( 'Referral Rate', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="regular-text" type="number" name="rate" id="rate" step="0.01" min="0" max="999999999" placeholder="<?php echo esc_attr( $default_rate ); ?>" value="<?php echo esc_attr( $rate ); ?>"/>
					<p class="description"><?php _e( 'The affiliate&#8217;s referral rate, such as 20 for 20%. If left blank, the site default will be used.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="account-email"><?php _e( 'Account Email', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="regular-text" type="text" name="account_email" id="account-email" value="<?php echo $user_info->user_email; ?>" />
					<p class="description"><?php _e( 'The affiliate&#8217;s account email. Updating this will change the email address shown on the user&#8217;s profile page.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row form-required">

				<th scope="row">
					<label for="payment_email"><?php _e( 'Payment Email', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<input class="regular-text" type="text" name="payment_email" id="payment_email" value="<?php echo esc_attr( $email ); ?>"/>
					<p class="description"><?php _e( 'Affiliate&#8217;s payment email for systems such as PayPal, Moneybookers, or others. Leave blank to use the affiliate&#8217;s user email.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<?php if ( affiliate_wp()->settings->get( 'enable_payouts_service' ) ) : ?>

				<tr class="form-row form-required">

					<th scope="row">
						<label for="payment_email"><?php _e( 'Payout Method', 'affiliate-wp' ); ?></label>
					</th>
					<td>
						<?php if ( $payout_service_payout_method ) : ?>

							<?php if ( 'bank_account' === $payout_service_payout_method['payout_method'] ) : ?>

								<p><?php printf( __( '<strong>Bank Name: </strong> %s', 'affiliate-wp' ), $payout_service_payout_method['bank_name'] ); ?></p>
								<p><?php printf( __( '<strong>Account Holder Name: </strong> %s', 'affiliate-wp' ), $payout_service_payout_method['account_name'] ); ?></p>
								<p><?php printf( __( '<strong>Account Number: </strong> %s', 'affiliate-wp' ), $payout_service_payout_method['account_no'] ); ?></p>

							<?php else: ?>

								<p><?php printf( __( '<strong>Card: </strong> %s', 'affiliate-wp' ), $payout_service_payout_method['card'] ); ?></p>
								<p><?php printf( __( '<strong>Expiry: </strong> %s', 'affiliate-wp' ), $payout_service_payout_method['expiry'] ); ?></p>

							<?php endif; ?>

						<?php endif; ?>
						<p class="description"><?php _e( 'Affiliate&#8217;s payout method details on the Payouts Service.', 'affiliate-wp' ); ?></p>
					</td>

				</tr>

				<tr class="form-row form-required">

					<th scope="row">
						<label for="kyc_status"><?php _e( 'Identity Verification', 'affiliate-wp' ); ?></label>
					</th>

					<td>
						<?php
						$value = '';
						if ( $payout_service_account && isset( $payout_service_account['kyc_status'] ) ) {
							$value = ucfirst( $payout_service_account['kyc_status'] );
						}
						echo esc_attr( $value );
						?>
						<p class="description"><?php _e( 'Affiliate&#8217;s identity verification status on the Payouts Service.', 'affiliate-wp' ); ?></p>
					</td>

				</tr>

				<tr class="form-row form-required">

					<th scope="row">
						<label for="kyc_link"><?php _e( 'Identity Verification Link', 'affiliate-wp' ); ?></label>
					</th>

					<td>
						<?php
						if ( $payout_service_account && isset( $payout_service_account['kyc_link'] ) ) {
							$kyc_link = $payout_service_account['kyc_link'];
							echo wp_sprintf( __( '<a href="%1$s" target="_blank" alt="%2$s">%3$s</a>', 'affiliate-wp' ),
								esc_url( $kyc_link ),
								esc_attr__( 'A link to the identity verification page on the Payouts Service', 'affiliate-wp' ),
								esc_url( $kyc_link )
							);
						}
						?>

						<p class="description"><?php _e( 'Affiliate&#8217;s identity verification link on the Payouts Service.', 'affiliate-wp' ); ?></p>
					</td>

				</tr>
			<?php endif; ?>

			<tr class="form-row form-required">

				<th scope="row">
					<label for="promotion_methods"><?php _e( 'Promotion Methods', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<textarea name="promotion_methods" rows="5" cols="50" id="promotion_methods" class="large-text" disabled="disabled"><?php echo esc_html( $promotion_method ); ?></textarea>
					<p class="description"><?php _e( 'Promotion methods entered by the affiliate during registration.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<tr class="form-row">

				<th scope="row">
					<label for="notes"><?php _e( 'Affiliate Notes', 'affiliate-wp' ); ?></label>
				</th>

				<td>
					<textarea name="notes" rows="5" cols="50" id="notes" class="large-text"><?php echo esc_html( $notes ); ?></textarea>
					<p class="description"><?php _e( 'Enter any notes for this affiliate. Notes are only visible to the admin.', 'affiliate-wp' ); ?></p>
				</td>

			</tr>

			<?php if( 'rejected' == $affiliate->status && ! empty( $reason ) ) : ?>
				<tr class="form-row">

					<th scope="row">
						<label><?php _e( 'Rejection Reason', 'affiliate-wp' ); ?></label>
					</th>

					<td>
						<div class="description"><?php echo wpautop( $reason ); ?></div>
					</td>

				</tr>
			<?php endif; ?>

			<?php
			/**
			 * Fires at the end of the edit-affiliate admin screen form area, below form fields.
			 *
			 * @param \AffWP\Affiliate $affiliate The affiliate object being edited.
			 */
			do_action( 'affwp_edit_affiliate_end', $affiliate );
			?>

		</table>

		<?php
		/**
		 * Fires at the bottom of the edit-affiliate admin screen, just before the submit button.
		 *
		 * @param \AffWP\Affiliate $affiliate The affiliate object being edited.
		 */
		do_action( 'affwp_edit_affiliate_bottom', $affiliate );
		?>

		<input type="hidden" name="affwp_action" value="update_affiliate" />

		<?php submit_button( __( 'Update Affiliate', 'affiliate-wp' ) ); ?>

	</form>

</div>
