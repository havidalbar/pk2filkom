@extends('panel-admin.artikel.core')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title" style="transform: translateY(10px);">
					DATA
					<small>
						ARTIKEL
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
					</div>
				</div>
				<!--end: Search Form -->
				<!--begin: Datatable -->
				<table class="m-datatable" id="html_table" width="100%">
					<thead>
						<tr>
							<th title="No">
								No
							</th>
							<th title="Judul">
								Judul
							</th>
							<th title="Dibuat pada">
								Dibuat pada
							</th>
							<th title="Diubah pada">
								Diubah pada
							</th>
							<th title="Action">
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($artikels as $i => $artikel)
						<tr>
							<td>{{ $i + 1 }}</td>
							<td>{{ $artikel->judul }}</td>
							<td>{{ $artikel->created_at }}</td>
							<td>{{ $artikel->updated_at }}</td>
							<td>
								<div class="btn-group" role="group" aria-label="First group">
									<a href="{{ route('panel.artikel.edit', ['slug' => $artikel->slug]) }}"
										class="m-btn btn btn-warning">
										<i class="fa fa-edit"></i>
									</a>
									<form id="delete-artikel-form-{{ $artikel->id }}"
										action="{{ route('panel.artikel.destroy', ['slug' => $artikel->slug]) }}"
										method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
									</form>
									<a href="javascript:void(0)"
										class="m-btn btn btn-danger"
										id="hapusData"
										data-target="delete-artikel-form-{{ $artikel->id }}">
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
@endsection