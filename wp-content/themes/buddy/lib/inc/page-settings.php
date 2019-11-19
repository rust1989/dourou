<?php 

if (  ! function_exists( 'ghostpool_page_settings' ) ) {
	function ghostpool_page_settings() {

		global $gp_settings;
		
		// iOS Conditionals
		$gp_settings['iphone'] = ( stripos( $_SERVER['HTTP_USER_AGENT'], 'iPhone' ) !== false );
		$gp_settings['ipad'] = ( stripos( $_SERVER['HTTP_USER_AGENT'], 'iPad' ) !== false );

		// Preload Effect
		if ( get_option( 'buddy_preload' ) == '0' ) {
			$gp_settings['preload'] = 'preload';
		} else {
			$gp_settings['preload'] = '';
		}

		$gp_settings['thumbnail_width'] = '';
		$gp_settings['thumbnail_height'] = '';
		$gp_settings['image_wrap'] = '';	
		$gp_settings['hard_crop'] = '';
		$gp_settings['hard_crop'] == '';	
		$gp_settings['sidebar_left'] = '';	
		$gp_settings['sidebar_right'] = '';	
		$gp_settings['layout'] = '';	
		$gp_settings['title'] = '';
		$gp_settings['content_display'] = '';
		$gp_settings['excerpt_length'] = '';
		$gp_settings['read_more'] = '';
		$gp_settings['meta_date'] = '';
		$gp_settings['meta_author'] = '';
		$gp_settings['meta_cats'] = '';
		$gp_settings['meta_tags'] = '';
		$gp_settings['meta_comments'] = '';			
		$gp_settings['author_info'] = '';

				
		/*--------------------------------------------------------------
		BuddyPress
		--------------------------------------------------------------*/

		if ( function_exists( 'bp_is_active' ) && ! bp_is_blog_page() ) {

			$bp_pages = get_option(  'bp-pages'  );

			if (  bp_is_activity_component()  ) {
				$page_id = $bp_pages['activity'];
			} elseif (  bp_is_groups_component()  ) {
				$page_id = $bp_pages['groups'];
			} elseif (  bp_is_members_component()  ) {
				$page_id = $bp_pages['members'];
			} else {
				$page_id = null;
			}

			// Left Sidebar
			if ( get_post_meta( $page_id, '_' . 'buddy_sidebar_left', true ) && get_post_meta( $page_id, '_' . 'buddy_sidebar_left', true ) != 'Default' ) {
				$gp_settings['sidebar_left'] = get_post_meta( $page_id, '_' . 'buddy_sidebar_left', true );
			} else {
				$gp_settings['sidebar_left'] = get_option( 'buddy_bp_sidebar_left' );
			}

			// Right Sidebar
			if ( get_post_meta( $page_id, '_' . 'buddy_sidebar_right', true ) && get_post_meta( $page_id, '_' . 'buddy_sidebar_right', true ) != 'Default' ) {
				$gp_settings['sidebar_right'] = get_post_meta( $page_id, '_' . 'buddy_sidebar_right', true );
			} else {
				$gp_settings['sidebar_right'] = get_option( 'buddy_bp_sidebar_right' );
			}
			
			// Layout
			if ( get_post_meta( $page_id, '_' . 'buddy_layout', true ) && get_post_meta( $page_id, '_' . 'buddy_layout', true ) != 'Default' ) {
				$gp_settings['layout'] = get_post_meta( $page_id, '_' . 'buddy_layout', true );
			} else {
				$gp_settings['layout'] = get_option( 'buddy_bp_layout' );
			}

			// Title
			if ( get_post_meta( $page_id, '_' . 'buddy_title', true ) && get_post_meta( $page_id, '_' . 'buddy_title', true ) != 'Default' ) {
				$gp_settings['title'] = get_post_meta( $page_id, '_' . 'buddy_title', true );
			} else {
				$gp_settings['title'] = get_option( 'buddy_bp_title' );
			} 
		
	
		/*--------------------------------------------------------------
		bbPress
		--------------------------------------------------------------*/

		} elseif ( function_exists( 'is_bbpress' ) && is_bbpress() ) {

			$gp_settings['sidebar_left'] = get_option( 'buddy_bbp_sidebar_left' );
			$gp_settings['sidebar_right'] = get_option( 'buddy_bbp_sidebar_right' );
			$gp_settings['layout'] = get_option( 'buddy_bbp_layout' );
			$gp_settings['title'] = get_option( 'buddy_bbp_title' ); 
				
			
		/*--------------------------------------------------------------
		Post Categories, Archives & Tags
		--------------------------------------------------------------*/

		} elseif ( ( ( is_home() OR is_archive() OR is_search() ) && ! function_exists( 'is_woocommerce' ) ) OR ( ( is_home() OR is_archive() OR is_search() ) && function_exists( 'is_woocommerce' ) && ! is_shop() ) ) {

			$gp_settings['thumbnail_width'] = get_option( 'buddy_cat_thumbnail_width' );
			$gp_settings['thumbnail_height'] = get_option( 'buddy_cat_thumbnail_height' );
			$gp_settings['image_wrap'] = get_option( 'buddy_cat_image_wrap' );	
			$gp_settings['hard_crop'] = get_option( 'buddy_cat_hard_crop' );
			if (  $gp_settings['hard_crop'] == 'Enable'  ) { $gp_settings['hard_crop'] = true; } else { $gp_settings['hard_crop'] = false; }	
			$gp_settings['sidebar_left'] = get_option( 'buddy_cat_sidebar_left' );	
			$gp_settings['sidebar_right'] = get_option( 'buddy_cat_sidebar_right' );	
			$gp_settings['layout'] = get_option( 'buddy_cat_layout' );	
			$gp_settings['title'] = get_option( 'buddy_cat_title' );
			$gp_settings['content_display'] = get_option( 'buddy_cat_content_display' );
			$gp_settings['excerpt_length'] = get_option( 'buddy_cat_excerpt_length' );
			$gp_settings['read_more'] = get_option( 'buddy_cat_read_more' );
			$gp_settings['meta_date'] = get_option( 'buddy_cat_date' );
			$gp_settings['meta_author'] = get_option( 'buddy_cat_author' );
			$gp_settings['meta_cats'] = get_option( 'buddy_cat_cats' );
			$gp_settings['meta_tags'] = get_option( 'buddy_cat_tags' );
			$gp_settings['meta_comments'] = get_option( 'buddy_cat_comments' );
		
						
		/*--------------------------------------------------------------
		Posts
		--------------------------------------------------------------*/

		} elseif ( is_singular( 'post' ) ) {

			// Show Image
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_show_image', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_show_image', true ) != 'Default' ) {
				$gp_settings['show_image'] = get_post_meta( get_the_ID(), '_' . 'buddy_show_image', true );
			} else {
				$gp_settings['show_image'] = get_option( 'buddy_show_post_image' );
			}
	
			// Image Dimensions
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_image_width', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_image_width', true ) != '' ) {
				$gp_settings['image_width'] = get_post_meta( get_the_ID(), '_' . 'buddy_image_width', true );
			} else {
				$gp_settings['image_width'] = get_option( 'buddy_post_image_width' );
			}
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_image_height', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_image_height', true ) != '' ) {
				$gp_settings['image_height'] = get_post_meta( get_the_ID(), '_' . 'buddy_image_height', true );
			} else {
				$gp_settings['image_height'] = get_option( 'buddy_post_image_height' );
			}

			// Image Wrap
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_image_wrap', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_image_wrap', true ) != 'Default' ) {
				$gp_settings['image_wrap'] = get_post_meta( get_the_ID(), '_' . 'buddy_image_wrap', true );
			} else {
				$gp_settings['image_wrap'] = get_option( 'buddy_post_image_wrap' );
			}

			// Hard Crop
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_hard_crop', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_hard_crop', true ) != 'Default' ) {
				$gp_settings['hard_crop'] = get_post_meta( get_the_ID(), '_' . 'buddy_hard_crop', true );
			} else {
				$gp_settings['hard_crop'] = get_option( 'buddy_post_hard_crop' );
			}
			if (  $gp_settings['hard_crop'] == 'Enable'  ) { $gp_settings['hard_crop'] = true; } else { $gp_settings['hard_crop'] = false; }	
					
			// Left Sidebar
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_sidebar_left', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_sidebar_left', true ) != 'Default' ) {
				$gp_settings['sidebar_left'] = get_post_meta( get_the_ID(), '_' . 'buddy_sidebar_left', true );
			} else {
				$gp_settings['sidebar_left'] = get_option( 'buddy_post_sidebar_left' );
			}

			// Right Sidebar
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_sidebar_right', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_sidebar_right', true ) != 'Default' ) {
				$gp_settings['sidebar_right'] = get_post_meta( get_the_ID(), '_' . 'buddy_sidebar_right', true );
			} else {
				$gp_settings['sidebar_right'] = get_option( 'buddy_post_sidebar_right' );
			}

			// Layout
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_layout', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_layout', true ) != 'Default' ) {
				$gp_settings['layout'] = get_post_meta( get_the_ID(), '_' . 'buddy_layout', true );
			} else {
				$gp_settings['layout'] = get_option( 'buddy_post_layout' );
			}
	
			// Title
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_title', true ) && get_post_meta( get_the_ID(), '_' . 'buddy_title', true ) != 'Default' ) {
				$gp_settings['title'] = get_post_meta( get_the_ID(), '_' . 'buddy_title', true );
			} else {
				$gp_settings['title'] = get_option( 'buddy_post_title' );
			}
	
			// Post Meta						
			$gp_settings['meta_date'] = get_option( 'buddy_post_date' );
			$gp_settings['meta_author'] = get_option( 'buddy_post_author' );
			$gp_settings['meta_cats'] = get_option( 'buddy_post_cats' );
			$gp_settings['meta_tags'] = get_option( 'buddy_post_tags' );
			$gp_settings['meta_comments'] = get_option( 'buddy_post_comments' );
	
			// Author Info Panel
			$gp_settings['author_info'] = get_option( 'buddy_post_author_info' );
						
			// Related Items
			$gp_settings['related_items'] = get_option( 'buddy_post_related_items' );			
			$gp_settings['related_image_width'] = get_option( 'buddy_post_related_image_width' );
			$gp_settings['related_image_height'] = get_option( 'buddy_post_related_image_height' );
	
	
		/*--------------------------------------------------------------
		Other Templates
		--------------------------------------------------------------*/

		} elseif ( is_attachment() OR is_404() OR is_page_template( 'blank-page-template.php' )  ) {

			$gp_settings['layout']  = 'fullwidth';
			$gp_settings['title'] = 'Show';
			
			
		/*--------------------------------------------------------------
		Pages
		--------------------------------------------------------------*/

		} else {

			if ( function_exists( 'is_woocommerce' ) && is_shop() ) {
				$post_id = get_option( 'woocommerce_shop_page_id' ); 
			} else {
				$post_id = get_the_ID(); 
			}
	
			// Show Image
			if ( get_post_meta( get_the_ID(), '_' . 'buddy_show_image', true ) && get_post_meta( $post_id, '_' . 'buddy_show_image', true ) != 'Default' ) {
				$gp_settings['show_image'] = get_post_meta( $post_id, '_' . 'buddy_show_image', true );
			} else {
				$gp_settings['show_image'] = get_option( 'buddy_show_page_image' );
			}
	
			// Image Dimensions
			if ( get_post_meta( $post_id, '_' . 'buddy_image_width', true ) && get_post_meta( $post_id, '_' . 'buddy_image_width', true ) != '' ) {
				$gp_settings['image_width'] = get_post_meta( $post_id, '_' . 'buddy_image_width', true );
			} else {
				$gp_settings['image_width'] = get_option( 'buddy_page_image_width' );
			}
			if ( get_post_meta( $post_id, '_' . 'buddy_image_height', true ) && get_post_meta( $post_id, '_' . 'buddy_image_height', true ) != '' ) {
				$gp_settings['image_height'] = get_post_meta( $post_id, '_' . 'buddy_image_height', true );
			} else {
				$gp_settings['image_height'] = get_option( 'buddy_page_image_height' );
			}

			// Image Wrap
			if ( get_post_meta( $post_id, '_' . 'buddy_image_wrap', true ) && get_post_meta( $post_id, '_' . 'buddy_image_wrap', true ) != 'Default' ) {
				$gp_settings['image_wrap'] = get_post_meta( $post_id, '_' . 'buddy_image_wrap', true );
			} else {
				$gp_settings['image_wrap'] = get_option( 'buddy_page_image_wrap' );
			}

			// Hard Crop
			if ( get_post_meta( $post_id, '_' . 'buddy_hard_crop', true ) && get_post_meta( $post_id, '_' . 'buddy_hard_crop', true ) != 'Default' ) {
				$gp_settings['hard_crop'] = get_post_meta( $post_id, '_' . 'buddy_hard_crop', true );
			} else {
				$gp_settings['hard_crop'] = get_option( 'buddy_page_hard_crop' );
			}
			if (  $gp_settings['hard_crop'] == 'Enable'  ) { $gp_settings['hard_crop'] = true; } else { $gp_settings['hard_crop'] = false; }	
			
			// Left Sidebar
			if ( get_post_meta( $post_id, '_' . 'buddy_sidebar_left', true ) && get_post_meta( $post_id, '_' . 'buddy_sidebar_left', true ) != 'Default' ) {
				$gp_settings['sidebar_left'] = get_post_meta( $post_id, '_' . 'buddy_sidebar_left', true );
			} else {
				$gp_settings['sidebar_left'] = get_option( 'buddy_page_sidebar_left' );
			}

			// Right Sidebar
			if ( get_post_meta( $post_id, '_' . 'buddy_sidebar_right', true ) && get_post_meta( $post_id, '_' . 'buddy_sidebar_right', true ) != 'Default' ) {
				$gp_settings['sidebar_right'] = get_post_meta( $post_id, '_' . 'buddy_sidebar_right', true );
			} else {
				$gp_settings['sidebar_right'] = get_option( 'buddy_page_sidebar_right' );
			}

			// Layout
			if ( get_post_meta( $post_id, '_' . 'buddy_layout', true ) && get_post_meta( $post_id, '_' . 'buddy_layout', true ) != 'Default' ) {
				$gp_settings['layout'] = get_post_meta( $post_id, '_' . 'buddy_layout', true );
			} else {
				$gp_settings['layout'] = get_option( 'buddy_page_layout' );
			}
				// Title
			if ( get_post_meta( $post_id, '_' . 'buddy_title', true ) && get_post_meta( $post_id, '_' . 'buddy_title', true ) != 'Default' ) {
				$gp_settings['title'] = get_post_meta( $post_id, '_' . 'buddy_title', true );
			} else {
				$gp_settings['title'] = get_option( 'buddy_page_title' );
			} 	
		
			// Post Meta						
			$gp_settings['meta_date'] = get_option( 'buddy_page_date' );
			$gp_settings['meta_author'] = get_option( 'buddy_page_author' );
			$gp_settings['meta_cats'] = '1';
			$gp_settings['meta_tags'] = '1';
			$gp_settings['meta_comments'] = get_option( 'buddy_page_comments' );
	
			// Author Info Panel
			$gp_settings['author_info'] = get_option( 'buddy_page_author_info' );
						
		}


		/*--------------------------------------------------------------
		Add init variables via your child theme using this function
		--------------------------------------------------------------*/
		
		if ( function_exists( 'ghostpool_custom_init_variables' ) ) {
			ghostpool_custom_init_variables();
		}
				
	}	

}

?>