@extends('panel-admin.dashboard', ['menuKiri' => false])
@section('isiKontent')
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-body__content">
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<!-- BEGIN: Subheader -->
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title" style="transform: translateY(10px);">
						DATA
						<small>
							Rekap keaktifan PKM TOUR
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
								<th title="Nilai Keaktifan Rangkaian PKM TOUR Ke - 1">
									Nilai k Ke-1
								</th>
								<th title="Nilai Penerapan Rangkaian PKM TOUR Ke - 1">
									Nilai p Ke-1
								</th>
								<th title="Nilai Keaktifan Rangkaian PKM TOUR Ke - 2">
									Nilai k Ke-2
								</th>
								<th title="Nilai Penerapan Rangkaian PKM TOUR Ke - 2">
									Nilai p Ke-2
								</th>
								<th title="Nilai Keaktifan Rangkaian PKM TOUR Ke - 3">
									Nilai k Ke-3
								</th>
								<th title="Nilai Penerapan Rangkaian PKM TOUR Ke - 3">
									Nilai p Ke-3
								</th>
								<th title="Action">
									Action
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($p2kmTourKeaktifans as $p2kmTourKeaktifan)
							<tr>
								<td>
									{{ $p2kmTourKeaktifan->nim }}
								</td>
								<td>
									{{ $p2kmTourKeaktifan->mahasiswa->nama }}
								</td>
								<td>
									{{ $p2kmTourKeaktifan->aktif_rangkaian6 }}
								</td>
								<td>
									{{ $p2kmTourKeaktifan->penerapan_nilai_rangkaian6 }}
								</td>
								<td>
									{{ $p2kmTourKeaktifan->aktif_rangkaian7 }}
								</td>
								<td>
									{{ $p2kmTourKeaktifan->penerapan_nilai_rangkaian7 }}
								</td>
								<td>
									{{ $p2kmTourKeaktifan->aktif_rangkaian8 }}
								</td>
								<td>
									{{ $p2kmTourKeaktifan->penerapan_nilai_rangkaian8 }}
								</td>
								<td>
									<div class="btn-group" role="group" aria-label="First group">
										<a href="{{ route('panel.kegiatan.pkm.keaktifan.edit', $p2kmTourKeaktifan->nim) }}"
											class="m-btn btn btn-warning">
											<i class="fa fa-edit"></i>
										</a>
										<form
											action="{{ route('panel.kegiatan.pkm.keaktifan.destroy', $p2kmTourKeaktifan->nim) }}"
											id="delete-pkm-keaktifan-{{ $p2kmTourKeaktifan->nim }}" method="POST">
											@csrf
											@method('DELETE')
										</form>
										<a href="javascript:void(0)"
											onclick="document.getElementById('delete-pkm-keaktifan-{{ $p2kmTourKeaktifan->nim }}').submit()"
											class="m-btn btn btn-danger">
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
					Import data keatifan PKM TOUR
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<form action="/pkmKeaktifan" class="m-form m-form--state m-form--fit m-form--label-align-right"
				method="POST">
				<div class="modal-body">
					@csrf
					@method("POST")
					<div class="form-group m-form__group row ">
						<label for="Thumbnail" class="col-4 col-form-label">
							File PKM TOUR KEAKTIFAN
						</label>
						<div></div>
						<div class="col-8">
							<input type="file" name="keatifan" required="true">
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