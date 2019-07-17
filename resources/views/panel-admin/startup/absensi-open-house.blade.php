@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- BEGIN: Subheader -->
		<div class="m-subheader">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title" style="transform: translateY(10px);">
						ABSENSI
						<small>
							Open House
						</small>
					</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__body pt-1" style="text-align:center">
					<video id="preview"></video>
					<script type="text/javascript">
						let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
						scanner.addListener('scan', function (content) {
							window.location.href(window.location.href + '?nim_key=' + content);
						});
						Instascan.Camera.getCameras().then(function (cameras) {
							if (cameras.length > 0) {
								scanner.start(cameras[0]);
							} else {
								alert('Perangkat kamera tidak ditemukan');
							}
						}).catch(function (e) {
							console.error(e);
						});
					</script>
					<!-- BEGIN: Subheader -->
					<div class="m-subheader">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title" style="transform: translateY(10px);">
									ABSENSI MANUAL
									<small>
										Open House
									</small>
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<form>
						<div class="form-group m-form__group row">
							<label for="nim-absensi-input" class="col-3 col-form-label">
								Absensi Manual
							</label>
							<div class="col-9">
								<input class="form-control m-input" name="nim" placeholder="NIM Mahasiswa" type="number"
									id="nim-absensi-input" required>
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
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection