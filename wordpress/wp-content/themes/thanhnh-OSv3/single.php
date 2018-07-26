<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57ff457e59182123"></script> 
<!-- <script>
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
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script> -->
<div id="main" class="fw">
	<div class="breadcrumbs fw">
		<div class="m-container">
			<a href="/"><i class="fa fa-home"></i></a>
			<span class="navigation-pipe">/</span>
			<?php
			if ( is_single() ) {
				the_title( '<span class="entry-title">', '</span>' );
			} else {
				the_title( '<span class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></span>' );
			}
			?>
		</div>
	</div>
	<div class="m-container">
		<div id="primary" class="content-area col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<main role="main">
				<div class="fb-like fw">
					<div class="addthis_inline_share_toolbox_6n3s"></div>
				</div>
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', 'single' );

					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) :
						//comments_template();
					//endif;

				the_post_navigation( array(
					'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( ':', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"></span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( ':', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></span>',
					) );

				endwhile; // End of the loop.
				?>

				<div class="fb-comments" xid="<?php the_ID(); ?> data-numposts="20" data-width="100%" data-colorscheme="light" data-version="v2.8"></div>
				<!-- new rel -->
				<!-- <h3 class="TitleReference">Cẩm nang liên quan</h3> -->
				<ul class="ListReference fw">
					<?php
					$args = array( 'numberposts' => '5' );
					$recent_posts = wp_get_recent_posts( $args );
					foreach( $recent_posts as $recent ){
						echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
					}
					wp_reset_query();
					?>
				</ul>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div><!-- .wrap -->
</div>
<?php get_footer();
