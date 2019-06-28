<div class="m-portlet__body">
    <div class="form-group m-form__group m--margin-top-10">
        <div class="alert m-alert m-alert--default" role="alert">
            Form {{ $ketForm }} data tugas.
        </div>
    </div>
    <div class="form-group m-form__group row">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Judul Tugas
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="judul" placeholder="Nama Tugas" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Deskripsi
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="deskripsi" placeholder="Deskripsi Tugas" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Waktu Mulai
        </label>
        <div class="col-10">
            <input class="form-control m-input tanggal-waktu" name="waktu_mulai" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Waktu Akhir
        </label>
        <div class="col-10">
            <input class="form-control m-input tanggal-waktu" name="waktu_akhir" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Random Tugas
        </label>
        <div class="col-10">
            <input class="form-check-input" name="random" type="checkbox" disabled>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Batas Waktu
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="batas_waktu" type="number" value="0" disabled>
        </div>
    </div>
    <input class="form-control m-input" name="tipe" type="hidden" value="pilihan_ganda">
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Soal
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="soal[0][soal]" placeholder="Link Soal" type="text" required>
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <button onclick="" class="btn btn-primary" type="button">
                Simpan Tugas
            </button>
            <button type="reset" class="btn btn-secondary">
                Reset
            </button>
        </div>
    </div>
    <button type="submit" id="submitter" style="display:none">Submit</button>
</div>