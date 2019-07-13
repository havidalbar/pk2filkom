<div class="m-portlet__body">
    <div class="form-group m-form__group m--margin-top-10">
        <div class="alert m-alert m-alert--default" role="alert">
            Form {{ $ketForm }} data artikel.
        </div>
    </div>
    <div class="form-group m-form__group row {{ $errors->has('judul') ? 'has-danger' : '' }}">
        <label for="artikel-text-input" class="col-2 col-form-label">
            Judul Artikel
        </label>
        <div class="col-10">
            <input name="judul" class="form-control m-input {{ $errors->has('judul') ? 'form-control-danger' : '' }}"
                name="artikel" placeholder="Nama artikel" value="{{ old('judul') ?? ($artikel->judul ?? '') }}"
                type="text" id="artikel-text-input" required>
            {!! $errors->first('judul', '<div class="form-control-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="form-group m-form__group row {{ $errors->has('thumbnail') ? 'has-danger' : '' }}">
        <label for="thumbnail" class="col-2 col-form-label">
            Thumbnail
        </label>
        <div></div>
        <div class="col-10">
            <input type="file" name="thumbnail" id="thumbnail"
                class="{{ $errors->has('thumbnail') ? 'has-danger' : '' }}" accept="image/*">
            @if (isset($artikel))
            <img src="{{ $artikel->thumbnail }}" style="width: 300px">
            @endif
            {!! $errors->first('thumbnail', '<div class="form-control-feedback">:message</div>') !!}
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
                    let inner = editors[i].innerHTML;
					sub_konten_collector.append(`<input type="hidden" name="sub_konten[]" value="${encodeURI(inner)}">`);
				}
				$('#submitter').trigger('click');
			}

			function tambahSubKonten() {
				$('#sub_konten_parent').append(`<div style="border: 1px solid grey; padding: 10px 0px; margin: 10px 0px">
						<div class="form-group m-form__group row">
							<label class="col-2 col-form-label">
								Gambar
							</label>
							<div class="col-10">
								<input type="file" name="gambar_sub[]" accept="image/*" required>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-2 col-form-label">
								Deskripsi Gambar
							</label>
							<div class="col-10">
								<!-- The toolbar will be rendered in this container. -->
								<div class="sub-konten-editor-container"></div>

								<!-- This container will become the editable. -->
								<div class="sub-konten-editor" style="border: 1px solid grey"></div>
							</div>
						</div>
						<div style="text-align: center">
							<button onclick="$(this).parent().parent().remove()" type="button">Hapus Sub Konten</button>
						</div>
					</div>`
				);
					let subKontenEditor = document.getElementsByClassName('sub-konten-editor');
					let subKontenEditorContainer = document.getElementsByClassName('sub-konten-editor-container');
					DecoupledEditor
						.create(subKontenEditor[subKontenEditor.length - 1], {
							extraPlugins: [MyCustomUploadAdapterPlugin],

							// ...
						})
						.then(editor => {
							subKontenEditorContainer[subKontenEditorContainer.length - 1].appendChild(editor.ui.view.toolbar.element);
						})
						.catch(error => {
							console.error(error);
						});
			}
        </script>
        @if (old('sub_konten'))
        @foreach (old('sub_konten') as $index => $sub_konten_data)
        <div style="border: 1px solid grey; padding: 10px 0px; margin: 10px 0px">
            <div class="form-group m-form__group row {{ $errors->has('gambar_sub') ? 'has-danger' : '' }}">
                <label class="col-2 col-form-label">
                    Gambar
                </label>
                <div class="col-10">
                    <input type="file" name="gambar_sub[]" class="{{ $errors->has('gambar_sub') ? 'has-danger' : '' }}"
                        accept="image/*" required>
                    <br>
                    @if (isset($artikel))
                    <img src="{{ $artikel->sub[$index]->thumbnail }}" style="width: 300px">
                    @endif
                    {!! $errors->first('gambar_sub', '<div class="form-control-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="form-group m-form__group row {{ $errors->has('sub_konten') ? 'has-danger' : '' }}">
                <label class="col-2 col-form-label">
                    Deskripsi Gambar
                </label>
                <div class="col-10">
                    <!-- The toolbar will be rendered in this container. -->
                    <div class="sub-konten-editor-container"></div>

                    <!-- This container will become the editable. -->
                    <div class="sub-konten-editor" style="border: 1px solid grey">
                        <?= $sub_konten_data ?? '' ?></div>
                </div>
            </div>
        </div>
        @endforeach
        @elseif (isset($artikel))
        @foreach ($artikel->sub as $sub_konten_data)
        <div style="border: 1px solid grey; padding: 10px 0px; margin: 10px 0px">
            <div class="form-group m-form__group row">
                <label class="col-2 col-form-label">
                    Gambar
                </label>
                <div class="col-10">
                    <input type="file" name="gambar_sub[]" accept="image/*" required>
                    <br>
                    <img src="{{ $sub_konten_data->thumbnail }}" style="width: 300px">
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-2 col-form-label">
                    Deskripsi Gambar
                </label>
                <div class="col-10">
                    <!-- The toolbar will be rendered in this container. -->
                    <div class="sub-konten-editor-container"></div>

                    <!-- This container will become the editable. -->
                    <div class="sub-konten-editor" style="border: 1px solid grey">{!! $sub_konten_data->deskripsi ?? ''
                        !!}</div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <script>
        let startEditor = document.getElementsByClassName('sub-konten-editor');
		let startEditorContainer = document.getElementsByClassName('sub-konten-editor-container');
		for (let i = 0; i < startEditor.length; i++) {
			DecoupledEditor
				.create(startEditor[i], {
					extraPlugins: [MyCustomUploadAdapterPlugin],

					// ...
				})
				.then(editor => {
					startEditorContainer[i].appendChild(editor.ui.view.toolbar.element);
				})
				.catch(error => {
					console.error(error);
				});
		}
		
    </script>
    <div style="text-align: center">
        <button onclick="tambahSubKonten()" class="btn btn-secondary" type="button">
            Tambah Sub Konten
        </button>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <button onclick="getEditorData()" class="btn btn-primary" type="button">
                Simpan Artikel
            </button>
            <button type="reset" class="btn btn-secondary">
                Reset
            </button>
        </div>
    </div>
    <button type="submit" id="submitter" style="display: none"></button>
</div>