<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/16/2017
 * Time: 8:40 PM
 */
?>

<?php if( have_rows('buttons_buttons') ): ?>

    <div class="buttons">

        <?php while ( have_rows('buttons_buttons') ) : the_row(); ?>

            <?php

                $text       =  get_sub_field('text');
                $type       =  get_sub_field('type');
                $target     =  get_sub_field('link_-_internal_or_external');

                if ($target == 'internal') {
                    $href       =  get_sub_field('link_internal');
                } else {
                    $href       =  get_sub_field('link_external');
                }

            ?>

            <a href="<?php echo $href; ?>" class="btn btn-<?php echo $type; ?>" <?php echo ($target != 'internal') ? 'target="_blank"' : ''; ?>><?php echo $text; ?></a>

        <?php endwhile; ?>

    </div>

<?php endif; ?>

