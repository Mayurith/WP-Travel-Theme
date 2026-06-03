<?php
/**
 * Title: WP Travel Theme, Register Sidebars
 * Description: This file contains the functions for registering sidebars for the WP Travel Theme.
 * Slug: wp-travel-theme
 * Author: Mayuri
 * 
 * @package WordPress
 * @subpackage WP Travel Theme
 * @since WP Travel Theme 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'widgets_init', 'wpt_register_sidebars' );

function wpt_register_sidebars() {

    register_sidebar([

        'name'          => __( 'Blog Sidebar', 'custom-tour-theme' ),

        'id'            => 'blog-sidebar',

        'before_widget' => '<div class="widget">',

        'after_widget'  => '</div>',

        'before_title'  => '<h3 class="widget-title">',

        'after_title'   => '</h3>',

    ]);

}

?>