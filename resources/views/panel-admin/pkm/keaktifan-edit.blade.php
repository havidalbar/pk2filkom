@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- BEGIN: Subheader -->
		<div class="m-subheader">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title" style="transform: translateY(10px);">
						EDIT
						<small>
							PKM TOUR KEAKTIFAN
						</small>
					</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__body pt-1">
					<form action="{{ route('panel.kegiatan.pkm.keaktifan.update', $pk2mTourKeaktifan->nim) }}"
						class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
						@csrf
						@method('PUT')
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<div class="alert m-alert m-alert--default" role="alert">
									Form edit keaktifan ACADEMY KEAKTIFAN.
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nim') ? 'has-danger' : '' }}">
								<label for="nim-text-input" class="col-3 col-form-label">
									NIM
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nim') ? 'form-control-danger' : '' }}"
										name="nim" placeholder="NIM" value="{{$pk2mTourKeaktifan->nim}}" type="text"
										id="nim-text-input" readonly="true">
									{!! $errors->first('nim', '<div class="form-control-feedback">:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('aktif_rangkaian6') ? 'has-danger' : '' }}">
								<label for="aktif-rangkaian6-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 1
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('aktif_rangkaian6') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian6" placeholder="Nilai Keaktifan Ke - 1"
										value="{{ $pk2mTourKeaktifan->aktif_rangkaian6 }}" type="text"
										id="aktif-rangkaian6-text-input">
									{!! $errors->first('aktif_rangkaian6', '<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('penerapan_nilai_rangkaian6') ? 'has-danger' : '' }}">
								<label for="penerapan-nilai-rangkaian6-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 1
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('penerapan_nilai_rangkaian6') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian6" placeholder="Nilai Penerapan Ke - 1"
										value="{{ $pk2mTourKeaktifan->penerapan_nilai_rangkaian6 }}" type="text"
										id="penerapan-nilai-rangkaian6-text-input">
									{!! $errors->first('penerapan_nilai_rangkaian6', '<div
										class="form-control-feedback">:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('aktif_rangkaian7') ? 'has-danger' : '' }}">
								<label for="aktif-rangkaian7-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 2
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('aktif_rangkaian7') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian7" placeholder="Nilai Keaktifan Ke - 2"
										value="{{ $pk2mTourKeaktifan->aktif_rangkaian7 }}" type="text"
										id="aktif-rangkaian7-text-input">
									{!! $errors->first('aktif_rangkaian7', '<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('penerapan_nilai_rangkaian7') ? 'has-danger' : '' }}">
								<label for="penerapan-nilai-rangkaian7-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 2
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('penerapan_nilai_rangkaian7') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian7" placeholder="Nilai Penerapan Ke - 2"
										value="{{ $pk2mTourKeaktifan->penerapan_nilai_rangkaian7 }}" type="text"
										id="penerapan-nilai-rangkaian7-text-input">
									{!! $errors->first('penerapan_nilai_rangkaian7', '<div
										class="form-control-feedback">:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('aktif_rangkaian8') ? 'has-danger' : '' }}">
								<label for="aktif-rangkaian8-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 3
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('aktif_rangkaian8') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian8" placeholder="Nilai Keaktifan Ke - 3"
										value="{{ $pk2mTourKeaktifan->aktif_rangkaian8 }}" type="text"
										id="aktif-rangkaian8-text-input">
									{!! $errors->first('aktif_rangkaian8', '<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('penerapan_nilai_rangkaian8') ? 'has-danger' : '' }}">
								<label for="penerapan-nilai-rangkaian8-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 3
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('penerapan_nilai_rangkaian8') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian8" placeholder="Nilai Penerapan Ke - 3"
										value="{{ $pk2mTourKeaktifan->penerapan_nilai_rangkaian8 }}" type="text"
										id="penerapan-nilai-rangkaian8-text-input">
									{!! $errors->first('penerapan_nilai_rangkaian8', '<div
										class="form-control-feedback">:message</div>') !!}
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
</div>
@endsection
