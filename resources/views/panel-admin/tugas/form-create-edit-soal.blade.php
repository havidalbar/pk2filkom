<div class="m-portlet__body">
    <div class="form-group m-form__group m--margin-top-10">
        <div class="alert m-alert m-alert--default" role="alert">
            Form {{ $ketForm }} data tugas.
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Judul Tugas
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="judul" placeholder="Nama Tugas" type="text" required>
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Deskripsi
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="deskripsi" placeholder="Deskripsi Mengenai Tugas" type="text"
                required>
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
            <input class="form-check-input" name="random" type="checkbox">
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Batas Waktu
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="batas_waktu" type="number"
                placeholder="Batas Waktu Pengerjaan Tugas" required>
        </div>
    </div>
    <input class="form-control m-input" name="tipe" type="hidden" value="pilihan_ganda">
    <div class="border border-dark pt-3 pb-3 mt-3">
        <div class="form-group m-form__group row align-items-center">
            <label for="artikel-text-input" class="col-2 col-form-label">
                Soal
            </label>
            <div class="col-10">
                <input class="form-control m-input" name="soal[0][soal]" placeholder="Pertanyaan" type="text" required>
            </div>
        </div>
        <div class="form-group m-form__group row align-items-center">
            <label for="artikel-text-input" class="col-2 col-form-label">
                Jawaban 0
            </label>
            <div class="col-10">
                <input class="form-control m-input" name="soal[0][pilihan_jawaban][0]" placeholder="Jawaban 0"
                    type="text" required>
            </div>
        </div>
        <div class="form-group m-form__group row align-items-center">
            <label for="artikel-text-input" class="col-2 col-form-label">
                Jawaban 1
            </label>
            <div class="col-10">
                <input class="form-control m-input" name="soal[0][pilihan_jawaban][1]" placeholder="Jawaban 1"
                    type="text" required>
            </div>
        </div>
        <div class="form-group m-form__group row align-items-center">
            <label for="artikel-text-input" class="col-2 col-form-label">
                Jawaban 2
            </label>
            <div class="col-10">
                <input class="form-control m-input" name="soal[0][pilihan_jawaban][2]" placeholder="Jawaban 2"
                    type="text" required>
            </div>
        </div>
        <div class="form-group m-form__group row align-items-center">
            <label for="artikel-text-input" class="col-2 col-form-label">
                Jawaban 3
            </label>
            <div class="col-10">
                <input class="form-control m-input" name="soal[0][pilihan_jawaban][3]" placeholder="Jawaban 3"
                    type="text" required>
            </div>
        </div>
        <div class="form-group m-form__group row align-items-center">
            <label for="artikel-text-input" class="col-2 col-form-label">
                Jawaban Benar
            </label>
            <div class="col-10">
                <input class="form-control m-input" name="soal[0][jawaban_benar]"
                    placeholder="Jawaban Mana Yang Benar Antara 0/1/2/3" type="number" min="0" max="3" required>
            </div>
        </div>
    </div>
    <div id="sub_konten_parent">
        <div id="sub_konten_collector"></div>
        <script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/decoupled-document/ckeditor.js"></script>
        <script src="{{ asset('js/CKEditorBarBar.js') }}"></script>
        <script>
        function getEditorData() {
            let editors = document.getElementsByClassName('sub-konten-editor');
            let sub_konten_collector = $('#sub_konten_collector');
            sub_konten_collector.empty();
            for (let i = 0; i < editors.length; i++) {
                sub_konten_collector.append(
                    `<input type="hidden" name="sub_konten[]" value="${editors[i].innerHTML}">`);
            }
            $('#submitter').trigger('click');
        }

        function tambahSubKonten() {
            $('#sub_konten_parent').append(`<div class="border border-dark pt-3 pb-3 mt-3">
                <div class="form-group m-form__group row align-items-center">
                    <label for="artikel-text-input" class="col-2 col-form-label">
                        Soal
                    </label>
                    <div class="col-10">
                        <input class="form-control m-input" name="soal[0][soal]" placeholder="Pertanyaan" type="text" required>
                    </div>
                </div>
                <div class="form-group m-form__group row align-items-center">
                    <label for="artikel-text-input" class="col-2 col-form-label">
                        Jawaban 0
                    </label>
                    <div class="col-10">
                        <input class="form-control m-input" name="soal[0][pilihan_jawaban][0]" placeholder="Jawaban 0"
                            type="text" required>
                    </div>
                </div>
                <div class="form-group m-form__group row align-items-center">
                    <label for="artikel-text-input" class="col-2 col-form-label">
                        Jawaban 1
                    </label>
                    <div class="col-10">
                        <input class="form-control m-input" name="soal[0][pilihan_jawaban][1]" placeholder="Jawaban 1"
                            type="text" required>
                    </div>
                </div>
                <div class="form-group m-form__group row align-items-center">
                    <label for="artikel-text-input" class="col-2 col-form-label">
                        Jawaban 2
                    </label>
                    <div class="col-10">
                        <input class="form-control m-input" name="soal[0][pilihan_jawaban][2]" placeholder="Jawaban 2"
                            type="text" required>
                    </div>
                </div>
                <div class="form-group m-form__group row align-items-center">
                    <label for="artikel-text-input" class="col-2 col-form-label">
                        Jawaban 3
                    </label>
                    <div class="col-10">
                        <input class="form-control m-input" name="soal[0][pilihan_jawaban][3]" placeholder="Jawaban 3"
                            type="text" required>
                    </div>
                </div>
                <div class="form-group m-form__group row align-items-center">
                    <label for="artikel-text-input" class="col-2 col-form-label">
                        Jawaban Benar
                    </label>
                    <div class="col-10">
                        <input class="form-control m-input" name="soal[0][jawaban_benar]"
                            placeholder="Jawaban Mana Yang Benar Antara 0/1/2/3" type="number" min="0" max="3" required>
                    </div>
                </div>
            </div>`);
            let subKontenEditor = document.getElementsByClassName('sub-konten-editor');
            let subKontenEditorContainer = document.getElementsByClassName('sub-konten-editor-container');
            DecoupledEditor
                .create(subKontenEditor[subKontenEditor.length - 1], {
                    extraPlugins: [MyCustomUploadAdapterPlugin],

                    // ...
                })
                .then(editor => {
                    subKontenEditorContainer[subKontenEditorContainer.length - 1].appendChild(editor.ui.view.toolbar
                        .element);
                })
                .catch(error => {
                    console.error(error);
                });
        }
        </script>
    </div>
    <div class="mt-3 mb-3" style="text-align: center">
        <button onclick="tambahSubKonten()" class="btn btn-secondary" type="button">
            Tambah Soal
        </button>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <button onclick="getEditorData()" class="btn btn-primary" type="button">
                Simpan Tugas
            </button>
            <button type="reset" class="btn btn-secondary">
                Reset
            </button>
        </div>
    </div>
    <button type="submit" id="submitter" style="display: none"></button>
</div>