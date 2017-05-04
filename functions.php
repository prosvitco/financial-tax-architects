<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php', // Theme customizer
  'lib/headers/headers.php',  // Add headers to functions.php
    'lib/prosvit/prosvit_google_fonts.php',  // Add fonts to functions.php
    'lib/prosvit/prosvit_images.php',  // Add headers to functions.php
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


//define('GOOGLE_FONTS', 'Montserrat:100,200,300,400,500,500i,600,700,800,900');
define('GOOGLE_FONTS', 'Cinzel:400,700,900');

function prosvit_get_share_links() {
    global $post;

    $thumb = array();
    if( has_post_thumbnail() ) {
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
    }
    $social = '';

    $social .= '<a href="http://www.facebook.com/sharer.php?u='.esc_url(get_permalink()).'" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>';
    $social .= '<a href="https://twitter.com/share?url='.esc_url(get_permalink()).'&text='.esc_attr(get_the_title()).'" target="_blank"><i class="fa fa-twitter"></i></a>';
    $social .= '<a href="https://plus.google.com/share?url='.esc_url(get_permalink()).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    $social .= '<a href="https://pinterest.com/pin/create/bookmarklet/?media='.esc_url(isset($thumb[0]) ? $thumb[0] : '').'&url='.esc_url(get_permalink()).'&description='.esc_attr(get_the_title()).'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    $social .= '<a href="#" onclick="window.print();return false;"><i class="fa fa-print"></i></a>';

    return $social;
}

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'  => 'General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'autoload' => true,
    'redirect'    => false
  ));

}

/* ACF SECTION HELPERS */


$subRole = get_role( 'subscriber' );
$subRole->add_cap( 'read_private_posts' );
$subRole->add_cap( 'read_private_pages' );

function prosvit_login_redirect( $redirect_to, $request_redirect_to, $user ) {
    if ( is_a( $user, 'WP_User' ) && $user->has_cap( 'edit_posts' ) === false ) {
        return get_bloginfo( 'siteurl' );
    }
    return $redirect_to;
}

add_filter( 'login_redirect', 'prosvit_login_redirect', 10, 3 );

function prosvit_post_type_documents_private_status( $new_status, $old_status, $post ) {
    if ( $post->post_type == 'document' && $new_status == 'publish' && $old_status  != $new_status ) {
        $post->post_status = 'private';
        wp_update_post( $post );
    }
}
add_action( 'transition_post_status', 'prosvit_post_type_documents_private_status', 10, 3 );

function prosvit_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'prosvit_remove_admin_bar');


function var_exists( $data ) {

    if ( !isset( $data ) ) {
        return false;
    }

    if ( is_null( $data ) ) {
        return false;
    }

    if ( $data == '' ) {
        return false;
    }

    return true;


}


add_filter( 'dynamic_sidebar_params', 'b3m_wrap_widget_titles', 20 );
function b3m_wrap_widget_titles( array $params ) {

    // $params will ordinarily be an array of 2 elements, we're only interested in the first element
    $widget =& $params[0];
    $widget['before_title'] = '<h5 class="widget-title"><span>';
    $widget['after_title'] = '</span></h5>';

    return $params;

}

//function modify_products() {
//    if ( post_type_exists( 'jetpack-testimonial' ) ) {
//
//        /* Give products hierarchy (for house plans) */
//        global $wp_post_types, $wp_rewrite;
//        $wp_post_types['jetpack-testimonial']->hierarchical = true;
//        $args = $wp_post_types['product'];
//        $wp_rewrite->add_rewrite_tag("%product%", '(.+?)', $args->query_var ? "{$args->query_var}=" : "post_type=product&name=");
//    }
//}
//add_action( 'init', 'modify_products', 1 );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
  'key' => 'group_58f317a4c621b',
  'title' => 'Section Content - Buttons',
  'fields' => array (
    array (
      'key' => 'field_58f3d86c71c63',
      'label' => 'Buttons',
      'name' => 'buttons',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'table',
      'button_label' => 'Add Button',
      'sub_fields' => array (
        array (
          'key' => 'field_58f3d88d71c64',
          'label' => 'Text',
          'name' => 'text',
          'type' => 'text',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array (
          'key' => 'field_58f3daa171c65',
          'label' => 'Link - Internal or External?',
          'name' => 'link_-_internal_or_external',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array (
            'internal' => 'Internal',
            'external' => 'External',
          ),
          'default_value' => array (
            0 => 'internal',
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 0,
          'ajax' => 0,
          'return_format' => 'value',
          'placeholder' => '',
        ),
        array (
          'key' => 'field_58f3dad571c66',
          'label' => 'Link',
          'name' => 'link_internal',
          'type' => 'page_link',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => array (
            array (
              array (
                'field' => 'field_58f3daa171c65',
                'operator' => '==',
                'value' => 'internal',
              ),
            ),
          ),
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'post_type' => array (
          ),
          'taxonomy' => array (
          ),
          'allow_null' => 0,
          'allow_archives' => 1,
          'multiple' => 0,
        ),
        array (
          'key' => 'field_58f3daea71c67',
          'label' => 'Link',
          'name' => 'link_external',
          'type' => 'url',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => array (
            array (
              array (
                'field' => 'field_58f3daa171c65',
                'operator' => '==',
                'value' => 'external',
              ),
            ),
          ),
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
        ),
        array (
          'key' => 'field_58f3db0371c68',
          'label' => 'Type',
          'name' => 'type',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array (
            'primary' => 'Primary',
            'secondary' => 'Secondary',
            'default' => 'Default',
            'warning' => 'Warning',
            'success' => 'Success',
          ),
          'default_value' => array (
            0 => 'primary',
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 0,
          'ajax' => 0,
          'return_format' => 'value',
          'placeholder' => '',
        ),
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 0,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f432780c84f',
  'title' => 'Section Content - Cards',
  'fields' => array (
    array (
      'key' => 'field_58f4328ac6c12',
      'label' => 'Cards',
      'name' => 'cards',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'row',
      'button_label' => 'Add Card',
      'sub_fields' => array (
        array (
          'key' => 'field_58f7f2e788a6a',
          'label' => 'Title',
          'name' => 'card_title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array (
          'key' => 'field_58f7f2f388a6b',
          'label' => 'Subtitle',
          'name' => 'card_subtitle',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array (
          'key' => 'field_58f7f30888a6c',
          'label' => 'Graphics',
          'name' => 'card_image_or_icon',
          'type' => 'select',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'choices' => array (
            'none' => 'None',
            'image' => 'Image',
            'icon' => 'Icon',
          ),
          'default_value' => array (
            0 => 'none',
          ),
          'allow_null' => 0,
          'multiple' => 0,
          'ui' => 0,
          'ajax' => 0,
          'return_format' => 'value',
          'placeholder' => '',
        ),
        array (
          'key' => 'field_58f7d6f9713b3',
          'label' => 'Image',
          'name' => 'card_image',
          'type' => 'image',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => array (
            array (
              array (
                'field' => 'field_58f7f30888a6c',
                'operator' => '==',
                'value' => 'image',
              ),
            ),
          ),
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'id',
          'preview_size' => 'thumbnail',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array (
          'key' => 'field_58f7f39d88a6e',
          'label' => 'Icon',
          'name' => 'card_icon',
          'type' => 'text',
          'instructions' => '(HTML code)',
          'required' => 0,
          'conditional_logic' => array (
            array (
              array (
                'field' => 'field_58f7f30888a6c',
                'operator' => '==',
                'value' => 'icon',
              ),
            ),
          ),
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array (
          'key' => 'field_58f7f3c488a6f',
          'label' => 'Text',
          'name' => 'card_text',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array (
          'key' => 'field_58f7fe7090872',
          'label' => 'Link',
          'name' => 'link',
          'type' => 'clone',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'clone' => array (
            0 => 'group_58f7feb27984f',
          ),
          'display' => 'seamless',
          'layout' => 'block',
          'prefix_label' => 0,
          'prefix_name' => 0,
        ),
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'seamless',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 0,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f3cb8308c2b',
  'title' => 'Section Content - Embed Code',
  'fields' => array (
    array (
      'key' => 'field_58f3cbadffd5b',
      'label' => 'HTML Code',
      'name' => 'html_code',
      'type' => 'textarea',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'maxlength' => '',
      'rows' => '',
      'new_lines' => 'wpautop',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 0,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f651d016386',
  'title' => 'Section Content - General',
  'fields' => array (
    array (
      'key' => 'field_58f651db0dfed',
      'label' => 'Content',
      'name' => 'section_content_general',
      'type' => 'flexible_content',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'button_label' => 'Add Content Row',
      'min' => '',
      'max' => '',
      'layouts' => array (
        array (
          'key' => '58f651fd6c682',
          'name' => 'wysiwyg_editor',
          'label' => 'Wysiwyg Editor',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_58f652190dfee',
              'label' => 'wysiwyg_editor',
              'name' => 'wysiwyg_editor',
              'type' => 'clone',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'clone' => array (
                0 => 'group_58f42ee6d27f6',
              ),
              'display' => 'seamless',
              'layout' => 'block',
              'prefix_label' => 0,
              'prefix_name' => 1,
            ),
          ),
          'min' => '',
          'max' => '',
        ),
        array (
          'key' => '58f6524b0dfef',
          'name' => 'buttons',
          'label' => 'Buttons',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_58f652510dff0',
              'label' => 'Buttons',
              'name' => 'buttons',
              'type' => 'clone',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'clone' => array (
                0 => 'group_58f317a4c621b',
              ),
              'display' => 'seamless',
              'layout' => 'block',
              'prefix_label' => 0,
              'prefix_name' => 1,
            ),
          ),
          'min' => '',
          'max' => '',
        ),
        array (
          'key' => '58f652730dff2',
          'name' => 'html_code',
          'label' => 'HTML Code',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_58f652780dff3',
              'label' => 'HTML Code',
              'name' => 'html_code',
              'type' => 'clone',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'clone' => array (
                0 => 'group_58f3cb8308c2b',
              ),
              'display' => 'seamless',
              'layout' => 'block',
              'prefix_label' => 0,
              'prefix_name' => 1,
            ),
          ),
          'min' => '',
          'max' => '',
        ),
        array (
          'key' => '58f65316194f1',
          'name' => 'cards',
          'label' => 'Cards',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_58f6531d194f2',
              'label' => 'Cards',
              'name' => 'cards',
              'type' => 'clone',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'clone' => array (
                0 => 'group_58f432780c84f',
              ),
              'display' => 'seamless',
              'layout' => 'block',
              'prefix_label' => 0,
              'prefix_name' => 1,
            ),
          ),
          'min' => '',
          'max' => '',
        ),
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 0,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f7feb27984f',
  'title' => 'Section Content - Links',
  'fields' => array (
    array (
      'key' => 'field_58f7fecf7812b',
      'label' => 'Link - Internal or External?',
      'name' => 'link_-_internal_or_external',
      'type' => 'select',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => array (
        'internal' => 'Internal',
        'external' => 'External',
      ),
      'default_value' => array (
        0 => 'internal',
      ),
      'allow_null' => 0,
      'multiple' => 0,
      'ui' => 0,
      'ajax' => 0,
      'return_format' => 'value',
      'placeholder' => '',
    ),
    array (
      'key' => 'field_58f7ff127812c',
      'label' => 'Link',
      'name' => 'link_internal',
      'type' => 'page_link',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_58f7fecf7812b',
            'operator' => '==',
            'value' => 'internal',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'post_type' => array (
      ),
      'taxonomy' => array (
      ),
      'allow_null' => 0,
      'allow_archives' => 1,
      'multiple' => 0,
    ),
    array (
      'key' => 'field_58f7ff437812d',
      'label' => 'Link',
      'name' => 'link_external',
      'type' => 'url',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_58f7fecf7812b',
            'operator' => '==',
            'value' => 'external',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 0,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f42ee6d27f6',
  'title' => 'Section Content - Wysiwyg Editor',
  'fields' => array (
    array (
      'key' => 'field_58f42efbde275',
      'label' => 'Wysiwyg Editor',
      'name' => 'wysiwyg_editor',
      'type' => 'wysiwyg',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'tabs' => 'all',
      'toolbar' => 'full',
      'media_upload' => 1,
      'delay' => 0,
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'post',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 0,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f318219b50f',
  'title' => 'Sections',
  'fields' => array (
    array (
      'key' => 'field_58f3d2691c9bc',
      'label' => 'Section',
      'name' => 'sections_all',
      'type' => 'flexible_content',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'button_label' => 'Add Section',
      'min' => '',
      'max' => '',
      'layouts' => array (
        array (
          'key' => '58f3d274f38cb',
          'name' => 'general_section',
          'label' => 'General Section',
          'display' => 'block',
          'sub_fields' => array (
            array (
              'key' => 'field_58f3d2771c9bd',
              'label' => 'General Section',
              'name' => 'sections_general_section',
              'type' => 'clone',
              'instructions' => '',
              'required' => 0,
              'conditional_logic' => 0,
              'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
              ),
              'clone' => array (
                0 => 'group_58f3c226d3aa0',
              ),
              'display' => 'seamless',
              'layout' => 'block',
              'prefix_label' => 0,
              'prefix_name' => 1,
            ),
          ),
          'min' => '',
          'max' => '',
        ),
        array (
          'key' => '58f951874daaa',
          'name' => 'testimonials_slider',
          'label' => 'Testimonials Slider',
          'display' => 'block',
          'sub_fields' => array (
          ),
          'min' => '',
          'max' => '',
        ),
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'template-landing.php',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => array (
    0 => 'the_content',
  ),
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f3c226d3aa0',
  'title' => 'Single Section',
  'fields' => array (
    array (
      'key' => 'field_58f3cfcc0a770',
      'label' => 'General Settings',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'top',
      'endpoint' => 0,
    ),
    array (
      'key' => 'field_58f3cf0086fd6',
      'label' => 'Section ID',
      'name' => 'section_id',
      'type' => 'text',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_58f667da5ad39',
      'label' => 'Section Class',
      'name' => 'section_class',
      'type' => 'text',
      'instructions' => 'Optional',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_58f3ce2db04df',
      'label' => 'Background?',
      'name' => 'section_background',
      'type' => 'select',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => array (
        'none' => 'None',
        'image' => 'Image',
        'color' => 'Color',
      ),
      'default_value' => array (
        0 => 'none',
      ),
      'allow_null' => 0,
      'multiple' => 0,
      'ui' => 0,
      'ajax' => 0,
      'return_format' => 'value',
      'placeholder' => '',
    ),
    array (
      'key' => 'field_58f3c245eadec',
      'label' => 'Backround Image',
      'name' => 'section_background_image',
      'type' => 'image',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_58f3ce2db04df',
            'operator' => '==',
            'value' => 'image',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'id',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array (
      'key' => 'field_58f3ce80045d4',
      'label' => 'Background Color',
      'name' => 'section_background_color',
      'type' => 'color_picker',
      'instructions' => '',
      'required' => 1,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_58f3ce2db04df',
            'operator' => '==',
            'value' => 'color',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
    ),
    array (
      'key' => 'field_58f64fe941051',
      'label' => 'Section Columns',
      'name' => 'section_columns',
      'type' => 'select',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'choices' => array (
        1 => 'One Column ( Full Width )',
        2 => 'Two Columns',
        3 => 'Three Columns',
        4 => 'Four Columns',
      ),
      'default_value' => array (
        0 => 1,
      ),
      'allow_null' => 0,
      'multiple' => 0,
      'ui' => 0,
      'ajax' => 0,
      'return_format' => 'value',
      'placeholder' => '',
    ),
    array (
      'key' => 'field_58f3d026d946b',
      'label' => 'First Column Content',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'top',
      'endpoint' => 0,
    ),
    array (
      'key' => 'field_58f6681dc7f97',
      'label' => 'Column Class',
      'name' => 'first_column_class',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_58f6686ed7294',
      'label' => 'Section Content',
      'name' => 'section_content_first_column',
      'type' => 'clone',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'clone' => array (
        0 => 'group_58f651d016386',
      ),
      'display' => 'seamless',
      'layout' => 'block',
      'prefix_label' => 0,
      'prefix_name' => 1,
    ),
    array (
      'key' => 'field_58f6506610633',
      'label' => 'Second Column Content',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_58f64fe941051',
            'operator' => '==',
            'value' => '2',
          ),
        ),
        array (
          array (
            'field' => 'field_58f64fe941051',
            'operator' => '==',
            'value' => '3',
          ),
        ),
        array (
          array (
            'field' => 'field_58f64fe941051',
            'operator' => '==',
            'value' => '4',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'left',
      'endpoint' => 0,
    ),
    array (
      'key' => 'field_58f668cffacdb',
      'label' => 'Column Class',
      'name' => 'second_column_class',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_58f652c43572b',
      'label' => 'Section Content',
      'name' => 'section_content_second_column',
      'type' => 'clone',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'clone' => array (
        0 => 'group_58f651d016386',
      ),
      'display' => 'seamless',
      'layout' => 'block',
      'prefix_label' => 0,
      'prefix_name' => 1,
    ),
    array (
      'key' => 'field_58f650b006de1',
      'label' => 'Third Column Content',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_58f64fe941051',
            'operator' => '==',
            'value' => '3',
          ),
        ),
        array (
          array (
            'field' => 'field_58f64fe941051',
            'operator' => '==',
            'value' => '4',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'top',
      'endpoint' => 0,
    ),
    array (
      'key' => 'field_58f668dcfacdc',
      'label' => 'Column Class',
      'name' => 'third_column_class',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_58f6688ed7295',
      'label' => 'Section Content',
      'name' => 'section_content_third_column',
      'type' => 'clone',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'clone' => array (
        0 => 'group_58f651d016386',
      ),
      'display' => 'seamless',
      'layout' => 'block',
      'prefix_label' => 0,
      'prefix_name' => 1,
    ),
    array (
      'key' => 'field_58f650bf06de2',
      'label' => 'Fourth Column Content',
      'name' => '',
      'type' => 'tab',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => array (
        array (
          array (
            'field' => 'field_58f64fe941051',
            'operator' => '==',
            'value' => '4',
          ),
        ),
      ),
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'placement' => 'top',
      'endpoint' => 0,
    ),
    array (
      'key' => 'field_58f668ebfacdd',
      'label' => 'Column Class',
      'name' => 'fourth_column_class',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_58f6689ed7296',
      'label' => 'Section Content',
      'name' => 'section_content_fourth_column',
      'type' => 'clone',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'clone' => array (
        0 => 'group_58f651d016386',
      ),
      'display' => 'seamless',
      'layout' => 'block',
      'prefix_label' => 0,
      'prefix_name' => 1,
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'page_template',
        'operator' => '==',
        'value' => 'template-landing.php',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 0,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_58f9506640eda',
  'title' => 'Testimonials',
  'fields' => array (
    array (
      'key' => 'field_58f9507325630',
      'label' => 'Logo',
      'name' => 'logo',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'id',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'jetpack-testimonial',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'side',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

acf_add_local_field_group(array (
  'key' => 'group_56f92ed00d276',
  'title' => 'Theme options',
  'fields' => array (
    array (
      'key' => 'field_56f92ecd31c27',
      'label' => 'Logo',
      'name' => 'logo_image',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'array',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array (
      'key' => 'field_583e9036c6471',
      'label' => 'Logo text',
      'name' => 'logo_text',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'maxlength' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
    ),
    array (
      'key' => 'field_570d0cefff143',
      'label' => 'Logo footer',
      'name' => 'logo_footer_image',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'url',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array (
      'key' => 'field_56f93102d0fab',
      'label' => 'Copyright text',
      'name' => 'copyright_text',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_56fbc3a32813a',
      'label' => 'Login page Image',
      'name' => 'login_page_image',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'array',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array (
      'key' => 'field_56fbc4372813b',
      'label' => 'Login page Text',
      'name' => 'login_page_text',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
    ),
    array (
      'key' => 'field_56fbc44b2813c',
      'label' => 'ABOVE FOOTER Button Text',
      'name' => 'above_footer_button_text',
      'type' => 'text',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'default_value' => '',
      'placeholder' => '',
      'prepend' => '',
      'append' => '',
      'maxlength' => '',
      'readonly' => 0,
      'disabled' => 0,
    ),
    array (
      'key' => 'field_57658c0dbb254',
      'label' => 'Header Background Image',
      'name' => 'header_background_image_all_pages',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'id',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array (
      'key' => 'field_58a8ead2fe813',
      'label' => 'Login Redirect Page Url',
      'name' => 'login_redirect_page_url',
      'type' => 'page_link',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'post_type' => array (
      ),
      'taxonomy' => array (
      ),
      'allow_null' => 0,
      'allow_archives' => 1,
      'multiple' => 0,
    ),
    array (
      'key' => 'field_58ca676ba638c',
      'label' => 'Register Page Img',
      'name' => 'register_page_img',
      'type' => 'image',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'return_format' => 'array',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'options_page',
        'operator' => '==',
        'value' => 'theme-general-settings',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => 1,
  'description' => '',
));

endif;