@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- BEGIN: Subheader -->
		<div class="m-subheader">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title" style="transform: translateY(10px);">
						DATA
						<small>
							Rekap absensi PKM TOUR
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
										<i class="la la-cloud-upload"></i>
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
								<th title="Nilai Rangkaian PKM TOUR Ke - 1">
									Nilai R Ke-1
								</th>
								<th title="Nilai Rangkaian PKM TOUR Ke - 2">
									Nilai R Ke-2
								</th>
								<th title="Nilai Rangkaian PKM TOUR Ke - 3">
									Nilai R Ke-3
								</th>
								<th title="Action">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pk2mTourAbsensis as $pk2mTourAbsensi)
							<tr>
								<td>
									{{ $pk2mTourAbsensi->nim }}
								</td>
								<td>
									{{ $pk2mTourAbsensi->mahasiswa->nama }}
								</td>
								<td>
									{{ $pk2mTourAbsensi->nilai_rangkaian6 }}
								</td>
								<td>
									{{ $pk2mTourAbsensi->nilai_rangkaian7 }}
								</td>
								<td>
									{{ $pk2mTourAbsensi->nilai_rangkaian8 }}
								</td>
								<td>
									<div class="btn-group" role="group" aria-label="First group">
										<a href="{{ route('panel.kegiatan.pkm.absensi.edit', $pk2mTourAbsensi->nim) }}"
											class="m-btn btn btn-warning">
											<i class="fa fa-edit"></i>
										</a>
										<form
											action="{{ route('panel.kegiatan.pkm.absensi.destroy', $pk2mTourAbsensi->nim) }}"
											id="delete-pkm-absensi-{{ $pk2mTourAbsensi->nim }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
										</form>
										<a href="javascript:void(0)"
											class="m-btn btn btn-danger"
											id="hapusData"
											data-target="delete-pkm-absensi-{{ $pk2mTourAbsensi->nim }}">
											<i class="fa fa-trash-o"></i>
										</a>
									</div>
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
					Import data absensi PKM TOUR
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<form action="{{ route('panel.kegiatan.pkm.absensi.store') }}" enctype="multipart/form-data"
				class="m-form m-form--state m-form--fit m-form--label-align-right" method="POST">
				<div class="modal-body">
					{{ csrf_field() }}
					{{ method_field('POST') }}
					<div class="form-group m-form__group row ">
						<label for="Thumbnail" class="col-4 col-form-label">
							File PKM TOUR ABSENSI
						</label>
						<div></div>
						<div class="col-8">
                            <input type="file" id="import_pk2m_tour_absensi" name="import_pk2m_tour_absensi" required="true"
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
