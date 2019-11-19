<div class="gp-login-register-form">

	<div class="gp-login-form-wrapper">

		<h3 class="gp-login-title widgettitle"><?php echo apply_filters( 'ghostpool_login_title', esc_html__( 'Sign In' ,'buddy' ) ); ?></h3>
		
		<form name="loginform" class="gp-login-form" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">

			<p class="username"><input type="text" name="log" class="user_login" value="<?php if ( ! empty( $user_login ) ) { echo esc_html( stripslashes( $user_login ), 1 ); } ?>" size="20" placeholder="<?php esc_html_e( 'Username Or Email', 'buddy' ); ?>" required /></p>

			<p class="password"><input type="password" name="pwd" class="user_pass" size="20" placeholder="<?php esc_html_e( 'Password', 'buddy' ); ?>" required /></p>

			<p class="rememberme"><input name="rememberme" class="rememberme" type="checkbox" checked="checked" value="forever" /> <?php esc_html_e( 'Remember Me', 'buddy' ); ?></p>
		
			<?php if ( function_exists( 'ghostpool_custom_captcha_display' ) ) {
				echo ghostpool_custom_captcha_display();
			} elseif ( function_exists( 'gglcptch_display' ) ) { 
				echo gglcptch_display(); 
			} elseif ( has_filter( 'hctpc_verify' ) ) {
				echo apply_filters( 'hctpc_display', '' );
			} elseif ( has_filter( 'cptch_verify' ) ) {
				echo apply_filters( 'cptch_display', '' ); 
			} ?>
					
			<?php if ( has_action ( 'wordpress_social_login' ) ) { ?>
				<div class="gp-social-login">
					<div class="gp-login-or-lines">
						<div class="gp-login-or-left-line"></div>
						<div class="gp-login-or-text"><?php esc_html_e( 'or', 'buddy' ); ?></div>
						<div class="gp-login-or-right-line"></div>
					</div>	
					<?php do_action( 'wordpress_social_login' ); ?>
				</div>
			<?php } ?>

			<input type="submit" name="wp-submit" class="wp-submit" value="<?php esc_html_e( 'Sign In', 'buddy' ); ?>" />
	
			<div class="gp-login-results" data-verify="<?php esc_html_e( 'Verifying...', 'buddy' ); ?>"></div>

			<div class="gp-login-links">
				<a href="#" class="gp-lost-password-link"><?php esc_html_e( 'Lost Password', 'buddy' ); ?></a>
			</div>

			<input type="hidden" name="action" value="ghostpool_login" />
		
			<?php wp_nonce_field( 'ghostpool_login_action', 'ghostpool_login_nonce' ); ?>

		</form>

	</div>
		
	<div class="gp-lost-password-form-wrapper">

		<h3 class="gp-login-title widgettitle"><?php echo apply_filters( 'ghostpool_lost_password_title', esc_html__( 'Lost Password' ,'buddy' ) ); ?></h3>
		
		<form name="lostpasswordform" class="gp-lost-password-form" action="#" method="post">
	
			<p class="gp-login-desc"><?php esc_html_e( 'Please enter your username or email address. You will receive a link to create a new password via email.', 'buddy' ); ?></p>	
	
			<p><input type="text" name="user_login" class="user_login" value="" size="20" placeholder="<?php esc_html_e( 'Username or Email', 'buddy' ); ?>" required /></p>

			<input type="submit" name="wp-submit" class="wp-submit" value="<?php esc_html_e( 'Reset Password', 'buddy' ); ?>" />

			<div class="gp-login-results" data-verify="<?php esc_html_e( 'Verifying...', 'buddy' ); ?>"></div>

			<div class="gp-login-links">
				<a href="#" class="gp-login-link"><?php esc_html_e( 'Sign In', 'buddy' ); ?></a>
			</div>

			<input type="hidden" name="action" value="ghostpool_lost_password" />
		
			<?php wp_nonce_field( 'ghostpool_lost_password_action', 'ghostpool_lost_password_nonce' ); ?>
				
		</form>

	</div>
			
</div>	