<?php
/**
 * Title: WP Travel Theme, Theme setup functions and definitions
 * Description: This file contains the functions and definitions for setting up the WP Travel Theme.
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

add_action( 'after_setup_theme', 'wpt_theme_setup' );

function wpt_theme_setup() {

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'custom-logo' );

    add_theme_support( 'menus' );

    add_theme_support( 'widgets' );

    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ] );

    add_theme_support( 'responsive-embeds' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'align-wide' );

    add_theme_support( 'editor-styles' );

    add_theme_support( 'woocommerce' );

}

?>