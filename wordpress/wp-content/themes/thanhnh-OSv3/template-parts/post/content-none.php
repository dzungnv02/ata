<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h3 class="page-title"><?php _e( 'Không tìm thấy', 'twentyseventeen' ); ?></h3>
	</header>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentyseventeen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php _e( 'Có vẻ như chúng tôi không thể tìm thấy những gì bạn đang tìm kiếm. Tìm kiếm bằng từ khoá có thể giúp ích cho bạn.', 'twentyseventeen' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div>
</section>
