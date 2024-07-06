<?php

defined('ABSPATH') || exit('No access !!!');

add_action('wp_enqueue_scripts', 'hani_enqueue_scripts');
function hani_enqueue_scripts() {

    // Enqueue styles
    wp_enqueue_style('hani-bootstrap-css', HANI_THEMEURL . 'assets/css/bootstrap.min.css');

    wp_enqueue_style('hani-fontawesome-css', HANI_THEMEURL . 'assets/FontAwesome/css/fontawesome.css');
    wp_enqueue_style('hani-brands-css', HANI_THEMEURL . 'assets/FontAwesome/css/brands.css');
    wp_enqueue_style('hani-light-css', HANI_THEMEURL . 'assets/FontAwesome/css/light.css');
    wp_enqueue_style('hani-regular-css', HANI_THEMEURL . 'assets/FontAwesome/css/regular.css');



    // Enqueue scripts
    wp_enqueue_script('hani-popper-js', HANI_THEMEURL . 'assets/js/popper.min.js', null, $theme_ver, true);
    wp_enqueue_script('hani-bootstrap-js', HANI_THEMEURL . 'assets/js/bootstrap.min.js', null, $theme_ver, true);
}