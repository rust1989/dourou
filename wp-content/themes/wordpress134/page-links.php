<?php get_header(); ?>
<div class="left box">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('single clearfix'); ?>>
			<h2 class="title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf('Permanent Link to %s', the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
			</h2>
			<span class="meta">
				<?php if(function_exists('the_views')) { echo '<em class="views">' . the_views(false) .'</em>'; } ?>
				<?php comments_popup_link('0','1','%', 'replies', '评论关闭' ); ?>
			</span>
			<?php time_diff( $time_type='post' ); ?> <?php edit_post_link( 'Edit', '', '' ); ?>
			<?php if ( has_post_thumbnail() ) {  the_post_thumbnail();  } ?>
			<div class="entry clearfix">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<p class="page_navi"><strong>' . __('日志分页:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<ul><?php wp_list_bookmarks(); ?></ul>
			</div>
		</div>
		<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>