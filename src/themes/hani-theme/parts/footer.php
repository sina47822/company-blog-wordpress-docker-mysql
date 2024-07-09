<?php

$footer_type = hani_settings('footer-type');
$site_logo_footer = hani_settings('logo-img-footer');

$account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));

?>

<div>footer</div>


    <div class="yasan-modal">
        <div class="body" id="modal">
            <i class="fal fa-xmark close-yasan-modal"></i>
            <div>
            <a href=" <?php echo esc_url(home_url()) ?>">
            <img src="<?php echo esc_url($logo['url'])?>" alt="<?php echo esc_attr(get_bloginfo('name'))?>" class="logo justify-content-center" width="100px">
            </a>
            <p class="title">
            ورود به سایت
            </p>
            <form action="<?php echo esc_url($account_link) ?>" method="post">
            <div>
                <input type="text" placeholder="نام کاربری یا ایمیل " class="form-control my-3" name="username">
            </div>
            <div>
                <input type="password" placeholder="رمز ورود" class="form-control" name="password">
            </div>
            <div class="d-flex m-2">
                <a href=" <?php echo esc_url(wp_lostpassword_url()) ?>" class="lost-password">
                    فراموشی رمز ورود
                </a>
            </div>
            <div>
                <?php wp_nonce_field( 'woocommerce-login') ?>
                <input type="submit" class="submit mt-3" value="ورود به سایت" name="login">
            </div>
            <div class=" m-2">
                <a href="<?php echo esc_url($account_link) ?>" class="sign-up">
                    عضویت در سایت
                </a>
            </div>
            </form>
            </div>
        </div>

    </div>
<?php wp_footer(); ?>

</body>
</html>