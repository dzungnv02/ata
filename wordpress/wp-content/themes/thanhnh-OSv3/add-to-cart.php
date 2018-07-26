	
<?php /* Template Name: Thêm vào giỏ từ trang ngoài */ ?>

<?php 
//  acf_form_head(); 
get_header();
?>
<?php  $productid = get_query_var( 'productid' );  ?>

<h1>Currently Browsing Page <?php echo $productid; ?></h1>
<?php get_footer(); ?>