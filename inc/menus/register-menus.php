<?php
/**
 * Title: WP Travel Theme, Register Menus
 * Description: This file contains the functions for registering menus for the WP Travel Theme.
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

add_action( 'after_setup_theme', 'wpt_register_menus' );

function wpt_register_menus() {

    register_nav_menus([

        'primary_menu' => __( 'Primary Menu', 'custom-tour-theme' ),

        'mobile_menu'  => __( 'Mobile Menu', 'custom-tour-theme' ),

        'footer_menu'  => __( 'Footer Menu', 'custom-tour-theme' ),

        'topbar_menu'  => __( 'Topbar Menu', 'custom-tour-theme' ),

    ]);

}

?>