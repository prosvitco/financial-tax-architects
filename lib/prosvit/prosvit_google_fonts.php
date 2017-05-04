<?php 
	// define('GOOGLE_FONTS', 'Montserrat:100,200,300,400,500,500i,600,700,800,900'); add to the functions


function prosvit_google_fonts() {
      
  if( ! defined( 'GOOGLE_FONTS' ) ) return;
  echo '<link href="//fonts.googleapis.com/css?family=' . GOOGLE_FONTS . '" rel="stylesheet" type="text/css" />'."\n";

}

add_action( 'wp_head', 'prosvit_google_fonts' , 10);