<div class="gp-login-register-form">

	<div class="gp-register-form-wrapper">

		<h3 class="gp-login-title widgettitle"><?php echo apply_filters( 'ghostpool_register_title', esc_html__( 'Sign Up' ,'buddy' ) ); ?></h3>	
	
		<form name="registerform" class="gp-register-form" action="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login_post' ) ); ?>" method="post">
	
			<p class="user_login"><input type="text" name="user_login" class="user_login" value="<?php if ( ! empty( $user_login ) ) { echo esc_html( stripslashes( $user_login ), 1 ); } ?>" size="20" placeholder="<?php esc_html_e( 'Username', 'buddy' ); ?>" required /></p>

			<p class="user_email"><input type="email" name="user_email" class="user_email" size="25" placeholder="<?php esc_html_e( 'Email', 'buddy' ); ?>" required /></p>

			<p class="user_confirm_pass"><span class="gp-password-icon"></span><input type="password" name="user_confirm_pass" class="user_confirm_pass" size="25" placeholder="<?php esc_attr_e( 'Password', 'buddy' ); ?>" required /></p>
		
			<p class="user_pass"><span class="gp-password-icon"></span><input type="password" name="user_pass" class="user_pass" size="25" placeholder="<?php esc_attr_e( 'Confirm Password', 'buddy' ); ?>" required /></p>
	
			<?php if ( function_exists( 'ghostpool_custom_captcha_display' ) ) {
				return ghostpool_custom_captcha_display();
			} elseif ( function_exists( 'gglcptch_display' ) ) { 
				echo gglcptch_display(); 
			} elseif ( has_filter( 'hctpc_verify' ) ) {
				echo apply_filters( 'hctpc_display', '' );
			} elseif ( has_filter( 'cptch_verify' ) ) {
				echo apply_filters( 'cptch_display', '' ); 
			} ?>
	
			<input type="submit" name="wp-submit" class="wp-submit" value="<?php esc_html_e( 'Sign Up', 'buddy' ); ?>" />

			<?php if ( get_option( 'buddy_registration_gdpr' ) == 'enabled' ) { ?>
				<p class="gp-gdpr"><input name="gdpr" class="gdpr" type="checkbox" value="1" required /> <label><?php echo wp_kses_post( get_option( 'buddy_registration_gdpr_text' ) ); ?></label></p>
			<?php } ?>
				
			<div class="gp-login-results" data-verify="<?php esc_html_e( 'Verifying...', 'buddy' ); ?>"></div>
				
			<input type="hidden" name="action" value="ghostpool_register" />
	
			<?php wp_nonce_field( 'ghostpool_register_action', 'ghostpool_register_nonce' ); ?>

		</form>

	</div>

</div>	