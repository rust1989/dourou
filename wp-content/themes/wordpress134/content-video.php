<div id="post-<?php the_ID(); ?>" class="post hentry format-video">
	<h2 class="title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf('Permanent Link to %s', the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
	</h2>
	<?php miui_entry_meta(); ?>
	<div class="entry clearfix">
		<?php if ( is_single() ) {
			the_content(); 
			wp_link_pages( array( 'before' => '<div class="page-links">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); 
		}else{ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php post_thumbnail(605, 220);?>
			</a>
			<?php if (has_excerpt()){the_excerpt();}else{the_content();}
		} ?>
	</div>
	<?php if(is_single()){
		the_tags( '<div class="tags">', ', ', '</div>');
		get_template_part( 'files/copyright' );
		get_template_part( 'files/author-bio' );
		get_template_part( 'files/bdshare' );
		get_template_part( 'files/relate' );
	} ?>
</div>