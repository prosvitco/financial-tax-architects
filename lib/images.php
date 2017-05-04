<?php

/* Custom Images */

if ( function_exists( 'add_theme_support' ) ) {

  add_theme_support( 'post-thumbnails' );
  add_image_size( 'slide-thumb', 1600, 800, array( 'left', 'top' ) );

}


add_filter( 'image_size_names_choose', 'prosvit_custom_sizes' );
function prosvit_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'slide-thumb' => __( 'Slide thumb' ),
        // 'medium-height' => __( 'Medium Height' ),
    ) );
}




/********* BOF Regenerate Images ***********/
/*
include_once( ABSPATH . 'wp-admin/includes/image.php' );
function regenerate_all_attachment_sizes() {
    $args = array( 'post_type' => 'attachment', 'numberposts' => 100, 'post_status' => null, 'post_parent' => null, 'post_mime_type' => 'image' ); 
    $attachments = get_posts( $args );
    if ($attachments) {
        foreach ( $attachments as $post ) {
            $file = get_attached_file( $post->ID );
            wp_update_attachment_metadata( $post->ID, wp_generate_attachment_metadata( $post->ID, $file ) );
        }
    }       
}
regenerate_all_attachment_sizes();
*/
/********* EOF Regenerate Images ***********/
