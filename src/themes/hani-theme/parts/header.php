<?php

$header_type = hani_settings('header-type');
$site_logo_header = hani_settings('logo-image-header');
$site_main_page_title = hani_settings('main-page-title');
$site_main_page_text = hani_settings('main-page-text');
$site_main_page_img = hani_settings('main-page-img');

$auth_select_btn = hani_settings('auth-select-btn');
$auth_text = hani_settings('text');
$auth_link = hani_settings('link');
$account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
$main_color = hani_settings('main-color');

$current_user = wp_get_current_user();
echo $current_user->user_nicename;
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
        <h1>elementor</h1>
    <!-- default header -->

    <?php else: ?>
        <header class="header" id="header">
            <div class="header-top">
                <div class="logo">
                    <a href="<?php echo esc_attr(get_bloginfo('url')) ?>"><img class="logo-img" src="<?php echo esc_url($site_logo_header["url"]) ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>"></a>
                </div>
                <div class="main-menu">
                    <ul>
                    <li><a href="#">درباره من</a></li>
                    <li><a href="#">بلاگ</a></li>
                    <li><a href="#">کتاب</a></li>
                    <li><a href="#">نتایج کار با من</a></li>


                    </ul>
                </div>
                <div class="menu-button">
                    <button class="button-medium round-2 bg-color-light no-border" type="button">همکاری با من</button>
                </div>
            </div>
            <div class="header-middle">
                <div class="search-holder">
                    <form class="d-flex" action="" method="get">
                        <input class="form-control" type="text" placeholder="جستجو...">
                        <button class="button-medium round-2 bg-color-light no-border" type="button"><i class="fal fa-search"></i></button>
                    </form>
                </div>
                <?php if ($auth_select_btn == 'modal') : ?> 
                    <?php if(is_user_logged_in()) : ?>
                        <a href="<?php echo esc_url($account_link) ?>" class="auth-btn">
                        <i class="fa-thin fa-user ms-1"></i>
                        <?php echo $current_user->user_nicename; ?>
                        </a>
                    <?php else : ?>
                        <a href="" class="auth-btn yasan-modal-opener">
                        <i class="fa-thin fa-user ms-1"></i>
                            ورود به حساب کاربری
                        </a>
                    <?php endif ; ?>                  

                <?php else : ?>
                    <?php if(is_user_logged_in()) : ?>
                        <a href="<?php echo esc_url($account_link) ?>" class="auth-btn">
                        <i class="fa-thin fa-user ms-1"></i>
                        <?php echo $current_user->user_nicename; ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url($auth_link) ?> " class="auth-btn">
                        <i class="fa-thin fa-user ms-1"></i>
                        حساب کاربری
                        </a>    
                    <?php endif ; ?>                   
                <?php endif ; ?>
                    
            </div>
        </header>
        
    <?php endif; ?>


