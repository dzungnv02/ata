// $(document).ready(function(){$('.slider1').slick({slidesToShow:1,slidesToScroll:1,autoplay:true,arrows:false,dots:true});$('.customer').slick({infinite:true,speed:300,slidesToShow:5,slidesToScroll:1,autoplay:true,focusOnSelect:true,responsive:[{breakpoint:1200,settings:{slidesToShow:4,slidesToScroll:1,infinite:true,}},{breakpoint:1024,settings:{slidesToShow:3,slidesToScroll:2,infinite:true,}},{breakpoint:700,settings:{slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{slidesToShow:2,slidesToScroll:2}}]});$('.list-apartment').slick({infinite:true,speed:300,slidesToShow:3,slidesToScroll:1,arrows:false,autoplay:true,focusOnSelect:true,responsive:[{breakpoint:1200,settings:{slidesToShow:3,slidesToScroll:1,infinite:true,}},{breakpoint:1024,settings:{slidesToShow:2,slidesToScroll:1,infinite:true,arrows:false,}},{breakpoint:700,settings:{arrows:false,slidesToShow:1,slidesToScroll:1}},{breakpoint:480,settings:{arrows:false,slidesToShow:1,slidesToScroll:1}}]});$(".product_list_widget").slick({infinite:true,speed:200,slidesToShow:5,slidesToScroll:1,autoplay:true,autoplaySpeed:2000,vertical:true,swipeToSlide:true,arrows:true})});$(function(){$(window).scroll(function(){if($(this).scrollTop()>100)$('#goTop').fadeIn();else $('#goTop').fadeOut();});$('#goTop').click(function(){$('body,html').animate({scrollTop:0},'slow');});});$(document).ready(function(){$('.itemslick').slick({infinite:true,speed:300,slidesToShow:5,slidesToScroll:1,autoplay:true,autoplaySpeed:2000,vertical:true,arrows:false});});$(function(){$('nav#menu').mmenu({"offCanvas":{"position":"right","zposition":"front"}});});$(function(){$(window).scroll(function(){if($(this).scrollTop()>100){$('#wpadminbar').hide();$('#goTop').fadeIn();}else{$('#wpadminbar').show();$('#goTop').fadeOut();}});$('#goTop').click(function(){$('body,html').animate({scrollTop:0},'slow');});});$(document).ready(function(){if($('.ProductHot .SlideProductHot').length){$('.ProductHot .SlideProductHot').owlCarousel({loop:$('.ProductHot .SlideProductHot .item').size()>1?true:false,nav:true,autoplay:500,items:1,center:true,smartSpeed:2000});}});$(document).ready(function(){if($('.ProductSale .SlideProductHot').length){$('.ProductSale .SlideProductHot').owlCarousel({loop:$('.ProductSale .SlideProductHot .item').size()>1?true:false,nav:true,navText:["<",">"],autoplay:500,items:1,center:true,smartSpeed:2000});}});$(document).ready(function(){if($('.BannerSlider').length){$('.BannerSlider').owlCarousel({loop:$('.BannerSlider .itemBanner').size()>1?true:false,nav:true,autoplay:500,center:true,margin:0,items:1,smartSpeed:500,});}});$(document).ready(function(){if($('.MenuProductGroup .NoiDung .list').length){$('.MenuProductGroup .NoiDung .list').owlCarousel({loop:$('.MenuProductGroup .NoiDung .list .item').size()>1?true:false,nav:true,autoplay:500,margin:30,items:5,navText:["<",">"],smartSpeed:2000,responsive:{0:{items:1},375:{items:2},560:{items:3},770:{items:4},1025:{items:5}}});}});$(document).ready(function(){if($('.BannerSliderChild').length){$('.BannerSliderChild').owlCarousel({loop:$('.BannerSliderChild .itemBanner').size()>1?true:false,nav:true,autoplay:500,center:true,margin:0,items:1,smartSpeed:2000});}});$(document).ready(function(){if($('.list-item-new').length){$('.list-item-new').owlCarousel({loop:$('.list-item-new .item').size()>1?true:false,nav:true,autoplay:true,items:6,navText:["<",">"],smartSpeed:2000,responsive:{0:{items:2},375:{items:2},560:{items:3},770:{items:4},1025:{items:5}}});}});$(document).ready(function(){$(".product-categories>li>a").click(function(event){event.preventDefault();$(".product-categories>li>a>.chidren").slideToggle();$('.product-categories').removeClass('down');if(!$(this).next().is(":visible")){$(this).next().slideDown();$(this).next().addClass('hascat');}else{$(this).next().slideUp();$('.product-categories li').removeClass('down');}});});
$(document).ready(function () {
	$('.slider1').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		arrows: false,
		dots: true
	});
	$('.customer').slick({
		infinite: true,
		speed: 300,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		focusOnSelect: true,
		responsive: [{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
			}
		}, {
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 2,
				infinite: true,
			}
		}, {
			breakpoint: 700,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}, {
			breakpoint: 480,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}]
	});
	$('#related1>.product_related').slick({
		infinite: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		autoplay: true,
		focusOnSelect: true,
		responsive: [{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		}, {
			breakpoint: 1024,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: true,
				arrows: false,
			}
		}, {
			breakpoint: 700,
			settings: {
				arrows: false,
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}, {
			breakpoint: 480,
			settings: {
				arrows: false,
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
	});
	$(".product_list_widget").slick({
		infinite: true,
		speed: 200,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		vertical: true,
		swipeToSlide: true,
		arrows: true
	});
	$('.slider-new-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		asNavFor: '.slider-new-nav'
	});
	$('.slider-new-nav').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		swipeToSlide: true,
		vertical: true,
		asNavFor: '.slider-new-for',
		dots: false,
		arrows: false,
		centerMode: true,
		centerPadding: '180px',
		adaptiveHeight: true,
		focusOnSelect: true
	});
	$(".news_list_home").slick({
		infinite: true,
		speed: 200,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		vertical: true,
		swipeToSlide: true,
		arrows: true
	})
	// Load tỉnh thành
	// console.log(devvn_array.admin_ajax);

});
$(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
		else $('#goTop').fadeOut();
	});
	$('#goTop').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 'slow');
	});
});
$(document).ready(function () {
	$('.itemslick').slick({
		infinite: true,
		speed: 300,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		vertical: true,
		arrows: false
	});
});
// $(function () {
// 	$('nav#menu').mmenu({
// 		"offCanvas": {
// 			"position": "right",
// 			"zposition": "front"
// 		}
// 	});
// });
$(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#wpadminbar').hide();
			$('#goTop').fadeIn();
		} else {
			$('#wpadminbar').show();
			$('#goTop').fadeOut();
		}
	});
	$('#goTop').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 'slow');
	});
});
$(document).ready(function () {
	if ($('.ProductHot .SlideProductHot').length) {
		$('.ProductHot .SlideProductHot').owlCarousel({
			loop: $('.ProductHot .SlideProductHot .item').size() > 1 ? true : false,
			nav: true,
			autoplay: 500,
			items: 1,
			center: true,
			smartSpeed: 2000
		});
	}
});
$(document).ready(function () {
	if ($('.ProductSale .SlideProductHot').length) {
		$('.ProductSale .SlideProductHot').owlCarousel({
			// loop: $('.ProductSale .SlideProductHot .item').size() > 1 ? true : false,
			loop: false,
			nav: true,
			navText: ["<", ">"],
			autoplay: 500,
			items: 1,
			center: true,
			smartSpeed: 2000
		});
	}
});
$(document).ready(function () {
	if ($('.BannerSlider').length) {
		$('.BannerSlider').owlCarousel({
			// loop: $('.BannerSlider .itemBanner').size() > 1 ? true : false,
			loop: true,
			nav: true,
			autoplay: 500,
			center: true,
			margin: 0,
			items: 1,
			smartSpeed: 500,
			responsive: {
				770: {
					nav: false,
				},
			}
		});
	}
});
$(document).ready(function () {
	if ($('.MenuProductGroup .NoiDung .list').length) {
		$('.MenuProductGroup .NoiDung .list').owlCarousel({
			loop: $('.MenuProductGroup .NoiDung .list .item').size() > 1 ? true : false,
			nav: true,
			autoplay: 500,
			margin: 30,
			items: 5,
			navText: ["<", ">"],
			smartSpeed: 2000,
			responsive: {
				0: {
					items: 1
				},
				375: {
					items: 2
				},
				560: {
					items: 3
				},
				770: {
					items: 4
				},
				1025: {
					items: 5
				}
			}
		});
	}
});

$(document).ready(function () {
	if ($('.BannerSliderChild').length) {
		$('.BannerSliderChild').owlCarousel({
			loop: $('.BannerSliderChild .itemBanner').size() > 1 ? true : false,
			nav: true,
			autoplay: 500,
			center: true,
			margin: 0,
			items: 1,
			smartSpeed: 2000
		});
	}
});
$(document).ready(function () {
	if ($('.list-item-new').length) {
		$('.list-item-new').owlCarousel({
			// loop: $('.list-item-new .item').size() > 1 ? true : false,
			loop: false,
			nav: true,
			autoplay: false,
			items: 6,
			navText: ["<", ">"],
			smartSpeed: 2000,
			multipleRow: true,
			rows: 2,
			responsive: {
				0: {
					items: 2
				},
				375: {
					items: 2
				},
				560: {
					items: 3
				},
				770: {
					items: 4
				},
				1025: {
					items: 5
				}
			}
		});
	}
});
$(document).ready(function () {
	if ($('.list-new').length) {
		$('.list-new').owlCarousel({
			// loop: $('.list-item-new .item').size() > 1 ? true : false,
			loop: false,
			nav: true,
			autoplay: false,
			items: 6,
			navText: ["<", ">"],
			smartSpeed: 2000,
			multipleRow: true,
			rows: 2,
			responsive: {
				0: {
					items: 2
				},
				375: {
					items: 2
				},
				560: {
					items: 3
				},
				770: {
					items: 4
				},
				1025: {
					items: 4
				}
			}
		});
	}
});
$(document).ready(function () {
	// $(".add_to_cart_button").html("Đặt mua");
	$('.products .image-tools a.add_to_cart_button').html('');
	$(".current-cat>ul").css("display", "block");
	// $(".current-cat").addClass('up');
	$(".product-categories>li").click(function (event) {
		var children = $(this).find('ul');
		children.slideToggle();
		// if (!$(this).next().is(":visible")) {
		//     $(this).next().slideDown();
		//     $(this).next().addClass('hascat');
		// } else {
		//     $(this).next().slideUp();
		//     $('.product-categories li').removeClass('down');
		// }
	});
	
	// Find all YouTube videos
	var $allVideos = $("iframe[src^='//www.youtube.com']"),

		// The element that is fluid width
		$fluidEl = $("body");
	var $googleAPI = $("iframe[src^='https://accounts.google.com']");
	console.log($googleAPI.hide());
	// Figure out and save aspect ratio for each video
	$allVideos.each(function () {

		$(this)
			.data('aspectRatio', this.height / this.width)

			// and remove the hard coded width/height
			.removeAttr('height')
			.removeAttr('width');

	});

	// When the window is resized
	$(window).resize(function () {

		var newWidth = $fluidEl.width();

		// Resize all videos according to their own aspect ratio
		$allVideos.each(function () {

			var $el = $(this);
			$el
				.width(newWidth)
				.height(newWidth * $el.data('aspectRatio'));

		});

		// Kick off one resize to fix all videos on page load
	}).resize();
});

