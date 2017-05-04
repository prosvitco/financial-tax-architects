<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/18/2017
 * Time: 1:37 PM
 */


$background_styles  = get_sub_field('sections_general_section_section_background');

if ($background_styles != "none") {

    if ( $background_styles == 'image' ) {

        $image_id     = get_sub_field('sections_general_section_section_background_image');
        $image_url    = wp_get_attachment_image_src($image_id, 'full');
        $css_styles   = 'background-image: url(' . $image_url[0] . ')';

    } elseif ( $background_styles == 'color' ) {

        $css_styles   = 'background-color:' . get_sub_field('sections_general_section_section_background_color');

    }

} else {

    $css_styles       = Null;

}


?>

<?php if ( $css_styles != Null ) { ?>
    <style>
        #<?php echo sanitize_title($section_id); ?> {
            <?php echo $css_styles; ?>
        }
    </style>
<?php } ?>
