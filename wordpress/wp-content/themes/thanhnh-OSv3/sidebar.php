<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
	<!--<form action="<?php bloginfo('url');?>" method="get">
    <div class="form-group">
        <label for="">Từ khóa</label>
        <input type="text" class="form-control" name="s" placeholder="Nhập từ khóa...">
    </div>
    <div class="form-group">
        <label for="">Danh Mục</label>
        <select name="term" class="form-control" id="vnkings_cat">
        <option value="0">--- Chọn danh mục sản phẩm ---</option>
        <?php
        $vnkings_terms = get_terms('product_cat', 'orderby=name');
        foreach ($vnkings_terms AS $term) :
            echo "<option value='".$term->slug."'".($_GET['publication_categories'] == $term->slug ? ' selected="selected"' : '').">".$term->name."</option>n";
        endforeach;
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Sắp xếp</label>
        <select name="orderby" class="form-control" id="vnkings_cat">
        <option value="menu_order">--- Sắp xếp theo ---</option>
        <option value="popularity">Mức độ phổ biến</option>
        <option value="rating">Điểm đánh giá</option>
        <option value="date">Theo sản phẩm mới</option>
        <option value="price">Giá Thấp đến Cao</option>
        <option value="price-desc">Giá Cao đến Thấp</option>
        </select>
    </div>
    <input type="hidden" name="post_type" value="product">
    <input type="hidden" name="taxonomy" value="product_cat">
    <button type="submit" class="btn btn-default">Tìm kiếm</button>
</form>-->
	<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
</div>

