<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php if (is_single() || is_page() || is_home() || is_category() ) : ?>
	<meta name="robots" content="index,follow" /><?php else : ?>
	<meta name="robots" content="noindex,follow" /><?php endif; ?>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<?php mytheme_keywords(); ?>
	<?php mytheme_description(); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="header">
	<?php get_template_part( 'files/header-top' ); ?>
	<div class="headerInner">
		<div class="logo" id="logo">
			<a href="<?php echo get_option('home'); ?>/">
				<span class="blogName"><?php bloginfo('name'); ?></span>
				<span class="blogDesc"><?php bloginfo('description'); ?></span>
			</a>
		</div>
		<div class="signInFrame">
			<?php get_template_part( 'files/loginout' ); ?>
		</div>
		<ul class="nav" id="nav">
			<?php wp_nav_menu( array(
				'theme_location' => 'blog-menu',
				'container' => '',
				'fallback_cb' => 'link_to_menu_editor',
				'items_wrap' => '%3$s'
				));
			?>
			<div class="search fold" id="indexSearch">
				<form role="search" method="get" id="searchform" action="<?php home_url( '/' ); ?>"><input type="text" value="" name="s" id="s" placeholder="请输入搜索内容" /><input type="submit" id="searchsubmit" value="Search" /></form>
			</div>
			<?php get_template_part( 'files/menu-right' ); ?>
		</ul>
	</div>
</div>
<div class="main">
	<div class="banner box"></div>
	<?php  if(!is_home()){ ?><div class="crumbs"><?php echo wp_breadcrumb(); ?></div><?php } ?>
	<div class="content clearfix">