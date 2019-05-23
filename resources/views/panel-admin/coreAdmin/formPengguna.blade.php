
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form {{ $ketForm }} data pengguna.
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('pengguna') ? 'has-danger' : '' }}">
                            <label for="pengguna-text-input" class="col-2 col-form-label">
                                Pengguna
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('pengguna') ? 'form-control-danger' : '' }}" name="pengguna" placeholder="Nama pengguna" value="{{ old('pengguna') }}" type="text" id="pengguna-text-input">
                                {!! $errors->first('pengguna','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('jpengguna') ? 'has-danger' : '' }}">
                            <label for="jenispenggunaSelect" class="col-2 col-form-label">
                                Jenis pengguna
                            </label>
                            <div class="col-10">
                                <select class="form-control m-input {{ $errors->has('jPengguna') ? 'form-control-danger' : '' }}" id="jenispenggunaSelect" name="jpengguna">
                                    <option>
                                        1
                                    </option>
                                    <option>
                                        2
                                    </option>
                                    <option>
                                        3
                                    </option>
                                </select>
                            </div>
                            {!! $errors->first('jPengguna','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('password') ? 'has-danger' : '' }}">
                            <label for="password-text-input" class="col-2 col-form-label">
                                Password
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('password') ? 'form-control-danger' : '' }}" name="password" placeholder="password" value="{{ old('password') }}" type="password" id="password-text-input">
                                {!! $errors->first('password','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div cl
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