	
<?php /* Template Name: Đại lý Register Page */ ?>
<!DOCTYPE html>
<html lang="en" style="margin-top: 0px !important;">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ATA Distribution - Hợp tác với chúng tôi</title>
	<?php acf_form_head(); ?>
	<?php wp_head();?>
	
	<script>
 
        $("link[rel='stylesheet']").remove();
 
	</script>
	
	<meta property="og:image" content="https://sanhangnhapkhau.com/intro-ata-template/img/fb-page-cover.jpg"/>
	<meta property="og:url" content="https://sanhangnhapkhau.com" />
	<meta property="og:title" content="ATA Distribution - Nhà phân phối 4.0 đầu tiên tại Việt Nam" />
	<meta property="og:description" content="CTCP Phân phối ATA | Thương mại điện tử | Thực phẩm chức năng" />
	<link rel="SHORTCUT ICON" href="https://sanhangnhapkhau.com/intro-ata-template/img/favico.png"/>
    
    <link rel="stylesheet" href="../intro-ata-template/css/bootstrap.min.css">
    <link rel="stylesheet" href="../intro-ata-template/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../intro-ata-template/css/owl.carousel.css">
    <link rel="stylesheet" href="../intro-ata-template/css/owl.theme.css">
    <link rel="stylesheet" href="../intro-ata-template/css/nivo-lightbox/nivo-lightbox.css">
    <link rel="stylesheet" href="../intro-ata-template/css/nivo-lightbox/nivo-lightbox-theme.css">
    <link rel="stylesheet" href="../intro-ata-template/css/animate.css">
    <link rel="stylesheet" href="../intro-ata-template/css/style.css">
	
    <link rel="stylesheet" id="acf-global-css" href="https://sanhangnhapkhau.com/wp-content/themes/thanhnh-OSv3/core/assets/css/acf-global.css?ver=5.6.10" type="text/css" media="all">
    <link rel="stylesheet" id="acf-input-css" href="https://sanhangnhapkhau.com/wp-content/themes/thanhnh-OSv3/core/assets/css/acf-input.css?ver=5.6.10" type="text/css" media="all">
    <link rel="stylesheet" id="acf-pro-input-css" href="https://sanhangnhapkhau.com/wp-content/themes/thanhnh-OSv3/core/pro/assets/css/acf-pro-input.css?ver=5.6.10" type="text/css" media="all">
    <link rel="stylesheet" id="select2-css" href="https://sanhangnhapkhau.com/wp-content/themes/thanhnh-OSv3/core/assets/inc/select2/3/select2.css?ver=3.5.2" type="text/css" media="all">
	
    <script src="../intro-ata-template/js/modernizr.custom.js"></script>

</head>

<body style="background: inherit;">

	<?php
	acf_form(array(
		'post_id'		=> 'new_post',
		'field_groups' => array(641),
		'new_post'		=> array(
			'post_type'		=> 'agency',
			'post_status'	=> 'publish'
		),
		'return'		=> home_url('dang-ky-thanh-cong'),
		'submit_value'	=> 'Đăng ký'
	));
	?>
	
	<style>
		#register_agency{
			top: inherit;
			padding-bottom: inherit;
			left: inherit;
			width: inherit;
			position: inherit; 
			top: inherit;
			left: inherit;
			width: inherit;
			margin-left: inherit;
			padding: inherit;
			background-color: inherit;
			margin-top: 30px;
			box-shadow:inherit;
			height:inherit;
			}
		.acf-field-5b3b4188a2f3e,.acf-field-5b3b4174a2f3d{
			display:none !important;
		}
		.acf-field select {
			padding: 2px;
			border: 1px solid #ededed;
		}
		.acf-field {
			margin-right:0px !important;
		}
		.acf-input-wrap input{
			display: block;
			width: 100%;
			height: 34px;
			padding: 6px 12px !important;
			font-size: 14px;
			line-height: 1.42857143;
			color: #555;
			background-color: #fff;
			background-image: none;
			border: 1px solid #ccc;
			border-radius: 0px;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
			-webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
			-o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
			transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
		}
		.acf-input-wrap input:focus {
			border-color: #66afe9;
			outline: 0;
			-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
			box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
		}
		.acf-fields > .acf-field{
			padding: 0px 10px 15px 10px;
			width: 99%;
			border: 0px solid !important;
		}
		.acf-button{    
			width: 170px;
			height: 50px;
			border-radius: 0px;
			color: white;
			background-color: rgb(87, 160, 255) !important;
			padding: 15px 10px;
			margin: 10px 12px;
			border-color: rgb(87, 160, 255) !important;
			margin-bottom: 45px;
			text-transform: uppercase;
			font-weight: 700;
			border:0 !important;
			box-shadow:none !important;
			font-size: 14px;
		}
		.acf-button:hover{
			background-color: rgb(81, 255, 182) !important;
			border-color: rgb(81, 255, 182) !important;
			color: white;
			transition: .8s;
		}
		.acf-field .acf-label label {
			font-size: 13px !important;
		}
	</style>

    <script src="../intro-ata-template/js/jquery-1.11.2.min.js"></script>
    <script src="../intro-ata-template/js/wow.min.js"></script>
    <script src="../intro-ata-template/js/owl-carousel.js"></script>
    <script src="../intro-ata-template/js/nivo-lightbox.min.js"></script>
    <script src="../intro-ata-template/js/smoothscroll.js"></script>
    <!--<script src="js/jquery.ajaxchimp.min.js"></script>-->
    <script src="../intro-ata-template/js/bootstrap.min.js"></script>
    <script src="../intro-ata-template/js/classie.js"></script>
    <script src="../intro-ata-template/js/script.js"></script>
	
	<?php wp_footer(); ?>
	
	<script>
		document.getElementById("wpadminbar").style.display = "none";
	</script>
	
</body>
</html>