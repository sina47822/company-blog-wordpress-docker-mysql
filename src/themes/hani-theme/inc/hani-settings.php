// Check core class for avoid errors
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
    'title'  => 'Tab 1',
    'fields' => array(

      // A text field
      array(
        'id'    => 'opt-text',
        'type'  => 'text',
        'title' => 'نمونه نوشته',
      ),

    )
  ) );

  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Tab 2',
    'fields' => array(

      // A textarea field
      array(
        'id'    => 'opt-textarea',
        'type'  => 'textarea',
        'title' => 'نمونه توضیحات',
      ),

    )
  ) );

}