<div class="m-portlet__body">
    <div class="form-group m-form__group m--margin-top-10">
        <div class="alert m-alert m-alert--default" role="alert">
            Form {{ $ketForm }} data tugas.
        </div>
    </div>
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
            case 'instagram':
                $jenis = 1;
                break;
            case 'line':
                $jenis = 2;
                break;
            case 'youtube':
                $jenis = 3;
                break;
            case 'tts':
                $jenis = 6;
                break;
        }
    } else {
        $jenis = $penugasan->jenis;
    }
    ?>
    @if ($jenis == 6)
    <div class="form-group m-form__group row align-items-center {{ $errors->has('batas_waktu') ? 'has-danger' : '' }}">
        <label class="col-2 col-form-label">
            Batas Waktu
        </label>
        <div class="col-10">
            <input class="form-control m-input {{ $errors->has('batas_waktu') ? 'form-control-danger' : '' }}"
                name="batas_waktu" type="number" placeholder="Batas Waktu Pengerjaan Tugas" required
                value="{{ old('batas_waktu') ?? $penugasan->batas_waktu ?? '' }}">
            {!! $errors->first('batas_waktu', '<div class="form-control-feedback">:message</div>') !!}
        </div>
    </div>
    @endif
    <input name="jenis" type="hidden" value="{{ $jenis ?? '' }}">
    @if (empty(old('soal')) && empty($penugasan))
    @for ($i = 0; $i < $_GET['jumlah_soal']; $i++) <div class="form-group m-form__group row align-items-center">
        <label class="col-2 col-form-label">
            Soal {{ $i + 1 }}
        </label>
        <div class="col-10">
            <input class="form-control m-input" name="soal[{{ $i }}][soal]" placeholder="Pertanyaan soal {{ $i + 1 }}"
                type="text" required>
        </div>
</div>
@endfor
@elseif (old('soal') || $penugasan->soal)
@foreach ((old('soal') ?? $penugasan->soal) as $index => $soal)
<div class="form-group m-form__group row align-items-center">
    <label class="col-2 col-form-label">
        Soal {{ $index + 1 }}
    </label>
    <div class="col-10">
        <input class="form-control m-input" name="soal[{{ $index }}][soal]"
            placeholder="Pertanyaan soal {{ $index + 1 }}" type="text" required value="{{ ($jenis == 6 && !old('soal')) ? json_encode($soal['soal']) : $soal['soal'] }}">
    </div>
</div>
@endforeach
@endif
{!! $errors->first('soal', '<div class="form-control-feedback">:message</div>') !!}
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