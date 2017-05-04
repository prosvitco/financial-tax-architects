<?php

if( have_rows('sections_all') ):

	while ( have_rows('sections_all') ) : the_row();

        if( get_row_layout() == 'general_section' ):
            get_template_part('templates/sections/simple/simple-all');

		elseif( get_row_layout() == 'testimonials_slider' ):
			get_template_part('templates/sections/testimonials/slider');
//
//		elseif( get_row_layout() == 'content_sections' ):
//			get_template_part('templates/sections/content/content-all');
//
//
//		elseif( get_row_layout() == 'testimonials_section' ):
//			get_template_part('templates/sections/testimonials/testimonials-all');
//
//
//		elseif( get_row_layout() == 'contact_section' ):
//			get_template_part('templates/sections/contact/contact-all');
//
//		elseif( get_row_layout() == 'cta_section' ):
//			get_template_part('templates/sections/cta/cta-all');


		endif;

	endwhile;

endif;

?>