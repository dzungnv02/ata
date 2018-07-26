<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    global $post, $product;
    if ( ! $product->is_in_stock() ) return;
    $sale_price = get_post_meta( $product->id, '_price', true);
    $regular_price = get_post_meta( $product->id, '_regular_price', true);
    if (empty($regular_price)){ //then this is a variable product
       
        $regular_price = $variation ->regular_price;
        $sale_price = $variation ->sale_price;
    }
    else{
        $sale = ceil(( ($regular_price - $sale_price) / $regular_price ) * 100);
    }
?>
<?php if ( !empty( $regular_price ) && !empty( $sale_price ) && $regular_price > $sale_price ) : ?>
    <?php
        $R=floor((255*$sale)/100);
        $G=floor((255*(100-$sale))/100);
        $bg_style = 'background:none;background-color: rgb(' . $R . ',' . $G . ',0);';
    ?>
    <?php echo
        apply_filters( 'woocommerce_sale_flash', '<span class="onsale" style="'. $bg_style .'">-' . $sale . '%</span>', $post, $product );
    ?>
<?php endif; ?>