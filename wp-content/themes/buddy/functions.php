<?php

// Localisation
load_theme_textdomain( 'buddy', trailingslashit( WP_LANG_DIR ) . 'themes/' );
load_theme_textdomain( 'buddy', get_stylesheet_directory() . '/languages' );
load_theme_textdomain( 'buddy', get_template_directory() . '/languages' );

// Main Theme Options
require_once( get_template_directory() . '/lib/inc/theme-options.php' );

// Meta Options
require_once( get_template_directory() . '/lib/inc/theme-meta-options.php' );
	
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own ghostpool_theme_setup() function to override in a child theme.
 *
 */ 			
if ( ! function_exists( 'ghostpool_theme_setup' ) ) {
	function ghostpool_theme_setup() {

		// Featured images
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true );

		// Background customizer
		add_theme_support( 'custom-background' );

		// This theme styles the visual editor with editor-style.css to match the theme style
		add_editor_style( 'lib/css/editor-style.css' );

		// Add default posts and comments RSS feed links to <head>
		add_theme_support( 'automatic-feed-links' );

		// WooCommerce Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		// BuddyPress legacy support
		add_theme_support( 'buddypress-use-legacy' );
		
		// Title support
		add_theme_support( 'title-tag' );

		// Register navigation menus
		register_nav_menus( array( 
			'main-nav' => esc_html__( 'Main Navigation', 'buddy' ),
		 ) );
		
		// Image Resizer
		require_once( get_template_directory() . '/lib/inc/aq_resizer.php' );

		// Other Options
		if ( is_admin() ) {
			require_once( get_template_directory() . '/lib/inc/theme-other-options.php' );
		}
		
		// Page settings
		require_once( get_template_directory() . '/lib/inc/page-settings.php' );

		// Load login functions
		require_once( get_template_directory() . '/lib/inc/login-functions.php' );
		
		// TinyMCE
		if ( is_admin() ) { 
			require_once ( get_template_directory() . '/lib/inc/tinymce/tinymce.php' );
		}
		
		// BuddyPress functions
		if ( function_exists( 'bp_is_active' ) ) {
			require_once( get_template_directory() . '/lib/inc/bp-functions.php' );
		}

		// bbPress functions
		if ( class_exists( 'bbPress' ) ) {
			require_once( get_template_directory() . '/lib/inc/bbpress-functions.php' );
		}
		
	}
}
add_action( 'after_setup_theme', 'ghostpool_theme_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 */
function ghostpool_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ghostpool_content_width', 670 );
}
add_action( 'after_setup_theme', 'ghostpool_content_width', 0 );

/**
 * Enqueues scripts and styles.
 *
 */	
if ( ! function_exists( 'ghostpool_scripts' ) ) {

	function ghostpool_scripts() {
		
		wp_enqueue_style( 'ghostpool-style', get_stylesheet_uri() );
		
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/lib/fonts/font-awesome/css/font-awesome.min.css' );

		if ( get_option( 'buddy_lightbox' ) != 'gp-lightbox-disabled' ) {		
			wp_enqueue_style( 'prettyphoto', get_template_directory_uri() . '/lib/scripts/prettyPhoto/css/prettyPhoto.css' );
		}
	
		if ( get_option( 'buddy_custom_stylesheet' ) ) {
			wp_enqueue_style( 'ghostpool-custom-style', get_template_directory_uri() . '/' . get_option( 'buddy_custom_stylesheet' ) );
		}	

		// Convert hex codes to rgb
		if ( ! function_exists( 'hex2rgb' ) ) {
			function hex2rgb( $hex ) {
				$hex = str_replace( "#", '', $hex );	
				if ( strlen( $hex ) == 3 ) {
					$r = hexdec( substr( $hex,0,1 ).substr( $hex,0,1 ) );
					$g = hexdec( substr( $hex,1,1 ).substr( $hex,1,1 ) );
					$b = hexdec( substr( $hex,2,1 ).substr( $hex,2,1 ) );
					$rgb = array( $r, $g, $b );
					return implode( ",", $rgb );
				} elseif ( strlen( $hex ) > 3 ) {
					$r = hexdec( substr( $hex,0,2 ) );
					$g = hexdec( substr( $hex,2,2 ) );
					$b = hexdec( substr( $hex,4,2 ) );
					$rgb = array( $r, $g, $b );
					return implode( ",", $rgb );
				} else {}
			}
		}

		$gp_custom_css = '';

		// Primary
		if ( get_option( 'buddy_primary_font' ) ) {		
			$gp_custom_css .= 'body, input, textarea, select, #sidebar .menu li .menu-subtitle {font-family: "' . get_option( 'buddy_primary_font' ) . '";}';
		}
		if ( get_option( 'buddy_primary_size' ) ) {
			$gp_custom_css .= 'body, input, textarea, select, #sidebar .menu li .menu-subtitle {font-size: ' . get_option( 'buddy_primary_size' ) . 'px;}';
		}
		if ( get_option( 'buddy_primary_text_color' ) ) {
			$gp_custom_css .= 'body, input, textarea, select, #sidebar .menu li .menu-subtitle {color: ' . get_option( 'buddy_primary_text_color' ) . ';}';
		}
		if ( get_option( 'buddy_primary_link_color' ) ) {
			$gp_custom_css .= 'a, .ui-tabs .ui-tabs-nav li.ui-tabs-active a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-state-processing a, .ui-tabs .ui-tabs-nav li.ui-state-hover a {color: ' . get_option( 'buddy_primary_link_color' ) . ';}';
		}
		if ( get_option( 'buddy_primary_link_hover_color' ) ) {
			$gp_custom_css .= 'a:hover {color: ' . get_option( 'buddy_primary_link_hover_color' ) . ';}';
		}
		if ( get_option( 'buddy_primary_bg_color' ) ) {
			$gp_custom_css .= ' . padder, .widget, #footer, body.activity-permalink .activity-list {background-color: ' . get_option( 'buddy_primary_bg_color' ) . ';}';
		}	
		if ( get_option( 'buddy_primary_border_color' ) ) {
			$gp_custom_css .= ' . widget .widgettitle, .sc-divider, .author-info, .separate > div, .joint > div {border-color:' . get_option( 'buddy_primary_border_color' ) . ';}';
		}	

		// Secondary
		if ( get_option( 'buddy_secondary_bg_color' ) ) {
			$gp_custom_css .= 'input, textarea, input[type="password"], .ui-tabs .ui-tabs-nav li.ui-tabs-active, .sc-tab-panel, #content .widget[class*="widget_bp_"] h3 {background-color: ' . get_option( 'buddy_secondary_bg_color' ) . '; border-color: ' . get_option( 'buddy_secondary_bg_color' ) . ';}';
		}
		if ( get_option( 'buddy_secondary_bg_hover_color' ) ) {
			$gp_custom_css .= 'input:focus, textarea:focus, input[type="password"]:focus {background-color: ' . get_option( 'buddy_secondary_bg_hover_color' ) . '; border-color: ' . get_option( 'buddy_secondary_bg_hover_color' ) . ';}';
		}	

		// Headings
		if ( get_option( 'buddy_heading_font' ) ) {		
			$gp_custom_css .= 'h1, h2, h3, h4, h5, h6, .widget .widgettitle {font-family: "' . get_option( 'buddy_heading_font' ) . '";}';
		}
		if ( get_option( 'buddy_heading_text_color' ) ) {
			$gp_custom_css .= 'h1, h2, h3, h4, h5, h6, .widget .widgettitle {color: ' . get_option( 'buddy_heading_text_color' ) . ';}';
		}	
		if ( get_option( 'buddy_heading1_size' ) ) {
			$gp_custom_css .= 'h1 {font-size: ' . get_option( 'buddy_heading1_size' ) . 'px;}';
		}	
		if ( get_option( 'buddy_heading2_size' ) ) {
			$gp_custom_css .= 'h2 {font-size: ' . get_option( 'buddy_heading2_size' ) . 'px;}';
		}
		if ( get_option( 'buddy_heading3_size' ) ) {
			$gp_custom_css .= 'h3 {font-size: ' . get_option( 'buddy_heading3_size' ) . 'px;}';
		}
		if ( get_option( 'buddy_heading_link_color' ) ) {				
			$gp_custom_css .= 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a, #sidebar .menu li a {color: ' . get_option( 'buddy_heading_link_color' ) . ';}';
		}
		if ( get_option( 'buddy_heading_link_hover_color' ) ) {
			$gp_custom_css .= 'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, #sidebar .menu li a:hover {color: ' . get_option( 'buddy_heading_link_hover_color' ) . ';}';
		}	

		// Header
		if ( get_option( 'buddy_header_bg_color' ) ) {
			$gp_custom_css .= '#header,.gp-notification-counter{background-color: ' . get_option( 'buddy_header_bg_color' ) . ';}';
		}	
		if ( get_option( 'buddy_header_link_color' ) ) {
			$gp_custom_css .= '#nav .menu li a, #nav .menu li a:hover, #nav .menu li:hover > a, #mobile-nav .menu li a, #mobile-nav .menu li a:hover {color: ' . get_option( 'buddy_header_link_color' ) . ';}';
			$gp_custom_css .= '#nav .menu .sub-menu li a {color: rgb( ' . hex2rgb( get_option( 'buddy_header_link_color' ) ) . ' ); color: rgba( ' . hex2rgb( get_option( 'buddy_header_link_color' ) ) . ',0.8 );}';
			$gp_custom_css .= '#nav .menu .sub-menu li a:hover {color: rgb( ' . hex2rgb( get_option( 'buddy_header_link_color' ) ) . ' ); color: rgba( ' . hex2rgb( get_option( 'buddy_header_link_color' ) ) . ',1 );}'; 
		}
		if ( get_option( 'buddy_dropdown_bg_color' ) ) {
			$gp_custom_css .= '#nav .menu li a:hover, #nav .menu .sub-menu, #nav .menu li:hover > a, #mobile-nav .menu li a:hover {background-color: ' . get_option( 'buddy_dropdown_bg_color' ) . ';}';
		}	

		// Primary Buttons
		if ( get_option( 'buddy_primary_button_text_color' ) ) {
			$gp_custom_css .= 'input[type="button"], input[type="submit"], input[type="reset"], button, .button,.gp-theme #buddypress .comment-reply-link,.gp-theme #buddypress a.button,.gp-theme #buddypress button,.gp-theme #buddypress div.generic-button a,.gp-theme #buddypress input[type=button],.gp-theme #buddypress input[type=reset],.gp-theme #buddypress input[type=submit],.gp-theme #buddypress ul.button-nav li a,#gp-profile-desktop-button,#gp-profile-mobile-button{color: ' . get_option( 'buddy_primary_button_text_color' ) . ';}';
		}	
		if ( get_option( 'buddy_primary_button_bg_color' ) ) {		
			$gp_custom_css .= 'input[type="button"], input[type="submit"], input[type="reset"], button, .button,.gp-theme #buddypress .comment-reply-link,.gp-theme #buddypress a.button,.gp-theme #buddypress button,.gp-theme #buddypress div.generic-button a,.gp-theme #buddypress input[type=button],.gp-theme #buddypress input[type=reset],.gp-theme #buddypress input[type=submit],.gp-theme #buddypress ul.button-nav li a,#gp-profile-desktop-button,#gp-profile-mobile-button{background-color: ' . get_option( 'buddy_primary_button_bg_color' ) . '; border-color: ' . get_option( 'buddy_primary_button_bg_color' ) . ';}';
		}
		if ( get_option( 'buddy_primary_button_bg_hover_color' ) ) {
			$gp_custom_css .= 'input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, button:hover, .button:hover,.gp-theme #buddypress .comment-reply-link:hover,.gp-theme #buddypress a.button:hover,.gp-theme #buddypress button:hover,.gp-theme #buddypress div.generic-button a:hover,.gp-theme #buddypress input[type=button]:hover,.gp-theme #buddypress input[type=reset]:hover,.gp-theme #buddypress input[type=submit]:hover,.gp-theme #buddypress ul.button-nav li a:hover,a.bp-title-button:hover,#gp-profile-desktop-button:hover,#gp-profile-mobile-button:hover{background-color: ' . get_option( 'buddy_primary_button_bg_hover_color' ) . '; border-color: ' . get_option( 'buddy_primary_button_bg_hover_color' ) . '; color: ' . get_option( 'buddy_primary_button_text_color' ) . ';}';
		}	

		// Secondary Buttons
		if ( get_option( 'buddy_secondary_button_text_color' ) ) {
			$gp_custom_css .= '.login-button,#mobile-nav-button,.gp-theme .widget.buddypress div.item-options a,.gp-theme #buddypress div.activity-meta a.button,.gp-theme #buddypress .activity .acomment-options a,#mobile-nav-button{color: ' . get_option( 'buddy_secondary_button_text_color' ) . ';}';
		}
		if ( get_option( 'buddy_secondary_button_bg_color' ) ) {		
			$gp_custom_css .= '.login-button,.gp-theme .widget.buddypress div.item-options a,.gp-theme #buddypress div.activity-meta a.button,.gp-theme #buddypress .activity .acomment-options a,#mobile-nav-button{background-color: ' . get_option( 'buddy_secondary_button_bg_color' ) . '; border-color: ' . get_option( 'buddy_secondary_button_bg_color' ) . ';}';
		}	
		if ( get_option( 'buddy_secondary_button_bg_hover_color' ) ) {
			$gp_custom_css .= '.login-button:hover, #mobile-nav-button:hover,.gp-theme .widget.buddypress div.item-options a.selected,.gp-theme .widget.buddypress div.item-options a:hover,.gp-theme #buddypress div.activity-meta a.button:hover,.gp-theme #buddypress .activity .acomment-options a:hover,#mobile-nav-button:hover{background-color: ' . get_option( 'buddy_secondary_button_bg_hover_color' ) . '; border-color: ' . get_option( 'buddy_secondary_button_bg_hover_color' ) . '; color: ' . get_option( 'buddy_secondary_button_text_color' ) . ';}';
		}

		// Desktops - 1024 - 1199px
		if ( get_option( 'buddy_desktop_page_width' ) != "1200" OR get_option( 'buddy_desktop_content_width_1' ) != "935" OR get_option( 'buddy_desktop_content_width_2' ) != "670" OR get_option( 'buddy_desktop_single_sidebar_width' ) != "245" OR get_option( 'buddy_desktop_double_sidebar_width' ) != "245" ) {
			$gp_custom_css .= '@media only screen and (min-width: 1083px) {';
				if ( get_option( 'buddy_desktop_page_width' ) != "1200" ) {
					$gp_custom_css .= '.gp-responsive #page-wrapper, .gp-responsive.gp-scrolling.gp-fixed-header #header, .gp-responsive #footer-widgets {width: ' . get_option( 'buddy_desktop_page_width' ) . 'px;}';
				}	
				if ( get_option( 'buddy_desktop_content_width_1' ) != "935" ) {
					$gp_custom_css .= '.gp-responsive #content, .gp-responsive #container, .gp-responsive #left-content-wrapper {width: ' . get_option( 'buddy_desktop_content_width_1' ) . 'px;}';
				}	
				if ( get_option( 'buddy_desktop_content_width_2' ) != "670" ) {
					$gp_custom_css .= '.gp-responsive.sb-both #content, .gp-responsive.sb-both #container {width: ' . get_option( 'buddy_desktop_content_width_2' ) . 'px;}.gp-responsive.sb-both #left-content-wrapper {width: ' . ( get_option( 'buddy_desktop_content_width_2' ) + get_option( 'buddy_desktop_double_sidebar_width' ) + 20 ) . 'px;}';
				}			
				if ( get_option( 'buddy_desktop_single_sidebar_width' ) != "245" ) {
					$gp_custom_css .= '.gp-responsive .sidebar {width: ' . get_option( 'buddy_desktop_single_sidebar_width' ) . 'px;}';
				}	
				if ( get_option( 'buddy_desktop_double_sidebar_width' ) != "245" ) {
					$gp_custom_css .= '.gp-responsive.sb-both .sidebar {width: ' . get_option( 'buddy_desktop_double_sidebar_width' ) . 'px;}';
				}		
			$gp_custom_css .= '}';
		}	

		// Tablet (landscape)
		if ( get_option( 'buddy_tablet_l_page_width' ) != "1000" OR get_option( 'buddy_tablet_l_content_width_1' ) != "775" OR get_option( 'buddy_tablet_l_content_width_2' ) != "550" OR get_option( 'buddy_tablet_l_single_sidebar_width' ) != "205" OR get_option( 'buddy_tablet_l_double_sidebar_width' ) != "205" ) {
			$gp_custom_css .= '@media only screen and (max-width: 1082px) {';
				if ( get_option( 'buddy_tablet_l_page_width' ) != "1000" ) {
					$gp_custom_css .= '.gp-responsive #page-wrapper, .gp-responsive #footer-widgets {width: ' . get_option( 'buddy_tablet_l_page_width' ) . 'px;}';
				}	
				if ( get_option( 'buddy_tablet_l_content_width_1' ) != "775" ) {
					$gp_custom_css .= '.gp-responsive #content, .gp-responsive #container, .gp-responsive #left-content-wrapper {width: ' . get_option( 'buddy_tablet_l_content_width_1' ) . 'px;}';
				}	
				if ( get_option( 'buddy_tablet_l_content_width_2' ) != "550" ) {
					$gp_custom_css .= '.gp-responsive.sb-both #content, .gp-responsive.sb-both #container {width: ' . get_option( 'buddy_tablet_l_content_width_2' ) . 'px;}.gp-responsive.sb-both #left-content-wrapper {width: ' . ( get_option( 'buddy_tablet_l_content_width_2' ) + get_option( 'buddy_tablet_l_double_sidebar_width' ) + 20 ) . 'px;}';
				}			
				if ( get_option( 'buddy_tablet_l_single_sidebar_width' ) != "205" ) {
					$gp_custom_css .= '.gp-responsive .sidebar {width: ' . get_option( 'buddy_tablet_l_single_sidebar_width' ) . 'px;}';
				}	
				if ( get_option( 'buddy_tablet_l_double_sidebar_width' ) != "205" ) {
					$gp_custom_css .= '.gp-responsive.sb-both .sidebar {width: ' . get_option( 'buddy_tablet_l_double_sidebar_width' ) . 'px;}';
				}		
			$gp_custom_css .= '}';
		}		

		if ( get_option( 'buddy_custom_css' ) ) {
			$gp_custom_css .= get_option( 'buddy_custom_css' );
		}
		
		wp_add_inline_style( 'ghostpool-style', $gp_custom_css );

		if ( ( is_single() OR is_page() ) && get_post_meta( get_the_ID(), '_' . 'buddy_custom_stylesheet', true ) ) {
			wp_enqueue_style( 'ghostool-custom-page-style', get_template_directory_uri() . '/' . get_post_meta( get_the_ID(), '_' . 'buddy_custom_stylesheet', true ) );
		}
		
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/lib/scripts/modernizr.js', false, '', true );
				
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' );
		}

		if ( get_option( 'buddy_back_to_top' ) != 'gp-no-back-to-top' ) {
			wp_enqueue_script( 'jquery-totop', get_template_directory_uri() . '/lib/scripts/jquery.ui.totop.min.js', array( 'jquery' ), '', true );
		}
			
		if ( get_option( 'buddy_lightbox' ) != 'gp-lightbox-disabled' ) {							
			wp_enqueue_script( 'prettyphoto', get_template_directory_uri() . '/lib/scripts/prettyPhoto/js/jquery.prettyPhoto.js', array( 'jquery' ), '', true );
		}
		
		wp_enqueue_script( 'touchswipe', get_template_directory_uri() . '/lib/scripts/jquery.touchSwipe.min.js', array( 'jquery' ), '', true );
																					
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/lib/scripts/jquery.flexslider-min.js', array( 'jquery' ), '', true );

		wp_register_script( 'ghostpool-accordion-init', get_template_directory_uri() . '/lib/scripts/jquery.accordion.init.js', array( 'jquery-ui-accordion' ), '', true );

		wp_register_script( 'ghostpool-tabs-init', get_template_directory_uri() . '/lib/scripts/jquery.tabs.init.js', array( 'jquery-ui-tabs' ), '', true );

		wp_register_script( 'ghostpool-toggle-init', get_template_directory_uri() . '/lib/scripts/jquery.toggle.init.js', array( 'jquery' ), '', true );

		wp_enqueue_script( 'ghostpool-custom', get_template_directory_uri() . '/lib/scripts/custom.js', array( 'jquery' ), '', true );

		if ( is_ssl() ) {
			$url = esc_url( 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		} else { 
			$url = esc_url( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		}
		
		wp_localize_script( 'ghostpool-custom', 'ghostpool_script', array( 
			'url' 			  => $url,
			'loginRedirect'   => apply_filters( 'ghostpool_redirect_filter', esc_url( home_url( '/' ) ) ),
			'emptySearchText' => esc_html__( 'Please enter something in the search box!', 'buddy' ),
			'lightbox' => get_option( 'gp_lightbox' ),
		 ) );
		 			
	}
}
add_action( 'wp_enqueue_scripts', 'ghostpool_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 */	
if ( ! function_exists( 'ghostpool_body_classes' ) ) {
	function ghostpool_body_classes( $gp_classes ) {
		global $gp_settings;
		$gp_classes[] = 'gp-theme';
		$gp_classes[] = $gp_settings['layout'];
		$gp_classes[] = get_option( 'buddy_fixed_header' );
		$gp_classes[] = get_option( 'buddy_back_to_top' );
		$gp_classes[] = get_option( 'buddy_lightbox' );
		$gp_classes[] = get_option( 'buddy_profile_button' );
		if ( $gp_settings['title'] == 'Show' ) {
			$gp_classes[] = 'gp-has-title';
		} else {
			$gp_classes[] = 'gp-no-title';		
		}
		if ( get_option( 'buddy_responsive' ) == '0' ) {
			$gp_classes[] = 'gp-responsive';
		}	
		if ( get_option( 'buddy_retina' ) == '0' ) {
			$gp_classes[] = 'gp-retina';
		}
		return $gp_classes;
	}
}
add_filter( 'body_class', 'ghostpool_body_classes' );

/**
 * Content added to header
 *
 */	
if ( ! function_exists( 'ghostpool_wp_header' ) ) {

	function ghostpool_wp_header() {

		// Title fallback for versions earlier than WordPress 4.1
		if ( ! function_exists( '_wp_render_title_tag' ) && ! function_exists( 'ghostpool_render_title' ) ) {
			function ghostpool_render_title() { ?>
				<title><?php wp_title( '|', true, 'right' ); ?></title>
			<?php }
		}

		// Page settings
		ghostpool_page_settings();
		 
		// Add custom JavaScript code 
		if ( $js_code = get_option( 'buddy_scripts' ) ) {
			if ( strpos( $js_code, '<script ' ) !== false ) { 
				echo stripslashes( $js_code ); 
			} else {
				$js_code = str_replace( array( '<script>', '</script>' ), '', $js_code );
				echo '<script>' . stripslashes( $js_code ) . '</script>';
			}    
		}
				
	}
	
}

add_action( 'wp_head', 'ghostpool_wp_header' );

/**
 * Navigation user meta
 *
 */	
if ( ! function_exists( 'ghostpool_nav_user_meta' ) ) {
	function ghostpool_nav_user_meta( $user_id = NULL ) {

		// These are the metakeys we will need to update
		$meta_key['properties'] = 'managenav-menuscolumnshidden';

		// So this can be used without hooking into user_register
		if ( ! $user_id ) {
			$user_id = get_current_user_id(); 
		}
		
		// Set the default properties if it has not been set yet
		if ( ! get_user_meta( $user_id, $meta_key['properties'], true ) ) {
			$meta_value = array( 'link-target', 'xfn', 'description' );
			update_user_meta( $user_id, $meta_key['properties'], $meta_value );
		}
	
	}	
}
add_action( 'admin_init', 'ghostpool_nav_user_meta' );

/**
 * Insert schema meta data
 *
 */
if ( ! function_exists( 'ghostpool_meta_data' ) ) {
	function ghostpool_meta_data( $gp_post_id ) {
	
		global $gp_settings, $post;

		// Meta data
		return '<meta itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" content="' . esc_url( get_permalink( $gp_post_id ) ) . '">
		<meta itemprop="headline" content="' . esc_attr( get_the_title( $gp_post_id ) ) . '">			
		<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<meta itemprop="url" content="' . esc_url( wp_get_attachment_url( get_post_thumbnail_id( $gp_post_id ) ) ) . '">
			<meta itemprop="width" content="' .  absint( $gp_settings['image_width'] ) . '">	
			<meta itemprop="height" content="' . absint( $gp_settings['image_height'] ) . '">		
		</div>
		<meta itemprop="author" content="' . get_the_author_meta( 'display_name', $post->post_author ) . '">			
		<meta itemprop="datePublished" content="' . get_the_time( get_option( 'date_format' ) ) . '">
		<meta itemprop="dateModified" content="' . get_the_modified_date( get_option( 'date_format' ) ) . '">
		<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
			<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
				<meta itemprop="url" content="' . esc_url( get_option( 'buddy_logo' ) ? get_option( 'buddy_logo' ) :  get_template_directory_uri() . '/lib/images/logo.png' ) . '">
				<meta itemprop="width" content="' . absint( get_option( 'buddy_logo_width' ) ? get_option( 'buddy_logo_width' ) :  108 ) . '">
				<meta itemprop="height" content="' . absint( get_option( 'buddy_logo_height' ) ? get_option( 'buddy_logo_height' ) :  25 ) . '">
			</div>
			<meta itemprop="name" content="' . get_bloginfo( 'name' ) . '">
		</div>';

	}
}

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 */
 
// Custom Content Widget
require_once( get_template_directory() . '/lib/widgets/custom-content.php' );

// Login/register form widget
require_once( get_template_directory() . '/lib/widgets/login-form.php' );

// Statistics Widget
require_once( get_template_directory() . '/lib/widgets/statistics.php' );

if ( ! function_exists( 'ghostpool_widgets_init' ) ) {
	function ghostpool_widgets_init() {
 
		register_sidebar( array( 
			'name' => esc_html__( 'Standard Right Sidebar', 'buddy' ),
			'id'=> 'gp-default-right',
			'description' 	=> esc_html__( 'Displayed on posts, pages and post categories.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title'	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		 ) );
		
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Standard Left Sidebar', 'buddy' ),
			'id'			=> 'gp-default-left',
			'description' 	=> esc_html__( 'Displayed on posts, pages and post categories.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title'	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>',
		 ) );
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 1', 'buddy' ),
			'id' 			=> 'gp-footer-1',
			'description'   => esc_html__( 'Displayed as the first column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		 ) );        

		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 2', 'buddy' ), 
			'id' 			=> 'gp-footer-2',
			'description'   => esc_html__( 'Displayed as the second column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		 ) );   
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 3', 'buddy' ),
			'id' 			=> 'gp-footer-3',
			'description'   => esc_html__( 'Displayed as the third column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title'	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>' ) );   
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 4', 'buddy' ),
			'id' 			=> 'gp-footer-4',
			'description'   => esc_html__( 'Displayed as the fourth column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'  	=> '</h3>'
		 ) );   
	
		register_sidebar( array( 
			'name' 			=> esc_html__( 'Footer 5', 'buddy' ),
			'id' 			=> 'gp-footer-5',
			'description'   => esc_html__( 'Displayed as the fifth column in the footer.', 'buddy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>'
		 ) );   

	}
}
add_action( 'widgets_init', 'ghostpool_widgets_init' );

/**
 * Change excerpt character length
 *
 */
if ( ! function_exists( 'ghostpool_excerpt_length' ) ) {
	function ghostpool_excerpt_length() {
		if ( function_exists( 'buddyboss_global_search_init' ) && is_search() ) {
			return 50;
		} else {
			return 10000;
		}
	}
}
add_filter( 'excerpt_length', 'ghostpool_excerpt_length' );

/**
 * Custom excerpt format
 *
 */	
if ( ! function_exists( 'ghostpool_excerpt' ) ) {
	function ghostpool_excerpt( $gp_length ) {
		$gp_more_text = '...';	
		$gp_excerpt = get_the_excerpt();					
		$gp_excerpt = strip_tags( $gp_excerpt );
		if ( function_exists( 'mb_strlen' ) && function_exists( 'mb_substr' ) ) { 
			if ( mb_strlen( $gp_excerpt ) > $gp_length ) {
				$gp_excerpt = mb_substr( $gp_excerpt, 0, $gp_length ) . $gp_more_text;
			}
		} else {
			if ( strlen( $gp_excerpt ) > $gp_length ) {
				$gp_excerpt = substr( $gp_excerpt, 0, $gp_length ) . $gp_more_text;
			}	
		}
		return $gp_excerpt;
	}
}

/**
 * Change password protect text
 *
 */	
if ( ! function_exists( 'ghostpool_password_form' ) ) {
	function ghostpool_password_form() {
		global $post;
		$gp_label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
		$gp_o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
		<p>' . esc_html__( 'To view this protected post, enter the password below:', 'buddy' ) . '</p>
		<label for="' . $gp_label . '"><input name="post_password" id="' . $gp_label . '" type="password" size="20" maxlength="20" /></label> <input type="submit" class="pwsubmit" name="Submit" value="' .  esc_attr__( 'Submit', 'buddy' ) . '" />
		</form>
		';
		return $gp_o;
	}
}
add_filter( 'the_password_form', 'ghostpool_password_form' );

/**
 * Title length
 *
 */	
if ( ! function_exists( 'ghostpool_title_limit' ) ) {
	function ghostpool_title_limit( $gp_count ) {
		$gp_title = the_title_attribute( 'echo=0' );
		if ( function_exists( 'mb_strlen' ) && function_exists( 'mb_substr' ) ) { 
			if ( mb_strlen( $gp_title ) > $gp_count ) {
				$gp_title = mb_substr( $gp_title, 0, $gp_count ) . '...';
			}
		} else {
			if ( strlen( $gp_title ) > $gp_count ) {
				$gp_title = substr( $gp_title, 0, $gp_count ) . '...';
			}	
		}
		return $gp_title;
	}
}

/**
 * Pagination
 *
 */
if ( ! function_exists( 'ghostpool_pagination' ) ) {
	function ghostpool_pagination( $gp_query ) {
		$gp_big = 999999999;
		if ( get_query_var( 'paged' ) ) {
			$gp_paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$gp_paged = get_query_var( 'page' );
		} else {
			$gp_paged = 1;
		}
		if ( $gp_query >  1 ) {
			return '<div class="gp-pagination gp-pagination-numbers gp-standard-pagination">' . paginate_links( array( 
				'base'      => str_replace( $gp_big, '%#%', esc_url( get_pagenum_link( $gp_big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, $gp_paged ),
				'total'     => $gp_query,
				'type'      => 'list',
				'prev_text' => '',
				'next_text' => '',
			 ) ) . '</div>';
		}
	}
}

/**
 * Remove hentry tag from post loop
 *
 */
if ( ! function_exists( 'ghostpool_remove_hentry' ) ) {
	function ghostpool_remove_hentry( $gp_classes ) {
		$gp_classes = array_diff( $gp_classes, array( 'hentry' ) );
		return $gp_classes;
	}
}
add_filter( 'post_class', 'ghostpool_remove_hentry' );

/**
 * Shortcode Empty Paragraph Fix 
 *
 */
if ( ! function_exists( 'ghostpool_shortcode_empty_paragraph_fix' ) ) {
	function ghostpool_shortcode_empty_paragraph_fix( $content ) {   
		$array = array ( 
			'<p>[' => '[', 
			']</p>' => ']',
			']<br />' => ']'
		 );
		$content = strtr( $content, $array );
		return $content;
	}
}
add_filter( 'the_content', 'ghostpool_shortcode_empty_paragraph_fix' );

/**
 * Change Insert Into Post Text 
 *
 */
if ( is_admin() && $pagenow == 'themes.php' ) {
	if ( ! function_exists( 'ghostpool_change_image_button' ) ) {
		add_filter( 'gettext', 'ghostpool_change_image_button', 10, 3 );
		function ghostpool_change_image_button( $gp_translation, $gp_text, $gp_domain ) {
			if ( 'default' == $gp_domain && 'Insert into post' == $gp_text ) {
				remove_filter( 'gettext', 'ghostpool_change_image_button' );
				return esc_html__( 'Use Image', 'buddy' );
			}
			return $gp_translation;
		}
	}
}

/**
 * Tab Title Fix For WordPress 4.0.1+
 *
 */
if ( ! function_exists( 'ghostpool_shortcode_parse_atts' ) ) {
	function ghostpool_shortcode_parse_atts( $gp_text ) {
		$gp_text = str_replace( array( '&#8221;', '&#8243;', '&#8217;', '&#8242;' ), array( '"', '"', '\'', '\'' ), $gp_text );
		return shortcode_parse_atts( $gp_text ) ;
	}
}

/**
 * Add lightbox class to image links
 *
 */
if ( ! function_exists( 'ghostpool_lightbox_image_link' ) ) {
	function ghostpool_lightbox_image_link( $content ) {
		global $post;
		if ( get_option( 'buddy_lightbox' ) != 'gp-lightbox-disabled' ) {
			if ( get_option( 'buddy_lightbox' ) == 'gp-lightbox-group' ) {
				$group = '[image-' . ( empty( $post->ID ) ? rand() : $post->ID ) . ']';
			} else {
				$group = '';
			}
			$pattern = "/<a(.*?)href=('|\")(.*?).(jpg|jpeg|png|gif|bmp|ico)('|\")(.*?)>/i";
			preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER );
			foreach ( $matches as $val ) {
				$pattern = '<a' . $val[1] . 'href=' . $val[2] . $val[3] . '.' . $val[4] . $val[5] . $val[6] . '>';
				$replacement = '<a' . $val[1] . 'href=' . $val[2] . $val[3] . '.' . $val[4] . $val[5] . ' data-rel="prettyPhoto' . $group . '"' . $val[6] . '><span class="lightbox-hover"></span>';
				$content = str_replace( $pattern, $replacement, $content );			
			}
			return $content;
		} else {
			return $content;
		}
	}	
}
add_filter( 'the_content', 'ghostpool_lightbox_image_link' );	
add_filter( 'wp_get_attachment_link', 'ghostpool_lightbox_image_link' );
add_filter( 'bbp_get_reply_content', 'ghostpool_lightbox_image_link' );

/**
 * Remove default WooCommerce content wrappers
 *
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Opening WooCommerce content wrappers 
 *
 */
if ( ! function_exists( 'ghostpool_wc_page_wrapper_start' ) ) {
    function ghostpool_wc_page_wrapper_start() {
        
        echo '<div id="content">
        	<div class="padder">';
    
    }
}
add_action( 'woocommerce_before_main_content', 'ghostpool_wc_page_wrapper_start', 10 );

/**
 * Closing WooCommerce content wrappers 
 *
 */
if ( ! function_exists( 'ghostpool_wc_page_wrapper_end' ) ) {
    function ghostpool_wc_page_wrapper_end() {  
       
       echo '</div>
        	</div>';
        	
    }
}
add_action( 'woocommerce_after_main_content', 'ghostpool_wc_page_wrapper_end', 10 );

/**
 * TGM Plugin Activation class
 *
 */
if ( version_compare( phpversion(), '5.2.4', '>=' ) ) {
	require_once( get_template_directory() . '/lib/inc/class-tgm-plugin-activation.php' );
}

if ( ! function_exists( 'ghostpool_register_required_plugins' ) ) {

	function ghostpool_register_required_plugins() {

		$gp_plugins = array( 

			array( 
				'name' => esc_html__( 'Buddy Plugin', 'buddy' ),
				'slug' => 'buddy-plugin',
				'version' => '2.1.8',
				'source' => get_template_directory() . '/lib/plugins/buddy-plugin.zip',
				'required' => false,
				'force_activation' => false,
				'force_deactivation' => false,
			 ),

			array( 
				'name' => esc_html__( 'BuddyPress', 'buddy' ),
				'slug' => 'buddypress',
				'required' 	=> false,
			 ),

			array( 
				'name' => esc_html__( 'bbPress', 'buddy' ),
				'slug' => 'bbpress',
				'required' 	=> false,
			 ),
		
			array( 
				'name'      => esc_html__( 'Contact Form 7', 'buddy' ),
				'slug'      => 'contact-form-7',
				'required' 	=> false,
			 ),

			array(
				'name'      		=> esc_html__( 'Envato Market', 'buddy' ),
				'slug'      		=> 'envato-market',
				'source'			=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required' 			=> false,
			),
												
		 );

		$gp_config = array( 
			'id'           => 'buddy',            // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		 );
 
		tgmpa( $gp_plugins, $gp_config );

	}
	
}

add_action( 'tgmpa_register', 'ghostpool_register_required_plugins' );

?>