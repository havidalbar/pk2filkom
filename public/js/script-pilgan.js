$(document).ready(function() {
    $.getJSON("http://127.0.0.1:8000/testDummyPilgan/1", function(soalJson) {
        $("#pilgan .pertanyaan .no-soal").text("soal "+soalJson.id);
        $("#pilgan .pertanyaan .text-soal").text(soalJson.soal);
    });
});

function gantiSoal(nomorSoal) {
    console.log(nomorSoal);
    if (nomorSoal == 1) {        
        $("#pilgan #prevQuiz").attr("hidden", true);
    } else if (nomorSoal > 1 && nomorSoal < 25) {
        $("#pilgan #prevQuiz").removeAttr("hidden");
        $("#pilgan #nextQuiz span").text("Selanjutnya");
    } else if (nomorSoal == 25) {
        $("#pilgan #nextQuiz span").text("Selesai");
    } else if (nomorSoal == 26) {
        submitJawaban();
    }
    $.getJSON("http://127.0.0.1:8000/testDummyPilgan/" + nomorSoal, function(
        soalJson
    ) {
        $("#pilgan .pertanyaan .no-soal").text(soalJson.id);
        $("#pilgan .pertanyaan .text-soal").text(soalJson.soal);
    });
}
function idSoal() {
    var idSoal = parseInt($("#pilgan .pertanyaan .no-soal").text());
    return idSoal;
}

function submitJawaban() {
    alert("Apa selesai");
}