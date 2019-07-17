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

    //tts 
    let tts = {
        init : function(){
            this.table_tts();
            this.table_inputan(window.location.origin+"/js/tts.json");
            this.dataSoal(window.location.origin+"/js/tts.json");
        },
        table_tts :  () => {
            let tbl = ['<table id="tts-table">'];
            for (let i=1; i <= 24; ++i) {
                tbl.push("<tr>");
                    for (let x=1; x <= 24; ++x) {
                        tbl.push('<td data-col="'+ i +'" data-row="'+ x +'"></td>');		
                    };
                tbl.push("</tr>");
            };

            tbl.push("</table>");
            $('#tts').append(tbl.join(''));
        },
        table_inputan : (file) => {
            const xhr = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            
            xhr.onreadystatechange = () => {
                let data;
                if(xhr.readyState == 4 && xhr.status == 200){
                    data = JSON.parse(xhr.responseText);
                    const dataTts = data.soalTts;
                    // Menurun
                    for (let i = 0, j = Object.keys(dataTts[0].menurun).length; i < j; i++) {
                        for (let y = 1; y <= 24; y++) {
                            if(y == dataTts[0].menurun[i].posisi.y){
                                for (let x = 1; x <= 24; x++) {
                                    if(x >= dataTts[0].menurun[i].posisi.startx && x <= dataTts[0].menurun[i].posisi.endx){
                                        const find = $('table#tts-table td[data-col="'+x+'"][data-row="'+y+'"]');
                                        if(x==dataTts[0].menurun[i].posisi.startx){
                                            find.children().length ? '' : find.append('<span class="ttsNoSoal">'+dataTts[0].menurun[i].noSoal+'</span><input maxlength="1" val="" type="text"" />');
                                        }else{
                                            find.children().length ? '' : find.append('<input maxlength="1" val="" type="text"" />');
                                        }
                                    }
                                }
                            }
                        }
                    }
                    // Mendatar
                    for (let i = 0, j = Object.keys(dataTts[0].mendatar).length; i < j; i++) {
                        for (let x = 1; x <= 24; x++) {
                            if(dataTts[0].mendatar[i].posisi.x == x){
                                for (let y = 1; y <= 24; y++) {
                                    if(y >= dataTts[0].mendatar[i].posisi.starty && y <= dataTts[0].mendatar[i].posisi.endy){
                                        const find = $('table#tts-table td[data-col="'+x+'"][data-row="'+y+'"]');
                                        if(y==dataTts[0].mendatar[i].posisi.starty){
                                            find.children().length ? '' : find.append('<span class="ttsNoSoal">'+dataTts[0].mendatar[i].noSoal+'</span><input maxlength="1" val="" type="text"" />');
                                        }else{
                                            find.children().length ? '' : find.append('<input maxlength="1" val="" type="text"" />');
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //exe
                    $('table#tts-table td[data-col="6"][data-row="12"]').prepend('<span class="ttsNoSoal">6</span>')
                    $('table#tts-table td[data-col="13"][data-row="2"]').prepend('<span class="ttsNoSoal">12</span>')
                }
            }

            xhr.open('GET', file, true);
            xhr.send();
        },
        dataSoal : (file) => {
            const xhr = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            
            xhr.onreadystatechange = () => {
                let data;
                if(xhr.readyState == 4 && xhr.status == 200){
                    data = JSON.parse(xhr.responseText);
                    const dataTts = data.soalTts;
                    
                    let soalMendatar = ['<div class="col-md-6 col-sm-12"><h1>Menurun</h1><ol id="menurun">'];
                    let soalMenurun = ['<div class="col-md-6 col-sm-12"><h1>Mendatar</h1><ol id="mendatar">'];
                        $.each(dataTts, function(i, data) {
                            $.each(data.mendatar, function(i, soal) {
                                soalMendatar.push(`<li data-noSoal="`+soal.noSoal+`">`+soal.soal+`</li>`)
                            });
                            $.each(data.menurun, function(i, soal) {
                                soalMenurun.push(`<li data-noSoal="`+soal.noSoal+`">`+soal.soal+`</li>`)
                            });
                        });
                    soalMendatar.push('</div></ol>');
                    soalMenurun.push('</div></ol>');
                    const semuaSoal = soalMenurun.concat(soalMendatar);
                    $('#tts-soal').append(semuaSoal.join(''));
                    
                }
            }

            xhr.open('GET', file, true);
            xhr.send();

        }
    }
    tts.init();
    // endTts

    // Datepicker
    $(".tanggal").datepicker({
        language: "id",
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom left",
        defaultViewDate: { year: 2001 }
    });
    // endDatepicker
    
    // zoom
    $('.zoom').zoom();
    // endZoom

});