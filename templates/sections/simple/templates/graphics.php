<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/19/2017
 * Time: 9:00 PM
 */

    // Image or Icon
    $graphics_type  =  get_sub_field('card_image_or_icon');

    if ( $graphics_type == 'image') {

        $graphics_id       =  get_sub_field('card_image');
        $graphics_url      =  wp_get_attachment_image_src($graphics_id, 'medium');

    } else {

        $graphics_icon_html       =  get_sub_field('card_icon');

    }

?>

<?php if ( $graphics_type != 'none') { ?>

    <div class="card-graphics">

        <?php if ( $graphics_type == 'image') { ?>

            <img src="<?php echo $graphics_url[0]; ?>" alt="<?php echo $graphics_url[1]; ?>" class="img-responsive">

        <?php } else { ?>

            <?php echo $graphics_icon_html; ?>

        <?php } ?>

    </div>

<?php } ?>
