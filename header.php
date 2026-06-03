<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php

    /*
    |--------------------------------------------------------------------------
    | Dynamic Header Loader
    |--------------------------------------------------------------------------
    */

    if (is_front_page()) {

        get_template_part(
            'template-parts/headers/header',
            'transparent'
        );

    } elseif (is_singular('tour')) {

        get_template_part(
            'template-parts/headers/header',
            'sticky'
        );

    } else {

        get_template_part(
            'template-parts/headers/header',
            'default'
        );

    }
    ?>