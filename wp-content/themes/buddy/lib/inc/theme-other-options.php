<?php 

/////////////////////////////////////// Add Fields ///////////////////////////////////////

function ghostpool_edit_attachment( $form_fields, $post ) {

	// Lightbox
	$form_fields['buddy_lightbox_url'] = array( 
		"label" => esc_html__( 'Lightbox URL', 'buddy' ),
		"input" => "text",
		"value" => esc_url( get_post_meta( $post->ID, '_' . 'buddy_lightbox_url', true ) ),
		"helps" => esc_html__( 'The URL of an image, video or audio file ( YouTube/Vimeo/FLV/MP4/M4V/MP3 ) that loads in the lightbox.', 'buddy' ),
	 );		
						
	return $form_fields;

}
add_filter( 'attachment_fields_to_edit', 'ghostpool_edit_attachment', null, 2 );


/////////////////////////////////////// Save Fields ///////////////////////////////////////

function ghostpool_save_attachment( $post, $attachment ) {
	
	// Lightbox URL
	if ( isset( $attachment['buddy_lightbox_url'] ) ){
		update_post_meta( $post['ID'], '_' . 'buddy_lightbox_url', esc_url( $attachment['buddy_lightbox_url'] ) );
	}	
	
	return $post;
	
}
add_filter( 'attachment_fields_to_save', 'ghostpool_save_attachment', null , 2 );


?>