<?php
/*
Template Name: Login
*/

if ( is_user_logged_in() && ! is_home() && ! is_front_page() ) {						
	wp_safe_redirect( apply_filters( 'ghostpool_redirect_filter', esc_url( home_url( '/' ) ) ) );
	exit();
}
				
get_header(); global $post, $gp_settings; 

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div id="content">

		<?php if ( has_post_thumbnail() && $gp_settings['show_image'] == 'Show' ) { ?>
		
			<div class="post-thumbnail single-thumbnail">
				
				<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'], $gp_settings['image_height'], $gp_settings['hard_crop'], false, true ); ?>
				<?php if ( get_option( 'buddy_retina' ) == '0' ) { 
					$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'] * 2, $gp_settings['image_height'] * 2, $gp_settings['hard_crop'], true, true ); 
				} else { 
					$gp_retina = '';
				} ?>
				<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" itemprop="image" />	
						
			</div>
			
		<?php } ?>
			
		<div class="padder<?php if ( has_post_thumbnail() && $gp_settings['show_image'] == 'Show' ) { ?> content-post-thumbnail<?php } ?>">

			<?php if ( $post->post_content ) { ?>	
			
				<div id="post-content">

					<?php if ( has_post_thumbnail() && $gp_settings['image_wrap'] == 'Enable' && $gp_settings['show_image'] == 'Show' ) { ?>
						<div class="post-thumbnail wrap">
							<?php $gp_image = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'], $gp_settings['image_height'], $gp_settings['hard_crop'], false, true ); ?>
							<?php if ( get_option( 'buddy_retina' ) == '0' ) { 
								$gp_retina = aq_resize( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ), $gp_settings['image_width'] * 2, $gp_settings['image_height'] * 2, $gp_settings['hard_crop'], true, true ); 
							} else { 
								$gp_retina = ''; 
							} ?>
							<img src="<?php echo esc_url( $gp_image[0] ); ?>" data-rel="<?php echo esc_url( $gp_retina ); ?>" width="<?php echo absint( $gp_image[1] ); ?>" height="<?php echo absint( $gp_image[2] ); ?>" alt="<?php if ( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ) { echo esc_attr( get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ) ); } else { the_title_attribute(); } ?>" class="gp-post-image" itemprop="image" />	
						</div>
					<?php } ?>
		
					<?php the_content(); ?>
					
				</div>
				
			<?php } else { ?>
			
				<?php the_content(); ?>
				
			<?php } ?>
			
			<?php if ( ! is_user_logged_in() ) { 
			
				get_template_part( 'lib/sections/login/login-form' ); 
				
			} ?>
		
		</div>
		
	</div>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>