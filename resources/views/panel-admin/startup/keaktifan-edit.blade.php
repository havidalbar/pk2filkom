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
					<form action="{{ route('panel.kegiatan.startup.keaktifan.update',$startupKeaktifan->nim) }}"
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
							<div class="form-group m-form__group row {{ $errors->has('nilaik3') ? 'has-danger' : '' }}">
								<label for="nilaik3-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 3
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilaik3') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian3" placeholder="nilaik3"
										value="{{ $startupKeaktifan->aktif_rangkaian3 }}" type="text"
										id="nilaik3-text-input">
									{!! $errors->first('nilaik3','<div class="form-control-feedback">:message</div>')
									!!}
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nilaip3') ? 'has-danger' : '' }}">
								<label for="nilaip3-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 3
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilaip3') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian3" placeholder="nilaip3"
										value="{{ $startupKeaktifan->penerapan_nilai_rangkaian3 }}" type="text"
										id="nilaip3-text-input">
									{!! $errors->first('nilaip3','<div class="form-control-feedback">:message</div>')
									!!}
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nilaik4') ? 'has-danger' : '' }}">
								<label for="nilaik4-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 4
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilaik4') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian4" placeholder="nilaik4"
										value="{{ $startupKeaktifan->aktif_rangkaian4 }}" type="text"
										id="nilaik4-text-input">
									{!! $errors->first('nilaik4','<div class="form-control-feedback">:message</div>')
									!!}
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nilaip4') ? 'has-danger' : '' }}">
								<label for="nilaip4-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 4
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilaip4') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian4" placeholder="nilaip4"
										value="{{ $startupKeaktifan->penerapan_nilai_rangkaian4 }}" type="text"
										id="nilaip4-text-input">
									{!! $errors->first('nilaip4','<div class="form-control-feedback">:message</div>')
									!!}
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nilaik5') ? 'has-danger' : '' }}">
								<label for="nilaik5-text-input" class="col-3 col-form-label">
									Nilai Keaktifan Ke - 5
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilaik5') ? 'form-control-danger' : '' }}"
										name="aktif_rangkaian5" placeholder="nilaik5"
										value="{{ $startupKeaktifan->aktif_rangkaian5 }}" type="text"
										id="nilaik5-text-input">
									{!! $errors->first('nilaik5','<div class="form-control-feedback">:message</div>')
									!!}
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('nilaip5') ? 'has-danger' : '' }}">
								<label for="nilaip5-text-input" class="col-3 col-form-label">
									Nilai Penerapan Ke - 5
								</label>
								<div class="col-9">
									<input
										class="form-control m-input {{ $errors->has('nilaip5') ? 'form-control-danger' : '' }}"
										name="penerapan_nilai_rangkaian5" placeholder="nilaip5"
										value="{{ $startupKeaktifan->penerapan_nilai_rangkaian5 }}" type="text"
										id="nilaip5-text-input">
									{!! $errors->first('nilaip5','<div class="form-control-feedback">:message</div>')
									!!}
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