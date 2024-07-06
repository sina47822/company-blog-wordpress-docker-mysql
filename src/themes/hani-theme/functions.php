<?php

defined('ABSPATH') || exit('No access !!!');

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

require_once(HANI_THEMEDIR . 'inc/codestar/codestar-framework.php');
require_once(HANI_THEMEDIR . 'inc/hani-settings.php');
require(HANI_THEMEDIR . 'inc/hani-assets.php');


