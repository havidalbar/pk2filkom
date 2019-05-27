<div class="m-portlet__body">
	<div class="form-group m-form__group m--margin-top-10">
		<div class="alert m-alert m-alert--default" role="alert">
			Form {{ $ketForm }} Data Nilai KKM.
		</div>
	</div>
	<div class="form-group m-form__group row {{ $errors->has('kegiatan') ? 'has-danger' : '' }}">
		<label for="kegiatan-text-input" class="col-2 col-form-label">
			Kegiatan
		</label>
		<div class="col-10">
			<input class="form-control m-input {{ $errors->has('kegiatan') ? 'form-control-danger' : '' }}"
				name="kegiatan" placeholder="Kegiatan" value="{{ old('kegiatan') ?? ($dataNilai->kegiatan ?? '') }}"
				type="text" id="kegiatan-text-input">
			{!! $errors->first('kegiatan','<div class="form-control-feedback">:message</div>') !!}
		</div>
	</div>
	<div class="form-group m-form__group row {{ $errors->has('nilai') ? 'has-danger' : '' }}">
		<label for="nilai-text-input" class="col-2 col-form-label">
			Nilai
		</label>
		<div class="col-10">
			<input class="form-control m-input {{ $errors->has('nilai') ? 'form-control-danger' : '' }}" name="nilai"
				placeholder="Nilai" value="{{ old('nilai') ?? ($dataNilai->nilai ?? '') }}" type="text"
				id="kegiatan-text-input">
			{!! $errors->first('nilai','<div class="form-control-feedback">:message</div>') !!}
		</div>
	</div>
	<div class="m-portlet__foot m-portlet__foot--fit">
		<div class="m-form__actions">
			{{csrf_field()}}
			<button type="submit" class="btn btn-primary">
				Submit
			</button>
			<button type="reset" class="btn btn-secondary">
				Reset
			</button>
		</div>
	</div>
</div>