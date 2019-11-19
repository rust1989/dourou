<?php global $gp_settings; ?>

<?php if ( $gp_settings['layout'] == 'sb-right' OR $gp_settings['layout'] == 'sb-both' ) { ?>

	<aside id="sidebar-right" class="sidebar">

		<?php if ( function_exists( 'bp_message_get_notices' ) ) { ?>
			<?php bp_message_get_notices(); ?>
		<?php } ?>
			
		<?php if ( is_active_sidebar( $gp_settings['sidebar_right'] ) ) { ?>
			<?php dynamic_sidebar( $gp_settings['sidebar_right'] ); ?>
		<?php } ?>
		
	</aside>
	
<?php } ?>