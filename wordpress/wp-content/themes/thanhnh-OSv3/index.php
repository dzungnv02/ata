<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>
<!-- Index -->
<section>
	<!-- <div class="QuangCao QuangCao1  adv_left" id="QuangCao">
		<div class="overlay" style="cursor:pointer;"> </div>
		<div class="w100 fl GalleryDetailW100H100">
			<div class="GalleryBox">
				<div class="GalleryBoxContent" id="GalleryBoxContent">

					<div class="item">
						<?php 
						$post = @get_post('267');
						echo get_the_post_thumbnail($post, 'full', array( 'class' => 'img-responsive' ));
						?>
					</div>

				</div>         
				<a class="btclose"></a>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('.QuangCao .GalleryBox .btclose').click(function (event) {
            //hiden("left");
            $('.QuangCao').fadeOut();
            event.stopPropagation();
        });
		$('.QuangCao').click(function (event) {
			$(this).fadeOut();
			event.stopPropagation();
		});
		$('.QuangCao .GalleryBox').click(function (event) {
			event.stopPropagation();
		});
	</script> -->
	<!-- #Adv -->
	<div class="w100 fl Default woocommerce" id="Default">
		<div class="main-section">
			<div class="m-container">
				<div class="body-new-wrapper fw">
					<div class="fw banner">
						<div class="w100 fl BannerSlider owl-carousel owl-theme owl-center owl-loaded">
							<?php 

							$term = get_field('slider_home','option');
							
							// var_dump($term);
							// die();
							wp_reset_query();
							$args = array('post_type' => 'slides',
								'tax_query' => array(
									array(
										'taxonomy' => 'slides_cat',
										'field' => 'id',
										'terms' => $term,
									),
								),
							);
							$loop = new WP_Query($args);
							if($loop->have_posts()) {
								while($loop->have_posts()) : $loop->the_post();
									global $post; 
									$thumbnail_URL = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
									?>
									<a href="<?php echo get_post_meta( $post->ID, 'link', true ); ?>" class="itemBanner">
										<img class="img-editor img-responsive" alt="<?php the_title(); ?>" border="0" src="<?php echo $thumbnail_URL; ?>"/>
									</a>	
									<?php
								endwhile;
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="m-container">
			<div id="box_dangkm_home" class="fw">
				<div class="title_box">
					<div class="main_box">
						<a>Sản phẩm mới nhất</a>
					</div>
				</div>
				<div class="content_box fw">
					<div class="list-item products list-item-new fw owl-carousel owl-center">

						<?php
						$meta_query   = WC()->query->get_meta_query();
						// $meta_query[] =  array(
						// 	'key' => '_sale_price',
						// 	'value' => 0,
						// 	'compare' => '>',
						// 	'type' => 'NUMERIC'
						// );
						$meta_query[] = array(
							'key'   => '_featured',
							'value' => 'yes'
						);
						$args = array( 
							'post_status' => 'publish',
							'post_type' => 'product', 
							'stock'       =>  1,
							// 'product_cat' => 'be-an',
							//'showposts'   =>  6,
							'orderby'     =>  'date',
							'order'       =>  'DESC',
							//'posts_per_page' => 6,
							//'orderby' => 'DESC',
							'meta_query'  =>  $meta_query
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

						<div class="item product col-item-5 col-md-3 col-sm-3 col-xs-6">
							<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"  class="item-sale">
								
								<div class="image-wrapper">
									<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_thumbnail'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" class="img-responsive" />'; ?>
										<?php woocommerce_template_loop_add_to_cart(); ?>
								</div>
								<h3 class="title_sale"><?php the_title(); ?></h3>
								<div class="giasau"><?php echo $product->get_price_html(); ?></div>
								<div class="giatruoc"></div><?php woocommerce_show_product_loop_sale_flash();  ?>
							</a>
						</div>
						<?php
					endwhile; 
					?>
						<?php wp_reset_query(); ?>
					</div>
				</div>
			</div>
			<?php 
		$theme = array('theme-be-an','theme-be-mac','theme-be-tam','theme-be-ve-sinh','theme-thoi-trang-me','theme-thuc-pham-me','theme-my-pham-me','theme-do-choi');
		$meta_query = array(
			array(
				'key'     => 'is_home',
				'value'   => 0,
				'compare' => '=',
				// 'type'    => 'BINARY',
			),
		);
		$argss = array(
			'hide_empty' => false,
			'parent' => 0, 
			'orderby' => 'term_id',
			'order' => 'ASC',
			'meta_query'=>$meta_query
			// 'meta_key' => 'is_home',
			// 'meta_value' => 0
		// 	'meta_query' => array(
		// 		array(
		// 		   'key'       => 'is_home',
		// 		   'value'     => false,
		// 		   'compare'   => '='
		// 		)
		//    )
		);
		// $terms = get_terms('product_cat',$argss);
		// $terms = array(44,43,35,41,37);
		
		$arrID = array(44);
		$i =0;
		// foreach ($terms as $cid) { ?>
<?php if( have_rows('position_category', 'option') ): ?>
<?php while( have_rows('position_category', 'option') ): the_row(); ?>
	<?php $pos = get_sub_field('category_selected'); ?>

			<?php
				//  $term_item = get_term_by('id', $cid, 'product_cat');
				$cid = $pos->term_id;
				$slug = $pos->slug;
			?>
<div id="category_3" class="homepage-category homepage-category-small <?php echo $theme[$i];$i++;?> fw">
				<ul class="subcategories-list">
					<li class="category-item">
						<?php 
						// $id = 44;
						// $slug = 'thuoc-bo';
						if( $term = get_term_by( 'id', $cid, 'product_cat' ) ){
							$tthumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
							$t_image = wp_get_attachment_url( $tthumbnail_id );
							?>
							<h2>

								<a href="<?php echo get_term_link( $term->slug, $term->taxonomy ); ?>" title="<?php echo $term->slug ?>">		
									<div class="category-item-title">
										<span>&nbsp;<?php echo $term->name; ?></span>
									</div>
								</a>
							</h2>
							<?php 
						}
						?>
					</li>
					<?php $wcatTerms = get_terms('product_cat', array('hide_empty' => 0, 'orderby' => 'DESC', 'parent' => $id, )); 
					foreach($wcatTerms as $wcatTerm) : 
						$wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
						$wimage = wp_get_attachment_url( $wthumbnail_id );
						?>
						<li class="subcategory-item">
							<a href="<?php echo get_term_link( $wcatTerm->slug, $wcatTerm->taxonomy ); ?>" title="<?php echo $wcatTerm->slug ?>">
								<!-- <div class="subcategory-item-thumbnail">
									<?php if($wimage!=""): ?>
										<img class="lazy" src="<?php echo $wimage?>" width="50" height="50">
									<?php endif;?>
								</div> -->
								<div class="subcategory-item-title"><?php echo $wcatTerm->name; ?></div>
							</a>
						</li>
						<?php
					endforeach; 
					?> 
					<li class="read_more_product">
						<a href="<?php echo get_term_link($slug, 'product_cat');?>">Xem tất cả >></a>
					</li>
				</ul>
				<div class="ct_category fw">
				<div class="banner_140_left fw" style="min-height: 1px;"> 
					<?php
					$anh_dai_dien = get_field('san_pham','product_cat_'.$cid);
					?>
					<div class="banner_abolute text-center hidden-xs" 
						style="
						background: url(<?=$anh_dai_dien ?>);
						background-repeat: no-repeat;
						background-size: auto;
						min-height: 1px;
						"
						>
						</div>
						<div class="col_700 fw">
							<div class="list-item products fw owl-carousel owl-theme owl-center owl-loaded">
								<?php
								$args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'product_cat' =>$slug, 'orderby' => 'DESC' );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

									<div class="item product col-item-5 col-md-3 col-sm-3 col-xs-6">
										<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"  class="item-sale">
											
											<div class="image-wrapper">
												<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_thumbnail'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" class="img-responsive" />'; ?>
													<?php woocommerce_template_loop_add_to_cart(); ?>
											</div>
											<h3 class="title_sale"><?php the_title(); ?></h3>
											<div class="giasau"><?php echo $product->get_price_html(); ?></div>
											<div class="giatruoc"></div><?php woocommerce_show_product_loop_sale_flash();  ?>
										</a>
									</div>
									<?php
								endwhile; 
								?>
								
							</div> 
						</div>
					</div>
				</div>
			</div>
			<?php //if($cid===44){  ?>
				<?php 

$image = get_sub_field('parallax');
$size = 'full'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

?>	
	<a href="<?php the_sub_field('link_parallax'); ?>" target="<?php the_sub_field('target'); ?>">
			<div style="position:relative;" class="openLink">
				<div style="color:#ddd;text-align:center;
				/*padding:50px 80px;*/
				text-align: justify;">
				<p>&nbsp;</p>
			</div>
		</div>
		<div class="relative fw" >
		<div class="bgimg-3 fw" style="background-image: url(<?=$image['url'] ?>);">
					<div class="caption">
					<span class="border" style="background-color:transparent;font-size:48px;font-weight:bold;color:<?php the_sub_field('background_color'); ?>"><?=$image['title'] ?></span>
					<br/>
					<span class="bg_des" style="color:#fff;padding: 18px;letter-spacing: 5px;font-size: 25px;"><?=$image['description'] ?></span>
					</div>
			<!-- <div class="col-xs-3 col_readmore">
				<a href="#" class="bg_readmore">Xem thêm</a>
			</div> -->

		<!-- <div class="color-overlay" style="background: <?php the_sub_field('background_color'); ?>;opacity:<?php the_sub_field('opacity'); ?>" > -->
		<!-- <h1>pppppp</h1> -->
		</a>
	</div>
		</div>
		<?php wp_reset_query(); ?>
		 <?php }   ?>
			
		 <?php endwhile; ?>
<?php endif; ?>
		
		<?php get_footer();
