
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group m--margin-top-10">
                            <div class="alert m-alert m-alert--default" role="alert">
                                Form {{ $ketForm }} data FAQ.
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('pertanyaan') ? 'has-danger' : '' }}">
                            <label for="pertanyaan-text-input" class="col-2 col-form-label">
                                Pertanyaan
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('pertanyaan') ? 'form-control-danger' : '' }}" name="tanya" placeholder="Pertanyaan" value="{{ old('tanya') ?? ($faq->tanya ?? '') }}" type="text" id="pertanyaan-text-input">
                                {!! $errors->first('pertanyaan','<div class="form-control-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('jawaban') ? 'has-danger' : '' }}">
                            <label for="jawaban-text-input" class="col-2 col-form-label">
                                Jawaban
                            </label>
                            <div class="col-10">
                                <input class="form-control m-input {{ $errors->has('jawaban') ? 'form-control-danger' : '' }}" name="jawab" placeholder="Jawaban" value="{{ old('jawab') ?? ($faq->jawab ?? '') }}" type="text" id="pertanyaan-text-input">
                                {!! $errors->first('jawaban','<div class="form-control-feedback">:message</div>') !!}
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