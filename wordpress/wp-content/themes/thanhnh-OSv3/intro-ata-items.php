	
<?php /* Template Name: ATA Inc-Items Page */ ?>
<!DOCTYPE html>
<html lang="en" style="margin-top: 0px !important;">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ATA Distribution - Nhà phân phối 4.0 đầu tiên tại Việt Nam</title>
    <?php wp_head();?>
	<script>
         $("link[rel='stylesheet']").remove();
 	</script>
	<meta property="og:image" content="https://sanhangnhapkhau.com/intro-ata/img/fb-page-cover.jpg"/>
	<meta property="og:url" content="https://sanhangnhapkhau.com" />
	<meta property="og:title" content="ATA Distribution - Nhà phân phối 4.0 đầu tiên tại Việt Nam" />
	<meta property="og:description" content="CTCP Phân phối ATA | Thương mại điện tử | Thực phẩm chức năng" />
	<link rel="SHORTCUT ICON" href="https://sanhangnhapkhau.com/intro-ata/img/favico.png"/>
    
    <link rel="stylesheet" href="../intro-ata-template/css/bootstrap.min.css">
    <link rel="stylesheet" href="../intro-ata-template/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../intro-ata-template/css/owl.carousel.css">
    <link rel="stylesheet" href="../intro-ata-template/css/owl.theme.css">
    <link rel="stylesheet" href="../intro-ata-template/css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" href="../intro-ata-template/css/nivo-lightbox/nivo-lightbox-theme.css">
    <link rel="stylesheet" href="../intro-ata-template/css/animate.css">
    <link rel="stylesheet" href="../intro-ata-template/css/style.css">


    <script src="../intro-ata-template/js/modernizr.custom.js"></script>

</head>

<body style="cursor: default; background: #e7e7e7;">
	
								<button id="trigger-overlay" type="button" style="display:none;">
								</button>


                <div class="col-xs-12">
                    <div id="screenshots" class="owl-carousel owl-theme" style="text-align: center;">
						<?php
						$meta_query   = WC()->query->get_meta_query();
						$meta_query[] = array(
							'key'   => '_featured',
							'value' => 'yes'
						);
						$args = array( 
							'post_status' => 'publish',
							'post_type' => 'product', 
							'stock'       =>  1,
							'orderby'     =>  'date',
							'order'       =>  'DESC',
							//'orderby' => 'DESC',
							// 'showposts'   =>  6,
							// 'posts_per_page' => 6,
							'meta_query'  =>  $meta_query
						);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); global $product;
						?>
							<!--<a href="<?php //echo get_permalink( $loop->post->ID ) ?>" target="_blank" class="item wow flipInY animated animated" >-->
							<!--<a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($loop->post->ID)) ?>" title="<?php the_title(); ?>" target="_blank" class="item wow flipInY animated animated" data-lightbox-gallery="screenshots" >-->
								<?php
								if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_thumbnail');
								else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" class="img_res wow animated zoomIn" />';
								?>
							<!--</a>-->
						<?php
						endwhile;
						?>
							
						<?php wp_reset_query(); ?>
                    </div>
                    <div class="customNavigation row">
						<a class="btn prev gallery-nav wow animated bounceInLeft"><i class="fa fa-chevron-left"></i></a>
						<a class="btn next gallery-nav wow animated bounceInRight"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>




    <!-- HHHHHHHHHHHHHHHHHH        Open/Close          HHHHHHHHHHHHHHHH -->
    <div class="overlay overlay-hugeinc">
        <button type="button" class="overlay-close">Close</button>
    </div>
	
    <script src="../intro-ata-template/js/jquery-1.11.2.min.js"></script>
    <script src="../intro-ata-template/js/wow.min.js"></script>
    <script src="../intro-ata-template/js/owl-carousel.js"></script>
    <script src="../intro-ata-template/js/nivo-lightbox.min.js"></script>
    <script src="../intro-ata-template/js/smoothscroll.js"></script>
    <!--<script src="js/jquery.ajaxchimp.min.js"></script>-->
    <script src="../intro-ata-template/js/bootstrap.min.js"></script>
    <script src="../intro-ata-template/js/classie.js"></script>
    <script src="../intro-ata-template/js/script.js"></script>
	
    <script>
        new WOW().init();
    </script>
	
    <script>
        $(document).ready(function(){
            $(".hideit").click(function(){
                $(".overlay").hide();
            });
            $("#trigger-overlay").click(function(){
                $(".overlay").show();
            });
        });
    </script>
	
    <script>
        $(document).ready(function(){

          var kawa = $('.top-bar');
          var back = $('#back-to-top');
          function scroll() {
             if ($(window).scrollTop() > 700) {
                kawa.addClass('fixed');
                back.addClass('show-top');

             } else {
                kawa.removeClass('fixed');
                back.removeClass('show-top');
             }
          }

          document.onscroll = scroll;
        });
    </script>
	
    <!--HHHHHHHHHHHH        Smooth Scrooling     HHHHHHHHHHHHHHHH-->
    <script>
        $(function() {
          $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top
                }, 1000);
                return false;
              }
            }
          });
        });
    </script>
	

	<?php wp_footer(); ?>

	<script>
		document.getElementById("wpadminbar").style.display = "none";
	</script>

</body>
</html>