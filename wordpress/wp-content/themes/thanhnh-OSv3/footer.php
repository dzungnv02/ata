<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<!--Quảng cáo-->
<!-- <div id="AdvQuangCao" class="w100 fl">
	<?php 	$images = get_field('customer',90);
	if( $images ): ?>
		<div class="lsAdvQuangCao">
			<div id="owl-demophoto" class="m-container">
				<ul>
					<?php foreach( $images as $image ): ?>
						<li class="item">
							<a href="<?php echo $image['url']; ?>"><img src="<?php echo $image['url']; ?>" class="img-editor" alt="<?php echo $image['alt']; ?>" /></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
</div>
<script type="text/javascript">
	$("#AdvQuangCao #owl-demophoto").scrollbox({
		direction: 'h',
		linear: true,
		delay: 0,
		step: 1,
		speed: 20
	});
</script> -->
</div>
</section>
</div>
<footer>
	<div class="hotlinePhaiTrang">
		<a href="tel:<?php the_field('tp_phone', 'option'); ?>"><?php the_field('tp_phone', 'option'); ?></a>
	</div>
	<script>
		// $(document).ready(function(){
		// 	$('[data-toggle="tooltip"]').tooltip();   
		// });
	</script>
	
	<style>
		.counter_right{
			margin: 3px 0px 0px 31px;
			color: white;
		}
	</style>
		
	<div class="list_icon_page_right">
		<div id="goTop" data-toggle="tooltip" data-placement="left" title="Trở về đầu trang">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/backtotop2.png" alt="Back to top">
		</div>
		<a href="/gio-hang/" class="cart" title="Giỏ hàng">
			<div class="toggle_cart" style="margin-bottom: 10px;margin-top: 0px; background-size: 50px 46px;">
				<?php
				global $woocommerce;
				$count = $woocommerce->cart->cart_contents_count;
				if ($count > 0) {
					echo '<span class="counter_right">'.$count.'</span>';
				}
				else{
					echo '<span class="counter_right">0</span>';
				}
				?>
			</div>
		</a>
		
		<a href="/category/tin-tuc/kien-thuc/" class="hidden-xs" data-toggle="tooltip" data-placement="left" title="Kiến thức">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/camnangbb.png" alt="Kiến thức"></a>
		<!--
		<a href="/category/cau-hoi-thuong-gap/" class="hidden-xs" data-toggle="tooltip" data-placement="left" title="Hướng dẫn">
			<img src="[<]?php echo get_template_directory_uri(); ?>/assets/images/icons/aboutbb.png" alt="Hướng dẫn"></a>
		-->
	</div>
		<div class="fw a-footer">
			<div class="m-container">
				<div class="fw">
					<!-- <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12  thongtin">
						<div class="title w100 fl">THÔNG TIN CÔNG TY CỔ PHẦN PHÂN PHỐI ATA</div>
						<div class="w100 fl listMenu">
							<span class="diachi"><b>Địa chỉ cửa hàng:</b> <br><?php the_field('tp_address', 'option'); ?><br></span><a href="tel: <?php the_field('tp_phone', 'option'); ?>"><b>Hotline</b>: <?php the_field('tp_phone', 'option'); ?></a><br><b><a href="mailto:<?php the_field('tp_email', 'option'); ?>">Email</b>:<?php the_field('tp_email', 'option'); ?></a>
						</div>
					</div> -->
					<?php $thongtinata = 112; ?>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 menuChanTrang">
						<div class="title w100 fl">
							<a id="ctl00_captionHuongDan" href="<?php echo get_category_link($thongtinata) ?>" target="_self"><?php echo get_cat_name($thongtinata); ?></a>
						</div>
						<div class="w100 fl listMenu">
							<?php
							$args=array(
								'cat' =>$thongtinata,
								'showposts'=>5,
								'post_type'=>'post',
								'order_by'=>'date',
								'order'=>'ASC'
							);
							$i=0;
							$loop = new wp_query($args);
							if($loop->have_posts()):
								?>
								<?php while ($loop->have_posts()):
									$loop->the_post();
									$i++;	
									global $post; 
									$thumbnail_URL = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
									?>
									<div class="item">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<h3>
												<span class="name">
													<?php the_title(); ?>
												</span>
											</h3>
										</a>
									</div>
								<?php endwhile; endif;?>
							</div>
						</div>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 menuChanTrang">
						<div class="title w100 fl">
							<a id="ctl00_captionHuongDan" href="<?php echo get_category_link('57') ?>" target="_self"><?php echo get_cat_name('57'); ?></a>
						</div>
						<div class="w100 fl listMenu">
							<?php
							$args=array(
								'cat' =>'57',
								'showposts'=>5,
								'post_type'=>'post'
							);
							$i=0;
							$loop = new wp_query($args);
							if($loop->have_posts()):
								?>
								<?php while ($loop->have_posts()):
									$loop->the_post();
									$i++;	
									global $post; 
									$thumbnail_URL = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
									?>
									<div class="item">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<h3>
												<span class="name">
													<?php the_title(); ?>
												</span>
											</h3>
										</a>
									</div>
								<?php endwhile; endif;?>
							</div>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12 menuChanTrang">
							<div class="title fw" style="    margin-bottom: 10px;">
									<?php //the_custom_logo(); ?>
									<img src="<?php the_field('logo_footer', 'option'); ?>" class="img-responsive" />
									
									<?php 
							
// $tp_facebook = get_field('tp_facebook','option');
// echo $tp_facebook;
									?>
							</div>
							<p>Kết nối với chúng tôi</p>
							<div class="fw socials">
							<?php 
							$tp_facebook = get_field('tp_facebook','option');
							$tp_instagram = get_field('tp_instagram','option');
							$tp_youtube = get_field('tp_youtube','option');
							$tp_zalo = get_field('tp_zalo','option');
?>
								<ul>
									<?php if( $tp_facebook ): ?>
									<li>
										<a target="_blank"  href="<?=$tp_facebook?>"><i class="fa fa-facebook fa-2x" title="Facebook"></i></a>
									</li>
									<?php endif; ?>
									<?php if( $tp_instagram ): ?>
									<li>
										<a target="_blank"  href="<?=$tp_instagram ?>"><i class="fa fa-instagram fa-2x" title="Instagram"></i></a>
									</li>
									<?php endif; ?>
									<?php if( $tp_youtube ): ?>
									<li>
										<a target="_blank" href="<?=$tp_youtube ?>"><i class="fa fa-youtube fa-2x" title="Youtube"></i></a>
									</li>
									<?php endif; ?>
									<?php if( $tp_zalo ): ?>
									<li>
										<!--
										<a target="_blank" href="<?=$tp_zalo ?>"><img src="<?php the_field('tp_zalo_icon', 'option'); ?>" style="height:29px;width:auto"/></a>
										-->
										<a target="_blank" href="<?=$tp_zalo ?>"><i class="fa fa-whatsapp fa-2x" title="Zalo"></i></a>
									</li>
									<?php endif; ?>
								</ul>
							</div>
							<style>
								.socials ul li{
									float:left;
									padding-right:25px;
									}
							</style>
						
						</div>
						
					<!-- <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 LikeFace">
						<div class="title fw">
							<a id="ctl00_captionHuongDan" href="#" target="_self">Like để nhận ưu đãi mới nhất</a>
						</div>
						<div class="listMenu fw">
							<iframe src="https://www.facebook.com/plugins/page.php?href=<?php the_field('tp_facebook', 'option'); ?>/&tabs=timeline&width=277&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1080043248778167" width="277" height="130" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
						</div>
					</div> -->
				</div>
			</div>

		</div>
		<div class="footer-bottom fw" >
        <div class="container">
			<div class=" fw text-center">
				<div class="text-align:center">
					<p>
						<img style="max-width:125px;padding-right:20px;margin:0 auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/dathongbao.png" alt="Đã thông báo bộ công thương"> 
						<img style="width:100px;margin:0 auto" src="<?php echo get_template_directory_uri(); ?>/assets/images/ssl.png" alt="Đã thông báo bộ công thương">
					</p>
				</div>
			</div>
            <p><span class="site-name">Copyright ©2018 ATA Distribution .Jsc, All Rights Reserved | Powered by <a href="https://xukico.vn" target=_blank>XUKI Co., Ltd</a></span></p>
			<p>Địa chỉ: <?php the_field('tp_address', 'option'); ?></p>
        </div>
	</div>
	<div id="register_agency" class="ajax-auth register_agency" >
		<div class="fw">
		<h3>Đăng ký làm đại lý? </h3>
		<?php
		// echo do_shortcode('[contact-form-7 id="516" title="Đăng ký đại lý"]');
		?>
		<?php		

		acf_form(array(
			'post_id'		=> 'new_post',
			// 'post_title'	=> true,
			// 'post_content'	=> true,
			'field_groups' => array(641),
			'new_post'		=> array(
				'post_type'		=> 'agency',
				'post_status'	=> 'publish'
			),
			'return'		=> home_url('dang-ky-thanh-cong'),
			'submit_value'	=> 'Đăng ký'
		));
		
		?>
		<hr />
		<!-- <h1>Đăng ký</h1> -->
		<p class="status"></p>
		<a class="close" href="">(Đóng)</a>    
		</div>
</div>
	</footer>

<!-- 		</div>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="wrap">
		<?php
		//get_template_part( 'template-parts/footer/footer', 'widgets' );

		//if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation" role="navigation" aria-label="<?php //_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
				<?php
					//wp_nav_menu( array(
						//'theme_location' => 'social',
						//'menu_class'     => 'social-links-menu',
						//'depth'          => 1,
						//'link_before'    => '<span class="screen-reader-text">',
						//'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
					//) );
				?>
			</nav>
		<?php //endif;

		//get_template_part( 'template-parts/footer/site', 'info' );
		?>
	</div>
</footer>
	</div>
</div> -->

<?php 	$current_user = wp_get_current_user();
	if ( 0 != $current_user->ID ) { ?>
		<?php } else { ?>
			<form id="login" class="ajax-auth" action="login" method="post">
				<div class="fw">
					<h3>Khách hàng mới <a id="pop_signup" href="">Tạo tài khoản</a></h3>
					<hr />
					<h1>Đăng nhập</h1>
					<p class="status"></p>  
					<?php wp_nonce_field('ajax-login-nonce', 'security'); ?>  
					<label for="username">Tài khoản</label>
					<input id="username" type="text" class="required" name="username">
					<label for="password">Mật khẩu</label>
					<input id="password" type="password" class="required" name="password">
					<div class="fw">
						<a id="pop_forgot" class="text-link" href="<?php echo wp_lostpassword_url(); ?>">Quên mật khẩu?</a>
						<input class="submit_button" type="submit" value="Đăng nhập">
					</div>
					
					<div class="fw" style="padding-top: 15px;">
						<?php echo do_shortcode('[nextend_social_login provider="facebook"]') ?>
						<?php echo do_shortcode('[nextend_social_login provider="google"]') ?>
					</div>

					<style>
						div.nsl-container-block{
							max-width:100%;
						}
					</style>

					<a class="close" href="">(Đóng)</a>    
				</div>
			</form>

<form id="register" class="ajax-auth"  action="register" method="post">
<div class="fw">
	<h3>Bạn đã có tài khoản? <a id="pop_login"  href="">Đăng nhập</a></h3>
    <hr />
    <h1>Đăng ký</h1>
    <p class="status"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>         
    <!--<label for="signonname">Tài khoản</label>-->
    <input id="signonname" type="text" name="signonname" class="required" placeholder="Tài khoản">
    <!--<label for="email">Email</label>-->
    <input id="email" type="text" class="required email" name="email" placeholder="Email liên hệ">
    <!--<label for="signonpassword">Mật khẩu</label>-->
    <input id="signonpassword" type="password" class="required" name="signonpassword" placeholder="Mật khẩu">
    <!--<label for="password2">Xác nhận mật khẩu</label>-->
    <input type="password" id="password2" class="required" name="password2" placeholder="Xác nhận mật khẩu">
    <input class="submit_button" type="submit" value="Đăng ký">
    <a class="close" href="">(Đóng)</a>    
	</div>
</form>

<form id="forgot_password" class="ajax-auth" action="forgot_password" method="post">    
<div class="fw">
    <h1>Forgot Password</h1>
    <p class="status"></p>  
    <?php wp_nonce_field('ajax-forgot-nonce', 'forgotsecurity'); ?>  
    <label for="user_login">Tài khoản / Email</label>
    <input id="user_login" type="text" class="required" name="user_login">
     <input class="submit_button" type="submit" value="SUBMIT">
	<a class="close" href="">(Đóng)</a>    
	</div>
</form>

										<?php } ?>
										<script type='text/javascript'>
//<![CDATA[
$(document.body).append('<div id="stuan-loader"></div>');
$(window).on("beforeunload", function() {
    $('#stuan-loader').fadeIn(1000).delay(6000).fadeOut(1000);
});
//]]>
</script>
<script type="text/javascript">
 var images = ['Preloader_2.GIF', 'Preloader_3.GIF', 'Preloader_1.GIF', 'Preloader_8.GIF', 'Preloader_10.GIF', 'Preloader_11.GIF'];
 $('#stuan-loader').css({'background-image': 'url(<?php echo get_template_directory_uri(); ?>/assets/images/Preloader_8.GIF)'});
</script>
<?php wp_footer(); ?>
<!-- <script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",55333]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>  -->

<script type="text/javascript">
var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || 
{widgetcode:"e794b2ba2f5d491f1f09ffb5823703fb7006a33ece8339e761a21ebdbc5f18921baa6b2e7ee5c67d53c187e030d5c1f5", values:{},ready:function(){}};
var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;
s.src="https://salesiq.zoho.com/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);d.write("<div id='zsiqwidget'></div>");
</script>
<!-- facebook chat live -->
<!-- <div class="hisella-messages" style="bottom: -300px; right: -130px;">
	<div class="hisella-messages-outer">
		<div id="hisella-minimize">Facebook chat</div>
		<div
		id="hisella-facebook"
		class="fb-page"
		data-href="https://www.facebook.com/gosmac.vn"
		data-small-header="true"
		data-height="300"
		data-width="250"
		data-tabs="messages"
		data-adapt-container-width="false"
		data-hide-cover="false"
		data-show-facepile="false"
		data-show-posts="true" style="opacity: 0;"></div>
	</div>
</div>
</div>  -->

<script>
	(function ($) {
		$(document).ready(function () {
			$('#hisella-minimize').click(function () {
				if ($('#hisella-facebook').css('opacity') == 0) {
					$('#hisella-facebook').css('opacity', 1);
					$('.hisella-messages').animate({ right: '5px' }).animate({ bottom: '0' });
				}
				else {
					$('.hisella-messages').animate({ bottom: '-300px' }).animate({ right: '-130px' }, 400, function () {
						$('#hisella-facebook').css('opacity', 0)
					});
				}
			})
		});
	})(jQuery);
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '1080043248778167',
			xfbml      : true,
			version    : 'v2.8'
		});
	};
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/vi_VN/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>
