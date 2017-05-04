<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/16/2017
 * Time: 8:40 PM
 */

    $embed_code = get_sub_field('html_code_html_code');

?>

<?php if( $embed_code != '' ) { ?>

    <div class="embed-code">

        <?php echo $embed_code; ?>

    </div>

<?php } ?>