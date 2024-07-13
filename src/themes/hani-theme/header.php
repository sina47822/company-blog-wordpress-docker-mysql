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
</head>
<body <?php body_class(); ?>>
<!----------------------------------------  هدر-------------------------------------------------------->
    <div class="above-header">
        <div class="container">
            <ul class="d-flex justify-content-end align-item-center">
                <li class="pe-2">
                    <a class="link-above-header" href="<?php echo esc_url($hani_telegram) ?>">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                </li>
                <li class="pe-2">
                    <a href="<?php echo esc_url($hani_twitter) ?>">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li class="pe-2">
                    <a href="<?php echo esc_url($hani_instagram) ?>">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li class="pe-2">
                    <a href="<?php echo esc_url($hani_whatsapp) ?>">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </li>
                <li class="pe-2">
                    |
                </li>
                <li class="pe-2">
                    <a href="tel:<?php echo esc_attr($phone_number) ?>">
                        <span> تلفن پشتیبانی : <?php echo esc_attr($phone_number) ?></span>
                    </a>
                </li>
                <li class="pe-2">
                    |
                </li>
                <li class="pe-2">
                    <?php echo get_the_date('l d F Y , H:i:s'); ?>

                </li>
            </ul>
        </div>
    </div>
    <?php if($header_type == 'elementor' ): ?>
        <div>
            <?php
                if ($header){
                    $post = get_post($header);

                    if(get_post_status($header) and get_post_type($header) === 'hani_header'){
                        setup_postdata($header);
                        the_content();
                    }
                }


            wp_reset_postdata();    
            ?>
        </div>


    <?php elseif($header_type == 'default' ): ?>
        <header class="main-header" >
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
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

            <!--------------------------------------   سبد خرید و شماره تماس و حساب کاربری------------------------------------------------>
                    <div class="d-flex align-items-center ">
                        <div class="d-flex align-items-center phone-holder ms-3">
                            <!----------- call-us -------------->
                            <div class="d-flex flex-column">
                                <span class="number"><?php echo esc_attr( $phone_number ) ?></span>
                                <span class="description">با ما در تماس باشید</span>
                            </div>
                            <i class="fal fa-phone-volume me-2"></i>
                        </div>
                        <div class="d-flex align-items-center cart-btn ms-3">
                            <!----------- shopping button -------------->
                            <i class="fal fa-cart-shopping me-2"></i>
                        </div>
                        <?php if ($modal_type == 'modal'):?>
                            <!------------مدال-------------->
                            <?php if(is_user_logged_in()): ?>
                                <a href="<?php echo esc_url( $account_link )?>" class="auth-btn">
                                    <i class="fal fa-user ms-1"></i>
                                    حساب کاربری
                                </a>
                            <?php else :?>
                                <a href="" class="auth-btn hani-modal-opener">
                                    <i class="fal fa-user ms-1"></i>
                                    حساب کاربری
                                </a>
                            <?php endif;?>

                        <?php elseif ($modal_type == 'link'): ?>
                            <!------------لینک-------------->
                            <?php if(is_user_logged_in()): ?>
                                <a href="<?php echo esc_url( $account_link )?>" class="auth-btn">
                                    <i class="fal fa-user ms-1"></i>
                                    حساب کاربری
                                </a>
                            <?php else :?>
                                <a href="<?php echo esc_attr( $auth_btn_link )?>" class="auth-btn">
                                    <i class="fal fa-user ms-1"></i>
                                    <?php echo esc_attr( $auth_btn_text )?>
                                </a>
                            <?php endif;?>
                            

                        <?php endif; ?>
                    </div>



                </div>
                <div>
                        <div class="hani-navigation">
                            <?php wp_nav_menu(
                                [
                                    'theme-location' => 'main-menu',
                                    'walker' =>new hani_mega_menu_walker(),
                                ]
                            ) ?>
                        </div>
                        
                     
                </div>
            </div>
        </header>

    <?php endif; ?>

    <?php get_template_part( 'templates/page-title' ) ?>
