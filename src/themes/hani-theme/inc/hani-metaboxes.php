<?php
defined('ABSPATH') || exit('No Access !!!');

add_action( 'cmb2_admin_init', 'hani_metaboxes' );




function hani_metaboxes() {
    
    $prefix ='_hani_';
    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'page_metabox',
        'title'         => 'تنظیمات برگه',
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $cmb->add_field( array(
        'name'       =>'غیر فعال سازی عنوان صفحه',
        'desc'       => 'عنوان صفحه با غیر فعال کردن این گزینه حذف می شود',
        'id'         => $prefix . 'disable_title',
        'type'       => 'checkbox',
        // 'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    $product_box = new_cmb2_box( array(
        'id'            => 'product_metabox',
        'title'         => 'تنظیمات اضافی محصول',
        'object_types'  => array( 'product', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );
    $product_box->add_field(array(
        'name'       =>'هشدار ارسال',
        // 'desc'       => 'شما در این بخش می توانید عنوان لاتین محصول را وارد نمایید',
        'id'         => $prefix . 'product_shipping_alert_text',
        'type'       => 'textarea',
    )   
    );
    $product_box->add_field( array(
        'name'       =>'زیر عنوان',
        // 'desc'       => 'شما در این بخش می توانید عنوان لاتین محصول را وارد نمایید',
        'id'         => $prefix . 'product_subtitle',
        'type'       => 'text',
    ) );
    $product_box->add_field( array(
        'name'       =>'ناشر',
        // 'desc'       => 'شما در این بخش می توانید عنوان لاتین محصول را وارد نمایید',
        'id'         => $prefix . 'product_book_nasher',
        'type'       => 'text',
    ));
    $product_box->add_field(array(
        'name'       =>'نویسنده',
        // 'desc'       => 'شما در این بخش می توانید عنوان لاتین محصول را وارد نمایید',
        'id'         => $prefix . 'product_book_author',
        'type'       => 'text',
    )   
    );
    $product_box->add_field(array(
        'name'       =>'زمان تقریبی مطالعه',
        // 'desc'       => 'شما در این بخش می توانید عنوان لاتین محصول را وارد نمایید',
        'id'         => $prefix . 'product_book_read_time',
        'type'       => 'text',
    )   
    );
    $product_box->add_field(array(
        'name'       =>'تعداد صفحه',
        // 'desc'       => 'شما در این بخش می توانید عنوان لاتین محصول را وارد نمایید',
        'id'         => $prefix . 'product_book_pages',
        'type'       => 'text',
    )   
    );
    $product_box->add_field(array(
        'name'       =>'زبان',
        // 'desc'       => 'شما در این بخش می توانید عنوان لاتین محصول را وارد نمایید',
        'id'         => $prefix . 'product_book_language',
        'type'       => 'text',
    )   
    );
        // URL text field
    $product_box->add_field( array(
        'name' => 'آدرس فیدیبو کتاب',
        'id'   => 'book_fidibo_url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );
    
}