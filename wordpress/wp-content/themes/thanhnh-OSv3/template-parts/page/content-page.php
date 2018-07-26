<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="breadcrumbs">
		<div class="container">
			<a href="/"><i class="fa fa-home"></i></a>
			<span class="navigation-pipe">/</span>
			<?php
			the_title( '<span class="page-title">', '</span>' );
			?>
			<?php twentyseventeen_edit_link( get_the_ID() ); ?>
		</div>
	</div>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
