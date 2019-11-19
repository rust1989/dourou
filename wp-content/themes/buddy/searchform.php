<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<input type="text" name="s" class="gp-search-bar" value="" placeholder="<?php esc_attr_e( 'Search', 'buddy' ); ?>" /><input type="submit" class="gp-search-submit" value="<?php esc_attr_e( 'Search', 'buddy' ); ?>" />
	
	<?php if ( get_option( 'buddy_search_criteria' ) == 'Products' ) { ?>
		<input type="hidden" name="post_type" value="product" />
	<?php } elseif ( get_option( 'buddy_search_criteria' ) == 'Posts' ) { ?>
		<input type="hidden" name="post_type" value="post" />
	<?php } elseif ( get_option( 'buddy_search_criteria' ) == 'Posts and pages' ) { ?>
		<input type="hidden" name="post_type[]" value="post" />
		<input type="hidden" name="post_type[]" value="page" />	
	<?php } elseif ( get_option( 'buddy_search_criteria' ) == 'Posts, pages and products' ) { ?>
		<input type="hidden" name="post_type[]" value="post" />
		<input type="hidden" name="post_type[]" value="page" />	
		<input type="hidden" name="post_type[]" value="product" />
	<?php } ?>	

</form>