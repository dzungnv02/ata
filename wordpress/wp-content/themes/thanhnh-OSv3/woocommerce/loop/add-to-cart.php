<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
// echo '<div class="text-center fw">';
// echo apply_filters( 'woocommerce_loop_add_to_cart_link',
// 	sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" id="btn-addcart" class="%s">%s</a>',
// 		esc_url( $product->add_to_cart_url() ),
// 		esc_attr( isset( $quantity ) ? $quantity : 1 ),
// 		esc_attr( $product->id ),
// 		esc_attr( $product->get_sku() ),
// 		esc_attr( isset( $class ) ? $class : 'button' ),
// 		esc_html( $product->add_to_cart_text() )
// 	),
// $product );
// echo '</div>';
// print_r($product->post->post_excerpt);
// die();
$post_excerpt = $product->post->post_excerpt;
$post_excerpt = strip_tags($post_excerpt);
$post_excerpt = substr($post_excerpt, 0, 230);
$post_excerpt = substr($post_excerpt, 0, strripos($post_excerpt, " "));

echo "<div class='post_excerpt'>".$post_excerpt."...</div>";
echo "<div class='image-tools'><object>";									
											
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="quickview button yith-wcqv-button product_type_simple add_to_cart_button ajax_add_to_cart">Thêm giỏ hàng</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->id ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $product->add_to_cart_text() )
	),
$product );
echo do_shortcode( "[yith_wcwl_add_to_wishlist]" )."</object></div>";
// echo "<object><a href='#' class='quickview button yith-wcqv-button' data-product_id='".$product->id."'>Quick View</a></object>
// 										</>";