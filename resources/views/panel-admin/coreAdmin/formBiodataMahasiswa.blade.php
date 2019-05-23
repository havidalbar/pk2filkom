
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form {{ $ketForm }} data mahasiswa.
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="nim-text-input" class="col-2 col-form-label">
                                NIM
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input" name="nim" placeholder="nim" value="NIM MAHASISWA" type="text" id="nim-text-input" readonly="true">
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('kelompok') ? 'has-danger' : '' }}">
                            <label for="kelompok-text-input" class="col-2 col-form-label">
                                Kelompok
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('kelompok') ? 'form-control-danger' : '' }}" name="kelompok" placeholder="Nama kelompok" value="Kelompok Mahasiswa" type="text" id="kelompok-text-input">
                                {!! $errors->first('kelompok','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('cluster') ? 'has-danger' : '' }}">
                            <label for="cluster-text-input" class="col-2 col-form-label">
                                Cluster
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('cluster') ? 'form-control-danger' : '' }}" name="cluster" placeholder="Nama cluster" value="Cluster Mahasiswa" type="text" id="cluster-text-input">
                                {!! $errors->first('cluster','<div class="form-control-feedback">:message</div>') !!}
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