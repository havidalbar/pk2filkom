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
							PKM TOUR ABSENSI
						</small>
					</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__body pt-1">
					<form action="{{ route('panel.kegiatan.pkm.absensi.update', $p2kmTourAbsensi->nim) }}"
						class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
						@csrf
						@method('PUT')
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<div class="alert m-alert m-alert--default" role="alert">
									Form edit absensi PKM TOUR.
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nim') ? 'has-danger' : '' }}">
								<label for="nim-text-input" class="col-3 col-form-label">
									NIM
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nim') ? 'form-control-danger' : '' }}"
										name="nim" placeholder="NIM" value="{{ $p2kmTourAbsensi->nim }}" type="text"
										id="nim-text-input" readonly="true">
									{!! $errors->first('nim', '<div class="form-control-feedback">:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('nilai_rangkaian6') ? 'has-danger' : '' }}">
								<label for="nilai-rangkaian6-text-input" class="col-3 col-form-label">
									Nilai Rangkaian Ke - 1
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilai_rangkaian6') ? 'form-control-danger' : '' }}"
										name="nilai_rangkaian6" placeholder="Nilai Rangkaian Ke - 1"
										value="{{ $p2kmTourAbsensi->nilai_rangkaian6 }}" type="text"
										id="nilai-rangkaian6-text-input">
									{!! $errors->first('nilai_rangkaian6', '<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('nilai_rangkaian7') ? 'has-danger' : '' }}">
								<label for="nilai-rangkaian7-text-input" class="col-3 col-form-label">
									Nilai Rangkaian Ke - 2
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilai_rangkaian7') ? 'form-control-danger' : '' }}"
										name="nilai_rangkaian7" placeholder="Nilai Rangkaian Ke - 2"
										value="{{ $p2kmTourAbsensi->nilai_rangkaian7 }}" type="text"
										id="nilai-rangkaian7-text-input">
									{!! $errors->first('nilai_rangkaian7', '<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('nilai_rangkaian8') ? 'has-danger' : '' }}">
								<label for="nilai-rangkaian8-text-input" class="col-3 col-form-label">
									Nilai Rangkaian Ke - 3
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilai_rangkaian8') ? 'form-control-danger' : '' }}"
										name="nilai_rangkaian8" placeholder="Nilai Rangkaian Ke - 1"
										value="{{ $p2kmTourAbsensi->nilai_rangkaian8 }}" type="text"
										id="nilai-rangkaian8-text-input">
									{!! $errors->first('nilai_rangkaian8', '<div class="form-control-feedback">:message
									</div>') !!}
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