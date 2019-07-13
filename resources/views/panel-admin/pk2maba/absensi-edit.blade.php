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
							PK2MABA ABSENSI
						</small>
					</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__body pt-1">
					<form action="{{ route('panel.kegiatan.pk2maba.absensi.update', $pk2mabaAbsensi->nim) }}"
						class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
						@csrf
						@method('PUT')
						<div class="m-portlet__body">
							<div class="form-group m-form__group m--margin-top-10">
								<div class="alert m-alert m-alert--default" role="alert">
									Form edit absensi PK2MABA.
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nim') ? 'has-danger' : '' }}">
								<label for="nim-text-input" class="col-3 col-form-label">
									NIM
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nim') ? 'form-control-danger' : '' }}"
										name="nim" placeholder="NIM" value="{{ $pk2mabaAbsensi->nim }}" type="text"
										id="nim-text-input" readonly="true">
									{!! $errors->first('nim','<div class="form-control-feedback">:message</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('nilai_rangkaian1') ? 'has-danger' : '' }}">
								<label for="nilai-rangkaian1-text-input" class="col-3 col-form-label">
									Nilai Rangkaian Ke - 1
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilai_rangkaian1') ? 'form-control-danger' : '' }}"
										name="nilai_rangkaian1" placeholder="Nilai Rangkaian Ke - 1"
										value="{{ $pk2mabaAbsensi->nilai_rangkaian1 }}" type="text"
										id="nilai-rangkaian1-text-input">
									{!! $errors->first('nilai_rangkaian1','<div class="form-control-feedback">:message
									</div>') !!}
								</div>
							</div>
							<div
								class="form-group m-form__group row {{ $errors->has('nilai_rangkaian2') ? 'has-danger' : '' }}">
								<label for="nilai-rangkaian2-text-input" class="col-3 col-form-label">
									Nilai Rangkaian Ke - 2
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilai_rangkaian2') ? 'form-control-danger' : '' }}"
										name="nilai_rangkaian2" placeholder="Nilai Rangkaian Ke - 2"
										value="{{ $pk2mabaAbsensi->nilai_rangkaian2 }}" type="text"
										id="nilai-rangkaian2-text-input">
									{!! $errors->first('nilai_rangkaian2','<div class="form-control-feedback">:message
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