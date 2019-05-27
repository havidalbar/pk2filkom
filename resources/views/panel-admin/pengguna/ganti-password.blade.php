@extends('panel-admin.biodataMahasiswa')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper" style="width: 100vh">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title" style="transform: translateY(10px);">
					GANTI PASSWORD
				</h3>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__body pt-1">

				<form class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
					@csrf
					@method('POST')
					<div class="m-portlet__body">
						<div class="form-group m-form__group m--margin-top-10">
							<div class="alert m-alert m-alert--default" role="alert">
								Form ganti password.
							</div>
						</div>
						<div
							class="form-group m-form__group row {{ $errors->has('password_lama') ? 'has-danger' : '' }}">
							<label for="password-lama-input" class="col-2 col-form-label">
								Password Lama
							</label>
							<div class="col-10">
								<input class="form-control m-input" name="password_lama" placeholder="Password lama..."
									type="password" id="password-lama-input">
								{!! $errors->first('password_lama','<div class="form-control-feedback">:message</div>')
								!!}
							</div>
						</div>
						<div
							class="form-group m-form__group row {{ $errors->has('password_baru') ? 'has-danger' : '' }}">
							<label for="password-baru-input" class="col-2 col-form-label">
								Password Baru
							</label>
							<div class="col-10">
								<input
									class="form-control m-input {{ $errors->has('password_baru') ? 'form-control-danger' : '' }}"
									name="password_baru" placeholder="Password baru..." type="password"
									id="password-baru-input">
								{!! $errors->first('password_baru','<div class="form-control-feedback">:message</div>')
								!!}
							</div>
						</div>
						<div
							class="form-group m-form__group row {{ $errors->has('konfirmasi_password_baru') ? 'has-danger' : '' }}">
							<label for="konfirmasi-password-baru-input" class="col-2 col-form-label">
								Konfirmasi Password Baru
							</label>
							<div class="col-10">
								<input
									class="form-control m-input {{ $errors->has('konfirmasi_password_baru') ? 'form-control-danger' : '' }}"
									name="konfirmasi_password_baru" placeholder="Konfirmasi password baru..."
									type="password" id="konfirmasi-password-baru-input">
								{!! $errors->first('konfirmasi_password_baru','<div class="form-control-feedback">
									:message</div>')
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
@endsection