<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/20/2017
 * Time: 5:26 PM
 */

?>


<?php
    $args = array(
        'post_type' => 'jetpack-testimonial',
        'posts_per_page' => 5
    );
    $the_query = new WP_Query( $args );

?>

<?php if ( $the_query->have_posts() ) : ?>

    <section class="story">
        <div class="owl-carousel story-slider">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


                <div class="slide">


                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">

                                <div class="logo">
                                    <img src="wp-content/themes/financial-tax-architects/dist/images/story-logo-4.png" alt="story-logo">
                                </div>

                                <div class="text-wrap">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        </div>
    </section>

<?php endif; ?>
