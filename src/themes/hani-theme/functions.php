<?php

#action Hooks
// <?php
// add_action( 'after_setup_theme', 'theme_slug_setup' );

// function theme_slug_setup() {
// 	add_theme_support( 'wp-block-styles' );
// }
#filter Hooks

define('HANI_THEMEDIR' , get_theme_file_path() . '/');
define('HANI_THEMEURL' , get_theme_file_uri() . '/');

$theme_obj = wp_get_theme(); // change from style.css file in root folder
$theme_ver = $theme_obj->get('Version');


// var_dump(HANI_THEMEDIR);
// var_dump(HANI_THEMEURL); for load css and js and img
// exit;
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
