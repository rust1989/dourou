</div><!--content-->
<div class="location box"></div>
<?php if(is_home() && $paged ==1) { get_template_part( 'files/blogrolls' ); } ?>
</div><!--main-->
<div class="footer" id="footer">
	<p><?php echo auto_copyright(); ?><br /> <?php if(dopt('blog_ipc')){echo dopt('blog_ipc');} ?> <br /> <?php if(dopt('Statistics_Code')){echo dopt('Statistics_Code');} ?></p>
</div>
<div id="scrolltop">
	<span title="回到顶部" id="roll_top"></span>
	<?php if(is_singular() && comments_open()) { ?><span title="查看评论" id="ct"></span><?php } ?>
	<span title="转到底部" id="fall"></span>
</div>
<?php wp_footer(); ?>
</body>
</html>