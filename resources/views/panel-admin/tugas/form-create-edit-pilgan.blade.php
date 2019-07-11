<div class="m-portlet__body">
    <div class="form-group m-form__group m--margin-top-10">
        <div class="alert m-alert m-alert--default" role="alert">
            Form {{ $ketForm }} data tugas.
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="judul_tugas" class="col-2 col-form-label">
            Judul Tugas
        </label>
        <div class="col-10">
            <input id="judul_tugas" class="form-control m-input" name="judul" placeholder="Nama Tugas" type="text"
                required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="deskripsi_tugas" class="col-2 col-form-label">
            Deskripsi
        </label>
        <div class="col-10">
            <input id="deskripsi_tugas" class="form-control m-input" name="deskripsi"
                placeholder="Deskripsi Mengenai Tugas" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="waktu_mulai" class="col-2 col-form-label">
            Waktu Mulai
        </label>
        <div class="col-10">
            <input id="waktu_mulai" class="form-control m-input tanggal-waktu" name="waktu_mulai" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="waktu_akhir" class="col-2 col-form-label">
            Waktu Akhir
        </label>
        <div class="col-10">
            <input id="waktu_akhir" class="form-control m-input tanggal-waktu" name="waktu_akhir" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label class="col-2 col-form-label">
            Shuffle Soal
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="random" type="checkbox">
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label class="col-2 col-form-label">
            Batas Waktu
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="batas_waktu" type="number"
                placeholder="Batas Waktu Pengerjaan Tugas" required>
        </div>
    </div>
    <input class="form-control m-input" name="tipe" type="hidden" value="pilihan_ganda">
    <div class="border border-dark pt-4 pb-4 mt-4 mb-4">
        <div class="form-group m-form__group row align-items-center">
            <label class="col-2 col-form-label">
                Soal 1
                <!-- ${nomorSoal} -->
            </label>
            <div class="col-10">
                <input class="form-control m-input" name="soal[0][soal]" placeholder="Pertanyaan" type="text" required>
            </div>
        </div>
        <div class="form-group m-form__group row align-items-center">
            <label class="col-form-label">
                Pilihan jawaban
            </label>
        </div>
        <div style="margin-left:24px">
            <div class="form-group m-form__group d-flex flex-row align-items-center">
                <input type="radio" name="jawaban_benar" value="0">
                <div style="width:100%;margin-left:16px">
                    <input class="form-control m-input" name="soal[0][pilihan_jawaban][0]"
                        placeholder="Pilihan Jawaban 1" type="text" required>
                </div>
            </div>
            <div class="form-group m-form__group d-flex flex-row align-items-center">
                <input type="radio" name="jawaban_benar" value="1">
                <div style="width:100%;margin-left:16px">
                    <input class="form-control m-input" name="soal[0][pilihan_jawaban][1]"
                        placeholder="Pilihan Jawaban 2" type="text" required>
                </div>
            </div>
            <div class="form-group m-form__group d-flex flex-row align-items-center">
                <input type="radio" name="jawaban_benar" value="2">
                <div style="width:100%;margin-left:16px">
                    <input class="form-control m-input" name="soal[0][pilihan_jawaban][2]"
                        placeholder="Pilihan Jawaban 3" type="text" required>
                </div>
            </div>
            <div class="form-group m-form__group d-flex flex-row align-items-center">
                <input type="radio" name="jawaban_benar" value="3">
                <div style="width:100%;margin-left:16px">
                    <input class="form-control m-input" name="soal[0][pilihan_jawaban][3]"
                        placeholder="Pilihan Jawaban 4" type="text" required>
                </div>
            </div>
        </div>
	</div>	
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <button onclick="#" class="btn btn-primary" type="button">
                Simpan Tugas
            </button>
            <button type="reset" class="btn btn-secondary">
                Reset
            </button>
        </div>
    </div>
</div>