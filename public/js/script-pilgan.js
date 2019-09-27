$(function() {            
    tampilSoal(1);        
    $('#selesai-pilgan').click(function(){    
        $(".jumbotron .container").css("z-index","0");        
        $(".container-pilgan").css("position","initial");        
    });
    $('.close-modal').click(function(){    
        $(".jumbotron .container").css("z-index","5");        
        $(".container-pilgan").css("position","relative");        
    });
});

async function tampilSoal(nomorSoal) {    
    dataUrl = origin + "/api/penugasan/" + penugasan + "/"+nomorSoal;        
    $.ajax({
        type: 'get',
        url: dataUrl,
        dataType: 'json',        
        headers: {
            "Authorization": token
        },
        beforeSend: function () {
            $(".pertanyaan .text-nomor-soal").html("");
            $(".pertanyaan .angka-nomor-soal").html("");
            $(".pertanyaan .text-soal").html('<div class="icon-loading"><i class="fas fa-spinner fa-spin"></i></div>');
            $(".pertanyaan .container-pilihan").html("");            
        },
        success: function (data) {     
            // console.log(data);            
            $(".pertanyaan .container-pertanyaan").attr("id",data.soal.id);       
            $(".pertanyaan .text-nomor-soal").text("Soal");            
            $(".pertanyaan .angka-nomor-soal").text(nomorSoal);                        
            $(".pertanyaan .text-soal").html(data.soal.soal);
            let coba = "";
            for (let index = 0; index < 4; index++) {                
                coba+=`<div class="custom-control custom-radio">
                    <input type="radio" id="pilihanJawaban${index}" name="jawaban" value="${data.soal.pilihan_jawaban[index].id}"
                        class="custom-control-input" ${data.soal.jawaban.jawaban === data.soal.pilihan_jawaban[index].id ? 'checked' : ''}>
                    <label class="custom-control-label" for="pilihanJawaban${index}"></label>
                </div>`;                   
            }     
            $(".pertanyaan .container-pilihan").append(coba);
            $(".pertanyaan label[for=pilihanJawaban0]").html(data.soal.pilihan_jawaban[0].pilihan_jawaban);
            $(".pertanyaan label[for=pilihanJawaban1]").html(data.soal.pilihan_jawaban[1].pilihan_jawaban);
            $(".pertanyaan label[for=pilihanJawaban2]").html(data.soal.pilihan_jawaban[2].pilihan_jawaban);
            $(".pertanyaan label[for=pilihanJawaban3]").html(data.soal.pilihan_jawaban[3].pilihan_jawaban);
            statusNavigasi(data);
            aktifNavigasi(nomorSoal);
        },        
    });
}

function statusNavigasi(dataSoal) {
    for (let index = 0; index < dataSoal.jawabans.length ; index++) {
        $(".navigasi .status-navigasi.no-"+(index+1)).css("background-color","#053D58");         
        if(dataSoal.jawabans[index].jawaban){            
            $(".navigasi .nomor-navigasi.no-"+(index+1)).css("background-color","#f8bc3f");               
        }
        else{ 
            $(".navigasi .nomor-navigasi.no-"+(index+1)).css("background-color","#ffffff");                   
        }
    }
}

function aktifNavigasi(nomor) {
    $(".navigasi .nomor-navigasi.no-"+nomor).css("background-color","#ffffff");  
    $(".navigasi .status-navigasi.no-"+nomor).css("background-color","#f8bc3f");        
}

function gantiSoal(nomorSoal) {        
    if (nomorSoal == 1) {        
        $(".pertanyaan #prevSoal").attr("hidden", true);
        $(".pertanyaan #nextSoal").removeAttr("hidden"); 
    } else if (nomorSoal > 1 && nomorSoal < jumlahSoal) {
        $(".pertanyaan #prevSoal").removeAttr("hidden");                
        $(".pertanyaan #nextSoal").removeAttr("hidden");                
    } else if (nomorSoal == jumlahSoal) {
        $(".pertanyaan #prevSoal").removeAttr("hidden"); 
        $(".pertanyaan #nextSoal").attr("hidden", true);
    }
    submitPilihanJawaban();
    tampilSoal(nomorSoal);
}
function idSoal() {
    var idSoal = parseInt($(".pertanyaan .angka-nomor-soal").text());    
    return idSoal;
}

async function submitPilihanJawaban() {
    dataUrl = origin + "/api/penugasan/" + penugasan + "/submit";            
    $.ajax({
        type: 'post',
        url: dataUrl,      
        data: {
            jawaban:$("input[type=radio][name=jawaban]:checked").val(),
            id_soal:$(".pertanyaan .container-pertanyaan").attr("id")
        },
        headers: {
            "Authorization": token
        },
        error: function (textStatus) {
            if(textStatus === "403"){
                window.location.href = window.location.origin+"/penugasan";
            }            
            else{
                alert('Jawaban gagal disimpan. Silahkan muat ulang halaman ini.');
            }
        }
    });
}