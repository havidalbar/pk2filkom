@extends('panel-admin.biodataMahasiswa')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper" style="width: 100vh">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title" style="transform: translateY(10px);">
					EDIT
					<small>
						DATA MAHASISWA
					</small>
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__body pt-1">

				<form action="{{ route('panel.mahasiswa.biodata.update', ['nim' => $dataMahasiswa->nim ]) }}"
					class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
					@csrf
					@method('PUT')
					<div class="m-portlet__body">
						<div class="form-group m-form__group m--margin-top-10">
							<div class="alert m-alert m-alert--default" role="alert">
								Form edit data mahasiswa.
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label for="nim-text-input" class="col-2 col-form-label">
								NIM
							</label>
							<div class="col-10">
								<input class="form-control m-input" name="nim" placeholder="NIM Mahasiswa"
									value="{{ $dataMahasiswa->nim }}" type="text" id="nim-text-input" readonly="true">
							</div>
						</div>
						<div class="form-group m-form__group row {{ $errors->has('kelompok') ? 'has-danger' : '' }}">
							<label for="kelompok-text-input" class="col-2 col-form-label">
								Kelompok
							</label>
							<div class="col-10">
								<input
									class="form-control m-input {{ $errors->has('kelompok') ? 'form-control-danger' : '' }}"
									name="kelompok" placeholder="Kelompok mahasiswa"
									value="{{ $dataMahasiswa->kelompok ?? '' }}" type="text" id="kelompok-text-input">
								{!! $errors->first('kelompok','<div class="form-control-feedback">:message</div>') !!}
							</div>
						</div>
						<div class="form-group m-form__group row {{ $errors->has('cluster') ? 'has-danger' : '' }}">
							<label for="cluster-text-input" class="col-2 col-form-label">
								Cluster
							</label>
							<div class="col-10">
								<input
									class="form-control m-input {{ $errors->has('cluster') ? 'form-control-danger' : '' }}"
									name="cluster" placeholder="Cluster mahasiswa"
									value="{{ $dataMahasiswa->cluster ?? '' }}" type="text" id="cluster-text-input">
								{!! $errors->first('cluster','<div class="form-control-feedback">:message</div>') !!}
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__foot--fit">
							<div class="m-form__actions">
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
								<button type="reset" class="btn btn-secondary">
									Reset
								</button>
							</div>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>
@endsection