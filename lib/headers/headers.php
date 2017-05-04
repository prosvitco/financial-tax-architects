<?php

// Register Custom Navigation Walker
require_once( trailingslashit( get_template_directory() ). 'lib/headers/wp_bootstrap_navwalker.php' );

function header_widgets_init() {
  register_sidebar([
    'name'          => __('Top Header', 'sage'),
    'id'            => 'sidebar-header',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\header_widgets_init');

function register_my_menu() {
    register_nav_menu('navbar-left-menu',__( 'Navbar Left Menu' ));
    register_nav_menu('navbar-right-menu',__( 'Navbar Right Menu' ));
}
add_action( 'init', 'register_my_menu' );

/**
 * Plugin Name: Menu Link Classes (I)
 * Description: Target menu link classes with the "a-class-" class prefix.
 * Author:      Birgir Erlendsson (birgire)
 * Plugin URI:  http://wordpress.stackexchange.com/a/190844/26350
 * Version:     0.0.1
 */

/**
 * Remove menu classes with the "a-class-" prefix
 */
add_filter( 'nav_menu_css_class', function( $classes )
{
    return array_filter( 
        $classes, 
        function( $val )
        {
            return 'a-class-' !== substr( $val, 0, strlen( 'a-class-' ) );
        } 
    );
} );

/**
 * Add only "a-class-" prefixed classes to the menu link attribute
 */
add_filter( 'nav_menu_link_attributes', function( $atts, $item )
{
    if( isset( $item->classes ) )
    {
        $atts['class'] = str_replace( 
            'a-class-',
            '',
            join( 
                ' ', 
                array_filter(
                    $item->classes, 
                    function( $val )
                    {
                        return 'a-class-' === substr( $val, 0, strlen( 'a-class-' ) );
                    } 
                ) 
            )
        );
    }
    return $atts;
}, 10, 2 );