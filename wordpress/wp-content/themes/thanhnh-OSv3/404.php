<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
			<div class="m-container">
				<header class="page-header">
					<h3 class="page-title"><?php _e( 'Rất tiếc! Trang này không thể được tìm thấy..', 'twentyseventeen' ); ?></h3>
				</header><!-- .page-header -->
				<div class="page-content">
					<div class="col-md-8 col-lg-8 col-sm-8 col-xs-12">
						<p>
							<?php _e( 'Có vẻ như liên kết bạn cần truy cập không còn tồn tại hoặc đã bị chuyển đi nơi khác. Tìm kiếm bằng từ khoá có thể giúp ích cho bạn.', 'twentyseventeen' ); ?>
						</p>
						<?php get_search_form(); ?>
					</div>
					<div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
						<img style="max-width: 100%;" src="https://sanhangnhapkhau.com/wp-content/uploads/2018/07/404.png">
					</div>
				</div><!-- .page-content -->
			</div>
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
