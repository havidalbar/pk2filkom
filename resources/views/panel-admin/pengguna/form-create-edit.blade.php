<div class="m-portlet__body">
	<div class="form-group m-form__group m--margin-top-10">
		<div class="alert m-alert m-alert--default" role="alert">
			Form {{ $ketForm }} data pengguna.
		</div>
	</div>
	<div class="form-group m-form__group row {{ $errors->has('username') ? 'has-danger' : '' }}">
		<label for="pengguna-text-input" class="col-2 col-form-label">
			Username Pengguna
		</label>
		<div class="col-10">
			<input class="form-control m-input {{ $errors->has('username') ? 'form-control-danger' : '' }}"
				name="username" placeholder="Username pengguna"
				value="{{$old->username ?? ($dataPengguna->username ?? '')}}" type="text" id="username-text-input">
			{!! $errors->first('username','<div class="form-control-feedback">:message</div>') !!}
		</div>
	</div>
	<div class="form-group m-form__group row {{ $errors->has('jpengguna') ? 'has-danger' : '' }}">
		<label for="jenispenggunaSelect" class="col-2 col-form-label">
			Divisi
		</label>
		<div class="col-10">
			<select class="form-control m-input {{ $errors->has('jPengguna') ? 'form-control-danger' : '' }}"
				id="jenispenggunaSelect" name="divisi" required>
				<option value="" disabled {{empty($dataPengguna) ? 'selected' : ''}}>
					Pilih divisi
				</option>
				@foreach ($pilihanDivisi as $pilihanDiv)
				<option {{isset($dataPengguna) && $pilihanDiv == $dataPengguna->divisi ? 'selected' : ''}}>
					{{$pilihanDiv}}
				</option>
				@endforeach
			</select>
		</div>
		{!! $errors->first('jPengguna','<div class="form-control-feedback">:message</div>') !!}
	</div>
	@if (empty($dataPengguna))
	<div class="form-group m-form__group row {{ $errors->has('password') ? 'has-danger' : '' }}">
		<label for="password-text-input" class="col-2 col-form-label">
			Password
		</label>
		<div class="col-10">
			<input class="form-control m-input {{ $errors->has('password') ? 'form-control-danger' : '' }}"
				name="password" placeholder="Password" type="password" id="password-text-input">
			{!! $errors->first('password','<div class="form-control-feedback">:message</div>') !!}
		</div>
	</div>
	@endif
	<div class="m-portlet__foot m-portlet__foot--fit">
		<div class="m-form__actions">
			{{csrf_field()}}
			<button type="submit" class="btn btn-primary">
				Submit
			</button>
			<button type="reset" class="btn btn-secondary">
				Reset
			</button>
		</div>
	</div>
</div>