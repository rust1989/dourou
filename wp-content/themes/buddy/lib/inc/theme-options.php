<?php

$page_handle = 'buddy-options';
$options = array( 

	array( 
		'name' => esc_html__( 'General', 'buddy' ),
		'type' => 'open', 
	),

		array(
		'name' => esc_html__( 'General', 'buddy' ),
		'type' => 'header',
		'desc' => esc_html__( 'Controls the general settings for the theme.', 'buddy' ) ),

		array( 'type' => 'separator' ),
  		
		array(  
			'name' => esc_html__( 'Fixed Header', 'buddy' ),
			'desc' => esc_html__( 'The header stays at the top of the screen as you scroll down the page.', 'buddy' ),
			'type' => 'radio',
			'id' => 'buddy_fixed_header',
			'options' => array( 
				'gp-fixed-header' => esc_html__( 'Enabled', 'buddy' ),
				'gp-relative-header' => esc_html__( 'Disabled', 'buddy' )
			 ),
			'std' => 'gp-fixed-header',
        ),
                		
		array( 'type' => 'separator' ),
				
		array( 
		'name' => esc_html__( 'Logo', 'buddy' ),
        'desc' => esc_html__( 'Upload your own logo.', 'buddy' ),
        'id' => 'buddy_logo',
        'type' => "upload" ),

		array( 
		'name' => esc_html__( 'Logo Width', 'buddy' ),
        'desc' => esc_html__( 'Enter the logo width (set to half the original logo width for retina displays).', 'buddy' ),
        'id' => 'buddy_logo_width',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),

		array( 
		'name' => esc_html__( 'Logo Height', 'buddy' ),
        'desc' => esc_html__( 'Enter the logo height (set to half the original logo height for retina displays).', 'buddy' ),
        'id' => 'buddy_logo_height',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),
					
		array( 
		'name' => esc_html__( 'Logo Top Margin', 'buddy' ),
        'desc' => esc_html__( 'Enter the top margin of your logo.', 'buddy' ),
        'id' => 'buddy_logo_top',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),

		array( 
		'name' => esc_html__( 'Logo Right Margin', 'buddy' ),
        'desc' => esc_html__( 'Enter the right margin of your logo.', 'buddy' ),
        'id' => 'buddy_logo_right',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),
				
		array( 
		'name' => esc_html__( 'Logo Bottom Margin', 'buddy' ),
        'desc' => esc_html__( 'Enter the bottom margin of your logo.', 'buddy' ),
        'id' => 'buddy_logo_bottom',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),

		array( 
		'name' => esc_html__( 'Logo Left Margin', 'buddy' ),
        'desc' => esc_html__( 'Enter the left margin of your logo.', 'buddy' ),
        'id' => 'buddy_logo_left',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),
		
		array( 'type' => 'separator' ),

		array(  
		'name' => esc_html__( 'Responsive', 'buddy' ),
        'desc' => esc_html__( 'Choose whether the theme responds to the width of the browser window.', 'buddy' ),
        'id' => 'buddy_responsive',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
 		
		array( 'type' => 'separator' ),
		   				
		array(  
		'name' => esc_html__( 'Retina Images', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to crop images at double the size on retina displays (newer iPhones/iPads, Macbook Pro etc.).', 'buddy' ),
        'id' => 'buddy_retina',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
                		
		array( 'type' => 'separator' ),

		array(  
			'name' => esc_html__( 'Back To Top Button', 'buddy' ),
			'desc' => esc_html__( 'Add a button to the bottom right corner of the page that takes you back to the top of the page.', 'buddy' ),
			'type' => 'radio',
			'id' => 'buddy_back_to_top',
			'options' => array( 
				'gp-back-to-top-all' => esc_html__( 'Show on all devices', 'buddy' ),
				'gp-back-to-top-desktop' => esc_html__( 'Only show on desktop devices', 'buddy' ),
				'gp-no-back-to-top' => esc_html__( 'Disabled', 'buddy' ),
			 ),
			'std' => 'gp-back-to-top',
        ),
                		
		array( 'type' => 'separator' ),

		array(  
			'name' => esc_html__( 'Lightbox', 'buddy' ),
			'desc' => esc_html__( 'Choose how images open in the lightbox (pop-up window).', 'buddy' ),
			'type' => 'radio',
			'id' => 'buddy_lightbox',
			'options' => array( 
				'gp-lightbox-group' => esc_html__( 'All images on page show as gallery within lightbox window', 'buddy' ),
				'gp-lightbox-separate' => esc_html__( 'Images are not grouped', 'buddy' ),
				'gp-lightbox-disabled' => esc_html__( 'Disabled', 'buddy' ),
			 ),
			'std' => 'gp-lightbox-group',
        ),
                		
		array( 'type' => 'separator' ),
  		   		
		array(  
		'name' => esc_html__( 'Login/Register Links', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the login and register links in the header.', 'buddy' ),
        'id' => 'buddy_bp_buttons',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),

		array( 
		'name' => esc_html__( 'Login URL', 'buddy' ),
        'desc' => esc_html__( 'Enter the URL you have assigned the Login page template to.', 'buddy' ),
        'id' => 'buddy_login_url',
        'type' => "text" ),

		array( 
		'name' => esc_html__( 'Register URL', 'buddy' ),
        'desc' => esc_html__( 'Enter the URL you have assigned the Register page template to.', 'buddy' ),
        'id' => 'buddy_register_url',
        'type' => "text" ),
 
 		array(  
			'name' => esc_html__( 'Profile Button', 'buddy' ),
			'desc' => esc_html__( 'Add a profile button to the header.', 'buddy' ),
			'type' => 'radio',
			'id' => 'buddy_profile_button',
			'options' => array( 
				'gp-profile-all' => esc_html__( 'Show on all devices', 'buddy' ),
				'gp-profile-desktop' => esc_html__( 'Only hide on mobile devices', 'buddy' ),
				'gp-profile-mobile' => esc_html__( 'Only show on mobile devices', 'buddy' ),
				'gp-profile-disabled' => esc_html__( 'Disabled', 'buddy' ),
			 ),
			'std' => 'gp-profile-all',
        ),

 		array(  
			'name' => esc_html__( 'Backend Login/Register Redirect', 'buddy' ),
			'desc' => esc_html__( 'Redirect to the homepage and show the login/register page before users can access the backend.', 'buddy' ),
			'type' => 'radio',
			'id' => 'buddy_backend_redirect',
			'options' => array( 
				'enabled' => esc_html__( 'Enabled', 'buddy' ),
				'disabled' => esc_html__( 'Disabled', 'buddy' ),
			 ),
			'std' => 'disabled',
        ),

		array(  
			'name' => esc_html__( 'Registration Privacy Policy Checkbox (GDPR)', 'buddy' ),
			'desc' => esc_html__( 'Add a privacy policy checkbox to the theme\'s registration form (this does not add a checkbox to the BuddyPress or Paid Membership Pro registration pages).', 'buddy' ),
			'type' => 'radio',
			'id' => 'buddy_registration_gdpr',
			'options' => array( 
				'enabled' => esc_html__( 'Enabled', 'buddy' ),
				'disabled' => esc_html__( 'Disabled', 'buddy' )
			 ),
			'std' => 'disabled',
        ),
 
 		array( 
			'name' => esc_html__( 'Registration Privacy Policy Text', 'buddy' ),
			'desc' => esc_html__( 'Add your own privacy policy text next to the checkbox. To add a link within your text use HTML tags e.g. "This is my text and this is a <a href="http://domain.com/privacy-policy">link</a>."', 'buddy' ),
			'id' => 'buddy_registration_gdpr_text',
			'type' => 'textarea'
		),
               
   		array( 'type' => 'separator' ),
   						
 		array( 
			'name' => esc_html__( 'Footer Content', 'buddy' ),
			'desc' => esc_html__( 'Enter the content you want to display in your footer.', 'buddy' ),
			'id' => 'buddy_footer_content',
			'type' => 'textarea' 
        ),
        
		array( 'type' => 'separator' ), 
				
		array( 
			'name' => esc_html__( 'Scripts', 'buddy' ),
			'desc' => esc_html__( 'Enter any scripts that need to be embedded into your theme (e.g. Google Analytics)', 'buddy' ),
			'id' => 'buddy_scripts',
			'type' => 'textarea' 
        ),
 
		array( 'type' => 'separator' ),

	 	array( 
		'name' => esc_html__( 'Preload Effect', 'buddy' ),
        'desc' => wp_kses( __( 'Choose whether to use the preload effect on content in category, archive, tag pages etc (this can be specified individually from shortcodes using <code>preload="true"</code>).', 'buddy' ), array( 'code' => array() ) ),
        'id' => 'buddy_preload',
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
	array( 'type' => "close" ),			
		
	array( 	
		'name' => esc_html__( 'Categories', 'buddy' ),
		'type' => 'open',
	),

		array( 
		'name' => esc_html__( 'Categories', 'buddy' ),
		'type' => "header",
      	'desc' => esc_html__( 'This section controls the global settings for all category, archive, tag and search result pages.', 'buddy' )
      	 ),
 
  		array( 'type' => 'separator' ),
  		      	
        array( 
		'name' => esc_html__( 'Thumbnail Width', 'buddy' ),
        'desc' => esc_html__( 'The width to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate width).', 'buddy' ),
        'id' => 'buddy_cat_thumbnail_width',
        "std" => "900",
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		'name' => esc_html__( 'Thumbnail Height', 'buddy' ),
        'desc' => esc_html__( 'The height to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'buddy' ),
        'id' => 'buddy_cat_thumbnail_height',
        "std" => "350",
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 

		array( 
		'name' => esc_html__( 'Image Wrap', 'buddy' ),
        'desc' => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ),
        'id' => 'buddy_cat_image_wrap',
		"std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        'type' => "select" ),

		array( 
		'name' => esc_html__( 'Hard Crop', 'buddy' ),
        'desc' => esc_html__( 'Choose whether the image is hard cropped.', 'buddy' ),
        'id' => 'buddy_cat_hard_crop',
        "std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        'type' => "select" ),
                
  		array( 'type' => 'separator' ),
   		  		
 		array( 
		'name' => esc_html__( 'Left Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display.', 'buddy' ),
        'id' => 'buddy_cat_sidebar_left',
        "std" => "gp-default-left",
        'type' => "select_sidebar" ),

 		array( 
		'name' => esc_html__( 'Right Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display.', 'buddy' ),
        'id' => 'buddy_cat_sidebar_right',
        "std" => "gp-default-right",
        'type' => "select_sidebar" ),

   		array( 'type' => 'separator' ),

		array( 
		'name' => esc_html__( 'Layout', 'buddy' ),
        'desc' => esc_html__( 'Choose the page layout.', 'buddy' ),
        'id' => 'buddy_cat_layout',
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        'type' => "select" ),

        array( 'type' => 'separator' ), 
           		
  		array( 
		'name' => esc_html__( 'Title', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the page title.', 'buddy' ),
        'id' => 'buddy_cat_title',
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        'type' => "select" ),

   		array( 'type' => 'separator' ),
  		 		
		array( 
		'name' => esc_html__( 'Content Display', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the full post content or an excerpt.', 'buddy' ),
        'id' => 'buddy_cat_content_display',
        "std" => '0',
		"options" => array( esc_html__( 'Excerpt', 'buddy' ), esc_html__( 'Full Content', 'buddy' ) ),
        'type' => "radio" ),
        
		array( 'type' => 'separator' ),
		
        array( 
		'name' => esc_html__( 'Excerpt Length', 'buddy' ),
        'desc' => esc_html__( 'The number of characters in excerpts.', 'buddy' ),
        'id' => 'buddy_cat_excerpt_length',
        "std" => "400",
        'type' => "text",
		"size" => "small" ),
 
  		array( 'type' => 'separator' ),
		
		array(  
		'name' => esc_html__( 'Read More Link', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the read more links.', 'buddy' ),
        'id' => 'buddy_cat_read_more',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
 
  		array( 'type' => 'separator' ),
  		
		array(  
		'name' => esc_html__( 'Post Date', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post date.', 'buddy' ),
        'id' => 'buddy_cat_date',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),

		array(  
		'name' => esc_html__( 'Post Author', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post author.', 'buddy' ),
        'id' => 'buddy_cat_author',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),

		array(  
		'name' => esc_html__( 'Post Categories', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post categories.', 'buddy' ),
        'id' => 'buddy_cat_cats',
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
		array(  
		'name' => esc_html__( 'Post Comments', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post comments.', 'buddy' ),
        'id' => 'buddy_cat_comments',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
 
		array(  
		'name' => esc_html__( 'Post Tags', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post tags.', 'buddy' ),
        'id' => 'buddy_cat_tags',
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
                       
	array( 'type' => "close" ),

	array( 	
		'name' => esc_html__( 'Posts', 'buddy' ),
		'type' => 'open',
	),

		array( 
		'name' => esc_html__( 'Posts', 'buddy' ),
		'type' => "header",
      	'desc' => esc_html__( 'This section controls the global settings for all posts, but most settings can be overridden on individual posts.', 'buddy' )
      	 ),

  		array( 'type' => 'separator' ),
  		      	        
		array(  
		'name' => esc_html__( 'Featured Image', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the featured image (can be overridden on individual posts).', 'buddy' ),
        'id' => 'buddy_show_post_image',
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        'type' => "select" ),
        
        array( 
		'name' => esc_html__( 'Image Width', 'buddy' ),
        'desc' => esc_html__( 'The width to crop the image to (can be overridden on individual posts, set to 0 to have a proportionate width).', 'buddy' ),
        'id' => 'buddy_post_image_width',
        "std" => "1003",
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		'name' => esc_html__( 'Image Height', 'buddy' ),
        'desc' => esc_html__( 'The height to crop the image to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'buddy' ),
        'id' => 'buddy_post_image_height',
        "std" => "380",
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 

		array( 
		'name' => esc_html__( 'Image Wrap', 'buddy' ),
        'desc' => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ),
        'id' => 'buddy_post_image_wrap',
		"style" => 'Disable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        'type' => "select" ),
        
		array( 
		'name' => esc_html__( 'Hard Crop', 'buddy' ),
        'desc' => esc_html__( 'Choose whether the image is hard cropped (can be overridden on individual posts).', 'buddy' ),
        'id' => 'buddy_post_hard_crop',
        "std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        'type' => "select" ),
                      		        
  		array( 'type' => 'separator' ),
   		
 		array( 
		'name' => esc_html__( 'Left Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual posts).', 'buddy' ),
        'id' => 'buddy_post_sidebar_left',
        "std" => "gp-default-left",
        'type' => "select_sidebar" ),

 		array( 
		'name' => esc_html__( 'Right Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual posts).', 'buddy' ),
        'id' => 'buddy_post_sidebar_right',
        "std" => "gp-default-right",
        'type' => "select_sidebar" ),
   		
   		array( 'type' => 'separator' ),

		array( 
		'name' => esc_html__( 'Layout', 'buddy' ),
        'desc' => esc_html__( 'Choose the page layout (can be overridden on individual posts).', 'buddy' ),
        'id' => 'buddy_post_layout',
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        'type' => "select" ),

        array( 'type' => 'separator' ), 
           		
  		array( 
		'name' => esc_html__( 'Title', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the page title (can be overridden on individual posts).', 'buddy' ),
        'id' => 'buddy_post_title',
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        'type' => "select" ),

  		array( 'type' => 'separator' ),
  		
		array(  
		'name' => esc_html__( 'Post Author', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post author.', 'buddy' ),
        'id' => 'buddy_post_author',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
	
		array(  
		'name' => esc_html__( 'Post Date', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post date.', 'buddy' ),
        'id' => 'buddy_post_date',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
		array(  
		'name' => esc_html__( 'Post Categories', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post categories.', 'buddy' ),
        'id' => 'buddy_post_cats',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
		array(  
		'name' => esc_html__( 'Post Comment Number', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the number of post comments.', 'buddy' ),
        'id' => 'buddy_post_comments',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
 
 		array(  
		'name' => esc_html__( 'Post Tags', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the post tags.', 'buddy' ),
        'id' => 'buddy_post_tags',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
  		array( 'type' => 'separator' ),
  		
         array( 
		'name' => esc_html__( 'Author Info Panel', 'buddy' ),
        'desc' => wp_kses( __( 'Choose whether to display the author info panel ( can also be inserted in individual posts using the <code>[author]</code> shortcode).', 'buddy' ), array( 'code' => array() ) ),
        'id' => 'buddy_post_author_info',
       "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
  		array( 'type' => 'separator' ),
		
		array( 
		'name' => esc_html__( 'Related Items', 'buddy' ),
        'desc' => wp_kses( __( 'Choose whether to display a related items section ( can also be inserted in individual posts using the <code>[related_posts]</code> shortcode).', 'buddy' ), array( 'code' => array() ) ), 
        'id' => 'buddy_post_related_items',
        "std" => '0',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),

        array( 
		'name' => esc_html__( 'Image Width', 'buddy' ),
        'desc' => esc_html__( 'The width to crop the image to ( set to 0 to have a proportionate width).', 'buddy' ),
        'id' => 'buddy_post_related_image_width',
        "std" => "340",
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		'name' => esc_html__( 'Image Height', 'buddy' ),
        'desc' => esc_html__( 'The height to crop the image to ( set to 0 to have a proportionate height).', 'buddy' ),
        'id' => 'buddy_post_related_image_height',
        "std" => "290",
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 
         
	array( 'type' => "close" ),

	array( 	
		'name' => esc_html__( 'Pages', 'buddy' ),
		'type' => 'open',
	),
   		
		array( 
		'name' => esc_html__( 'Pages', 'buddy' ),
		'type' => "header",
      	'desc' => esc_html__( 'This section controls the global settings for all pages, but most settings can be overridden on individual pages.', 'buddy' )
      	 ),

  		array( 'type' => 'separator' ),
  		  		      	   		
		array(  
		'name' => esc_html__( 'Featured Image', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the featured image (can be overridden on individual posts).', 'buddy' ),
        'id' => 'buddy_show_page_image',
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        'type' => "select" ),
        
        array( 
		'name' => esc_html__( 'Image Width', 'buddy' ),
        'desc' => esc_html__( 'The width to crop the image to (can be overridden on individual pages, set to 0 to have a proportionate width).', 'buddy' ),
        'id' => 'buddy_page_image_width',
        "std" => "1003",
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 

  		array( 
		'name' => esc_html__( 'Image Height', 'buddy' ),
        'desc' => esc_html__( 'The height to crop the image to (can be overridden on individual pages, set to 0 to have a proportionate height).', 'buddy' ),
        'id' => 'buddy_page_image_height',
        "std" => "380",
        'type' => "text",
		"size" => "small",
		"details" => "px" ),
 
		array( 
		'name' => esc_html__( 'Image Wrap', 'buddy' ),
        'desc' => esc_html__( 'Choose whether the page content wraps around the featured image.', 'buddy' ),
        'id' => 'buddy_page_image_wrap',
		"style" => 'Disable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        'type' => "select" ),
 
		array( 
		'name' => esc_html__( 'Hard Crop', 'buddy' ),
        'desc' => esc_html__( 'Choose whether the image is hard cropped (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_page_hard_crop',
        "std" => 'Enable',
		"options" => array( 'Enable' => esc_html__( 'Enable', 'buddy' ), 'Disable' => esc_html__( 'Disable', 'buddy' ) ),
        'type' => "select" ),                     
                                               
   		array( 'type' => 'separator' ),
   		
 		array( 
		'name' => esc_html__( 'Left Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_page_sidebar_left',
        "std" => "gp-default-left",
        'type' => "select_sidebar" ),

 		array( 
		'name' => esc_html__( 'Right Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_page_sidebar_right',
        "std" => "gp-default-right",
        'type' => "select_sidebar" ),
        
   		array( 'type' => 'separator' ),

		array( 
		'name' => esc_html__( 'Layout', 'buddy' ),
        'desc' => esc_html__( 'Choose the page layout (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_page_layout',
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        'type' => "select" ),

        array( 'type' => 'separator' ), 
           		
  		array( 
		'name' => esc_html__( 'Title', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the page title (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_page_title',
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        'type' => "select" ),

   		array( 'type' => 'separator' ),
  		
		array(  
		'name' => esc_html__( 'Page Author', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the page author.', 'buddy' ),
        'id' => 'buddy_page_author',
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
   		
		array(  
		'name' => esc_html__( 'Page Date', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the page date.', 'buddy' ),
        'id' => 'buddy_page_date',
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
		array(  
		'name' => esc_html__( 'Page Comment Number', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the number of page comments.', 'buddy' ),
        'id' => 'buddy_page_comments',
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),

   		array( 'type' => 'separator' ),
   		
		array(  
		'name' => esc_html__( 'Author Info Panel', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display an author info panel.', 'buddy' ),
        'id' => 'buddy_page_author_info',
        "std" => '1',
		"options" => array( esc_html__( 'Enable', 'buddy' ), esc_html__( 'Disable', 'buddy' ) ),
        'type' => "radio" ),
        
	array( 'type' => "close" ),

	array( 	
		'name' => esc_html__( 'BuddyPress', 'buddy' ),
		'type' => 'open',
	),

		array( 
		'name' => esc_html__( 'BuddyPress', 'buddy' ),
		'type' => "header",
      	'desc' => esc_html__( 'This section controls the BuddyPress pages created by the plugin.', 'buddy' )
      	 ),

  		array( 'type' => 'separator' ),
   		
 		array( 
		'name' => esc_html__( 'Left Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bp_sidebar_left',
        "std" => "gp-default-left",
        'type' => "select_sidebar" ),

 		array( 
		'name' => esc_html__( 'Right Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bp_sidebar_right',
        "std" => "gp-default-right",
        'type' => "select_sidebar" ),
        
        array( 'type' => 'separator' ), 
        
		array( 
		'name' => esc_html__( 'Layout', 'buddy' ),
        'desc' => esc_html__( 'Choose the page layout (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bp_layout',
        "std" => 'sb-both',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        'type' => "select" ),

        array( 'type' => 'separator' ), 
           		
  		array( 
		'name' => esc_html__( 'Title', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the page title (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bp_title',
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        'type' => "select" ),
                  				
	array( 'type' => "close" ),		

	array( 	
		'name' => esc_html__( 'bbPress', 'buddy' ),
		'type' => 'open',
	),

		array( 
		'name' => esc_html__( 'bbPress', 'buddy' ),
		'type' => "header",
      	'desc' => esc_html__( 'This section controls the bbPress pages created by the plugin.', 'buddy' )
      	 ),

  		array( 'type' => 'separator' ),
   		
 		array( 
		'name' => esc_html__( 'Left Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bbp_sidebar_left',
        "std" => "gp-default-left",
        'type' => "select_sidebar" ),

 		array( 
		'name' => esc_html__( 'Right Sidebar', 'buddy' ),
        'desc' => esc_html__( 'Choose which sidebar area to display (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bbp_sidebar_right',
        "std" => "gp-default-right",
        'type' => "select_sidebar" ),
        
        array( 'type' => 'separator' ), 
        
		array( 
		'name' => esc_html__( 'Layout', 'buddy' ),
        'desc' => esc_html__( 'Choose the page layout (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bbp_layout',
        "std" => 'sb-right',
		"options" => array( 'sb-left' => esc_html__( 'Sidebar Left', 'buddy' ), 'sb-right' => esc_html__( 'Sidebar Right', 'buddy' ), 'sb-both' => esc_html__( 'Sidebar Left & Right', 'buddy' ), 'fullwidth' => esc_html__( 'Fullwidth', 'buddy' ) ),
        'type' => "select" ),

        array( 'type' => 'separator' ), 
           		
  		array( 
		'name' => esc_html__( 'Title', 'buddy' ),
        'desc' => esc_html__( 'Choose whether to display the page title (can be overridden on individual pages).', 'buddy' ),
        'id' => 'buddy_bbp_title',
        "std" => 'Show',
		"options" => array( 'Show' => esc_html__( 'Show', 'buddy' ), 'Hide' => esc_html__( 'Hide', 'buddy' ) ),
        'type' => "select" ),
           				
	array( 'type' => "close" ),	
				
	array( 	
		'name' => esc_html__( 'Styling', 'buddy' ),
		'type' => 'open',
	),
	
		array( 
		'name' => esc_html__( 'Styling', 'buddy' ),
		'type' => "header",
      	'desc' => esc_html__( 'This section provides you with some basic settings to change the look of the theme. If you want to customize the design of the theme further you can add your own CSS styling in "CSS" tab.', 'buddy' )
      	 ),
  		
  		array( 'type' => 'separator' ),
  			
 		array( 
		'name' => esc_html__( 'Primary Font', 'buddy' ),
        'desc' => wp_kses( __( 'Enter the name of the font you want to use for the primary text (e.g. Times New Roman, Arial, Oswald). To use Google Web Fonts click <a href="https://ghostpool.ticksy.com/article/14865/" target="_blank">here</a>.', 'buddy' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
        'id' => 'buddy_primary_font',
        'type' => "text" ), 

 		array( 
		'name' => esc_html__( 'Primary Text Size', 'buddy' ),
        'desc' => esc_html__( 'The text size used for the primary text.', 'buddy' ),
        'id' => 'buddy_primary_size',
        'type' => "text",
		"size" => "small",
		"details" => "px" ), 
				   		
 		array( 
		'name' => esc_html__( 'Primary Text Color', 'buddy' ),
        'desc' => esc_html__( 'The text color used for the primary text.', 'buddy' ),
        'id' => 'buddy_primary_text_color',
        'type' => "colorpicker" ),
   		         
 		array( 
		'name' => esc_html__( 'Primary Link Color', 'buddy' ),
        'desc' => esc_html__( 'The link color used for the primary text.', 'buddy' ),
        'id' => 'buddy_primary_link_color',
        'type' => "colorpicker" ), 

 		array( 
		'name' => esc_html__( 'Primary Link Hover Color', 'buddy' ),
        'desc' => esc_html__( 'The link hover color used for the primary text.', 'buddy' ),
        'id' => 'buddy_primary_link_hover_color',
        'type' => "colorpicker" ), 

   		  
		array( 
		'name' => esc_html__( 'Primary Background Color', 'buddy' ),
        'desc' => esc_html__( 'The backgroud color used for the primary content.', 'buddy' ),
        'id' => 'buddy_primary_bg_color',
        'type' => "colorpicker" ), 

		array( 
		'name' => esc_html__( 'Primary Border Color', 'buddy' ),
        'desc' => esc_html__( 'The border color used for the primary content.', 'buddy' ),
        'id' => 'buddy_primary_border_color',
        'type' => "colorpicker" ), 

   		array( 'type' => 'separator' ),

		array( 
		'name' => esc_html__( 'Secondary Background Color', 'buddy' ),
        'desc' => esc_html__( 'The background color used for the secondary content.', 'buddy' ),
        'id' => 'buddy_secondary_bg_color',
        'type' => "colorpicker" ), 

		array( 
		'name' => esc_html__( 'Secondary Background Hover Color', 'buddy' ),
        'desc' => esc_html__( 'The background hover color used for the secondary content.', 'buddy' ),
        'id' => 'buddy_secondary_bg_hover_color',
        'type' => "colorpicker" ), 

   		array( 'type' => 'separator' ),

 		array( 
		'name' => esc_html__( 'Heading Font', 'buddy' ),
        'desc' => wp_kses( __( 'Enter the name of the font you want to use for the headings ( e.g. Times New Roman, Arial, Oswald ). To use <a href="http://www.google.com/webfonts" target="_blank">Google Web Fonts</a> get the "Standard" code provided by Google and add this to "Scripts" box in the "General" tab.', 'buddy' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
        'id' => 'buddy_heading_font',
        'type' => "text" ), 

 		array( 
		'name' => esc_html__( 'Heading 1 Text Size', 'buddy' ),
        'desc' => esc_html__( 'The text size used in &lt;h1&gt; headings.', 'buddy' ),
        'id' => 'buddy_heading1_size',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),

 		array( 
		'name' => esc_html__( 'Heading 2 Text Size', 'buddy' ),
        'desc' => esc_html__( 'The text size used in &lt;h2&gt; headings.', 'buddy' ),
        'id' => 'buddy_heading2_size',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),
		
 		array( 
		'name' => esc_html__( 'Heading 3 Text Size', 'buddy' ),
        'desc' => esc_html__( 'The text size used in &lt;h3&gt; headings.', 'buddy' ),
        'id' => 'buddy_heading3_size',
        'type' => "text",
		"size" => "small",
		"details" => "px" ),
						           		
 		array( 
		'name' => esc_html__( 'Heading Text Color', 'buddy' ),
        'desc' => esc_html__( 'The text colour used in headings.', 'buddy' ),
        'id' => 'buddy_heading_text_color',
        'type' => "colorpicker" ), 

 		array( 
		'name' => esc_html__( 'Heading Link Color', 'buddy' ),
        'desc' => esc_html__( 'The link colour used in headings.', 'buddy' ),
        'id' => 'buddy_heading_link_color',
        'type' => "colorpicker" ), 
        
 		array( 
		'name' => esc_html__( 'Heading Link Hover Color', 'buddy' ),
        'desc' => esc_html__( 'The link hover colour used in headings.', 'buddy' ),
        'id' => 'buddy_heading_link_hover_color',
        'type' => "colorpicker" ), 

   		array( 'type' => 'separator' ),

		array( 
		'name' => esc_html__( 'Header Background Color', 'buddy' ),
        'desc' => esc_html__( 'The background color of the header at the top of the page.', 'buddy' ),
        'id' => 'buddy_header_bg_color',
        'type' => "colorpicker" ), 

 		array( 
		'name' => esc_html__( 'Header Link Color', 'buddy' ),
        'desc' => esc_html__( 'The link color of the navigation text in the header at the top of the page.', 'buddy' ),
        'id' => 'buddy_header_link_color',
        'type' => "colorpicker" ), 

		array( 
		'name' => esc_html__( 'Navigation Dropdown Background Color', 'buddy' ),
        'desc' => esc_html__( 'The background color of the dropdown navigation.', 'buddy' ),
        'id' => 'buddy_dropdown_bg_color',
        'type' => "colorpicker" ), 
                
   		array( 'type' => 'separator' ),
   		
 		array( 
		'name' => esc_html__( 'Primary Button Text Color', 'buddy' ),
        'desc' => esc_html__( 'The text color used for the primary buttons.', 'buddy' ),
        'id' => 'buddy_primary_button_text_color',
        'type' => "colorpicker" ),  

 		array( 
		'name' => esc_html__( 'Primary Button Background Color', 'buddy' ),
        'desc' => esc_html__( 'The background color used for the primary buttons.', 'buddy' ),
        'id' => 'buddy_primary_button_bg_color',
        'type' => "colorpicker" ),      

 		array( 
		'name' => esc_html__( 'Primary Button Background Hover Color', 'buddy' ),
        'desc' => esc_html__( 'The background hover color used for the primary buttons.', 'buddy' ),
        'id' => 'buddy_primary_button_bg_hover_color',
        'type' => "colorpicker" ),      
        
   		array( 'type' => 'separator' ),    

		array( 
		'name' => esc_html__( 'Secondary Button Text Color', 'buddy' ),
        'desc' => esc_html__( 'The text color used for the secondary buttons.', 'buddy' ),
        'id' => 'buddy_secondary_button_text_color',
        'type' => "colorpicker" ),  

 		array( 
		'name' => esc_html__( 'Secondary Button Background Color', 'buddy' ),
        'desc' => esc_html__( 'The background color used for the secondary buttons.', 'buddy' ),
        'id' => 'buddy_secondary_button_bg_color',
        'type' => "colorpicker" ),      

 		array( 
		'name' => esc_html__( 'Secondary Button Background Hover Color', 'buddy' ),
        'desc' => esc_html__( 'The background hover color used for the secondary buttons.', 'buddy' ),
        'id' => 'buddy_secondary_button_bg_hover_color',
        'type' => "colorpicker" ),      
        
   		array( 'type' => 'separator' ),     
   		       		           		                                 
		array( 
		'name' => esc_html__( 'Desktop Page Width', 'buddy' ),
		'id' => 'buddy_desktop_page_width',
		'std' => '1200',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
					
		array( 
		'name' => esc_html__( 'Desktop Content Width (with one sidebar)', 'buddy' ),
		'id' => 'buddy_desktop_content_width_1',
		'std' => '935',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Single Sidebar Width - 20', 'buddy' ),
		 ),	

		array( 
		'name' => esc_html__( 'Desktop Content Width ( with two sidebars )', 'buddy' ),
		'id' => 'buddy_desktop_content_width_2',
		'std' => '670',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Double Sidebar Width - Double Sidebar Width - 40', 'buddy' ),
		 ),

		array( 
		'name' => esc_html__( 'Desktop Single Sidebar Width', 'buddy' ),
		'id' => 'buddy_desktop_single_sidebar_width',
		'std' => '245',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),	
				
		array( 
		'name' => esc_html__( 'Desktop Double Sidebar Width', 'buddy' ),
		'id' => 'buddy_desktop_double_sidebar_width',
		'std' => '245',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
				
		array( 'type' => 'separator' ),   

		array( 
		'name' => esc_html__( 'Tablet (Landscape) Page Width', 'buddy' ),
		'id' => 'buddy_tablet_l_page_width',
		'std' => '1000',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
					
		array( 
		'name' => esc_html__( 'Tablet (Landscape) Content Width (with one sidebar)', 'buddy' ),
		'id' => 'buddy_tablet_l_content_width_1',
		'std' => '775',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Single Sidebar Width - 20', 'buddy' ),
		 ),	

		array( 
		'name' => esc_html__( 'Tablet (Landscape) Content Width (with two sidebars)', 'buddy' ),
		'id' => 'buddy_tablet_l_content_width_2',
		'std' => '550',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		'desc' => esc_html__( 'Page Width - Double Sidebar Width - Double Sidebar Width - 40', 'buddy' ),
		 ),

		array( 
		'name' => esc_html__( 'Tablet (Landscape) Single Sidebar Width', 'buddy' ),
		'id' => 'buddy_tablet_l_single_sidebar_width',
		'std' => '205',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),	
				
		array( 
		'name' => esc_html__( 'Tablet (Landscape) Double Sidebar Width', 'buddy' ),
		'id' => 'buddy_tablet_l_double_sidebar_width',
		'std' => '205',
		'type' => 'text',
		'size' => 'small',
		'details' => 'px',
		 ),
													 
	array( 'type' => 'close' ),
				      			
	array( 	
		'name' => esc_html__( 'CSS', 'buddy' ),
		'type' => 'open',
	),
		
		array( 
		'name' => esc_html__( 'CSS', 'buddy' ),
		'type' => "header",
		'desc' => esc_html__( 'You can link to your own custom stylesheet or add your own CSS below to style the theme. This CSS will not be lost if you update the theme. For more information on how to find the names of the elements you want to style  click', 'buddy' ).' <a href="http://ghostpool.com/help/buddy/help.html#43" target="_blank">' . esc_html__( 'here', 'buddy' ) . '</a>.'
      	),

  		array( 'type' => 'separator' ),
      	
        array( 
		'name' => esc_html__( 'Custom Stylesheet', 'buddy' ),
		'desc' => wp_kses( __( 'Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code> (can be overridden on individual posts/pages).', 'buddy' ), array( 'code' => array() ) ),
        'id' => 'buddy_custom_stylesheet',
        'type' => "text"
        ),
        
		array( 'type' => 'separator' ), 
		  		      	        		
		array( 
		'name' => esc_html__( 'CSS Code', 'buddy' ),
        'desc' => '',
        'id' => 'buddy_custom_css',
        'type' => 'textarea',
        "size" => "large" ),

	array( 'type' => "close" ),
	
);
	
function ghostpool_add_admin() {

    global $options, $get_font_transiet;
			
    if ( isset( $_GET['page'] ) && $_GET['page'] == basename( __FILE__ ) ) {

        if ( isset( $_REQUEST['action'] ) && 'save' == $_REQUEST['action'] ) {

			foreach ( $options as $value ) {
				if ( isset( $value['id'] ) ) {
					update_option( $value['id'], $_REQUEST[$value['id']] );
				} else {
					if ( isset( $value['id'] ) ) { delete_option( $value['id'] ); }
				}
			}

			header( "Location: themes.php?page=theme-options.php&saved=true" );
			die;

        } elseif ( isset( $_REQUEST['action'] ) && 'reset' == $_REQUEST['action'] ) {

            foreach ( $options as $value ) {
                delete_option( $value['id'] );
            }
            
            update_option( 'buddy_theme_setup_status', '0' );

            header( "Location: themes.php?page=theme-options.php&reset=true" );
            die;

        }

		elseif ( isset( $_REQUEST['action'] ) && 'export' == $_REQUEST['action'] ) ghostpool_export_settings();
		elseif ( isset( $_REQUEST['action'] ) && 'import' == $_REQUEST['action'] ) ghostpool_import_settings();

    }

    add_theme_page( esc_html__( 'Theme Options', 'buddy' ), esc_html__( 'Theme Options', 'buddy' ), 'manage_options', basename( __FILE__ ), 'ghostpool_admin' );

}

function ghostpool_admin() {

    global $options, $get_font_transiet;

    if ( isset( $_REQUEST['saved'] ) && $_REQUEST['saved'] ) {
    	echo '<div id="message" class="updated"><p><strong>'.esc_html__( 'Options Saved', 'buddy' ).'</strong></p></div>';
    }	
    if ( isset( $_REQUEST['reset'] ) && $_REQUEST['reset'] ) {
    	echo '<div id="message" class="updated"><p><strong>'.esc_html__( 'Options Reset', 'buddy' ).'</strong></p></div>';
	}
	
?>

<div id="gp-theme-options" class="wrap">
	
	<h2>
	
		<?php esc_html_e( 'Theme Options', 'buddy' ); ?>
		
		<a href="http://ghostpool.com/help/buddy/help.html" class="add-new-h2" target="_blank"><?php esc_html_e( 'Help File', 'buddy' ); ?></a>
	
		<a href="http://ghostpool.com/help/buddy/changelog.html" class="add-new-h2" target="_blank"><?php esc_html_e( 'Changelog', 'buddy' ); ?></a>
	
		<a href="http://ghostpool.ticksy.com" class="add-new-h2" target="_blank"><?php esc_html_e( 'Support', 'buddy' ); ?></a>
	
		<a href="http://ourwebmedia.com/ghostpool.php?aff=002" class="add-new-h2" target="_blank"><?php esc_html_e( 'Premium Services', 'buddy' ); ?></a>
	
	</h2>
	
	
	<div id="import_export" class="hide-if-js">
	
		<h2><?php esc_html_e( 'Import Theme Options', 'buddy' ); ?></h2>
		
		<span><?php esc_html_e( 'If you have a back up of your theme options you can import them below.', 'buddy' ); ?></span><br/><br/>
		
		<form method="post" enctype="multipart/form-data">
			<span class="submit"><input type="file" name="file" id="file" />
			<input type="submit" name="import" class="button" value="<?php esc_html_e( 'Upload', 'buddy' ); ?>" /></span>
			<input type="hidden" name="action" value="import" />
		</form>

		<br/><hr>
		
		<h2><?php esc_html_e( 'Export Theme Options', 'buddy' ); ?></h2>
		
		<span><?php esc_html_e( 'If you want to create a back up of all your theme options click the Export button below (will only back up your theme options and not your post/page/images data).', 'buddy' ); ?></span>
		
		<form method="post">
			<p class="submit"><input name="export" type="submit" class="button" value="<?php esc_html_e( 'Export Theme Options', 'buddy' ); ?>" /></p>
			<input type="hidden" name="action" value="export" />
		</form>	
	
	</div>

	
	<form method="post">
		
		<div class="submit">	
		
			<a href="#TB_inline?height=300&amp;width=500&amp;inlineId=import_export" onclick="return false;" class="thickbox"><input type="button" class="button" value="<?php esc_html_e( 'Import/Export Theme Options' , 'buddy' ); ?>"></a>
		
			<input name="save" type="submit" class="button-primary right" value="<?php esc_html_e( 'Save Changes', 'buddy' ); ?>" />
			<input type="hidden" name="action" value="save" />
			
		</div>
		
		<div id="panels">


<?php foreach ( $options as $value ) {
switch( $value['type'] ) {
case 'open':
?>


	<div data-name="<?php echo $value['name']; ?>" class="panel">
		
	
<?php break;
case 'close':
?>

	</div>


<?php break;
case 'header':
?>

	<div class="gp-option gp-option-header">
		<?php if ( isset( $value['name'] ) ) { ?><h2><?php echo $value['name']; ?></h2><?php } ?>
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>	


<?php break;
case 'subheader':
?>

	<div class="gp-option gp-option-subheader">
		<?php if ( isset( $value['name'] ) ) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>	
		
	
<?php break;
case 'separator':
?>

	<div class="gp-separator"></div>


<?php break;
case 'spacer':
?>

	<div class="gp-spacer"></div>



<?php break;
case 'option_open':
?>
	
	
	<div class="gp-option gp-option-open">
	
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
	

<?php break;
case 'option_close':
?>
	
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	
	</div>


<?php break;
case 'text':
?>
	
	
	<div class="gp-option gp-text<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
	
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != '' ) { echo get_option( $value['id'] ); } else { if ( isset( $value['std'] ) ) { echo $value['std']; } } ?>" size="<?php if ( isset( $value['size'] ) && $value['size'] == 'small' ) { ?>4<?php } else { ?>40<?php } ?>" /><?php if ( isset( $value['details'] ) ) { ?> <span><?php echo $value['details']; ?></span><?php } ?>
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>
	
	
<?php break;
case 'upload':
?>

	<div class="gp-option gp-upload<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
	
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" size="40" class='upload' value="<?php if ( get_option( $value['id'] ) != '' ) { echo get_option( $value['id'] ); } else { if ( isset( $value['std'] ) ) { echo $value['std']; } } ?>" />
		<input type="button" id="<?php echo $value['id']; ?>_button" class="gp-upload-button button" value="<?php esc_html_e( 'Upload', 'buddy' ); ?>" />
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>


<?php
break;
case 'textarea':
?>

	<div class="gp-option gp-textarea<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
	
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<textarea name="<?php echo $value['id']; ?>" cols="70" rows="<?php if ( isset( $value['size'] ) && $value['size'] == 'large' ) { ?>50<?php } else { ?>10<?php } ?>"><?php if ( get_option( $value['id'] ) != '' ) { echo stripslashes( get_option( $value['id'] ) ); } else { if ( isset( $value['std'] ) ) { echo $value['std']; } } ?></textarea>
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>


<?php
break;
case 'checkbox':
?> 
   	
	<div class="gp-option gp-checkbox<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
	
		<?php if ( get_option( $value['id'] ) ) { $checked = 'checked="checked"'; } else { $checked = ''; } ?>
		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		
		<?php if ( isset( $value['name'] ) ) { ?><strong><?php echo $value['name']; ?></strong><?php } ?>
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>

	

<?php        
break;
case 'radio':
?>

	<div class="gp-option gp-radio<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
		
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<?php foreach ( $value['options'] as $key=>$option ) {	
			$radio_setting = get_option( $value['id'] );
			if ( $radio_setting != '' ) {
				if ( $key == get_option( $value['id'] ) ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
			} else {
				if ( $key == $value['std'] ) {
					$checked = 'checked="checked"';
				} else {
					$checked = '';
				}
			} ?>
			
			<div class="gp-radio-button">
				<input type='radio' name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><label for="<?php echo $value['id'].'_'.$key; ?>"><?php echo $option; ?></label>
			</div>	
			
		<?php } ?>
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>
	
	
<?php
break;
case 'select':
?>
	
	<div class="gp-option gp-select<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
	
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach ( $value['options'] as $key => $option ) { ?>
					<?php if ( get_option( $value['id'] ) != '' ) { ?>
						<option value="<?php echo $key; ?>" <?php if ( get_option( $value['id'] ) == $key ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } else { ?>
						<option value="<?php echo $key; ?>" <?php if ( $value['std'] == $key ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } ?>
			<?php } ?>
		</select>
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>


<?php
break;
case 'select_taxonomy':
?>
		
	<div class="gp-option gp-select-taxonomy<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
	
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<?php $terms = get_terms( $value['cats'], 'hide_empty=0' ); ?>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><option value=''><?php esc_html_e( 'None', 'buddy' ); ?></option><?php foreach ( $terms as $term ): ?><option value="<?php echo $term->slug; ?>" <?php if ( get_option( $value['id'] ) == $term->slug ) { echo ' selected="selected"'; } ?>><?php echo $term->name; ?></option><?php endforeach; ?></select>
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>	



<?php
break;
case 'select_sidebar':
global $post, $wp_registered_sidebars;
?>
		
	<div class="gp-option gp-select-sidebar<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
		
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php $sidebars = $wp_registered_sidebars; 
		if ( is_array( $sidebars ) && !empty( $sidebars ) ) { 
			foreach ( $sidebars as $sidebar ) { 
				if ( get_option( $value['id'] ) != '' ) { ?>
					<option value="<?php echo $sidebar['id']; ?>"<?php if ( get_option( $value['id'] ) == $sidebar['id'] ) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
				<?php } else { ?>				
					<option value="<?php echo $sidebar['id']; ?>"<?php if ( $value['std'] == $sidebar['id'] ) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>				
		<?php }}} ?>	
		</select>
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>


<?php        
break;
case 'colorpicker':
?>

	<div class="gp-option gp-colorpick<?php if ( isset( $value['stripped'] ) && $value['stripped'] == 'true' ) { ?> gp-stripped<?php } ?>">
	
		<?php if ( isset( $value['name'] ) ) { ?><h4><?php echo $value['name']; ?></h4><?php } ?>
		
		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) { 
				$( '#<?php echo $value['id']; ?>' ).wpColorPicker();
			});
		</script>
		
		<input type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != '' ) { echo get_option( $value['id'] ); } else { if ( isset( $value['std'] ) ) { if ( isset( $value['std'] ) ) { echo $value['std']; } } } ?>" />
		
		<?php if ( isset( $value['desc'] ) ) { ?><div class="gp-option-desc"><?php echo $value['desc']; ?></div><?php } ?>
		
	</div>


<?php        
break;
}}
?>

	</div>
	
	<div class="submit">

			<input name="save" type="submit" class="button-primary right" value="<?php esc_html_e( 'Save Changes', 'buddy' ); ?>" />
			<input type="hidden" name="action" value="save" />

		</form>
	
		<form method="post" onSubmit="if ( confirm( '<?php esc_html_e( 'Are you sure you want to reset all the theme options&#63;', 'buddy' ); ?>' ) ) return true; else return false;">	
			<input name="reset" type="submit" class="button right" style="margin-right: 10px;" value="<?php esc_html_e( 'Reset', 'buddy' ); ?>" />
			<input type="hidden" name="action" value="reset" />			
		</form>
	
	</div>

</div>

<?php } 

if ( $pagenow == "themes.php" ) {
	function ghostpool_admin_scripts() {
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'ghostpool-admin-css', get_template_directory_uri() . '/lib/css/admin.css' );
		wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_media();
		wp_enqueue_script( 'ghostpool-tabs', get_template_directory_uri() . '/lib/scripts/jquery.tabs.js', array( 'jquery' ) );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'ghostpool-uploader', get_template_directory_uri() . '/lib/scripts/uploader.js' );
	}
	add_action( 'admin_enqueue_scripts', 'ghostpool_admin_scripts' );
}
add_action( 'admin_menu', 'ghostpool_add_admin' );

// Export Theme Options
function ghostpool_export_settings() {
	global $options;
	header( 'Cache-Control: public, must-revalidate' );
	header( 'Pragma: hack' );
	header( 'Content-Type: text/plain' );
	header( 'Content-Disposition: attachment; filename="theme-options-'.date( 'dMy' ) . '.dat"' );
	foreach ( $options as $value ) {
		$theme_settings[$value['id']] = get_option( $value['id'] );	
	}	
	echo serialize( $theme_settings );
}

// Import Theme Options
function ghostpool_import_settings() {
	global $options;
	if ( $_FILES['file']['error'] > 0 ) {
		echo 'Error: ' . $_FILES['file']['error'] . '<br />';
	} else {
		$rawdata = wp_remote_get( $_FILES['file']['tmp_name'] );		
		$theme_settings = unserialize( $rawdata );		
		foreach ( $options as $value ) {
			if ( $theme_settings[$value['id']] ) {
				update_option( $value['id'], $theme_settings[$value['id']] );
				$$value['id'] = $theme_settings[$value['id']];
			} else {
				if ( $value['type'] == 'checkbox_multiple' ) {
					$$value['id'] = array();
				} else {
					$$value['id'] = $value['std'];
				}	
			}
		}
		
	}
	if ( in_array( 'cacheStyles', get_option( 'ghostpool_misc' ) ) ) {
		cache_settings();
	}	
	wp_redirect( $_SERVER['PHP_SELF'].'?page=theme-options.php' );
}

// Help Tab
if ( $pagenow == "themes.php" ) {
	function ghostpool_theme_help_tab() {
		$screen = get_current_screen();
		$screen->add_help_tab( array( 
			'id' => 'help',
			'title' => 'Help',
			'content' => '<p><a href="http://ghostpool.com/help/buddy/help.html" target="_blank">' . esc_html__( 'Help File', 'buddy' ).'</a></p><p><a href="http://ghostpool.com/help/buddy/changelog.html" target="_blank">' . esc_html__( 'Changelog', 'buddy' ).'</a></p><p><a href="http://ghostpool.ticksy.com" target="_blank">' . esc_html__( 'Support', 'buddy' ).'</a></p><p><a href="http://ourwebmedia.com/ghostpool.php" target="_blank">' . esc_html__( 'Premium Services', 'buddy' ).'</a></p>'
		 ) );	
	}
	add_action( 'admin_head', 'ghostpool_theme_help_tab' );
}


/////////////////////////////////////// Save Default Theme Options ///////////////////////////////////////

function ghostpool_theme_options_setup() {
	
	if ( get_option( 'buddy_theme_setup_status' ) !== '1' ) {
	
		$core_settings = array( 
		
			/* General */
			'buddy_fixed_header' => 'gp-fixed-header',
			'buddy_responsive' => '0',
			'buddy_retina' => '0',	
			'buddy_back_to_top' => 'gp-back-to-top-desktop',
			'buddy_lightbox' => 'gp-lightbox-group',
			'buddy_profile_button' => 'gp-profile-all',		
			'buddy_preload' => '1',
					
			/* Post Categories */
			'buddy_cat_thumbnail_width' => '200',
			'buddy_cat_thumbnail_height' => '150',
			'buddy_cat_image_wrap' => 'Enable',		
			'buddy_cat_hard_crop' => 'Enable',
			'buddy_cat_sidebar_left' => 'gp-default-left',
			'buddy_cat_sidebar_right' => 'gp-default-right',	
			'buddy_cat_layout' => 'sb-both',					
			'buddy_cat_title' => 'Show',						
			'buddy_cat_content_display' => '0',
			'buddy_cat_excerpt_length' => '400',
			'buddy_cat_read_more' => '0',
			'buddy_cat_date' => '0',
			'buddy_cat_author' => '0',
			'buddy_cat_cats' => '0',
			'buddy_cat_comments' => '0',
			'buddy_cat_tags' => '1',
			
			/* Posts */
			'buddy_show_post_image' => 'Show',
			'buddy_post_image_width' => '1003',
			'buddy_post_image_height' => '380',
			'buddy_post_image_wrap' => 'Disable',
			'buddy_post_hard_crop' => 'Enable',
			'buddy_post_sidebar_left' => 'gp-default-left',
			'buddy_post_sidebar_right' => 'gp-default-right',	
			'buddy_post_layout' => 'sb-both',	
			'buddy_post_title' => 'Show',	
			'buddy_post_date' => '0',
			'buddy_post_author' => '0',
			'buddy_post_cats' => '0',
			'buddy_post_comments' => '0',
			'buddy_post_tags' => '1',	
			'buddy_post_author_info' => '0',	
			'buddy_post_related_items' => '0',	
			'buddy_post_related_image_width' => '340',	
			'buddy_post_related_image_height' => '290',			
			
			/* Pages */
			'buddy_show_page_image' => 'Show',
			'buddy_page_image_width' => '1003',
			'buddy_page_image_height' => '380',
			'buddy_page_image_wrap' => 'Disable',
			'buddy_page_hard_crop' => 'Enable',
			'buddy_page_sidebar_left' => 'gp-default-left',
			'buddy_page_sidebar_right' => 'gp-default-right',	
			'buddy_page_layout' => 'sb-both',	
			'buddy_page_title' => 'Show',					
			'buddy_page_date' => '1',
			'buddy_page_author' => '1',
			'buddy_page_comments' => '1',	
			'buddy_page_author_info' => '1',
			
			/* BuddyPress */
			'buddy_bp_buttons' => '0',
			'buddy_login_url' => esc_url( home_url( '/login' ) ),
			'buddy_bp_sidebar_left' => 'gp-default-left',
			'buddy_bp_sidebar_right' => 'gp-default-right',	
			'buddy_bp_layout' => 'sb-both',	
			'buddy_bp_title' => 'Show',

			/* bbPress */
			'buddy_bbp_sidebar_left' => 'gp-default-left',
			'buddy_bbp_sidebar_right' => 'gp-default-right',	
			'buddy_bbp_layout' => 'sb-right',	
			'buddy_bbp_title' => 'Show',
			
			/* Theme Widths */
			'buddy_desktop_page_width' => '1200',		
			'buddy_desktop_content_width_1' => '935',		
			'buddy_desktop_content_width_2' => '670',		
			'buddy_desktop_single_sidebar_width' => '245',		
			'buddy_desktop_double_sidebar_width' => '245',		
			'buddy_tablet_l_page_width' => '1000',		
			'buddy_tablet_l_content_width_1' => '775',		
			'buddy_tablet_l_content_width_2' => '550',		
			'buddy_tablet_l_single_sidebar_width' => '205',		
			'buddy_tablet_l_double_sidebar_width' => '205',		
																									
		 );
		foreach( $core_settings as $k => $v ) {
			update_option( $k, $v );
		}

		update_option( 'buddy_theme_setup_status', '1' );

	}		

}
add_action( 'after_setup_theme', 'ghostpool_theme_options_setup' );

?>