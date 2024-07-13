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

require_once(HANI_THEMEDIR . 'inc/codestar/codestar-framework.php');
require_once(HANI_THEMEDIR . 'inc/hani-settings.php');

require_once HANI_THEMEDIR . 'inc/post-types.php' ;
require_once HANI_THEMEDIR . 'inc/hani-actions.php' ;
require_once HANI_THEMEDIR . 'inc/megamenu/megamenu.php' ;
require_once HANI_THEMEDIR . 'inc/megamenu/mega_menu_custom_walker.php' ;
require_once HANI_THEMEDIR . 'inc/hani-metaboxes.php' ;
require_once HANI_THEMEDIR . 'inc/hani-woocommerce-action.php' ;
require_once HANI_THEMEDIR . 'inc/hani-function.php' ;


require(HANI_THEMEDIR . 'inc/hani-assets.php');


