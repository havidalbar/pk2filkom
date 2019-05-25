
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form {{ $ketForm }} data pengguna.
                            </div>
                        </div>
                        @if(strtoupper(Session::get('divisi'))=="PIT" || strtoupper(Session::get('divisi'))=="BPI" || strtoupper(Session::get('divisi'))=="SQC")
                        <div class="form-group m-form__group row {{ $errors->has('pengguna') ? 'has-danger' : '' }}">
                            <label for="pengguna-text-input" class="col-2 col-form-label">
                                Pengguna
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('pengguna') ? 'form-control-danger' : '' }}" name="username" placeholder="Nama pengguna" value="{{$dataPengguna->username}}" type="text" id="pengguna-text-input">
                                {!! $errors->first('pengguna','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('jpengguna') ? 'has-danger' : '' }}">
                            <label for="jenispenggunaSelect" class="col-2 col-form-label">
                                Divisi pengguna
                            </label>
                            <div class="col-10">
                                <select class="form-control m-input {{ $errors->has('jPengguna') ? 'form-control-danger' : '' }}" id="jenispenggunaSelect" name="divisi">
                                    <option>
                                        {{strtoupper($dataPengguna->divisi)}}
                                    </option>
                                    <option>
                                        BPI
                                    </option>
                                    <option>
                                        PIT
                                    </option>
                                    <option>
                                        KOMKES
                                    </option>
                                    <option>
                                        KESTARI
                                    </option>
                                    <option>
                                        PENDAMPING
                                    </option>
                                    <option>
                                        DDM
                                    </option>
                                    <option>
                                        HUMAS
                                    </option>
                                    <option>
                                        SQC
                                    </option>
                                </select>
                            </div>
                            {!! $errors->first('jPengguna','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                        @endif
                        <div class="form-group m-form__group row {{ $errors->has('password') ? 'has-danger' : '' }}">
                            <label for="password-text-input" class="col-2 col-form-label">
                                Password
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('password') ? 'form-control-danger' : '' }}" name="password" placeholder="password" value="{{ $dataPengguna->password }}" type="password" id="password-text-input">
                                {!! $errors->first('password','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div cl
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
