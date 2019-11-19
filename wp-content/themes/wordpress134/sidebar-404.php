<div class="right">
	<div class="right-ad">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-8525281413070560";
/* 300 x 250 happyet.org */
google_ad_slot = "4308667935";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	</div>
	<div class="tagclouds box">
		<h4><strong>标签凌乱</strong></h4>
		<ul>
		<?php $tags_list = get_tags('orderby=count&number=30&order=DESC');
		if ($tags_list) { 
			foreach($tags_list as $tag) {
				echo '<a class="wbtn" href="' . get_tag_link($tag) . '" title="' . $tag->name . '(' . $tag->count . ')">' . $tag->name . '<strong>' . $tag->count . '</strong></a>';
			}
		} ?>
		</ul>
	</div>
	<div id="slidebox">
		<div class="academy box">
			<h4><strong>随机阅读</strong></h4>
			<ul>
				<?php $randposts = get_posts('numberposts=6&orderby=rand'); 
				foreach($randposts as $post) {
						setup_postdata($post);
						$title = get_the_title();
						if (strlen($title) == 0) { $title = get_the_time('Y年m月d日') . '无标题文章'; }
						echo '<li><a href="' . get_permalink() . '" rel="bookmark">';
						post_thumbnail(125, 80);
						echo $title . '</a></li>';
						
					}
					$post = $randposts[0];
					wp_reset_postdata();
				?>
			</ul>
		</div>
		<!--div class="advertisment box">
			<ul>
				<li><a href="/" target="_blank"><img src="http://static.xiaomi.cn/xiaomicms/uploadfile/2013/0816/20130816031943491.jpg" width="260"> 小米爆米花苏州站专题回顾 </a></li>
				<li><a href="/" target="_blank"><img src="http://static.xiaomi.cn/xiaomicms/uploadfile/2013/0730/20130730024315724.jpg" width="260"> 小米盒子精彩玩法汇总 </a></li>
			</ul>	
		</div>
		<div class="recommend box">
			<h4><strong>精品推荐</strong></h4>
			<ul>
				<li><a href="/" target="_blank"><img height="185" src="http://static.xiaomi.cn/xiaomicms/uploadfile/2013/0815/20130815035643899.jpg" width="260"> <strong>小米手机水下摄影</strong> </a></li>
			</ul>
		</div-->
	</div>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?><?php endif; ?>
</div>