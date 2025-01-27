@extends('panel-admin.mahasiswa.core')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- BEGIN: Subheader -->
		<div class="m-subheader">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title" style="transform: translateY(10px);">
						DATA
						<small>
							Kesehatan Mahasiswa
						</small>
					</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__body pt-1">
					<!--begin: Search Form -->
					<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
						<div class="row align-items-center">
							<div class="col-xl-8 order-2 order-xl-1">
								<div class="form-group m-form__group row align-items-center">
									<div class="col-md-4">
										<div class="m-input-icon m-input-icon--left">
											<input type="text" class="form-control m-input m-input--solid"
												placeholder="Search..." id="generalSearch">
											<span class="m-input-icon__icon m-input-icon__icon--left">
												<span>
													<i class="la la-search"></i>
												</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 order-1 order-xl-1 m--align-right">
								<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon">
									<span>
										<i class="la la-cloud-download"></i>
										<span>
											Ekspor Data
										</span>
									</span>
								</a>
								<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon" data-toggle="modal"
									data-target="#import">
									<span>
										<i class="la la-cloud-download"></i>
										<span>
											Import Data
										</span>
									</span>
								</a>
								<div class="m-separator m-separator--dashed d-xl-none"></div>
							</div>
						</div>
					</div>
					<!--end: Search Form -->
					<!--begin: Datatable -->
					<table class="m-datatable" id="html_table" width="100%">
						<thead>
							<tr>
								<th title="NIM">
									NIM
								</th>
								<th title="Nama">
									Nama
								</th>
								<th title="Alergi Makanan">
									Alergi Makanan
								</th>
								<th title="Alergi Obat">
									Alergi Obat
								</th>
								<th title="Penyakit">
									Penyakit
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($mahasiswas as $mahasiswa)
							<tr>
								<td>
									{{ $mahasiswa->nim }}
								</td>
								<td>
									{{ $mahasiswa->nama }}
								</td>
								<td>
									{{ $mahasiswa->alergi_makanan }}
								</td>
								<td>
									{{ $mahasiswa->alergi_obat }}
								</td>
								<td>
									{{ $mahasiswa->riwayat_penyakit }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<!--end: Datatable -->
				</div>
			</div>
		</div>
	</div>
</div>

<!--begin::Modal-->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Import Kesehatan Mahasiswa
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<form action="{{ route('panel.mahasiswa.import.cluster.kelompok') }}" enctype="multipart/form-data"
				class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
				<div class="modal-body">
					{{ csrf_field() }}
					<div class="form-group m-form__group row ">
						<label for="import_cluster" class="col-4 col-form-label">
							File Kesehatan Mahasiswa
						</label>
						<div></div>
						<div class="col-8">
							<input type="file" id="import_cluster" name="import_cluster" required="true"
								accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-primary">
						Send
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!--end::Modal-->
@endsection
