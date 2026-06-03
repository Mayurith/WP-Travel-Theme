<?php
/**
 * Elementor Widget Categories
 *
 * @package WP Travel Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add custom Elementor category
 */
function wpt_add_elementor_widget_categories($elements_manager)
{
    $elements_manager->add_category(
        'wpt-category',
        [
            'title' => __('WPT Widgets', 'wptheme'),
            'icon' => 'fa fa-plug',
        ]
    );
}

add_action(
    'elementor/elements/categories_registered',
    'wpt_add_elementor_widget_categories'
);