$(document).ready(function () {
    $('.pk2-jb2').css('height', ($(window).height() - 164) + 'px');
    $('.pk2-jb3').css('height', ($(window).height() - 364) + 'px');
    $(window).bind('DOMContentLoaded load resize', function () {
        if ($(window).width() >= 768) {
            $('.pk2-jb5').css('height', ($(window).height() - 164) + 'px');
            $('.pk2-jb6').css('height', ($(window).height() - 164) + 'px');
        }
    });
    // Paralex fixNavbar
    $(window).scroll(function () {
        let navScroll = $(this).scrollTop();
        // console.log(navScroll);
        if (navScroll) {
            $('.nav-home').addClass('sticky-dekstop');
            $('.nav-home').css({
                'transition': '1.5s'
            });
        } else {
            $('.nav-home').removeClass('sticky-dekstop');
        }
    });
    // endParalex fixNavbar

    // ScrollAnimate
    $('#swipUp, [data-item-ojb]').on('click', function (e) {
        e.preventDefault();
        if (this.id == 'swipUp') {
            $('html, body').animate({
                scrollTop: ($('.pk2-jb2').offset().top - (($(window).width() < 768) ? 160 : 165))
            }, 1250, 'swing');
        } else {
            let getObject = '.' + $(this).attr('data-item-ojb');
            $('html, body').animate({
                scrollTop: ($(getObject).offset().top - (($(window).width() < 768) ? 160 : 165))
            }, 1250, 'swing');
        }
    });
    // endScrollAnimate
    $('.center.slider').slick({
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3,
        dots: true,
        swipe: false,
        centerPadding: '80px',
        prevArrow: `
            <a class="slickArrow carousel-control-prev" style="width: 5%;">
                <span class="berita-prev" aria-hidden="true"><i class="far fa-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
        `,
        nextArrow: `
            <a class="slickArrow carousel-control-next" style="width: 5%;">
                <span class="berita-next" aria-hidden="true"><i class="far fa-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        `,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              swipe: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              swipe: true,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
    });
    $('.zoom').zoom();
    // Datepicker
    $(".tanggal").datepicker({
        language: "id",
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom left",
        defaultViewDate: { year: 2001 }
    });
    // endDatepicker
});
