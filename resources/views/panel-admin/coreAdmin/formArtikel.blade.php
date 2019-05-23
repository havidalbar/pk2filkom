
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form {{ $ketForm }} data artikel.
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('artikel') ? 'has-danger' : '' }}">
                            <label for="artikel-text-input" class="col-2 col-form-label">
                                Judul Artikel
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('artikel') ? 'form-control-danger' : '' }}" name="artikel" placeholder="Nama artikel" value="{{ old('artikel') }}" type="text" id="artikel-text-input">
                                {!! $errors->first('artikel','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('jArtikel') ? 'has-danger' : '' }}">
                            <label for="jenisArtikelSelect" class="col-2 col-form-label">
                                Jenis Artikel
                            </label>
                            <div class="col-10">
                                <select class="form-control m-input {{ $errors->has('jArtikel') ? 'form-control-danger' : '' }}" id="jenisArtikelSelect" name="jArtikel">
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
                            {!! $errors->first('jArtikel','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('Thumbnail') ? 'has-danger' : '' }}">
                            <label for="Thumbnail" class="col-2 col-form-label">
                                    Thumbnail
                            </label>
                            <div></div>
                            <div class="col-10">
                                    <input type="file" id="file2" class="{{ $errors->has('Thumbnail') ? 'has-danger' : '' }}" required="true">
                            </div>
                            {!! $errors->first('Thumbnail','<div class="form-control-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="Thumbnail" class="col-2 col-form-label">
                                Konten Inputan Dari mas Albar
                            </label>
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