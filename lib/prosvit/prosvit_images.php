<?php

/* Custom Images */

if ( function_exists( 'add_theme_support' ) ) {

  add_theme_support( 'post-thumbnails' );
  add_image_size( 'post-thumb', 1000, 500, array( 'left', 'center' ) );

}


add_filter( 'image_size_names_choose', 'prosvit_custom_sizes' );
function prosvit_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'post-thumb' => __( 'Post thumb' ),
        // 'medium-height' => __( 'Medium Height' ),
    ) );
}
