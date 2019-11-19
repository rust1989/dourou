<?php if ( !is_page_template( 'blank-page.php' ) ) { ?>

				<?php get_sidebar( 'left' ); ?>
			
			</div>
				
			<?php get_sidebar( 'right' ); ?>

			<div class="clear"></div>
		</div>

	</div>

	<?php if ( is_active_sidebar( 'gp-footer-1' ) OR is_active_sidebar( 'gp-footer-2' ) OR is_active_sidebar( 'gp-footer-3' ) OR is_active_sidebar( 'gp-footer-4' ) ) { ?>

		<footer id="footer">
	
			<div id="footer-widgets">
			
				<?php
				if ( is_active_sidebar( 'gp-footer-1' ) && is_active_sidebar( 'gp-footer-2' ) && is_active_sidebar( 'gp-footer-3' ) && is_active_sidebar( 'gp-footer-4' ) && is_active_sidebar( 'gp-footer-5' ) ) { 	
					$gp_footer_widget_class = 'footer-fifth';
				} elseif ( is_active_sidebar( 'gp-footer-1' ) && is_active_sidebar( 'gp-footer-2' ) && is_active_sidebar( 'gp-footer-3' ) && is_active_sidebar( 'gp-footer-4' ) ) { 
					$gp_footer_widget_class = 'footer-fourth'; 
				} elseif ( is_active_sidebar( 'gp-footer-1' ) && is_active_sidebar( 'gp-footer-2' ) && is_active_sidebar( 'gp-footer-3' ) ) {
					$gp_footer_widget_class = 'footer-third';
				} elseif ( is_active_sidebar( 'gp-footer-1' ) && is_active_sidebar( 'gp-footer-2' ) ) {
					$gp_footer_widget_class = 'footer-half';
				} elseif ( is_active_sidebar( 'gp-footer-1' ) ) {
					$gp_footer_widget_class = 'footer-whole';
				} else {
					$gp_footer_widget_class = '';
				} ?>
		
				<?php if ( is_active_sidebar( 'gp-footer-1' ) ) { ?>
					<div class="footer-widget footer-1 <?php echo sanitize_html_class( $gp_footer_widget_class ); ?>">
						<?php dynamic_sidebar( 'gp-footer-1' ); ?>
					</div>
				<?php } ?>
		
				<?php if ( is_active_sidebar( 'gp-footer-2' ) ) { ?>
					<div class="footer-widget footer-2 <?php echo sanitize_html_class( $gp_footer_widget_class ); ?>">
						<?php dynamic_sidebar( 'gp-footer-2' ); ?>
					</div>
				<?php } ?>
			
				<?php if ( is_active_sidebar( 'gp-footer-3' ) ) { ?>
					<div class="footer-widget footer-3 <?php echo sanitize_html_class( $gp_footer_widget_class ); ?>">
						<?php dynamic_sidebar( 'gp-footer-3' ); ?>
					</div>
				<?php } ?>
			
				<?php if ( is_active_sidebar( 'gp-footer-4' ) ) { ?>
					<div class="footer-widget footer-4 <?php echo sanitize_html_class( $gp_footer_widget_class ); ?>">
						<?php dynamic_sidebar( 'gp-footer-4' ); ?>
					</div>
				<?php } ?>

				<?php if ( is_active_sidebar( 'gp-footer-5' ) ) { ?>
					<div class="footer-widget footer-5 <?php echo sanitize_html_class( $gp_footer_widget_class ); ?>">
						<?php dynamic_sidebar( 'gp-footer-5' ); ?>
					</div>
				<?php } ?>
					
			</div>
		
		</footer>

	<?php } ?>

	<div id="copyright">
		<?php if ( get_option( 'buddy_footer_content' ) ) { ?>
			 <?php echo wp_kses_post( stripslashes( get_option( 'buddy_footer_content' ) ) ); ?>
		<?php } else { ?>
			<?php esc_html_e( 'Copyright &copy;', 'buddy' ); ?> <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( 'http://themeforest.net/user/GhostPool/portfolio?ref=GhostPool' ); ?>" rel="nofollow"><?php esc_html_e( 'GhostPool.com', 'buddy' ); ?></a>. <?php esc_html_e( 'All rights reserved.', 'buddy' ); ?>
		<?php } ?>
	</div>
	
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>