<?php

defined( 'ABSPATH' ) || exit;

add_action('init' , 'hani_woo_single_product');

function hani_woo_single_product() {
    add_action('woocommerce_single_product_summary' , 'hani_products_features', 35); 

}

function hani_products_features(){

    $prefix = '_hani_' ;
    $shipping_alert_text = get_post_meta(get_the_ID(), $prefix . 'product_shipping_alert_text' , true) ;

    global $product;
    ?>
    <div class="product-meta-box">
        <div>
            <?php echo wc_get_product_category_list($product-> get_id() , ',' , '<div class="hani-product-category d-flex align-items-center"><div><i class="fal fa-archive ms-3"></i><span>دسته بندی : </span></div>','</div>') ?>
        </div>
        <div class="product-shipping-alert">
            <i class="fal fa-truck-couch ms-3"></i>
            <span class="title">زمان ارسال : </span>
            <p> <?php echo esc_html($shipping_alert_text) ?></p>
        </div>
    </div>


    <?php
}

add_action( 'woocommerce_before_quantity_input_field' , 'hani_display_quantity_plus');

function hani_display_quantity_plus(){
    echo '<button type="button" class="plus">+</button>';
}

add_action( 'woocommerce_after_quantity_input_field' , 'hani_display_quantity_minus');

function hani_display_quantity_minus(){
    echo '<button type="button" class="minus">-</button>';
}

add_action('wp_footer' , 'cxc_cart_refresh_update_qty', 20);
function cxc_cart_refresh_update_qty(){
    if (is_cart() || (is_cart() && is_checkout())) {
        ?>
        <script>
            jQuery( function( $ ){
                
                let timeout;
                jQuery('.woocommerce').on('change', 'input.qty' , function(){
                    
                    $('.update-cart').attr("disabled", false);

                    if (timeout !== undefined){
                        clearTimeout(timeout);
                    }
                    timeout = setTimeout(function(){
                        jQuery("[name='update_cart']").trigger("click");
                        // trigger cart update
                    }, 500); // 1 second delay, half a second (500) seems comfortable too
                    });
                });
        </script>

        <?php
    }
}