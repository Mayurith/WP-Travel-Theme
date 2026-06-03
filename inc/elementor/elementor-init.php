<?php
/**
 * Elementor Initialization
 *
 * @package WP Travel Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Elementor Theme Support
 */
function wpt_elementor_support()
{
    add_theme_support('elementor');
}

add_action('after_setup_theme', 'wpt_elementor_support');

/**
 * Include Elementor files
 */
require_once __DIR__ . '/categories.php';
require_once __DIR__ . '/widgets.php';

/**
 * Enqueue Elementor Editor Styles
 */
function wpt_elementor_editor_assets()
{

    wp_enqueue_style(
        'wpt-elementor-editor',
        get_template_directory_uri() . '../../assets/css/elementor-editor.css',
        [],
        '1.0.0'
    );

    wp_enqueue_style(
        'wpt-hero-slider',
        get_template_directory_uri() . '/assets/css/app.css',
        [],
        '1.0.0'
    );

}

add_action(
    'elementor/editor/after_enqueue_styles',
    'wpt_elementor_editor_assets'
);

/**
 * Enqueue Hero Slider Assets
 */
function wpt_hero_slider_assets()
{

    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11.0.0'
    );

    wp_enqueue_style(
        'wpt-hero-slider',
        get_template_directory_uri() . '/assets/css/hero-slider.css',
        [],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        [],
        '11.0.0',
        true
    );

    wp_enqueue_script(
        'wpt-hero-slider',
        get_template_directory_uri() . '/assets/js/hero-slider.js',
        ['swiper'],
        wp_get_theme()->get('Version'),
        true
    );
}

add_action('wp_enqueue_scripts', 'wpt_hero_slider_assets');