<div class="links box">
	<h4><strong>友情链接</strong></h4>
	<div class="topLink">
		<?php
			$bookmarks = get_bookmarks(array('orderby' => 'date','category' => '2'));
			if ( !empty($bookmarks) ) {
				foreach ($bookmarks as $bookmark) {
					if(!empty($bookmark->link_image)){
						echo '<a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" ><img src="' . $bookmark->link_image . '" alt="' . $bookmark->link_name . '" /></a>';
						echo "\n";
					}else{
						echo '<a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" >' . $bookmark->link_name . '</a>';
						echo "\n";
					}
				}
			}
		?>
	</div>
	<div class="link">
		<?php
			//$bookmarks = get_bookmarks(array('orderby' => 'date','category' => '2'));
			//if ( !empty($bookmarks) ) {
			//	foreach ($bookmarks as $bookmark) {
			//		if(empty($bookmark->link_image)){
			//			echo '<a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '" target="_blank" >' . $bookmark->link_name . '</a>';
			//			echo "\n";
			//		}
			//	}
			//}
		?>
	</div>
</div>