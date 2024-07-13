<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
    return;
}

global $product;

$attachment_ids = $product->get_gallery_image_ids();
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
    'woocommerce_single_product_image_gallery_classes',
    array(
        'woocommerce-product-gallery',
        'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
        'woocommerce-product-gallery--columns-' . absint( $columns ),
        'images',
    )
);
?>
<div class="product-gallery mb-2 hani-product-thumbs">
    <div class="hani-product-meta">
        <ul>
            <li>
                <button class="woosw-btn woosw-btn-<?php echo get_the_ID() ?> woosw-btn-has-icon woosw-btn-icon-only" data-id="<?php echo get_the_ID() ?>">
					<span class="woosw-btn-icon"></span>
                </button>
            </li>
            <li>
                <button class="woosc-btn woosc-btn-<?php echo get_the_ID() ?> woosc-btn-has-icon woosc-btn-icon-only" data-id="<?php echo get_the_ID() ?>">
                    <span class="woosc-btn-icon"></span>
                </button>
            </li>
        </ul>
    </div>
    <a class="item">    
        <img src="<?php echo wp_get_attachment_url( $post_thumbnail_id ); ?>" >
    </a>
</div>
<!---------- product-gallery-slider(js is in footer) --------------->

<div class="product-gallery">    
    <div class="slider2 owl-carousel owl-theme">
        <?php 
        $counter = 0;
        if ( $post_thumbnail_id ) {
            foreach ( $attachment_ids as $attachment_id ) {
        ?>
            <a href="#item<?php echo $counter; ?>" class="item" data-hash="item<?php echo $counter; ?>">    
                <img src="<?php echo wp_get_attachment_url( $attachment_id ); ?>" >
            </a>
        <?php
            $counter++;
            
            } 
            $_SESSION['galleryItems'] = $counter;
        } 


        ?>

        
    </div>
</div>
