<?php 
require_once( get_template_directory() . '/libs/custom-ajax-auth.php' );

// Options Page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
}
// Custom function by HT
// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/core/';
    
    // return
    return $path;
}

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/core/';
    
    // return
    return $dir;
    
}


// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_true');


// 4. Include ACF
include_once( get_stylesheet_directory() . '/core/acf.php' );
// Include Fontawesome icon
include_once( get_stylesheet_directory() . '/core/fa/acf-font-awesome.php' );
// Include Options for Polylang
include_once( get_stylesheet_directory() . '/core/acf-options-for-polylang.php' );
// translation
include_once( get_stylesheet_directory() . '/core/translation.php' );

// EXPERT
function new_excerpt_more( $more ) {
    return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Xem thêm', 'twentysixteen') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


function tn_custom_excerpt_length( $length ) {
    return 35;
    }
    add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

    function get_excerpt( $count ) {
        $permalink = get_permalink($post->ID);
        $excerpt = get_the_content();
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, $count);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = '<p>'.$excerpt.'...<br/> <a class="readmore" href="'.$permalink.'">Xem thêm</a></p>';
        return $excerpt;
        }

/* Theme Options */
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Cấu hình chung',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
    
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Header Settings',
    //     'menu_title'    => 'Header',
    //     'parent_slug'   => 'theme-general-settings',
    // ));
    
    // acf_add_options_sub_page(array(
    //     'page_title'    => 'Theme Footer Settings',
    //     'menu_title'    => 'Footer',
    //     'parent_slug'   => 'theme-general-settings',
    // ));
    
}
// GET FEATURED IMAGE
/* function ST4_get_featured_image($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
        return $post_thumbnail_img[0];
    }
} */
// ADD NEW COLUMN
function HT_columns_head($defaults) {
    $defaults['featured_image'] = 'Hình ảnh';
    return $defaults;
}


// SHOW THE FEATURED IMAGE
// function HT_columns_content($column_name, $post_ID) {
//     if ($column_name == 'featured_image') {
//     	global $post; 
//         $post_featured_image = ST4_get_featured_image($post_ID);
//         if ($post_featured_image) {
//             // echo '<img  src="'.get_template_directory_uri().'/thumb.php?src='.$post_featured_image.'&w=260&h=180&q=100" style="max-width:100%;height:auto;"/>';
//             echo '<img style="max-width:100%;height:auto;" src="'.$post_featured_image.'" class="img-responsive"/>';
//         }
//         else {
//             // NO FEATURED IMAGE, SHOW THE DEFAULT ONE
//             echo '<img style="max-width:100%;height:auto;" src="'.get_template_directory_uri().'/assets/images/thumbnail-default.jpg" />';
//         }
//     }
// }
// add_filter('manage_posts_columns', 'HT_columns_head');
// add_action('manage_posts_custom_column', 'HT_columns_content', 10, 2);

// CUSTOM POST TYPE SLIDES
function custom_slides() {

    $label = array(
        'name' => _x('Slider', 'post type general name'),
        'singular_name' => _x('Slider', 'post type singular name'),
        'all_items' => __('All Slider'),
        'add_new' => _x('Add Slide', 'Slider'),
        'add_new_item' => __('Add Slide'),
        'edit_item' => __('Edit Slider'),
        'new_item' => __('New Slider'),
        'view_item' => __('View Slider'),
        'search_items' => __('Search in Slider'),
        'not_found' =>  __('No Slider found'),
        'not_found_in_trash' => __('No Slider found in trash'),
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type đăng hình ảnh', //Mô tả của post type
        'supports' => array(
            'title',
            // 'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields'
        ), //Các tính năng được hỗ trợ trong post type
        'taxonomies' => array( 'slides_cat', 'slides_style'), //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => false, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => fasle, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-feedback', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );

    register_post_type( 'slides' , $args ); 
}

add_action( 'init', 'custom_slides' );

// DANH MỤC hình ảnh
function slide_category() {


    $labels = array(
        'name' => 'Slider Category',
        'singular' => 'Slider Category',
        'menu_name' => 'Slider Category',
        'add_new_item'=>'Add Slider Category',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );

    register_taxonomy('slides_cat', 'slides_cat', $args);

}
// Hook into the 'init' action
add_action( 'init', 'slide_category', 0 );

// SLIDER STYLE
function slide_style() {

    $labels = array(
        'name' => 'Slider Style',
        'singular' => 'Slider Style',
        'menu_name' => 'Slider Style',
        'add_new_item'=>'Add Slider Style',
    );

    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );

    register_taxonomy('slides_style', 'slides_style', $args);

}
// Hook into the 'init' action
add_action( 'init', 'slide_style', 0 );


// Danh sách đại lý đăng ký
function custom_agency() {

    $label = array(
        'name' => _x('Danh sách đại lý', 'Danh sách đại lý'),
        'singular_name' => _x('agency', 'post type singular name'),
        'all_items' => __('Tất cả đại lý'),
        'add_new' => _x('Thêm đại lý', 'Slider'),
        'add_new_item' => __('Thêm đại lý'),
        'edit_item' => __('Sửa đại lý'),
        'new_item' => __('Thêm đại lý'),
        'view_item' => __('Xem đại lý'),
        'search_items' => __('Tìm kiếm đại lý'),
        'not_found' =>  __('Không tìm thấy đại lý'),
        'not_found_in_trash' => __('Không tìm thấy đại lý trong thùng rác'),
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type danh sách đại lý', //Mô tả của post type
        'supports' => array(
            'title',
            // 'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields'
        ), //Các tính năng được hỗ trợ trong post type
        // 'taxonomies' => array( 'slides_cat', 'slides_style'), 
        //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => false, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => fasle, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-store', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow', // false < WP 4.5, credit @Ewout
          ),
        'map_meta_cap' => true, 
    );

    register_post_type( 'agency' , $args ); 
}

add_action( 'init', 'custom_agency' );

// Đào tạo, hội thảo
function custom_tranning() {

    $label = array(
        'name' => _x('Đào tạo / Hội thảo', 'Đào tạo / Hội thảo'),
        'singular_name' => _x('tranning', 'post type singular name'),
        'all_items' => __('List all item'),
        'add_new' => _x('Add item', 'tranning'),
        'add_new_item' => __('Add item'),
        'edit_item' => __('Edit Item'),
        'new_item' => __('Add item'),
        'view_item' => __('Xem đại lý'),
        'search_items' => __('Tìm kiếm đại lý'),
        'not_found' =>  __('Không tìm thấy đại lý'),
        // 'not_found_in_trash' => __('Không tìm thấy đại lý trong thùng rác'),
        'parent_item_colon' => '',
    );

    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type danh sách đại lý', //Mô tả của post type
        'supports' => array(
            'title',
            // 'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields'
        ), //Các tính năng được hỗ trợ trong post type
        // 'taxonomies' => array( 'slides_cat', 'slides_style'), 
        //Các taxonomy được phép sử dụng để phân loại nội dung
        'hierarchical' => true, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => false, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => fasle, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-store', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post',
        // 'capabilities' => array(
        //     'create_posts' => 'do_not_allow', 
        //   ),
        'map_meta_cap' => true, 
    );

    register_post_type( 'tranning' , $args ); 
}

add_action( 'init', 'custom_tranning' );
// Hook into the 'init' action
// Thumb images
add_theme_support( 'post-thumbnails' );
function get_featured_img($post_id){
$error_img =get_template_directory_uri().'/assets/images/thumbnail-default.jpg';// link hình ảnh nếu ko có ảnh featured
$images = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' ); // lấy link hình ảnh?
if ($images) { // nếu có hình ảnh featured
    return $images[0]; // sẽ trả về giá trị link hình của featured
}else{
    return $error_img; // nếu ko có thì sẽ trả về giá trị hình error
}
}

function the_thumbnail($post_id,$w,$h,$q,$alt){
    echo '<img align="middle" class="img-responsive" src="';
    echo get_template_directory_uri();
    echo '/thumb.php?src='.get_featured_img($post_id).'&amp;w='.$w.'&amp;h='.$h.'&amp;q='.$q.'" alt="'.$alt.'" />';   
}
function my_acf_init() {

    acf_update_setting('google_api_key', 'AIzaSyAAUpI7t-NxnSn-3hZGhE76wB8MJwMR6Eo');
}

add_action('acf/init', 'my_acf_init');

// Cout wiew post
function getPostViews($postID){
 $count_key = 'post_views_count';
 $count = get_post_meta($postID, $count_key, true);
 if($count==''){
     delete_post_meta($postID, $count_key);
     add_post_meta($postID, $count_key, '0');
     return "0 View";
 }
 return $count.' Views';
}
function setPostViews($postID) {
 $count_key = 'post_views_count';
 $count = get_post_meta($postID, $count_key, true);
 if($count==''){
     $count = 0;
     delete_post_meta($postID, $count_key);
     add_post_meta($postID, $count_key, '0');
 }else{
     $count++;
     update_post_meta($postID, $count_key, $count);
 }
}

   //* Clean WordPress header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

 // Delete migrate js core
add_filter( 'wp_default_scripts', 'remove_jquery_migrate' );

function remove_jquery_migrate( &$scripts){
    if(!is_admin()){
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.2.1' );
    }
}

// Kéo dài field nhập địa chỉ


// Thay đổi số ảnh thumbnail
add_filter ( 'woocommerce_product_thumbnails_columns', 'xx_thumb_cols' );
function xx_thumb_cols() {
     return 4; // .last class applied to every 4th thumbnail
 }

// remove URL Comment
 function wpbeginner_remove_comment_url($arg) {
    $arg['url'] = '';
    return $arg;
}
add_filter('comment_form_default_fields', 'wpbeginner_remove_comment_url');

/**
 * Ẩn mã bưu chính
 * Ẩn địa chỉ thứ hai
 * Đổi tên Bang / Hạt thành Tỉnh / Thành
 * Đổi tên Tỉnh / Thành phố thành Quận / Huyện
 * 
 * 
 * @hook woocommerce_checkout_fields
 * @param $fields
 * @return mixed
 */
function tp_custom_checkout_fields( $fields ) {
 // Ẩn mã bưu chính
 unset( $fields['postcode'] );
 unset( $fields['country'] );
 unset( $fields['company'] );
 
 // Ẩn địa chỉ thứ hai
 unset( $fields['city'] );
 unset( $fields['address_2'] );
  //Funset( $fields['first_name'] );
 
 // Đổi tên Bang / Hạt thành Tỉnh / Thành
// $fields['state']['label'] = 'Tỉnh / Thành';
 
 // Đổi tên Tỉnh / Thành phố thành Quận / Huyện
 //$fields['city']['label'] = 'Quận / Huyện';
 
 return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'tp_custom_checkout_fields' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/*add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main-shop"><div class="row">';
}

function my_theme_wrapper_end() {
  echo '</div></section>';
}*/

// Display 20 products per page. Goes in functions.php
//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

/**
 * Change the add to cart text on single product pages
 */
function woo_custom_cart_button_text() {
    return __('thêm giỏ', 'woocommerce');
}
add_filter('single_add_to_cart_text', 'woo_custom_cart_button_text');

/**
 * Change the add to cart text on product archives
 */
function woo_archive_custom_cart_button_text() {
    return __( 'Giỏ thêm', 'woocommerce' );
}
add_filter( 'add_to_cart_text', 'woo_archive_custom_cart_button_text' );

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */
function woo_related_products_limit() {
  global $product;
  
  $args = array(
    'post_type'                     => 'product',
    'no_found_rows'                 => 1,
    'posts_per_page'                => 6,
    'ignore_sticky_posts'   => 1,
    'orderby'               => $orderby,
    'post__in'              => $related,
    'post__not_in'          => array($product->id)
);
  return $args;
}
add_filter( 'woocommerce_related_products_args', 'woo_related_products_limit' );

/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Replace "Free!" by a custom string
 *
 */
function woo_my_custom_free_message() {
    return "Liên hệ";
}

add_filter('woocommerce_free_price_html', 'woo_my_custom_free_message');

/**
 * Custom Add To Cart Messages
 * Add this to your theme functions.php file
 **/
add_filter( 'woocommerce_add_to_cart_message', 'custom_add_to_cart_message' );
function custom_add_to_cart_message() {
    global $woocommerce;
    
        // Output success messages
    if (get_option('woocommerce_cart_redirect_after_add')=='yes') :
     
        $return_to      = get_permalink(woocommerce_get_page_id('shop'));
        
        $message        = sprintf('<a href="%s" class="button">%s</a> %s', $return_to, __('Continue Shopping &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
        
    else :
     
        $message        = sprintf('<a href="%s" class="button">%s</a> %s', get_permalink(woocommerce_get_page_id('cart')), __('View Cart &rarr;', 'woocommerce'), __('Product successfully added to your cart.', 'woocommerce') );
        
    endif;
    
    return $message;
}

// mini-cart
function wif_woocommerce_header_add_to_cart_fragment($fragments) {

    ob_start();

    ?>
    <div class="number bold">
        <?php echo sprintf('%d', WC()->cart->cart_contents_count); ?>
    </div>

    <?php

    $fragments['#minicart .number'] = ob_get_clean();

    return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'wif_woocommerce_header_add_to_cart_fragment');

// Xóa bỏ tiêu đề trang shop

function override_page_title() {
 return false;
}
add_filter('woocommerce_show_page_title', 'override_page_title');

//  Thay đổi số sản phẩn trên 1 page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 16;' ), 20 );

// Thay đổi số sản phẩm trên 1 hàng
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
    function loop_columns() {
        return 4; 
    }
}

// Add Editor MCE
function ilc_mce_buttons($buttons){
    array_push($buttons,
        "backcolor",
        "anchor",
        "hr",
        "sub",
        "sup",
        "fontselect",
        "fontsizeselect",
        "styleselect",
        "cleanup"
    );
    return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");
// Giá => Liên hệ
add_filter('woocommerce_empty_price_html', 'custom_call_for_price');

function custom_call_for_price() {
    return '<button class="btn btn-success btn-contact" type="button">Liên hệ</button>';
}
// Includes Plugin
include_once( get_stylesheet_directory() . '/includes/wp-social-avatar/wp-avatar.php' );
include_once( get_stylesheet_directory() . '/includes/tp-custom-admin/custom-admin.php' );
// 32 đoạn code
function wpb_remove_version() {
    return '';
}
add_filter('the_generator', 'wpb_remove_version');

function wpb_custom_logo() {
    echo '<style type="text/css">
    #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
    background-image: url(' . get_bloginfo('stylesheet_directory') . '/assets/images/logo.png) !important;
    background-position: 0 0;
    color:rgba(0, 0, 0, 0);
}
    #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
background-position: 0 0;
}
</style>';
}
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// add_filter( 'auto_update_plugin', '__return_false' );
// add_filter( 'auto_update_theme', '__return_false' );

remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );

add_action( 'woocommerce_before_add_to_cart_form', 'bbloomer_custom_action', 5 );
 
function bbloomer_custom_action() {
    $quycachsanpham = get_field('quy_cach_san_pham');
    if( $quycachsanpham ) {
        echo '<div class="quycach" ><span class="quy_cach_value">'.$quycachsanpham.'</span> </div>';
    }
}

add_action( 'woocommerce_after_add_to_cart_button', 'bbloomer_custom_action1', 5 );
 
function bbloomer_custom_action1() {
    $value = get_field('link_mua_hang');
    $caption = get_field('caption');
    $target = get_field('_target');
    if($value){
        echo '<div class="link_mua_hang"><a class="btn_muahang" target="'.$target.'" href="'.$value.'">'.$caption.'</a></div>';
        }
}

function product_thumbnail_wrapper() {
    function product_thumbnail_wrapper_html( $html ) {
     ob_start();
     woocommerce_template_loop_add_to_cart();
     $add_to_cart = ob_get_clean();
     $html = '<div class="image-wrapper">' . $html;
     $html.= $add_to_cart.'</div>';
     return $html;
 }
 add_filter( 'post_thumbnail_html', 'product_thumbnail_wrapper_html' );
}
add_action( 'woocommerce_before_shop_loop', 'product_thumbnail_wrapper' );

function caption_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array(
     'id' => ''
 ), $atts));  
    $return = $content;  
    if($content){  
     $return .= '<div class="videoWrapper"><iframe width="560" height="315" src="https://www.youtube.com/embed/'.$id.'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>';
 }
 return $return;  
 }
 add_shortcode( 'youtube', 'caption_shortcode' );

//  add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_display_yith_wishlist_loop', 97 );
 
// function bbloomer_display_yith_wishlist_loop() {
// echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
// }

add_action('acf/save_post', 'my_save_post');

function my_save_post( $post_id ) {
    // try to get first name / last name by "Họ và tên" field =))
    $full_name = get_field('agency_name', $post_id);
    $name_arr = explode(" ", $full_name);

    if (sizeof($name_arr) >= 2) {
        $last_name = $name_arr[0];
        unset($name_arr[0]);
        $first_name = implode(" ", $name_arr);
    } else {
        $name_arr = explode("_", $full_name);
        if (sizeof($name_arr) >= 2) {
            $last_name = $name_arr[0];
            unset($name_arr[0]);
            $first_name = implode(" ", $name_arr);
        } else {
            $last_name = 'Unknown';
            $first_name = $full_name;
        }
    }

    $email = get_field('agency_email', $post_id);
    $phone = get_field('agency_phone', $post_id);
    $website = get_field('website', $post_id);
    $fb_link = get_field('facebook', $post_id);
    $instagram_link = get_field('instagram', $post_id);
    $city = get_field('agency_province', $post_id);
    $district = get_field('agency_district', $post_id);
    $address = get_field('agency_address', $post_id);
    $worked_time = get_field('agency_time_activity', $post_id);
    $other = get_field('khac', $post_id);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // insert a new lead to Zoho
        $crm = new \Zoho\CRM;
        $crm->insertRecord(\Zoho\CRM::MODULE_LEADS, [
            'data' => [
                [
                    "Last_Name" => $last_name,
                    "First_Name" => $first_name,
                    "Email" => $email,
                    "Phone" => $phone,
                    "Website" => $website,
                    "Link_Facebook" => $fb_link,
                    "Link_Instagram" => $instagram_link,
                    "Th_nh_ph" => $city,
                    "Qu_n_Huy_n1" => $district,
                    "Kinh_nghi_m_b_n_h_ng_Online" => $worked_time,
                    "Dia_Chi" => $address,
                    "Khac" => $other
                ]
            ]
        ]);
    }
   
    // bail early if not a contact_form post
    
	// if( get_post_type($post_id) !== 'contact_form' ) {
		
	// 	return;
		
	// }
	
	// if( is_admin() ) {
		
	// 	return;
		
	// }
	
	
	// vars
	$post = get_post( $post_id );
	
    // echo "<pre/>";
    // print_r($post_id);
    // die();
	// get custom fields (field group exists for content_form)
	$name = get_field('name', $post_id);
	$email = get_field('email', $post_id);
	
	
	// email data
	$to = 'hoanganhnh2009@gmail.com';
	$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	$subject = $post->post_title;
	$body = "\r\n" . $post->post_content;
	
	
	// send email
	wp_mail($to, $subject, $body, $headers );
	
}
// ajax
add_action( 'wp_enqueue_scripts', 'devvn_enqueue_UseAjaxInWp' );
function devvn_enqueue_UseAjaxInWp(){
    wp_enqueue_script( 'devvn-ajaxload', esc_url( trailingslashit( get_template_directory_uri() ) . 'js/ajax-loadunits.js' ), array( 'jquery' ), '1.0', true );
    $php_array = array(
        'admin_ajax'      => admin_url( 'admin-ajax.php'),
        'load_post_nonce'   =>  wp_create_nonce('ajax_load_post_nonce'),
    );
    wp_localize_script( 'devvn-ajaxload', 'devvn_array', $php_array );
}

// load province
add_action( 'wp_ajax_loadprovince', 'loadprovince_init' );
add_action( 'wp_ajax_nopriv_loadprovince', 'loadprovince_init' );

function loadprovince_init(){
    global $wpdb;
    $myrows = $wpdb->get_results( "SELECT * FROM sm_tinhthanhpho" );
    // echo "<pre/>";
    // print_r($myrows);
    $website = (isset($_POST['website']))?esc_attr($_POST['website']) : '';
    wp_send_json_success($myrows);
    die();
    
}
// loadprovince_init();

// load district by province id
add_action( 'wp_ajax_loaddistrict', 'loaddistrict_init' );
add_action( 'wp_ajax_nopriv_loaddistrict', 'loaddistrict_init' );

function loaddistrict_init(){
    global $wpdb;
    $id =   (isset($_POST['id']))?esc_attr($_POST['id']) : '';
    $myrows = $wpdb->get_results( "SELECT * FROM sm_quanhuyen WHERE matp=".$id );
    // $website = (isset($_POST['id']))?esc_attr($_POST['id']) : '';
    wp_send_json_success($myrows);
    die();
    
}

function wpse125903_remove_the_first_gallery( $output, $attr )
{
    // Run only once
    remove_filter( current_filter(), __FUNCTION__ );

    // Override the first gallery output        
    return '<!-- gallery 1 was here -->';   // Must be non-empty.
}

// add_filter( 'post_gallery', 'wpse125903_remove_the_first_gallery', 10, 2 );

add_action('admin_menu', 'remove_admin_menus',999); 
add_action('admin_init', 'wpse_136058_remove_menu_pages');

function remove_admin_menus(){
    if (function_exists('remove_menu_page')) { 
        //remove_menu_page( 'plugins.php' );
        //remove_menu_page( 'tools.php' );
        //remove_menu_page('edit-comments.php');
        //remove_menu_page('admin.php?page=wpcf7' );
        //remove_menu_page('admin.php?page=yith_wcwl_panel' );
        //remove_menu_page('admin.php?page=gutenberg' );
        //remove_menu_page('post-new.php?gutenberg-demo' );
        // remove_submenu_page( menu_slug, submenu_slug );
    }
}

function wpse_136058_remove_menu_pages() {
    //remove_menu_page('edit.php?post_type=acf-field-group');
    //remove_menu_page('admin.php?page=yith_wcwl_panel' );
    //remove_menu_page( 'wpcf7' );
}

// add_action( 'admin_init', 'wpse_136058_debug_admin_menu' );

// function wpse_136058_debug_admin_menu() {

//     echo '<pre>' . print_r( $GLOBALS[ 'menu' ], TRUE) . '</pre>';
//     die();
// }

function clean_custom_menus($menu_name) {
	// $menu_name = 'nav-primary'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<div class="menu-top-menu-container">' ."\n";
		$menu_list .= "\t\t\t\t". '<ul id="top-menu-mobile">' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</div>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}

class PhuongOanh_Nav_Walker extends Walker_Nav_Menu
{
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array $args    Additional strings.
     * @return void
     */
	 
    public function start_el( &$output, $item, $depth, $args )
    {
        $output     .= '<li>';
        $attributes  = '';

        ! empty ( $item->attr_title )
            // Avoid redundant titles
            and $item->attr_title !== $item->title
            and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';

        ! empty ( $item->url )
            and $attributes .= ' href="' . esc_attr( $item->url ) .'"';

        $attributes  = trim( $attributes );
        $title       = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = "$args->before<a $attributes>$args->link_before$title</a>"
                        . "$args->link_after$args->after";

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }

    /**
     * @see Walker::start_lvl()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @return void
     */
    public function start_lvl( &$output )
    {
        $output .= '<ul class="sub-menu">';
    }

    /**
     * @see Walker::end_lvl()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @return void
     */
    public function end_lvl( &$output )
    {
        $output .= '</ul>';
    }

    /**
     * @see Walker::end_el()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @return void
     */
    function end_el( &$output )
    {
        $output .= '</li>';
    }
}

function clean_custom_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
 
        //$menu_list  = '<div class="menu-top-menu-container">' ."\n";
        $menu_list .= '<ul id="top-menu-mobile" class="main-nav menu">' ."\n";
 
        $count = 0;
        $submenu = false;
         
        foreach( $menu_items as $menu_item ) {
             
            $link = $menu_item->url;
            $title = $menu_item->title;
             
            if ( !$menu_item->menu_item_parent ) {
                $parent_id = $menu_item->ID;
                 
                $menu_list .= '<li class="item">' ."\n";
                $menu_list .= '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
            }
 
			//Try
            if ( $parent_id == $menu_item->menu_item_parent ) {
 
               if ( !$submenu ) {
                   $submenu = true;
                   $menu_list .= '<ul class="sub-menu">' ."\n";
               }
 
               $menu_list .= '<li class="item">' ."\n";
               $menu_list .= '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
               $menu_list .= '</li>' ."\n";
                 
               if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
					$menu_list .= '</ul>' ."\n";
					$submenu = false;
               }
 
            }
			//End-Try
			
            if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
                $menu_list .= '</li>' ."\n";      
                $submenu = false;
            }
 
            $count++;
        }
        $menu_list.='<li><a href="https://ata-distribution.com/dai-ly" target=_blank><span class="mnText"><img src="https://sanhangnhapkhau.com/wp-content/themes/thanhnh-OSv3/assets/images/icons/daily.png"> Trở thành đại lý ngay bây giờ</span></a></li>';
        $current_user = wp_get_current_user();
        if (is_user_logged_in()) {
            $menu_item_login = '<li><a href="/tai-khoan/" class="woo-login-popup-sc-open" >'.$current_user->user_login.'</a></li><li><a href="'. wp_logout_url( home_url() ).'" >Đăng xuất</a><li>'; 
         } else { 
             get_template_part('ajax', 'auth');       	
            $menu_item_login = '<li><a href="/wp-admin/"><i class="fa fa-user-circle"></i> Đăng nhập</a></li><li><a  href="https://sanhangnhapkhau.com/wp-login.php?action=register"><i class="fa fa-sign-out"></i>Đăng ký</a></li>';
        }
        $menu_list .=$menu_item_login;
        $menu_list .= '</ul>' ."\n";
        //$menu_list .= '</div>' ."\n";
 
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
    echo $menu_list;
}


