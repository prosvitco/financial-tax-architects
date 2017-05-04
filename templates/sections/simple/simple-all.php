<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/16/2017
 * Time: 8:35 PM
 */
?>

<?php

    $section_id         = get_sub_field('sections_general_section_section_id');
    $section_class      = get_sub_field('sections_general_section_section_class');

    /** BOF Content Columns **/
    $section_columns    = get_sub_field('sections_general_section_section_columns');
    $column_class       = 'col-md-' . ( 12 / $section_columns );
    $columns_array      = array(
        'sections_general_section_section_content_first_column_section_content_general'     => 'sections_general_section_first_column_class',
        'sections_general_section_section_content_second_column_section_content_general'    => 'sections_general_section_second_column_class',
        'sections_general_section_section_content_third_column_section_content_general'     => 'sections_general_section_third_column_class',
        'sections_general_section_section_content_fourth_column_section_content_general'    => 'sections_general_section_fourth_column_class',
    );
    /** EOF Content Columns **/

    /** BOF Section Background **/
    include( locate_template( 'templates/sections/simple/styles/section-background.php' ) );
    /** EOF Section Background **/

?>

<section id="<?php echo sanitize_title( $section_id ); ?>" class="section <?php echo ( $section_class != '' ) ? $section_class : '' ?>" >

    <div class="container">

        <div class="row">

            <?php foreach ($columns_array as $key=>$value) { ?>

                <?php $extra_class = get_sub_field($value); ?>

                <?php if( have_rows($key) ): ?>

                    <div class="<?php echo $column_class . ' ' . $extra_class ?>">

                    <?php while ( have_rows($key) ) : the_row(); ?>

                           <?php

                            if( get_row_layout() == 'html_code' ):
                                get_template_part('templates/sections/simple/simple-html_code');

                            elseif( get_row_layout() == 'wysiwyg_editor' ):
                                get_template_part('templates/sections/simple/simple-wysiwyg_editor');

                            elseif( get_row_layout() == 'buttons' ):
                                get_template_part('templates/sections/simple/simple-buttons');

                            elseif( get_row_layout() == 'cards' ):
                                get_template_part('templates/sections/simple/simple-cards');

                            endif;
                        ?>

                    <?php endwhile; ?>

                    </div>

                <?php endif; ?>

            <?php } ?>

        </div>

    </div>

</section>
