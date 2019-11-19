<?php
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	global $commentcount, $comment_depth, $page, $wpdb;
	$lms_depth = $comment_depth-1;
	if ( (int) get_option('page_comments') === 1 && (int) get_option('thread_comments') === 1 ) { //开启嵌套评论和分页才启用
   		if(!$commentcount) {
			$page = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args );
			$cpp=get_option('comments_per_page');
			if ( get_option('comment_order') === 'desc' ) { //倒序
				$comments = get_comments(array('post_id' => $post->ID, 'status' => 'approve', 'comment_parent' => '0' ));
				$cnt = count($comments);
				if (ceil($cnt / $cpp) == 1 || ($page > 1 && $page  == ceil($cnt / $cpp))) {
					$commentcount = $cnt + 1;
				} else {
					$commentcount = $cpp * $page + 1;
				}
			} else {
				$commentcount = $cpp * ($page - 1);
			}
		}
		if ( !$parent_id = $comment->comment_parent ) {
			$commentcountText = '';
			if ( get_option('comment_order') === 'desc' ) { //倒序
				$commentcountText .= '<span class="r">' . --$commentcount . '#</span>';
			} else {
				switch ($commentcount) {
					case 0:
						$commentcountText .= '<span class="r" style="background: #ee5567">沙发</span>'; ++$commentcount;
						break;
					case 1:
						$commentcountText .= '<span class="r" style="background: #ff6f3d">板凳</span>'; ++$commentcount;
						break;
					case 2:
						$commentcountText .= '<span class="r" style="background: #ffce55">地板</span>'; ++$commentcount;
						break;
					default:
						$commentcountText .= '<span class="r">' . ++$commentcount . '#</span>';
						break;
				}
			}
		}else{
			$commentcountText = '<span class="r">' . $commentcount.'-'.$lms_depth . '</span>';
		}
	}
	switch ($comment->comment_type) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		• <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)' ), '<span class="edit-link">', '</span>' ); ?>
	<?php
		break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment-body">
			<div class="comment-author">
				<div class="comment-face l">
					<?php if( $comment->comment_parent == 0 ) { echo get_avatar( $comment, 76 ); }else{ echo get_avatar( $comment, 32 ); } ?><b></b>
				</div>		
				<?php echo $commentcountText; ?>
				<strong><?php echo get_comment_author_link(); ?></strong> 
				<?php 
					if($comment->comment_parent){
						$comment_parent_href = htmlspecialchars(get_comment_link( $comment->comment_parent ));
						$comment_parent = get_comment($comment->comment_parent);
					?>
					<span><a href="<?php echo $comment_parent_href; ?>">@ <?php echo $comment_parent->comment_author;?></a></span>
				<?php } ?>
				<span class="reply"><?php comment_reply_link( array_merge( $args, array( 'reply_text' => ' 回复', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span>
				<div class="comment-date">
					<span><?php printf(__('%1$s %2$s'), get_comment_date(),  get_comment_time()) ?></span>
					<span class="country-flag"><?php if (function_exists("get_useragent")) { get_useragent($comment->comment_agent); } ?></span>
					<span><?php edit_comment_link(__('(Edit)'),'  ','') ?></span>
				</div>
			</div>
			<div class="commnet-main">
				<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
				<?php endif; ?>
			</div>
		</div>
<?php
		break;
	endswitch;
}
function mytheme_end_comment() {
	echo '</li>';
}
?>