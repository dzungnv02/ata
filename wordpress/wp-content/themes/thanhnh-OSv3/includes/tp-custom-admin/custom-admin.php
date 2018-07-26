<?php
/**
 * Plugin Name: Customize Admin By HT
 * Plugin URI: http://facebook.com/huu.thanh.2509
 * Description: Tùy biến lại trang quản trị của admin.
 * Version: 1.7.3
 * Author: Hữu Thành
 * Author URI: http://facebook.com/huu.thanh.2509

 * Thay đổi logo trang đăng nhập
 */
 function tp_custom_logo() { ?>
    <style type="text/css">
    #login h1 a {
        background-image: url(<?php echo get_template_directory_uri(); ?>/includes/tp-custom-admin/images/logo.png);
        background-size: 180px 69px;
        width: 180px;
        height: 69px;
    }
    .wp-core-ui .button-primary {
    background: #8dc038;
    border-color: #8dc038;
    box-shadow: 0 1px 0 #8dc038;
    color: #fff;
    text-decoration: none;
    text-shadow: 0 -1px 1px #8dc038, 1px 0 1px #8dc038, 0 1px 1px #8dc038, -1px 0 1px #8dc038;
}
</style>
<?php }
add_action('login_enqueue_scripts','tp_custom_logo');

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'awesome logo';
}
/**
 * Thêm logo vào trang quản trị WordPress
 */

// add_action( 'admin_notices', 'tp_admin_logo' );

/**
 * Sửa chữ dưới footer của trang quản trị
 */
function tp_admin_footer_credits($text){
	$text = 'Copyright © 2018 ATA Distribution .Jsc<br>Powered by <a href="https://xukico.vn" target=_blank>XUKI Co., Ltd</a> - Developed by <a href="https://www.facebook.com/huu.thanh.2509" target=_blank>Nguyễn Hữu Thành</a>';
	return $text;
}
add_filter('admin_footer_text','tp_admin_footer_credits');