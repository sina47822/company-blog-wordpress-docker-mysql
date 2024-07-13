<?php
/**
 * Additional Information tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/additional-information.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$prefix = '_hani_';
$sub_title = get_post_meta(get_the_ID(), $prefix . 'product_subtitle' , true);
?>

<div class="title-holder d-flex align-items-center mb-4">
	<i class="fal fa-pen-alt ms-2"></i>

	<div class="d-flex justify-items-center ">
		<span class="title ms-3">مشخصات </span>
		<span><?php echo esc_html($sub_title) ?></span>
	</div>
</div>

<?php do_action( 'woocommerce_product_additional_information', $product ); ?>