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
						PENDATAAN
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
				<div class="m-portlet__body pt-1">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title">
									PENDATAAN DI BOOTH
									<small>
										Open House
									</small>
								</h3>
							</div>
						</div>
					</div>
					<p style="color:red">*Pilihan booth harap diisi terlebih dahulu sebelum melakukan scan/inputan manual</p>
					<div>
						<div class="form-group m-form__group row">
							<label for="nim-absensi-input" class="col-3 col-form-label">
								Booth
							</label>
							<div class="col-9 d-flex justify-content-left">
								<select name="booth" id="booth" onchange="pilihanBooth()" required>
									<option selected disabled value="">Pilih Booth</option>
									@php
									$booths = ['ROBOTIIK', 'BCC', 'DAI KOZUOKU', 'KONTRIBUSI FILKOM', 'AYODEV', 'PMK',
												'KMK', 'POROS','BIOS', 'RAION','LPM DISPLAY','LKI AMD','OPTIIK',
												'K-RISMA','PTI','TI','SI','TIF','TEKKOM']
									@endphp
									@foreach ($booths as $booth)
									<option value="{{ $booth }}">{{ $booth }}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<!-- BEGIN: Subheader Scanner -->
					<div class="m-subheader">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title">
									SCAN QR-CODE
									<small>
										Open House
									</small>
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader Scanner -->
					<div class="col-12">
						<video id="preview" style="max-width:100%"></video>
					</div>
					<script type="text/javascript">
						var booth = "";
						function pilihanBooth() {
							booth = document.getElementById('booth').value;
							document.getElementById("booth_manual").value = booth;
						}
						let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror: false  });
						scanner.addListener('scan', function (content) {
							window.location.href='https://simaba-filkom.ub.ac.id/panel/kegiatan/startup/absensi/open-house' + '?nim_key=' + content +'&booth='+ booth;
						});
						Instascan.Camera.getCameras().then(function (cameras) {
							if (cameras.length > 0) {
								scanner.start(cameras[1]);
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
								<h3 class="m-subheader__title">
								PENDATAAN MANUAL
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
								Pendataan Manual
							</label>
							<div class="col-9 d-flex align-items-center">
								<input class="form-control m-input" name="nim" placeholder="NIM Mahasiswa" type="number"
									id="nim-absensi-input" required>
								<input type="hidden" name="booth" id="booth_manual" value="" required>
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
