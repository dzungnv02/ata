
jQuery(document).ready(function ($) {
// 	$('#top-menu-mobile').append(`<li>
// 	<a id="pop_register_agency" href="/tro-thanh-dai-ly-ngay-bay-gio">
// 		<span class="mnText">Trở thành đại lý ngay bây giờ</span>
// 	</a>
// </li>`);
	// Display form from link inside a popup
	$('#pop_login, #pop_signup').on('click', function (e) {
		formToFadeOut = $('form#register');
		formtoFadeIn = $('form#login');
		if ($(this).attr('id') == 'pop_signup') {
			formToFadeOut = $('form#login');
			formtoFadeIn = $('form#register');
		}
		formToFadeOut.fadeOut(500, function () {
			formtoFadeIn.fadeIn();
		})
		return false;
	});

	// Display lost password form 
	$('.pop_register_agency').click(function (e) {
		e.preventDefault();
		formtoFadeIn = $('#register_agency');
		formtoFadeIn.fadeIn();
		return false;
	});
	$('.pop_register_agency').on('click', function (e) {
		$('body').prepend('<div class="login_overlay"></div>');
		e.preventDefault();
	})

	$('#pop_forgot').click(function () {
		formToFadeOut = $('form#login');
		formtoFadeIn = $('form#forgot_password');
		formToFadeOut.fadeOut(500, function () {
			formtoFadeIn.fadeIn();
		})
		return false;
	});

	// Close popup
	$(document).on('click', '.login_overlay, .close', function () {
		$('form#login, form#register, form#forgot_password,div#register_agency').fadeOut(500, function () {
			$('.login_overlay').remove();
		});
		return false;
	});

	// Show the login/signup popup on click
	$('#show_login, #show_signup').on('click', function (e) {
		$('body').prepend('<div class="login_overlay"></div>');
		if ($(this).attr('id') == 'show_login')
			$('form#login').fadeIn(500);
		else
			$('form#register').fadeIn(500);
		e.preventDefault();
	});

	// Perform AJAX login/register on form submit
	$('form#login, form#register').on('submit', function (e) {
		if (!$(this).valid()) return false;
		$('p.status', this).show().text(ajax_auth_object.loadingmessage);
		action = 'ajaxlogin';
		username = $('form#login #username').val();
		password = $('form#login #password').val();
		email = '';
		security = $('form#login #security').val();
		if ($(this).attr('id') == 'register') {
			action = 'ajaxregister';
			username = $('#signonname').val();
			password = $('#signonpassword').val();
			email = $('#email').val();
			security = $('#signonsecurity').val();
		}
		ctrl = $(this);
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajax_auth_object.ajaxurl,
			data: {
				'action': action,
				'username': username,
				'password': password,
				'email': email,
				'security': security
			},
			success: function (data) {
				$('p.status', ctrl).text(data.message);
				if (data.loggedin == true) {
					document.location.href = ajax_auth_object.redirecturl;
				}
			}
		});
		e.preventDefault();
	});

	// Perform AJAX forget password on form submit
	$('form#forgot_password').on('submit', function (e) {
		if (!$(this).valid()) return false;
		$('p.status', this).show().text(ajax_auth_object.loadingmessage);
		ctrl = $(this);
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: ajax_auth_object.ajaxurl,
			data: {
				'action': 'ajaxforgotpassword',
				'user_login': $('#user_login').val(),
				'security': $('#forgotsecurity').val(),
			},
			success: function (data) {
				$('p.status', ctrl).text(data.message);
			}
		});
		e.preventDefault();
		return false;
	});

	// Client side form validation
	if ($("form#register").length)
		$("form#register").validate(
			{
				rules: {
					password2: {
						equalTo: '#signonpassword'
					}
				}
			}
		);
	else if ($("form#login").length)
		$("form#login").validate();
	else if ($('form#forgot_password').length)
		$('form#forgot_password').validate();
});