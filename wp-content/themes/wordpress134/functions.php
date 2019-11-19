<?php
$theme_name = 'MIUI-无节操版';
function dopt($e){
    return stripslashes(get_option($e));
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<div class="widget %2$s box">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
}
function minu_setup() {
	load_theme_textdomain( 'simple_write', get_template_directory() . '/languages' );
	add_editor_style();
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote' ) );
	register_nav_menus(array('top-menu' => __('顶部菜单'),'blog-menu' => __('导航菜单'),'side-menu'=> __('侧边菜单'),'footer-menu' => __('页角菜单')));
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'minu_setup' );
function minu_scripts_styles() {
	global $wp_styles;
	$jqueryurl = get_template_directory_uri() . '/js/jquery.min.js';
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', $jqueryurl ,array(), '', true );
	wp_deregister_script( 'comment-reply' );
	if ( is_singular() ) wp_enqueue_script( 'comment-reply', get_bloginfo('template_directory').'/js/comments-ajax.js', array(), '', true );
	wp_enqueue_script('theme-js',get_bloginfo('template_directory').'/js/main.js', array(), '', true );
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'ie-css', get_template_directory_uri() . '/css/ie7.css', array( 'minu_style' ), '20121010' );
	$wp_styles->add_data( 'ie-css', 'conditional', 'lt IE 9' );
}    
add_action('wp_enqueue_scripts', 'minu_scripts_styles'); 

if (is_admin()) require get_template_directory() . '/inc/option/theme-options.php';
require get_template_directory() . '/inc/wp-fixed.php';
require get_template_directory() . '/inc/addon-functions.php';
require get_template_directory() . '/inc/my-pagenav.php';
require get_template_directory() . '/inc/auto-code.php';
require get_template_directory() . '/inc/my-excerpt.php';
require get_template_directory() . '/inc/my-comments.php';
require get_template_directory() . '/inc/auto-tagslink.php';
require get_template_directory() . '/inc/antispam-mail.php';
require get_template_directory() . '/inc/recentviews.php';
require get_template_directory() . '/inc/zww-achevies.php';
?>
