<?php
$themename = $theme_name;

$options = array (
	//基本设置
	array("name" => "基本设置","type" => "section","desc" => "主题的基本设置"),
		array("name" => "网站关键词（KeyWords）",	"type" => "tit"),
		array("id" => "KeyWords","type" => "textarea","std" => "网站的关键词，SEO项目，极其重要。用英文半角逗号隔开，一般不超过100个字符。"),
		array("name" => "网站描述（Description）","type" => "tit"),
		array("id" => "Description","type" => "textarea","std" => "网站的描述，SEO项目，极其重要，一般不超过200个字符。"),
		array("name" => "侧边广告（300*250）","type" => "tit"),
		array("id" => "sidead","type" => "textarea","std" => "网站侧边顶部广告，300*250。"),
		array("name" => "备案信息","type" => "tit"),	
		array("id" => "blog_ipc","type" => "text","std" => "干ICP备OOXXXOO号-1","txt" => "工信部备案号："),
		array("name" => "统计代码","type" => "tit"	),
		array("id" => "Statistics_Code","type" => "textarea","std" => "第三方统计代码，用于统计网站流量。"),
	array( "type" => "endtag"),
);

function mytheme_add_admin() {
	global $themename, $options;
	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
			foreach ($options as $value) {
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); }
				else { delete_option( $value['id'] ); } 
			}
			
			header("Location: admin.php?page=theme-options.php&saved=true");
			die;
			foreach ($options as $value) {delete_option( $value['id'] ); }
		}
		else if( 'reset' == $_REQUEST['action'] ) {
			header("Location: admin.php?page=theme-options.php&reset=true");
			die;
		}
	}
	$icon = get_template_directory_uri().'/inc/option/images/general.png';
	add_menu_page($themename." Options", $themename , 'edit_themes', basename(__FILE__), 'mytheme_admin' , $icon);
}

function mytheme_admin() {
	global $themename, $options;
	$i=0;
	if ( $_REQUEST['saved'] ) echo '<div class="d_message">'.$themename.'修改已保存</div>';
	if ( $_REQUEST['reset'] ) echo '<div class="d_message">'.$themename.'已恢复设置</div>';
?>
<div class="wrap d_wrap">
	<h2><?php echo $themename; ?> 主题设置
		<span class="d_themedesc">Theme By：<a href="http://www.happyet.org/" target="_blank">不亦乐乎</a> &nbsp;&nbsp; 
	</h2>
	
	<form method="post" class="d_formwrap">
		<?php foreach ($options as $value) { switch ( $value['type'] ) { case "": ?>
			<?php break; case "tit": ?>
			</li><li class="d_li">
			<h4><?php echo $value['name']; ?>：</h4>
			<div class="d_tip"><?php echo $value['tip']; ?></div>
			<?php break; case 'text': ?>
			<?php if ( $value['desc'] != "") { ?><span class="d_the_desc" id="<?php echo $value['id']; ?>_desc"><?php echo $value['desc']; ?></span><?php } ?>
			<input class="d_inp <?php echo $value['class']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); }?>" placeholder="<?php echo $value['std'];  ?>" size="32" />
			
			<?php break; case 'textarea': ?>
			<textarea class="d_tarea" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="120" rows="10"   placeholder="<?php echo $value['std']; ?>"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } ?></textarea>
			
			<?php break; case "section": $i++; ?>
			<div class="d_mainbox" id="d_mainbox_<?php echo $i; ?>">
				<ul class="d_inner">
					<li class="d_li">
				
			<?php break; case "endtag": ?>
			</li></ul>
			<div class="d_desc"><input class="button-primary" name="save<?php echo $i; ?>" type="submit" value="保存设置" /></div>
			</div>
			
		<?php break; }} ?>
				
		<input type="hidden" name="action" value="save" />

	</form>
</div>
<?php 
		} 
add_action('admin_menu', 'mytheme_add_admin');
?>