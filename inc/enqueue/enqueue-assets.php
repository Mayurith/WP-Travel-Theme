<?php
/**
 * Title: WP Travel Theme, Enqueue Assets
 * Description: This file contains the functions for enqueuing assets for the WP Travel Theme.
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

add_action( 'wp_enqueue_scripts', 'wpt_enqueue_assets' );

function wpt_enqueue_assets() {

    wp_enqueue_style(
        'wpt-main-style',
        get_template_directory_uri() . '/dist/assets/css/app.css',
        [],
        filemtime( get_template_directory() . '/dist/assets/css/app.css' )
    );

    wp_enqueue_style( 
        'my-tailwind-styles', 
        get_stylesheet_uri(), 
        array(), 
        // This line forces a refresh by appending a timestamp of when the file changed
        filemtime( get_template_directory() . '/style.css' ) 
    );

    wp_enqueue_style('tailwind', get_template_directory_uri() .'/dist/assets/css/app.css', array(), '1.0.0', 'all');

    wp_enqueue_script(
        'wpt-main-script',
        get_template_directory_uri() . '/dist/assets/js/app.js',
        ['jquery'],
        filemtime( get_template_directory() . '/dist/assets/js/app.js' ),
        true
    );

}



// function my_tailwind_theme_scripts() {
//     wp_enqueue_style( 
//         'my-tailwind-styles', 
//         get_stylesheet_uri(), 
//         array(), 
//         // This line forces a refresh by appending a timestamp of when the file changed
//         filemtime( get_template_directory() . '/style.css' ) 
//     );

//     wp_enqueue_style('tailwind', get_template_directory_uri() .'/dist/assets/css/app.css', array(), '1.0.0', 'all');
    
// }
// add_action( 'wp_enqueue_scripts', 'my_tailwind_theme_scripts' );