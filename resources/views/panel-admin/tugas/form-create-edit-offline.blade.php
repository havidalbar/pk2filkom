<div class="m-portlet__body">
    <div class="form-group m-form__group m--margin-top-10">
        <div class="alert m-alert m-alert--default" role="alert">
            Form {{ $ketForm }} data tugas.
        </div>
    </div>
    @if (isset($penugasan) && $penugasan && $penugasan->id)
    <div class="form-group m-form__group row align-items-center">
        <label for="kode_penugasan" class="col-2 col-form-label">
            Kode Penugasan
        </label>
        <div class="col-10">
            <input id="kode_penugasan" class="form-control m-input" type="text" required disabled
                value="{{ $penugasan->id }}">
        </div>
    </div>
    @endif
    <div class="form-group m-form__group row align-items-center {{ $errors->has('judul') ? 'has-danger' : '' }}">
        <label for="judul_tugas" class="col-2 col-form-label">
            Judul Tugas
        </label>
        <div class="col-10">
            <input id="judul_tugas"
                class="form-control m-input {{ $errors->has('judul') ? 'form-control-danger' : '' }}" name="judul"
                placeholder="Nama Tugas" type="text" required value="{{ old('judul') ?? $penugasan->judul ?? '' }}">
            {!! $errors->first('judul', '<div class="form-control-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center {{ $errors->has('deskripsi') ? 'has-danger' : '' }}">
        <label class="col-2 col-form-label">
            Deskripsi
        </label>
        <script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/decoupled-document/ckeditor.js"></script>
        <script src="{{ asset('js/CKEditorBarBar.js') }}"></script>
        <div class="col-10">
            <div class="col-10">
                <!-- The toolbar will be rendered in this container. -->
                <div id="deskripsi-editor-container"></div>

                <!-- This container will become the editable. -->
                <div id="deskripsi-editor" style="border: 1px solid grey">{!! old('deskripsi') ?
                    urldecode(old('deskripsi')) : ($penugasan->deskripsi ?? '') !!}</div>
            </div>
            <input id="deskripsi_input" name="deskripsi" type="hidden" required>
            {!! $errors->first('deskripsi', '<div class="form-control-feedback">:message</div>') !!}
        </div>
        <script>
            DecoupledEditor
			    .create(document.querySelector('#deskripsi-editor'), {
			    	extraPlugins: [MyCustomUploadAdapterPlugin],
			    	// ...
			    })
			    .then(editor => {
                    document.querySelector('#deskripsi-editor-container')
                        .appendChild( editor.ui.view.toolbar.element );
			    })
			    .catch(error => {
			    	console.error(error);
                });

            function submitForm() {
                $('#deskripsi_input').val(encodeURI($('#deskripsi-editor').html()));
                $('#submitter').click();
            }
        </script>
    </div>
    <div class="form-group m-form__group row align-items-center {{ $errors->has('waktu_tampil') ? 'has-danger' : '' }}">
        <label for="waktu_tampil" class="col-2 col-form-label">
            Tampilkan pada
        </label>
        <div class="col-10">
            <input id="waktu_tampil"
                class="form-control m-input tanggal-waktu {{ $errors->has('waktu_tampil') ? 'form-control-danger' : '' }}"
                name="waktu_tampil" type="text" required
                value="{{ old('waktu_tampil') ?? $penugasan->waktu_tampil ?? '' }}">
            {!! $errors->first('waktu_tampil', '<div class="form-control-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center {{ $errors->has('waktu_mulai') ? 'has-danger' : '' }}">
        <label for="waktu_mulai" class="col-2 col-form-label">
            Waktu Mulai
        </label>
        <div class="col-10">
            <input id="waktu_mulai"
                class="form-control m-input tanggal-waktu {{ $errors->has('waktu_mulai') ? 'form-control-danger' : '' }}"
                name="waktu_mulai" type="text" required
                value="{{ old('waktu_mulai') ?? $penugasan->waktu_mulai ?? '' }}">
            {!! $errors->first('waktu_mulai', '<div class="form-control-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="form-group m-form__group row align-items-center {{ $errors->has('waktu_akhir') ? 'has-danger' : '' }}">
        <label for="waktu_akhir" class="col-2 col-form-label">
            Waktu Akhir
        </label>
        <div class="col-10">
            <input id="waktu_akhir"
                class="form-control m-input tanggal-waktu {{ $errors->has('waktu_akhir') ? 'form-control-danger' : '' }}"
                name="waktu_akhir" type="text" required
                value="{{ old('waktu_akhir') ?? $penugasan->waktu_akhir ?? '' }}">
            {!! $errors->first('waktu_akhir', '<div class="form-control-feedback">:message</div>') !!}
        </div>
    </div>
    <?php
    if (empty($penugasan) || $penugasan->jenis === NULL) {
        switch ($_GET['tipe_soal']) {
            case 'offline':
                $jenis = 5;
                break;
            case 'abstraksi':
                $jenis = 7;
                break;
        }
    } else {
        $jenis = $penugasan->jenis;
    }
    ?>
    <input name="jenis" type="hidden" value="{{ $jenis ?? '' }}">
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <button onclick="submitForm()" class="btn btn-primary" type="button">
                Simpan Tugas
            </button>
            <button id="submitter" style="display: none;" type="submit"></button>
            <button type="reset" class="btn btn-secondary">
                Reset
            </button>
        </div>
    </div>
</div>
