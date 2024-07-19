<?php

ob_start(); // Start output buffering
session_start();

$header_type = hani_settings('header-select');
$main_phone = hani_settings('phone-number');
$logo_website = hani_settings('select-logo');
$logo_width_size = hani_settings('logo-width-size');
$modal_type = hani_settings('modal-select');
$auth_btn_text = hani_settings('auth-btn-text');
$auth_btn_link = hani_settings('auth-btn-link');
$phone_number = hani_settings('phone-number');


$account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));

$header = hani_settings('header-el');

$hani_telegram = hani_settings('hani-telegram');
$hani_instagram = hani_settings('hani-instagram');
$hani_whatsapp = hani_settings('hani-whatsapp');
$hani_twitter = hani_settings('hani-twitter');

?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

    <title>Document</title>
</head>
<body <?php body_class()?>>
    <!-- elementor header -->
    <?php if ($header_type == 'elementor'): ?>
        <?php the_content(); ?>
    <!-- default header -->

    <?php else: ?>
        <div class="header">
            <div class="header-front-page">
                <div class="background-color-solid">
                    <div class=" d-flex align-items-center justify-content-between">
                        <!----------- logo -------------->
                        <a href="<?php echo esc_url( home_url( ) )?>">
                            <img style="width : <?php echo esc_attr( $logo_width_size ) ?>px ; height : auto" src="<?php echo esc_url( $logo_website['url'] )?>" alt="<?php echo esc_attr( get_bloginfo( 'name') )?>">
                        </a>
                        <!----------- search -------------->

                        <div class="search-holder position-relative">
                            <form class="d-flex" action="">
                                <input class="form-control hani-search-input" type="text" placeholder="جستجو ...">
                                <button class="header-search-submit" type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <?php endif; ?>


