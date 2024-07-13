<?php

defined('ABSPATH') || exit('No Access !!!');

add_action('after_setup_theme' , 'hani_after_setup_theme');
function hani_after_setup_theme() {
    
    
    add_theme_support('title-tag');

    add_theme_support( 'post-thumbnails' );

	add_theme_support( 'woocommerce' );


    register_nav_menus(
        array(
            'main-menu' => 'منوی اصلی',
            'footer-menu' => 'منوی فوتر',
            'top-menu' => 'منوی بالای سایت',
            'mobile-menu' => 'منوی موبایل',
        ));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
}

add_action('wp_head' , 'hani_post_view_count');
function hani_post_view_count(){
	if(is_single()){
		global $post;
		$view_count = get_post_meta($post->ID , '_post_view_count' , true);
		if($view_count == ''){
			add_post_meta( $post->ID , '_post_view_count' , 1 );
		}else{
			$view_count = (int)$view_count + 1 ;
			update_post_meta($post->ID , '_post_view_count' , $view_count);
		}
	}
}

/**
 * blog and shop sidebar.
 */
function hani_widgets_init() {
	register_sidebar( array(
		'name'          => 'سایدبار بلاگ',
		'id'            => 'sidebar-blog',
		'description'   => 'تمامی ویجت هایی که در این بخش قرار دهید در سایدبار کناری بلاگ نمایش داده می شود',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'سایدبار فروشگاه',
		'id'            => 'sidebar-shop',
		'description'   => 'تمامی ویجت هایی که در این بخش قرار دهید در سایدبار کناری فروشگاه نمایش داده می شود',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hani_widgets_init' );
