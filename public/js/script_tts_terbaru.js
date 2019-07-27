function submitTTS() {
    let formData = {};

    $("input[name^='jawaban']").each(function () {
        formData[this.name] = this.value;
    });

    $.ajax({
        type: 'post',
        url: submitUrl,
        data: formData,
        headers: {
            "Authorization": token
        },
        beforeSend: function () {
            $('#prosesSimpan i').replaceWith('<i class="fas fa-spinner fa-spin"></i>');
            $('#prosesSimpan span').text('Menyimpan jawaban');
            $("#prosesSimpan").fadeIn(2000);
        },
        success: function () {
            $('#prosesSimpan i').replaceWith('<i class="fas fa-check"></i>');
            $('#prosesSimpan span').text('Jawaban berhasil disimpan');
            $("#prosesSimpan").fadeOut(2000);
        },
        error: function () {
            $('#prosesSimpan i').replaceWith('<i class="fas fa-times"></i>');
            $('#prosesSimpan span').text('Jawaban gagal disimpan.<br>Silahkan muat ulang halaman ini.');
            $("#prosesSimpan").fadeOut(5000);
        }
    });

    setTimeout(submitTTS, 60 * 1000);
};

$(document).ready(function () {
    let tbl = ['<table id="tts-table">'];
    for (let i = 1; i <= 24; ++i) {
        tbl.push("<tr>");
        for (let x = 1; x <= 24; ++x) {
            tbl.push('<td data-col="' + i + '" data-row="' + x + '"></td>');
        };
        tbl.push("</tr>");
    };

    tbl.push("</table>");
    $('#tts').append(tbl.join(''));

    // Menurun
    for (let i = 0, j = dataTts.menurun.length; i < j; i++) {
        for (let y = 1; y <= 24; y++) {
            if (y == dataTts.menurun[i].posisi.y) {
                for (let x = 1; x <= 24; x++) {
                    if (x >= dataTts.menurun[i].posisi.startx && x <= dataTts.menurun[i].posisi.endx) {
                        const find = $('table#tts-table td[data-col="' + x + '"][data-row="' + y + '"]');
                        let huruf = dataTts.menurun[i].jawaban[x - dataTts.menurun[i].posisi.startx];
                        if (huruf == '_') {
                            huruf = '';
                        }
                        if (x == dataTts.menurun[i].posisi.startx) {
                            find.children().length ? '' : find.append(`<span class="ttsNoSoal">${dataTts.menurun[i].noSoal}</span><input maxlength="1" name="jawaban[${x}][${y}]" value="${huruf}" type="text">`);
                        } else {
                            find.children().length ? '' : find.append(`<input maxlength="1" name="jawaban[${x}][${y}]" value="${huruf}" type="text">`);
                        }
                    }
                }
            }
        }
    }

    // Mendatar
    for (let i = 0, j = dataTts.mendatar.length; i < j; i++) {
        for (let x = 1; x <= 24; x++) {
            if (dataTts.mendatar[i].posisi.x == x) {
                for (let y = 1; y <= 24; y++) {
                    if (y >= dataTts.mendatar[i].posisi.starty && y <= dataTts.mendatar[i].posisi.endy) {
                        const find = $('table#tts-table td[data-col="' + x + '"][data-row="' + y + '"]');
                        let huruf = dataTts.mendatar[i].jawaban[y - dataTts.mendatar[i].posisi.starty];
                        if (huruf == '_') {
                            huruf = '';
                        }
                        if (y == dataTts.mendatar[i].posisi.starty) {
                            find.children().length ? find.prepend(`<span class="ttsNoSoal">${dataTts.mendatar[i].noSoal}</span>`) : find.append(`<span class="ttsNoSoal">${dataTts.mendatar[i].noSoal}</span><input maxlength="1" name="jawaban[${x}][${y}]" value="${huruf}" type="text">`);
                        } else {
                            find.children().length ? '' : find.append(`<input maxlength="1" name="jawaban[${x}][${y}]" value="${huruf}" type="text">`);
                        }
                    }
                }
            }
        }
    }

    let soalMendatar = ['<div class="col-md-6 col-sm-12"><h1>Menurun</h1><ol id="menurun">'];
    let soalMenurun = ['<div class="col-md-6 col-sm-12"><h1>Mendatar</h1><ol id="mendatar">'];
    dataTts.menurun.forEach((soal, i) => {
        soalMenurun.push(`<li data-noSoal="` + soal.noSoal + `">` + soal.soal + `</li>`);
    });
    dataTts.mendatar.forEach((soal, i) => {
        soalMendatar.push(`<li data-noSoal="` + soal.noSoal + `">` + soal.soal + `</li>`);
    });
    soalMendatar.push('</div></ol>');
    soalMenurun.push('</div></ol>');
    const semuaSoal = soalMenurun.concat(soalMendatar);
    $('#tts-soal').append(semuaSoal.join(''));
});