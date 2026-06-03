<?php
/**
 * Elementor Widgets Registration
 *
 * @package WP Travel Theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Elementor Widgets
 */
function wpt_register_elementor_widgets($widgets_manager)
{

    /**
     * Hero Banner Widget
     */
    require_once __DIR__ . '/widgets/hero-banner-widget.php';

    $widgets_manager->register(
        new \WPT_Hero_Banner_Widget()
    );

    /**
     * Tour Grid Widget
     */
    require_once __DIR__ . '/widgets/tour-grid-widget.php';

    $widgets_manager->register(
        new \WPT_Tour_Grid_Widget()
    );

    /**
     * About Us Widget
     */
    require_once __DIR__ . '/widgets/about-us-widget.php';

    $widgets_manager->register(
        new \WPT_About_Us_Widget()
    );
}

add_action(
    'elementor/widgets/register',
    'wpt_register_elementor_widgets'
);