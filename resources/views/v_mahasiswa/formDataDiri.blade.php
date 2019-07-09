@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('css')
<!-- Icon CSS -->
<link rel="stylesheet" href="{{asset('css/form-styles.css')}}">
<!-- Bootstrap-datepicker css -->
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
@endsection

@section('js')
<!-- Bootstrap-datepicker js -->
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.id.min.js')}}"></script>
<script>
	(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    // $('.toast').toast('show');
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>
@endsection

@section('content')

<div class="bg-form-data-diri">
	<div class="container-fluid">
		<div class="row full-height">
			<div class="col-sm">
				<div class="container h-100 d-flex justify-content-center align-items-center animasi slideKeAtas">
					<img src="{{ asset('img/bg-section/simaba4@4x.svg') }}" class="img pk2content">
				</div>
			</div>
			<div class="col-sm bg-form">
				<div class="row h-100 justify-content-center align-items-center">
					<form class="col-sm-12 col-md-9 needs-validation form-container" method="POST" novalidate>
						@csrf
						<h1 class="text-center text-white font-italic">Form Data Diri</h1>
						<div class="form-row pt-2">
							<div class="form-group col-md-6 pt-3">
								<label class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text icon-input">
											<i class="icon-tempat-biru fa-lg"></i>
										</div>
									</div>
									<input type="text" id="coba" class="form-control form-data-diri shadow-none"
										name="tempat_lahir" placeholder="Tempat Lahir"
										value="{{ old('tempat_lahir') ?? $data_mahasiswa->tempat_lahir ?? '' }}"
										required>
									<div class="invalid-feedback">
										Masukkan tempat lahir anda.
									</div>
								</label>
							</div>
							<div class="form-group col-md-6 pt-3">
								<label class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text icon-input"><i class="icon-ttl-biru fa-lg"></i>
										</div>
									</div>
									<input class="tanggal form-control form-data-diri shadow-none" name="tanggal_lahir"
										value="{{ old('tanggal_lahir') ?? $data_mahasiswa->tanggal_lahir ?? '' }}"
										placeholder="Tanggal Lahir" onkeydown="false" required>
									<div class="invalid-feedback">
										Pilih tanggal lahir anda.
									</div>
								</label>
							</div>
						</div>
						<div class="form-group pt-3">
							<label class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text icon-input"><i class="icon-agama-biru fa-lg"></i></div>
								</div>
								<select class="custom-select form-data-diri shadow-none" name="agama" required>
									<option value=""
										{{ $data_mahasiswa->agama == 'Tidak diketahui' || $data_mahasiswa->agama == 'Tidak terdefinisi' || old('agama') < 1 || old('agama') > 6 ? 'selected' : '' }}
										disabled>
										Agama
									</option>
									@php
									$agamas = ['Buddha', 'Hindu', 'Islam', 'Katolik', 'Kristen Protestan', 'Kong Hu Cu']
									@endphp
									@foreach ($agamas as $index => $agama)
									<option value="{{ $index + 1 }}"
										{{ $data_mahasiswa->agama == $agama || old('agama') == ($index + 1) ? 'selected' : '' }}>
										{{ $agama }}</option>
									@endforeach
								</select>
								<div class="invalid-feedback">
									Pilih agama Anda.
								</div>
							</label>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6 pt-3">
								<label class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text icon-input"><i class="icon-gender-biru fa-lg"></i>
										</div>
									</div>
									<select class="custom-select form-data-diri shadow-none" name="jenis_kelamin"
										required>
										<option value=""
											{{ $data_mahasiswa->jenis_kelamin == 'Tidak diketahui' || $data_mahasiswa->jenis_kelamin == 'Tidak terdefinisi' || old('jenis_kelamin') < 1 || old('jenis_kelamin') > 2 ? 'selected' : '' }}
											disabled>
											Jenis Kelamin
										</option>
										@php
										$kelamins = ['Laki-laki', 'Perempuan'];
										@endphp
										@foreach ($kelamins as $index => $kelamin)
										<option value="{{ $index + 1 }}"
											{{ $data_mahasiswa->jenis_kelamin == $kelamin || old('jenis_kelamin') == ($index + 1) ? 'selected' : '' }}>
											{{ $kelamin }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">
										Pilih jenis kelamin anda.
									</div>
								</label>
							</div>
							<div class="form-group col-md-6 pt-3">
								<label class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text icon-input"><i class="icon-goldar-biru fa-lg"></i>
										</div>
									</div>
									<select class="custom-select form-data-diri shadow-none" name="gol_darah" required>
										<option value="" {{ $data_mahasiswa->gol_darah ? '' : 'selected' }} disabled>
											Gol. Darah
										</option>
										@php
										$darahs = ['A', 'AB', 'B', 'O'];
										@endphp
										@foreach ($darahs as $darah)
										<option value="{{ $darah }}"
											{{ $data_mahasiswa->gol_darah == $darah ? 'selected' : '' }}>
											{{ $darah }}</option>
										@endforeach
									</select>
									<div class="invalid-feedback">
										Pilih golongan darah anda.
									</div>
								</label>
							</div>
						</div>
						<div class="form-group pt-3">
							<label class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text icon-input"><i class="icon-sakit-biru fa-lg"></i></div>
								</div>
								<input type="text" class="form-control form-data-diri shadow-none"
									name="riwayat_penyakit" placeholder="Riwayat Penyakit"
									value="{{ old('riwayat_penyakit') ?? $data_mahasiswa->riwayat_penyakit ?? '' }}"
									required>
								<div class="invalid-feedback">
									Masukkan riwayat penyakit yang pernah anda derita. Jika tidak ada isi "Tidak ada".
								</div>
							</label>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6 pt-3">
								<label class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text icon-input"><i class="icon-alergi-biru fa-lg"></i>
										</div>
									</div>
									<input type="text" class="form-control form-data-diri shadow-none"
										value="{{ old('alergi_makanan') ?? $data_mahasiswa->alergi_makanan ?? '' }}"
										name="alergi_makanan" placeholder="Alergi Makanan" required>
									<div class="invalid-feedback">
										Masukkan alergi makanan yang anda miliki. Jika tidak ada isi "Tidak ada".
									</div>
								</label>
							</div>
							<div class="form-group col-md-6 pt-3">
								<label class="input-group">
									<div class="input-group-prepend">
										<div class="input-group-text icon-input"><i class="icon-alergi-biru fa-lg"></i>
										</div>
									</div>
									<input type="text" class="form-control form-data-diri shadow-none"
										name="alergi_obat" placeholder="Alergi Obat"
										value="{{ old('alergi_obat') ?? $data_mahasiswa->alergi_makanan ?? '' }}"
										required>
									<div class="invalid-feedback">
										Masukkan alergi obat yang anda miliki. Jika tidak ada isi "Tidak ada".
									</div>
								</label>
							</div>
						</div>
						<div class="form-group pt-3 pb-4">
							<label class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text icon-input"><i
											class="fa fa-phone fa-lg fa-flip-horizontal"></i>
									</div>
								</div>
								<input type="number" class="form-control form-data-diri shadow-none" name="no_telepon"
									placeholder="Nomor Telepon"
									value="{{ old('no_telepon') ?? $data_mahasiswa->no_telepon ?? '' }}" required>
								<div class="invalid-feedback">
									Masukkan nomor telepon anda.
								</div>
							</label>
						</div>
						<button type="submit" class="btn btn-lg btn-block lanjutkan font-semibold">Lanjutkan</button>
					</form>
				</div>
			</div>
			<div class="alert-form position-fixed">
				<div class="toast" role="alert" data-animation="true">
					<div class="toast-header">
						<strong class="mr-auto">Bootstrap</strong>
						<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="toast-body">
						Silahkan lengkapi terlebih dahulu semua data yang dibutuhkan.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection