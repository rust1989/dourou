<?php
remove_action( 'wp_head', 'wp_generator');
//菜单增加首页
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );
//退出后回首页 
function mk_logout_redirect_home($logouturl, $redir){
    $redir = home_url();
    return $logouturl . '&redirect_to=' . urlencode($redir);
}
add_filter('logout_url', 'mk_logout_redirect_home', 10, 2);
//纯英文评论拒绝
function scp_comment_post( $incoming_comment ) {
	$pattern = '/[一-龥]/u';
	if(!preg_match($pattern, $incoming_comment['comment_content'])) {
		err( "为防止垃圾评论，您的评论中必须包含汉字!" );
	}
	return( $incoming_comment );
}
add_filter('preprocess_comment', 'scp_comment_post');
//用户名邮箱检测
function CheckEmailAndName(){
	global $wpdb;
	$comment_author = ( isset($_POST['author']) ) ? trim(strip_tags($_POST['author'])) : null;
	$comment_author_email = ( isset($_POST['email']) ) ? trim($_POST['email']) : null;
	if(!$comment_author || !$comment_author_email){
		return;
	}
	$result_set = $wpdb->get_results("SELECT display_name, user_email FROM $wpdb->users WHERE display_name = '" . $comment_author . "' OR user_email = '" . $comment_author_email . "'");
	if ($result_set) {
		if ($result_set[0]->display_name == $comment_author){
			err(__('用户名已被注册，注册用户请 <a href="/wp-login.php" style="color:#ff6f3d">登录</a> 后评论！<a href="/wp-login.php?action=lostpassword">忘记密码？</a>'));
		}else{
			err(__('邮箱已被注册，注册用户请 <a href="/wp-login.php" style="color:#ff6f3d">登录</a> 后评论！<a href="/wp-login.php?action=lostpassword">忘记密码？</a>'));
		}
		fail($errorMessage);
	}
}
add_action('pre_comment_on_post', 'CheckEmailAndName');
// 检测黑名单用户
function BYMT_fuckspam($comment) {
	if(  is_user_logged_in()){ return $comment;} //登录用户无压力...
	if( wp_blacklist_check($comment['comment_author'],$comment['comment_author_email'],$comment['comment_author_url'], $comment['comment_content'], $comment['comment_author_IP'], $comment['comment_agent'] )){
		$notify_txt= dopt('black_notify');
		header("Content-type: text/html; charset=utf-8");
		 err($notify_txt);
	}  else  {
		return $comment; 
	}
} 
add_filter('preprocess_comment', 'BYMT_fuckspam');
//评论链接新窗口打开
function hu_popuplinks($text) {
	$text = preg_replace('/<a (.+?)>/i', "<a $1 target='_blank'>", $text);
	return $text;
}
add_filter('get_comment_author_link', 'hu_popuplinks', 6);
//头像中转多说 解决被墙问题
function mytheme_get_avatar($avatar) {
	$avatar = str_replace(array("www.gravatar.com","0.gravatar.com","1.gravatar.com","2.gravatar.com"),"gravatar.duoshuo.com",$avatar);
	return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar', 10, 3 );
//自定义表情路径
function custom_smilies_src ($img_src, $img, $siteurl){
	return get_template_directory_uri() .'/images/smilies/'.$img;
};
add_filter('smilies_src','custom_smilies_src',1,10);
//移除wordpress登陆漏洞
add_filter('login_errors',create_function('$a', "return null;"));
// 只搜索文章，排除页面
add_filter('pre_get_posts','search_filter');
function search_filter($query) {
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}
	return $query;
}
//设置个人资料相关选项
function my_profile( $contactmethods ) {
	$contactmethods['QQ'] = 'QQ';   //增加
	$contactmethods['douban'] = '豆瓣';
	$contactmethods['renren'] = '人人';
	$contactmethods['qweibo'] = '腾讯微博';
	$contactmethods['weibo'] = '新浪微博';
	$contactmethods['twitter'] = 'twitter';
	$contactmethods['facebook'] = 'facebook';
	$contactmethods['gplus'] = 'google+';
	$contactmethods['donate'] = '捐助链接';
	unset($contactmethods['aim']);   //删除
	unset($contactmethods['yim']);
	unset($contactmethods['jabber']);
	return $contactmethods;
}
add_filter('user_contactmethods','my_profile');
//Feed中添加版权信息
add_filter('the_content', 'BYMT_feed_copyright');
function BYMT_feed_copyright($content) {    
	if(is_feed()) {                    
		$content.= '<div>声明: 本文采用 <a rel="external" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.zh" title="署名-非商业性使用-相同方式共享 3.0 Unported">CC BY-NC-SA 3.0</a> 协议进行授权</div>';
		$content.= '<div>转载请注明来源：<a rel="external" title="'.get_bloginfo('name').'" href="'.get_permalink().'">'.get_bloginfo('name').'</a></div>';    
		$content.= '<div>本文链接地址：<a rel="external" title="'.get_the_title().'" href="'.get_permalink().'">'.get_permalink().'</a></div>';                    
	}
	return $content;    
}
//body手机class
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE){
	   $classes[] = 'ie';
	   //if the browser is IE6
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6') !== false){
			$classes[] = 'ie6'; //add 'ie6' class to the body class array
		}
	}
	else $classes[] = 'unknown';
	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
add_filter('body_class','browser_body_class');
?>