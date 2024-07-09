<?php

defined('ABSPATH') || exit('No access !!!');

if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  $prefix = 'hani_settings';

  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'تنظیمات قالب هانی',
    'menu_slug'  => 'hani_settings',

  ) );

  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'header',
    'fields' => array(

    array(
        'id'          => 'header-type',
        'type'        => 'select',
        'title'       => 'انتخاب هدر',
        'chosen'      => true,
        'placeholder' => 'Select an header',
        'options'     => array(
            'default'  => 'پیش فرض',
            'elementor'  => 'المنتور',
        ),
        'default'     => 'default'
      ),
        // A text field
    array(
        'id'    => 'main-page-title',
        'type'  => 'text',
        'title' => ' نوشته عکس اصلی',
      ),
    // A textarea field
    array(
        'id'    => 'main-page-text',
        'type'  => 'textarea',
        'title' => ' توضیحات عکس اصلی',
      ),
    array(
        'id'        => 'logo-image-header',
        'type'      => 'media',
        'title'     => 'تصویر لوگو سایت',
        'button_title' => 'upload',
        'remove_title' => 'remove',
        'preview' => 'true',
      ),
    array(
        'id'        => 'main-page-img',
        'type'      => 'media',
        'title'     => 'تصویر اصلی اسلایدر سایت',
      ),
    array(
        'id'          => 'auth-select-btn',
        'type'        => 'select',
        'title'       => 'انتخاب دکمه ورود',
        'placeholder' => 'دکمه ورود به صفحه کاربری را انتخاب کنید',
        'dependency' => array('header-type' , '==' , 'default'),
        'options'     => array(
            'modal'  => 'صفحه باز شونده',
            'link'  => 'لینک سفارشی',
        ),
        'default'     => 'link'
    ),
    array(
        'id'      => 'text',
        'type'    => 'text',
        'title'   => 'نوشته ورود به سایت',
        'dependency' => array('header-type' , '==' , 'default'),
        'dependency' => array('auth-select-btn' , '==' , 'link'),

    ),
    array(
        'id'      => 'link',
        'type'    => 'text',
        'title'   => 'لینک ورود به سایت',
        'dependency' => array('auth-select-btn' , '==' , 'link'),

    ),
    )
  ) );

  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'footer',
    'fields' => array(

    array(
        'id'          => 'footer-type',
        'type'        => 'select',
        'title'       => 'انتخاب فوتر',
        'chosen'      => true,
        'placeholder' => 'Select an option',
        'options'     => array(
            'default'  => 'پیش فرض',
            'elementor'  => 'المنتور',

        ),
        'default'     => 'default'
        ),
      // A textarea field
      array(
        'id'    => 'opt-textarea',
        'type'  => 'textarea',
        'title' => 'نمونه توضیحات',
      ),

    )
  ) );

}

function hani_settings($key = ''){

    $options = get_option('hani_settings');

    return isset($options[$key]) ? $options[$key] : null;
}