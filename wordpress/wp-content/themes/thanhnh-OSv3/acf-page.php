	
<?php /* Template Name: form Đăng ký đại lý */ ?>

<?php 
//  acf_form_head(); 
get_header();

?>
<div class="fw">
	<div class="container">
	
	
	<div id="register_agency" class="ajax-auth register_agency" style="display:block !important" >
<div class="fw">
	<h3>Đăng ký làm đại lý? </h3>
	<?php
	// echo do_shortcode('[contact-form-7 id="516" title="Đăng ký đại lý"]');
	?>
	<?php
	

	acf_form(array(
		'post_id'		=> 'new_post',
		// 'post_title'	=> true,
		// 'post_content'	=> true,
		'field_groups' => array(641),
		'new_post'		=> array(
			'post_type'		=> 'agency',
			'post_status'	=> 'publish'
		),
		'return'		=> home_url('dang-ky-thanh-cong'),
		'submit_value'	=> 'Đăng ký'
	));
	
	?>

    <!-- <h1>Đăng ký</h1> -->
	</div>
</div>
</div>
</div>
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
		.acf-field select {
    padding: 2px;
	border: 1px solid #ededed;
	}
		.acf-field {
    margin-right: 11px !important;
}
</style>
<?php get_footer(); ?>