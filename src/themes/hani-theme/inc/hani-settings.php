<?php

defined('ABSPATH') || exit('No access !!!');


// header posts
$header_posts = get_posts([
    'post_type' => 'hani_header',
    'post_status' => 'publish',
    'numberposts' => -1
  ]);
  
  $headers = array();
  foreach ($header_posts as $post){
    $header_posts[$post->ID] = $post->post_title;
  }
  
  // footer posts
  $footer_posts = get_posts([
    'post_type' => 'hani_footer',
    'post_status' => 'publish',
    'numberposts' => -1,
  
  ]);
  
  $footers = array();
  foreach ($footer_posts as $post){
    $footers[$post->ID] = $post->post_title;
  }

  
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
        'id'          => 'header-select',
        'type'        => 'select',
        'title'       => 'انتخاب نوع هدر',
        'chosen'      => true,
        'placeholder' => 'انتخاب یک هدر',
        'options'     => array(
          'default'  => 'پیش فرض',
          'elementor'  => 'المنتور',
        ),
        'default'     => 'default'
      ),
      array(
        'id'          => 'header-el',
        'type'        => 'select',
        'title'       => 'انتخاب هدر',
        'placeholder' => 'یک هدر انتخاب کنید',
        'options'     => $headers,
        'dependency' => array('header-select' , '==' , 'elementor'),

      ),



      array(
        'id'      => 'select-logo',
        'type'    => 'media',
        'title'   => 'انتخاب لوگو',
        'library' => 'image',
        'dependency' => array('header-select' , '==' , 'default'),

      ),
      array(
        'id'    => 'logo-width-size',
        'type'  => 'text',
        'title' => 'سایز لوگو',
        'default' => '100',
        'dependency' => array('header-select' , '==' , 'default'),

      ),
      array(
        'id'    => 'phone-number',
        'type'  => 'text',
        'title' => 'شماره تماس',
        'dependency' => array('header-select' , '==' , 'default'),

      ),
      array(
        'id'          => 'modal-select',
        'type'        => 'select',
        'title'       => 'انتخاب نوع ورود',
        'chosen'      => true,
        'placeholder' => 'انتخاب دکمه حساب کاربری',
        'options'     => array(
          'link'  => 'لینک',
          'modal'  => 'مدال باز شونده',
        ),
        'default'     => 'modal',
        'dependency' => array('header-select' , '==' , 'default'),

      ),
      array(
        'id'    => 'auth-btn-text',
        'type'  => 'text',
        'title' => 'متن دکمه',
        'dependency' => array('modal-select' , '==' , 'link'),
      ),      
      array(
        'id'    => 'auth-btn-link',
        'type'  => 'text',
        'title' => 'آدرس دکمه',
        'dependency' => array('modal-select' , '==' , 'link'),
      ),

    )
  ) );

  // Creating a Style Section
  CSF::createSection( $prefix, array(
    'title'  => 'استایل',
    'fields' => array(

      array(
        'id'          => 'font-select',
        'type'        => 'select',
        'title'       => 'انتخاب نوع فونت',
        'chosen'      => true,
        'placeholder' => 'یک فونت انتخاب کنید...',
        'options'     => array(
          'iransans'  => 'ایران سنس',
          'iranyekan'  => 'ایران یکان',
        ),
        'default'     => 'iransans'
      ),
      array(
        'id'    => 'theme-main-color',
        'type'  => 'color',
        'title' => 'رنگ اصلی قالب',
        'default' => '#f9d658',
        'output' => array(
            'color' => '.phone-holder .description , .main-page-wrapper .post-details i , .hani-product-price .price, .section-title .title h6, .product-entry .woocommerce-Price-amount',
            'background' => 'a.auth-btn:hover,.owl-theme .owl-dots .owl-dot.active span',
            'background-color' => '.above-header,.top-section,button.header-search-submit , .hani-navigation>div>ul>li>a::after , .share-modal a , .comment-form input.submit,.comment-reply-link , #cancel-comment-reply-link ,.owl-nav button:hover,.post-thumb .date , .product-shipping-alert ,.hani-single-info .single_add_to_cart_button, .quantity-button button , .wc-tabs li.active, .pagination ul li span, .widget ul li a, .search-form .search-submit, .widget_product_search button,.woocommerce-ordering select.orderby, .hani-cart-item .quantity button,.hani-cart-coupon .coupon button',
            'border-bottom-color' => '.hani-navigation .menu>ul>li ul,.hani-navigation ul.menu>li ul , ul.menu li.menu-item-has-children.mega-menu>.sub-menu'

        ),
        'output_important' => true
      ),
      array(
        'id'    => 'theme-second-color',
        'type'  => 'color',
        'title' => 'رنگ مکمل قالب',
        'default' => 'white',
        'output' => array(
            'color' => '.woocommerce-Tabs-panel--reviews input#submit, .pagination ul li span,.widget ul li a,.search-submit, .widget_product_search button,.woocommerce-ordering select.orderby, .quantity-button button ,.hani-cart-item .quantity button,.hani-cart-coupon .coupon button',
            'background' => '',
            'background-color' => '',
            'border-bottom-color' => '',

        ),
        'output_important' => true
      ),
    )
  ) );
  // Create a Footer section
  CSF::createSection( $prefix, array(
    'title'  => 'footer',
    'fields' => array(

        array(
            'id'          => 'footer-select',
            'type'        => 'select',
            'title'       => 'انتخاب نوع فوتر',
            'chosen'      => true,
            'placeholder' => 'انتخاب یک فوتر',
            'options'     => array(
              'default'  => 'پیش فرض',
              'elementor'  => 'المنتور',
            ),
            'default'     => 'default'
          ),
          array(
            'id'          => 'footer-el',
            'type'        => 'select',
            'title'       => 'انتخاب فوتر',
            'placeholder' => 'یک فوتر انتخاب کنید',
            'options'     => $footers,
            'dependency' => array('footer-select' , '==' , 'elementor'),
    
          ),

    )
  ) );
  CSF::createSection( $prefix, array(
    'title'  => 'شبکه های اجتماعی',
    'fields' => array(
  
      array(
        'id'    => 'hani-twitter',
        'type'  => 'text',
        'title' => 'توئیتر',
      ),     
      array(
        'id'    => 'hani-telegram',
        'type'  => 'text',
        'title' => 'تلگرام',
      ),
      array(
        'id'    => 'hani-whatsapp',
        'type'  => 'text',
        'title' => 'واتس اپ',
      ),
      array(
        'id'    => 'hani-instagram',
        'type'  => 'text',
        'title' => 'اینستاگرام',
      ),  
  
  
    )
  ) );

CSF::createSection( $prefix, array(
  'title'  => 'صفحه اصلی',
  'fields' => array(

    array(
      'id'      => 'background-img',
      'type'    => 'media',
      'title'   => 'انتخاب بکگراند',
      'library' => 'image',

    ),
    
  )) );
}
function hani_settings($key = ''){

    $options = get_option('hani_settings');

    return isset($options[$key]) ? $options[$key] : null;
}