<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<section class="content fw">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="box fw">
			<?php 
			global $post; 
			$thumbnail_URL = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			?>
			<div class="listnews">
				<div class="itemnews fw">
					<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
						<div class="post-thumbnail">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo $thumbnail_URL ?>" alt="<?php the_title();  ?>" class="img-responsive"/>
							</a>
						</div><!-- .post-thumbnail -->
					<?php endif; ?>
					<h4>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h4>
					<p><i class="fa fa-calendar"></i> &nbsp;<?php the_time('d, F, Y') ?></p>
					<div class="quotemeta">
					<?php the_excerpt(); ?>
					<?php //echo get_excerpt(250); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="entry-content">
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
				) );
				?>
			</div>

						<!-- <?php if ( is_single() ) : ?>
							<?php twentyseventeen_entry_footer(); ?>
						<?php endif; ?> -->
					</article>
				</section>

