<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<div class="hani-archive-product">
	<div class="container">
		<div class="row">
			<?php
			if ( woocommerce_product_loop() ) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
				
			?>
			<div class="col-12 col-md-3">
				<?php dynamic_sidebar('sidebar-shop') ?>
			</div>
			<div class="col-12 col-md-9">
				<div class="row" >
					<?php
						woocommerce_product_loop_start();
					
						if ( wc_get_loop_prop( 'total' ) ) {
							while ( have_posts() ) {
								the_post();
					
								/**
								 * Hook: woocommerce_shop_loop.
								 */
								do_action( 'woocommerce_shop_loop' );
								?>
								<div class="col-12 col-md-3  mb-4">
									<?php wc_get_template_part( 'content', 'product' ); ?>
								</div>
								<?php
							}
						}
						woocommerce_product_loop_end();
					?>
				</div>

			</div>
			<?php
			/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
				?>
		</div>
		<div class="pagination">
			<?php echo paginate_links([
				'type' => 'list',
				'prev_text' => '<i class="fal fa-angle-right"></i>',
				'next_text' => '<i class="fal fa-angle-left"></i>',
			]) ?>
		</div>
	</div>
</div>

<?php
get_footer( 'shop' );
