@extends('panel-admin.faq.core')
@section('assideKontent')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title" style="transform: translateY(10px);">
					DATA
					<small>
						FAQ
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
							<th>
								ID
							</th>
							<th title="Field #2">
								Pertanyaan
							</th>
							<th title="Field #3">
								Jawaban
							</th>
							<th title="Field #5">
								Action
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($faq as $f) {
							printf('<tr><td>%s</td><td>%s</td><td>%s</td>
								<td>
									<div class="btn-group" role="group" aria-label="First group">
										<a href="%s" class="m-btn btn btn-warning">
											<i class="fa fa-edit"></i>
										</a>
										<form id="delete-artikel-form-%s" action="%s" method="POST">%s</form>
										<a href="javascript:void(0)" onclick="document.getElementById(`delete-artikel-form-%s`).submit()" class="m-btn btn btn-danger">
                                    		<i class="fa fa-trash-o"></i>
                                		</a>
									</div>
								</td>
								</tr>', $f->id, $f->tanya, $f->jawab,
								route('panel.faq.edit', ['id' => $f->id]), $f->id,
								route('panel.faq.destroy', ['id' => $f->id]),
								method_field('DELETE') . csrf_field(), $f->id
							);
						}
						?>
					</tbody>
				</table>
				<!--end: Datatable -->
			</div>
		</div>
	</div>
</div>
@endsection