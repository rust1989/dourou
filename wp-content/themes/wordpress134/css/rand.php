<div id="related">
	<ul>
		<?php $post_num = 5; $exclude_id = $post->ID;$posttags = get_the_tags(); $i = 0;if ( $posttags ) { $tags = ''; foreach ( $posttags as $tag ) $tags .= $tag->name . ',';$args = array('post_status' => 'publish','tag_slug__in' => explode(',', $tags), 'post__not_in' => explode(',', $exclude_id), 'caller_get_posts' => 1, 'orderby' => 'comment_date', 'posts_per_page' => $post_num);query_posts($args); while( have_posts() ) { the_post(); ?><li class="media"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><div class="seealso-image"><?php if( has_post_thumbnail() ){the_post_thumbnail('new_thumb199');}elseif(get_post_meta($post->ID, 'pre_image', true )){$image = get_post_meta($post->ID, 'pre_image', true);echo '<img src="'. $image.'" alt="'.get_the_title().'">';}else{ echo '<img src="'.catch_that_image().'" alt="'.get_the_title().'">';} ?></div></a><h4 class="related"><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h4>
		<?php $exclude_id .= ',' . $post->ID; $i ++;} wp_reset_query();}if ( $i < $post_num ) { $cats = ''; foreach ( get_the_category() as $cat ) $cats .= $cat->cat_ID . ',';$args = array('category__in' => explode(',', $cats), 'post__not_in' => explode(',', $exclude_id),'caller_get_posts' => 1,'orderby' => 'comment_date','posts_per_page' => $post_num - $i);query_posts($args);while( have_posts() ) { the_post(); ?><li class="media"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><div class="seealso-image"><?php if( has_post_thumbnail() ){the_post_thumbnail('new_thumb199');}elseif(get_post_meta($post->ID, 'pre_image', true )){$image = get_post_meta($post->ID, 'pre_image', true);echo '<img src="'. $image.'" alt="'.get_the_title().'">';}else{ echo '<img src="'.catch_that_image().'" alt="'.get_the_title().'">';} ?></div></a><h4 class="related"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title_attribute(); ?></a></h4>
		<?php $i ++;} wp_reset_query();}if ( $i  == 0 )  echo '<li>还没有相关文章</li>';?>
	</ul>
</div>