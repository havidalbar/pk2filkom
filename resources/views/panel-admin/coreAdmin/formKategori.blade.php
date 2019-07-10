
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form {{ $ketForm }} data kategori.
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('kategori') ? 'has-danger' : '' }}">
                            <label for="kategori-text-input" class="col-2 col-form-label">
                                Nama Kategori
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('kategori') ? 'form-control-danger' : '' }}" name="kategori" placeholder="Nama kategori" value="{{ old('kategori') }}" type="text" id="kategori-text-input">
                                {!! $errors->first('kategori','<div class="form-control-feedback">:message</div>') !!}
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
                    </div>