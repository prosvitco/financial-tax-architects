<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/16/2017
 * Time: 8:40 PM
 */

?>

<?php if( have_rows('cards_cards') ): ?>
    <?php $counter = 0; ?>
    <div class="cards-container">

        <div class="cards-row">

            <?php while ( have_rows('cards_cards') ) : the_row(); ?>

                <?php

                $title          =  get_sub_field('card_title');
                $subtitle       =  get_sub_field('card_subtitle');
                $text           =  get_sub_field('card_text');

                // link
                $target     =  get_sub_field('link_-_internal_or_external');

                if ($target == 'internal') {
                    $href       =  get_sub_field('link_internal');
                } else {
                    $href       =  get_sub_field('link_external');
                }

                $counter++;
                ?>

                <div class="card card-<?php echo $counter ?>">
                    <div class="card-block">

                        <?php if ( var_exists($href) ) { ?>
                        <a href="<?php echo $href; ?>" class="card-link">
                            <?php } ?>

                            <?php include( locate_template( 'templates/sections/simple/templates/graphics.php' ) ); ?>

                            <?php if ( var_exists($title) ) { ?>
                                <h4 class="card-title"><?php echo $title; ?></h4>
                            <?php } ?>

                            <?php if ( var_exists($subtitle) ) { ?>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $subtitle; ?></h6>
                            <?php } ?>

                            <?php if ( var_exists($text) ) { ?>
                                <p class="card-text"><?php echo $text; ?></p>
                            <?php } ?>

                            <?php if ( var_exists($href) ) { ?>
                        </a>
                    <?php } ?>

                    </div>
                </div>

            <?php endwhile; ?>

        </div>

    </div>

<?php endif; ?>