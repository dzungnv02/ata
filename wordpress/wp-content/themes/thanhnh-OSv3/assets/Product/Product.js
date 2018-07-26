$(document).ready(function () {
    if ($('.ProductHot .SlideProductHot').length) {
        $('.ProductHot .SlideProductHot').owlCarousel({
            loop: $('.ProductHot .SlideProductHot .item').size() > 1 ? true : false,
            nav: true,
            // autoplay: 50000,
            items: 1,
            center: true,
            smartSpeed: 2000
        });
    }
});
$(document).ready(function () {
    if ($('.BannerSlider').length) {
        $('.BannerSlider').owlCarousel({
            loop: $('.BannerSlider .itemBanner').size() > 1 ? true : false,
            nav: true,
            autoplay: 500,
            center:true,
            margin: 0,
            items: 1,
            smartSpeed: 2000,
        });
    }
});
$(document).ready(function() {
    $('#IdListDoiTac img').addClass('img-responsive').addClass('center-block');
    if ($('#IdListDoiTac').length) {
        $('#IdListDoiTac').owlCarousel({               
            loop: $('#IdListDoiTac .item').size() > 1 ? true : false,
            nav: false,
            autoplay: 500,
            margin: 25,
            items: 5,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 3
                }
                ,
                375: {
                    items: 4
                },
                560: {
                    items: 5
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
                }
                ,
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
    $('.ProductRef .item img').addClass('img-responsive').addClass('center-block');

    if ($('.ProductRef .list').length) {
        $('.ProductRef .list').owlCarousel({
            loop: $('.ProductRef .list .item').size() > 1 ? true : false,
            nav: false,
            autoplay: 500,
            margin: 25,
            items: 4,
            smartSpeed: 2000,
            responsive: {
                0: {
                    items: 1
                }
                ,
                375: {
                    items: 2
                },
                560: {
                    items: 2
                },
                770: {
                    items: 3
                },
                1025: {
                    items: 4
                }
            }
        });
    }
});