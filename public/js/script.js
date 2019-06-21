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
    // Datepicker
    $(".tanggal").datepicker({
        language: "id",
        format: 'dd/mm/yyyy',
        autoclose: true,
        orientation: "bottom left",
        defaultViewDate: { year: 2001 }
    });
    $('.toast').toast({
        'autohide': false,
        // 'delay':5000
      });
    // endDatepicker        
    // $('.toast').toast('show');    
});