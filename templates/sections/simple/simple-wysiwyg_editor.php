<?php
/**
 * Created by ProSvit.Design
 * User: Volodymyr Danylyuk
 * Date: 4/16/2017
 * Time: 8:39 PM
 */

$wysiwyg_editor = get_sub_field('wysiwyg_editor_wysiwyg_editor');


?>

<?php if( $wysiwyg_editor != '' ) { ?>

    <div class="wysiwyg-editor">

        <?php echo $wysiwyg_editor; ?>

    </div>

<?php } ?>