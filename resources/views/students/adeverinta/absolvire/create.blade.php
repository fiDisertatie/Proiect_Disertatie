@extends('layouts.admin')

@section('title', 'Generare Adeverinta Absolvire')
@section('page-title', 'Generare Adeverinta Absolvire')

@section('content')
    <div class="row mt-4">
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="{{ route('students.store.adeverinta.absolvire') }}" method="POST">
                @csrf

                <input value="{{ $student->id }}" type="hidden" name="student_id" >

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-3">Generare Adeverinta Absolvire pentru {{ $student->fullName() }}</h4>

                        <div class="form-group row">
                            <label for="nr_inregistrare" class="col-sm-3 text-end control-label col-form-label">Nr. Inregistrare</label>
                            <div class="col-sm-9">
                                <input value="{{ old('nr_inregistrare') ?? '' }}" type="numeric" class="form-control {{ $errors->first('nr_inregistrare') ? 'is-invalid' : '' }}" id="nr_inregistrare" name="nr_inregistrare" placeholder="Nr. Inregistrare">
                                <div class="invalid-feedback">
                                    {{ $errors->first('nr_inregistrare') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_generare" class="col-sm-3 text-end control-label col-form-label">Data</label>
                            <div class="col-sm-9">
                                <div class="row date-row">
                                    <div class="col-sm-11 pr-0">
                                        <input type="text" class="form-control {{ $errors->first('data_generare') ? 'is-invalid' : '' }}" id="data_generare" name="data_generare" placeholder="zz-ll-aaaa">
                                        <div class="invalid-feedback">
                                            {{ $errors->first('data_generare') }}
                                        </div>
                                    </div>
                                    <div class="col-sm-1 p-0 text-center">
                                        <span class="input-group-text h-100"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foloseste_la" class="col-sm-3 text-end control-label col-form-label">Adeverinta serveste la</label>
                            <div class="col-sm-9">
                                <textarea class="form-control {{ $errors->first('foloseste_la') ? 'is-invalid' : '' }}" id="foloseste_la" name="foloseste_la">{{ old('foloseste_la') ?? '' }}</textarea>
                                <div class="invalid-feedback">
                                    {{ $errors->first('foloseste_la') }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-info text-white">
                                Generează
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="{{ asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $("#data_generare").datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: true,
        });
    </script>
@endsection
