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

    //loadBerita 
        let loadBerita = {
            totalData : () => {

                const xhr = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            
                xhr.onreadystatechange = () => {
                    let data;
                    if(xhr.readyState == 4 && xhr.status == 200){
                        data = JSON.parse(xhr.responseText);
                        const dataBrt = data.dataBerita;
                        return dataBrt.length;
                    }
                }
                xhr.open('GET', window.location.origin+'/js/berita.json', false);
                xhr.send();
                return xhr.onreadystatechange();
            },
            loadData : () => {

                if(track_load < total_group && load==false){
                    loading = true;
                
                    $('.loadBerita').html('<i class="fa fa-spinner fa-spin"></i>');
                    

                    const xhr = typeof XMLHttpRequest != 'undefined' ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                
                    xhr.onreadystatechange = () => {
                        let data;
                        let dataBerita = '';
                        if(xhr.readyState == 4 && xhr.status == 200){
                            data = JSON.parse(xhr.responseText);
                            loading = false;
                            const dataBrt = data.dataBerita;
                            for (var i = track_load; i <= itemPer_load; i++) {
                                console.log(i)
                                dataBerita += `
                                    <div class="col-sm-12 col-md-4">
                                        <div class="card item-berita my-3">
                                            <div class="gambar-berita">
                                                <img class="" src="`+window.location.origin+`/img/berita/`+dataBrt[i].gambar+`" alt="">		
                                            </div>
                                            <div class="overlay"> 
                                                <h2>`+dataBrt[i].judulBerita+`</h2>
                                                <div class="h-100 d-flex align-items-center justify-content-center">
                                                    <a class="info" href="#">coming soon</a>
                                                </div>
                                            </div>
                                            <div class="card-body">                        
                                                <div class="judul-berita card-text">
                                                    <a href="#">`+dataBrt[i].judulBerita+`</a>	
                                                </div>
                                                <span class="creatAt"><i class="far fa-calendar-alt"></i> Dipublikasikan pada :`+dataBrt[i].diBuatTgl+`</span>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                track_load++;
                            }
                            itemPer_load = dataBrt.length-1;
                            
                            $('#berita').append(dataBerita);
                            $('.loadBerita').html('TAMPILKAN BERITA');
                            
                        }
                    }
                    xhr.open('GET', window.location.origin+'/js/berita.json', true);
                    xhr.send();
                    
                }
                
                if(track_load >= total_group-1){
                    $('.loadBerita').html('Tidak ada berita!!');
                }
            }
            
        }
        var track_load = 0;
        var itemPer_load = 2;
        var load  = false;
        var total_group = loadBerita.totalData();
        console.log(total_group);
        $('.loadBerita').click(function () {
            loadBerita.loadData();
        });
    //endLoadBerita

    // Datepicker
    $(".tanggal").datepicker({
        language: "id",
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom left",
        defaultViewDate: { year: 2001 }
    });
    // endDatepicker

    // Preview video ig
    $('#input-video-ig').on('input', function() {
        document.getElementById("preview-video-ig").src = (this.value) + "embed";
    });
    // endPreview video ig

});
