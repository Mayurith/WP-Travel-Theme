<?php
/**
 * Title: WP Travel Theme functions and definitions
 * Description: This file contains the functions and definitions for the WP Travel Theme.
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

// Theme Version
if ( ! defined( 'WPT_THEME_VERSION' ) ) {
    define( 'WPT_THEME_VERSION', '1.0.0' );
}

// Theme Path
if ( ! defined( 'WPT_THEME_PATH' ) ) {
    define( 'WPT_THEME_PATH', get_template_directory() );
}

// Theme URL
if ( ! defined( 'WPT_THEME_URL' ) ) {
    define( 'WPT _THEME_URL', get_template_directory_uri() );
}

// Include additional files
require_once WPT_THEME_PATH . '/inc/setup/theme-setup.php';
require_once WPT_THEME_PATH . '/inc/menus/register-menus.php';
require_once WPT_THEME_PATH . '/inc/sidebars/register-sidebars.php';
require_once WPT_THEME_PATH . '/inc/enqueue/enqueue-assets.php';
require_once WPT_THEME_PATH . '/inc/seo/seo-init.php';
require_once WPT_THEME_PATH . '/inc/elementor/elementor-init.php';

?>