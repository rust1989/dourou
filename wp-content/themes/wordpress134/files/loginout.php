<div class="signInOuter">
	<?php global $user_ID, $user_login, $user_identity, $user_email;
	get_currentuserinfo(); if (!$user_ID) { ?>
		<div class="signIn">
			<a id="headLogin" title="点击登录">登录</a>
			<form id="loginform" action="<?php echo get_settings('siteurl'); ?>/wp-login.php" method="post">
				<input type="text" name="log" tabindex="1" id="log" value="" placeholder="用户名" />
				<input type="password" name="pwd" tabindex="2" id="pwd" value="" placeholder="密码" />
				<input class="btn submit" value="Login" name="submit" type="submit">
				<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
			</form>
			<a id="menubar-register" href="/wp-login.php?action=register" rel="nofollow">注册</a>
		</div>
	<?php } else { ?>
		<div class="signOut">
			<?php if( current_user_can('level_10') ) : ?>
				<div class="adminInfor">
					<span class="welcome"><a href="<?php bloginfo('url') ?>/wp-admin/profile.php" rel="author" title="编辑个人信息"><?php echo get_avatar($user_email, 32); ?> <?php echo $user_login; ?> <i></i></a></span>
					<a class="adminComments" href="<?php bloginfo('url') ?>/wp-admin/edit-comments.php" rel="nofollow"><?php $comments_count = wp_count_comments(); if(($comments_count)!==0){ echo $comments_count->moderated; } ?></a>
					<ul class="action">
						<li><a class="btn btn-social" href="<?php bloginfo('url') ?>/wp-admin/" rel="nofollow">管理</a></li>
						<li><a class="btn btn-social" href="<?php bloginfo('url') ?>/wp-adminedit-tags.php?taxonomy=category" rel="nofollow">分类</a></li>
						<li><a class="btn btn-social" href="<?php bloginfo('url') ?>/wp-admin/post-new.php" rel="nofollow">发表</a></li>
						<li><a class="btn btn-social" href="<?php bloginfo('url') ?>/wp-admin/nav-menus.php" rel="nofollow">菜单</a></li>
						<li><a class="btn btn-social" href="<?php bloginfo('url') ?>/wp-admin/widgets.php" rel="nofollow">工具</a></li>
						<li><a id="logout_link" href="<?php bloginfo('url') ?>/wp-login.php?action=logout&amp;redirect_to=<?php echo urlencode(home_url()) ?>">退出</a></li>
					</ul>
				</div>
			<?php else: ?>
				<span class="welcome"><?php echo get_avatar($user_email, 32); ?> 你好，<?php echo $user_login; ?>！</span>
			<?php endif; ?>
		</div>
	<?php } ?>	
</div>