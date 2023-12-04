
$(document).ready(function() {

    $(window).on('scroll', function() {
        let scrollTop = $(this).scrollTop();

        if(scrollTop > 100) {
            $('.back-to-top').addClass('active');
        } else {
            $('.back-to-top').removeClass('active');
        }
    })

    $('.back-to-top').on('click', function() {
        $('html, body').animate({
            scrollTop: 0,
        });
    })


    $('.header .mobile-icon').on('click', function() {
        $('.header .main-menu-content .menu-list').addClass('active');
        $('.page-overlay').addClass('active');
    })

    $('.page-overlay').on('click', function() {
        $('.header .main-menu-content .menu-list').removeClass('active');
        $('.page-overlay').removeClass('active');
    });



    $('.header .main-menu-content .search i').on('click', function() {
        $('.header .main-menu-content .search .search-area').addClass('active');
    })

    $('.header .main-menu-content .search .search-area .overlay').on('click', function() {
        $('.header .main-menu-content .search .search-area').removeClass('active');
    })

    // Banner slider for home page;
    $('.banner .banner-slider').slick({
        infinite: true,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: false,
        fade: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-left-long"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-right-long"></i></button>',
        responsive: [
            {
              breakpoint: 767.98,
              settings: {
                arrows: false,
              }
            }
          ]
    })
});
