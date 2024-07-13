<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post;

$prefix = '_hani_';
$sub_title = get_post_meta(get_the_ID(), $prefix . 'product_subtitle' , true);

?>

<div class="title-holder d-flex align-items-center mb-4">
	<i class="fal fa-pen-alt ms-2"></i>

	<div class="d-flex justify-items-center ">
		<span class="title ms-3">نقد و بررسی</span>
		<span><?php echo esc_html($sub_title) ?></span>
	</div>
</div>

<div class="product-desc">
	<?php the_content(); ?>
</div>