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
							STARTUP ACADEMY KEAKTIFAN
						</small>
					</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__body pt-1">
					<form action="{{ route('panel.kegiatan.startup.keaktifan.update', $startupKeaktifan->nim) }}"
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
										name="nim" placeholder="NIM" value="{{ $startupKeaktifan->nim }}" type="text"
										id="nim-text-input" readonly="true">
									{!! $errors->first('nim','<div class="form-control-feedback">:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('aktif_rangkaian3') ? 'has-danger' : '' }}">
								<label for="aktif-rangkaian3-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 3
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('aktif_rangkaian3') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian3" placeholder="Nilai Keaktifan Ke - 3"
										value="{{ $startupKeaktifan->aktif_rangkaian3 }}" type="text"
										id="aktif-rangkaian3-text-input">
									{!! $errors->first('aktif_rangkaian3','<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('penerapan_nilai_rangkaian3') ? 'has-danger' : '' }}">
								<label for="penerapan-nilai-rangkaian3-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 3
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('penerapan_nilai_rangkaian3') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian3" placeholder="Nilai Penerapan Ke - 3"
										value="{{ $startupKeaktifan->penerapan_nilai_rangkaian3 }}" type="text"
										id="penerapan-nilai-rangkaian3-text-input">
									{!! $errors->first('penerapan_nilai_rangkaian3','<div class="form-control-feedback">
										:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('aktif_rangkaian4') ? 'has-danger' : '' }}">
								<label for="aktif-rangkaian4-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 4
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('aktif_rangkaian4') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian4" placeholder="Nilai Keaktifan Ke - 4"
										value="{{ $startupKeaktifan->aktif_rangkaian4 }}" type="text"
										id="aktif-rangkaian4-text-input">
									{!! $errors->first('aktif_rangkaian4','<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('penerapan_nilai_rangkaian4') ? 'has-danger' : '' }}">
								<label for="penerapan-nilai-rangkaian4-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 4
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('penerapan_nilai_rangkaian4') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian4" placeholder="Nilai Penerapan Ke - 4"
										value="{{ $startupKeaktifan->penerapan_nilai_rangkaian4 }}" type="text"
										id="penerapan-nilai-rangkaian4-text-input">
									{!! $errors->first('penerapan_nilai_rangkaian4','<div class="form-control-feedback">
										:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('aktif_rangkaian5') ? 'has-danger' : '' }}">
								<label for="aktif-rangkaian5-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 5
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('aktif_rangkaian5') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian5" placeholder="Nilai Keaktifan Ke - 5"
										value="{{ $startupKeaktifan->aktif_rangkaian5 }}" type="text"
										id="aktif-rangkaian5-text-input">
									{!! $errors->first('aktif_rangkaian5','<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('penerapan_nilai_rangkaian5') ? 'has-danger' : '' }}">
								<label for="penerapan-nilai-rangkaian5-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 5
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('penerapan_nilai_rangkaian5') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian5" placeholder="Nilai Penerapan Ke - 5"
										value="{{ $startupKeaktifan->penerapan_nilai_rangkaian5 }}" type="text"
										id="penerapan-nilai-rangkaian5-text-input">
									{!! $errors->first('penerapan_nilai_rangkaian5','<div class="form-control-feedback">
										:message</div>') !!}
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