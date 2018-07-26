	
<?php /* Template Name: ATA Inc-News Page */ ?>
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

<body style="cursor: default;">

    <!-- HHHHHHHHHHHHHHHHHH        Speciality         HHHHHHHHHHHHHHHH -->
    <div id="speciality" style="padding: 0px 0px 75px 0px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 wow animated fadeInLeft">
                    <div class="special-icon">
                        <i class="fas fa-calendar-check" style="color: red;"></i>
                    </div>
                    <h3>Hội thảo sản phẩm</h3>
<?php 

$meta_query = array(
    array(
		'key'     => 'daotao_hoithao',
		'value'   => 'hoithao',
		'compare' => '=',
    ),
    array(
		'key'     => 'isactive',
		'value'   => '1',
		'compare' => '=',
    ),
    array(     
        'key'     => 'ngay_thuc_hien',
        'value'   => date("n"),  
        'compare' => '>=',        
        'type'    => 'NUMERIC'     
      ) 
);
// WP_Query arguments
$args = array(
	'post_type' => 'tranning',
    'meta_query'=> $meta_query,
    'showposts'   =>  3,
    'orderby'     =>  'date',
    'order'       =>  'DESC',
    // 'posts_per_page' => 6,
);

// The Query
$query = new WP_Query( $args );
// query

// echo "<pre/>";
// print_r($query);
// die();

if( $query->have_posts() ): ?>
        <?php while( $query->have_posts() ) : $query->the_post(); ?>
        <?php $thoi_gian = get_field('thoi_gian'); ?>
			<p>
            <a style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" target="_blank" href="<?php echo get_post_meta( $post->ID, 'link_tham_chieu', true ); ?>">
                <?php the_title(); ?>
                 <?php
                    if($thoi_gian){ ?>
[<?=$thoi_gian; ?>]
                        <?php } ?>
                 
                 
            </a>
			</p>
		<?php endwhile; ?>
<?php endif; ?>

<?php
wp_reset_query();	 // Restore global post data stomped by the_post().
?>
                </div>
                <div class="col-sm-4 animation-box wow bounceIn animated">
                    <div class="special-icon">
                        <i class="fas fa-calendar-alt" style="color: green;"></i>
                    </div>
                    <h3>Đào tạo đại lý</h3>
                    <?php 

$meta_query = array(
	// array(
	// 	'key'     => 'meta_floors',
	// 	'value'   => '100',
	// 	'compare' => '=',
    // ),
    array(
		'key'     => 'daotao_hoithao',
		'value'   => 'daotao',
		'compare' => '=',
    ),
    array(
		'key'     => 'isactive',
		'value'   => '1',
		'compare' => '=',
    ),
    array(     
        'key'     => 'ngay_thuc_hien',
        'value'   => date("n"),  
        'compare' => '>=',        
        'type'    => 'NUMERIC'     
      ) 
);
// WP_Query arguments
$args = array(
	'post_type' => 'tranning',
    'meta_query'=> $meta_query,
    'showposts'   =>  3,
    'orderby'     =>  'date',
    'order'       =>  'DESC',
    // 'posts_per_page' => 6,
);

// The Query
$query = new WP_Query( $args );
// query

// echo "<pre/>";
// print_r($query);
// die();

if( $query->have_posts() ): ?>
        <?php while( $query->have_posts() ) : $query->the_post();
        	global $post; 
        ?>
			<p>
				<a style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;" target="_blank" href="<?php echo get_post_meta( $post->ID, 'link_tham_chieu', true ); ?>"><?php the_title(); ?></a>
			</p>
		<?php endwhile; ?>
<?php endif; ?>

<?php
wp_reset_query();	 // Restore global post data stomped by the_post().
?>
                </div>
                <div class="col-sm-4 wow animated fadeInRight">
                    <div class="special-icon">
                        <i class="fas fa-calendar-check" style="color: blue;"></i>
                    </div>
                    <h3><a style="color: inherit;" href="https://sanhangnhapkhau.com/category/tin-tuc/" target=_blank>Tin tức ATA</a></h3>
                    <p>
                        <?php
						$args=array(
							'showposts'=>3,
                            'post_type'=>'post',
                            'category__not_in' => array(152,153)
						);
						$my_query = new wp_query($args);
						?>

						<?php while ($my_query->have_posts()){
							$my_query->the_post();
							global $post; 
							$thumbnail_URL = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
							?>
							<p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
								<a href="<?php the_permalink(); ?>" target=_blank><?php the_title(); ?></a>
							</p>
							<?php
						}
						?>
                    </p>
                </div>
            </div>
        </div>
    </div> <!-- /#speciality -->
	

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