<?php
$footer_type = hani_settings('footer-select');

$account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));

$footer = hani_settings('footer-el');


?>
    
    <?php if($footer_type == 'elementor' ): ?>
        <footer>
            <div>
                <?php
                    if ($footer){
                        $post = get_post($footer);

                        if(get_post_status($footer) and get_post_type($footer) === 'hani_footer'){
                            setup_postdata($footer);
                            the_content();
                        }
                    }


                wp_reset_postdata();    
                ?>
            </div>
        </footer>
    <?php elseif($footer_type == 'default' ): ?>
        <footer class="main-header" >
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
                        <div class="d-flex align-items-center cart-btn ms-3">
                            <!----------- shopping button -------------->
                            <i class="fal fa-cart-shopping me-2"></i>
                        </div>
                    </div>



                </div>
                <div>
                        <div class="hani-navigation">
                            <?php wp_nav_menu(
                                [
                                    'theme-location' => 'footer-menu',
                                    'walker' =>new hani_mega_menu_walker(),
                                ]
                            ) ?>
                        </div>
                        
                     
                </div>
            </div>
        </footer>

    <?php endif; ?>    
    <!-- hani-modal -->
    <div class="hani-modal">
        <div class="body">
            <i class="fal fa-xmark hani-close-modal"></i>

            <div>
                <a href="<?php echo esc_url( home_url( ) )?>">
                    <img style="width : 80px ; height : auto" src="<?php echo esc_url( $logo_website['url'] )?>" alt="<?php echo esc_attr( get_bloginfo( 'name') )?>">
                </a>
                <p class="title desc">ورود به سایت</p>
                <form action="<?php echo esc_url( $account_link )?>" method="post">
                    <div class="mt-2">
                        <input type="text" placeholder="نام کاربری یا ایمیل" class="form-control" name="username">
                    </div>
                    <div class="mt-2">
                        <input type="password" placeholder="رمز ورود" class="form-control" name="password">
                    </div>
                    <div class="mt-2">
                        <?php wp_nonce_field('woocommerce-login')?>
                        <input type="submit" value="ورود به سایت" class="submit" name="login">
                    </div>
                    <div class="mt-2 d-flex justify-content-between">
                        <a href="<?php echo esc_url($wp_lostpassword_utl)?>" class="lost-password">رمز عبور خود را فراموش کرده اید؟</a>
                        <a href="<?php echo esc_url( $account_link )?>" class="sign-up"> عضویت</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php wp_footer(  ); ?>

<!---------- product-gallery-slider-script --------------->
<?php 

// Check if $_SESSION['galleryItems'] is set and less than or equal to 4
if (isset($_SESSION['galleryItems']) && $_SESSION['galleryItems'] <= 4) { 
?>
<script>
        jQuery(document).ready(function ($) {
            $('.slider2').owlCarousel({
                loop: false,
                margin: 10,
                nav: false,
                items: 3,
                dots: false,
                center: false,
                URLhashListener: true
            });
        });
    </script>
<?php 
} else { 
?>
    <script>
        jQuery(document).ready(function ($) {
            $('.slider2').owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 4,
                dots: false,
                center: true,
                URLhashListener: true
            });
        });
    </script>
<?php 
} 
?>

</body>
</html>