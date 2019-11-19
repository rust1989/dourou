<div class="right">
	<?php if(dopt('sidead')){echo '<div class="right-ad">' . dopt('sidead') . '</div>';} ?>
	<div class="editorChoice box">
		<?php
			if (is_singular()) {
				$boxtitle = '最新文章';
			} else {
				$boxtitle = '热评文章';
			}
		?>
		<h4><strong><?php echo $boxtitle; ?></strong></h4>
		<ul>
			<?php
				if (is_singular()) {
					$myposts = get_posts('numberposts=10&orderby=post_date');
				} else {
					$myposts = get_posts('numberposts=10&orderby=comment_count');
				}
				foreach($myposts as $post) {
					setup_postdata($post);
					$i==1;$i++;
					$title = get_the_title();
					if (strlen($title) == 0) { $title = get_the_time('Y年m月d日') . '无标题文章'; }
					if($i < 4){ $class = '<li class="topRank">';}else{ $class="<li>"; }
					echo $class . '<em>' . $i . '</em><a href="' . get_permalink() . '">' . $title . '</a></li>';
				}
				$post = $myposts[0];
				wp_reset_postdata();
			?>
		</ul>
	</div>
	<div class="recentComments box">
		<h4><strong class="tab SwapTab"><span class="fb">最新评论</span><span>灌水明星</span></strong></h4>
		<div class="tab-content">
			<ul style="display:block"><?php Happyet_news_comments(); ?></ul>
			<ul style="display:none" class="star"><?php comments_star(); ?></ul>
		</div>
	</div>
	<div class="recentView box">
		<h4><strong class="tab SwapTab"><span class="fb">近期批阅</span><span>最近更新</span></strong></h4>
		<div class="tab-content">
			<ul style="display:block"><?php zg_recently_viewed(); ?></ul>
			<ul style="display:none">
				<?php $args = array(
					'orderby' => 'modified',
					'showposts' => 7,
					'ignore_sticky_posts' => 1
					);
					$posts = query_posts($args);
					while(have_posts()) : the_post(); ?>
						<li><span class="r"><?php the_modified_date('m-j'); ?></span><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
					<?php endwhile;wp_reset_query();
				?>
			</ul>
		</div>
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
	</div>
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?><?php endif; ?>
</div>