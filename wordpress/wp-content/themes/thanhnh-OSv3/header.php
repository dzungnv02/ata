<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700" rel="stylesheet">
	<?php acf_form_head(); ?>
	<?php wp_head(); ?>
	<script>
		$(function () {
		$('nav#menu').mmenu({
			"offCanvas": {
				"position": "right",
				"zposition": "front"
			}
		});
	});
	</script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122653742-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-122653742-1');
	</script>

</head>

<body <?php body_class(); ?>>

	<div id="page fw">
	<?php //echo do_shortcode( '[woo-login-popup]' ); ?>
		<header>
			<div class="m-container">
				<div class="header menu-mobile-icon hidden-lg hidden-md hidden-sm">
					<a href="#menu" class="logo-mobile"><img alt="shopmemua.vn" title="shopmemua.vn" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-menu-mobile.png" class="img-responsive"></a>
					<div class="logo"><?php the_custom_logo(); ?></div>
					<a href="/gio-hang/" class="cart cart-mobile">

						<div class="toggle_cart">
							<?php
							global $woocommerce;
							$count = $woocommerce->cart->cart_contents_count;
							if ($count > 0) {
								echo '<span class="counter">'.$count.'</span>';
							}
							else{
								echo '<span class="counter">0</span>';
							}
							?>
						</div>

					</a>
					<div class="wishlist-cart wishlist-mobile">
						<a  href="https://sanhangnhapkhau.com/wishlist" class="cart">
							<div class="toggle_cart">
							<?php $wishlist_count = YITH_WCWL()->count_products(); ?>
								<div class="wishlist_wrapper"><span class="your-counter-selector"><?php echo $wishlist_count; ?></span></div>
							</div>
						</a>
					</div>
					<!-- #end-->
				</div>
				<div class="hidden-lg hidden-md hidden-sm col-xs-12 boxSearch">
					<?php get_product_search_form(); ?>
				</div>
				<div class="main-wrapper fw">
					<div id="header" class="hidden-xs">
						<div class="w100 fl headerTren">
							<div class="row">
								<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 logo">

									<a href="/" target="_self">
										<?php the_custom_logo(); ?>
									</a>
								</div>
								<div class="col-lg-6 col-md-4 col-sm-12 col-xs-12 boxSearch">
									<?php get_product_search_form(); ?>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 cart">
									<div class="mini-cart my-cart">
										<a id="minicart" href="<?php echo WC()->cart->get_cart_url(); ?>" class="cart">
											<div class="toggle_cart">
												<span class="counter">
													<div class="number bold">
														<?php echo sprintf('%d', WC()->cart->cart_contents_count); ?>
													</div>
												</span>
											</div>
											<div>
											</div>
										</a>
										<div id="cartcontents" class="content">
											<div class="block-inner">
												<div class="widget_shopping_cart_content">
													<?php woocommerce_mini_cart(); ?>
												</div>
											</div>
										</div>
									</div>
									<div class="wishlist-cart">
										<a  href="https://sanhangnhapkhau.com/wishlist" class="cart">
											<div class="toggle_cart">
											<?php $wishlist_count = YITH_WCWL()->count_products(); ?>
												<div class="wishlist_wrapper"><span class=”your-counter-selector“><?php echo $wishlist_count; ?></span></div>
											</div>
										</a>
										<?php if( $wishlist_count==0 ): ?>
											<div class="content1">
												<div class="block-inner">
												<div style="    height: 30px;">
												<ul class="cart_list product_list_widget ">
															<li class="empty">Chưa có sản phẩm trong Danh sách yêu thích.</li>
													</ul>
													</div>	
													<!-- <div class="widget_shopping_cart_content"> -->
													<!-- <ul class="cart_list product_list_widget ">
															<li class="empty">Chưa có sản phẩm trong wishlist.</li>
													</ul> -->
													<!-- </div>	 -->
												</div>
											</div>
										<?php endif; ?>									
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 hotline">
									<div class="fw">
										<div class="account fr">
											<!-- <?php
											$current_user = wp_get_current_user();
											if ( 0 == $current_user->ID ) { ?>
												<a href="#" class="xoo-el-login-tgr">Đăng nhập</a> -
												<a href="#woo-login-popup-sc-register" class="xoo-el-reg-tgr">Đăng ký</a>
											<?php } else { ?>
											
											<?php }
											?> -->
											<?php if (is_user_logged_in()) { ?>
												<a href="/tai-khoan/" class="woo-login-popup-sc-open" ><?= $current_user->user_login  ?></a> - 
												<a href="<?php echo wp_logout_url( home_url() ); ?>">Đăng xuất</a> 
											<?php } else { get_template_part('ajax', 'auth'); ?>            	
												<!-- <a class="login_button" id="show_login" href="">Login</a>
												<a class="login_button" id="show_signup" href="">Signup</a> -->
												<a id="show_login" href=""><i class="fa fa-user-circle"></i> Đăng nhập</a>&nbsp; | &nbsp;<a  id="show_signup" href=""><i class="fa fa-sign-out"></i>Đăng ký</a>
											<?php } ?>
											<!-- <a href="#" class="woo-login-popup-sc-open">Đăng nhập</a> -->
										</div>
										<!-- <div class="hotlineHeader fw">
											<a href="<?php the_field('tp_phone', 'option'); ?>">
												<span class="callme">Gọi cho chúng tôi</span> <br/>
												<span class="sdt"><?php the_field('tp_phone', 'option'); ?></span>
												
											</a>
										</div>  -->
									</div>
									<!-- <div class="ProductHot w100 fl">
										<div class="w100 fl SlideProductHot owl-carousel owl-theme owl-center owl-loaded">
											<?php
											$meta_query   = WC()->query->get_meta_query();
											$meta_query[] = array(
												'key'   => '_featured',
												'value' => 'yes'
											);
											$args = array( 
												'post_type' => 'product', 
												'stock'       =>  1,
												'showposts'   =>  6,
												'orderby'     =>  'date',
												'order'       =>  'DESC',
												'posts_per_page' => 6,
												'orderby' => 'DESC',
												'meta_query'  =>  $meta_query
											);
											$loop = new WP_Query( $args );

											while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>


												<div class="item w100 fl">
													<div class="image fl">
														<a class="image" href="#">
															<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_thumbnail'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" class="img-responsive"  style="width: 63px; height: 61px;" />'; ?>
														</a>
														<span class="producthot">
															Hot
														</span>
													</div>
													<div class="NoiDung fl">
														<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"  class="title tensp">
															<?php the_title(); ?>
														</a>
														<div class="price giasp">
															<span class="giacu none"> </span><span class="giamoi"><?php echo $product->get_price_html(); ?></span>
														</div>
													</div>
												</div>				
											<?php endwhile; ?>
											<?php wp_reset_query(); ?>
										</div>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- menu pc -->
				<nav style="display:none" class="mm-right" id="menu">
					<!-- mobile menu sol1 -->
					<?php 
					//	$phuongoanh_walker = new PhuongOanh_Nav_Walker;
					//	wp_nav_menu( array(
					//		'theme_location' => 'top',
					//		'menu_id'        => 'top-menu-mobile',
					//		'walker' => $phuongoanh_walker
					//	) );						
					?>
					<!-- mobile menu sol2 -->
					<?php clean_custom_menu('mobile') ?>
				</nav>
				<style>
					.mm-opened{
						display:block !important;
						}
				</style>
			</div> 
			<div class="menupc fw hidden-xs" role="navigation" data-spy="affix" data-offset-top="197">
				<div class="m-container">
					<div class="col-md-12 col-lg-8 col-sm-12 col-xs-12 l0">
						<nav id="cssmenu">
							<div id="head-mobile"></div>
							<div class="button"></div>
							<?php wp_nav_menu( array(
								'theme_location' => 'top',
								'menu_id'        => 'top-menu',
							));
							?>
						</nav>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-12 hidden-xs r0">
						<ul class="nav navbar-nav navbar-right mnGroup">
							<li></li>
							<li>
								<!--<a id="pop_register_agency" class="pop_register_agency" href="/tro-thanh-dai-ly-ngay-bay-gio">-->
								<a href="https://ata-distribution.com/dai-ly" target=_blank>
									<span class="mnText">Trở thành đại lý ngay bây giờ</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>
					<?php
					global $woocommerce;
// get cart quantity
					$qty = $woocommerce->cart->get_cart_contents_count();
// get cart total
					$total = $woocommerce->cart->get_cart_total();
// get cart url
					$cart_url = $woocommerce->cart->get_cart_url();
// if multiple products in cart
					if($qty>1)
// if single product in cart
						if($qty==1)
//echo '<a href="'.$cart_url.'">1 product | '.$total.'</a>';
							?>
