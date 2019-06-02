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
			{!! $errors->first('judul','<div class="form-control-feedback">:message</div>') !!}
		</div>
	</div>
	{{-- UNUSED FUNCTION : [Fadhil]	<div class="form-group m-form__group row {{ $errors->has('jArtikel') ? 'has-danger' : '' }}">
		<label for="jenisArtikelSelect" class="col-2 col-form-label">
			Jenis Artikel
		</label>
		<div class="col-10">
			<select class="form-control m-input {{ $errors->has('jArtikel') ? 'form-control-danger' : '' }}"
				id="jenisArtikelSelect" name="jArtikel">
				<option>
					1
				</option>
				<option>
					2
				</option>
				<option>
					3
				</option>
			</select>
		</div>
		{!! $errors->first('jArtikel','<div class="form-control-feedback">:message</div>') !!}
	</div> --}}
	<div class="form-group m-form__group row {{ $errors->has('thumbnail') ? 'has-danger' : '' }}">
		<label for="Thumbnail" class="col-2 col-form-label">
			Thumbnail
		</label>
		<div></div>
		<div class="col-10">
			<input type="file" name="thumbnail" id="file2" class="{{ $errors->has('thumbnail') ? 'has-danger' : '' }}"
				accept="image/*">
			{!! $errors->first('thumbnail','<div class="form-control-feedback">:message</div>') !!}
		</div>
	</div>
	<div class="form-group m-form__group row {{ $errors->has('deskripsi') ? 'has-danger' : '' }}">
		<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/decoupled-document/ckeditor.js"></script>
		<script>
			getEditorData = () => {
				let editorContent = $('#editor').html();
				$("input[name=deskripsi]").val(editorContent);
				$('#submitter').trigger('click');
			}
		</script>
		<label class="col-2 col-form-label">
			Deskripsi
		</label>
		<div class="col-10">
			<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/decoupled-document/ckeditor.js"></script>
			<input type="hidden" name="deskripsi" id="deskripsi">
			<!-- The toolbar will be rendered in this container. -->
			<div id="toolbar-container"></div>

			<!-- This container will become the editable. -->
			<div id="editor" style="border: 1px solid grey"><?= $artikel->deskripsi ?? (old('deskripsi') ?? '') ?></div>
			<script src="{{ asset('js/CKEditorBarBar.js') }}"></script>
			<button type="submit" id="submitter" style="display: none"></button>
		</div>
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
</div>