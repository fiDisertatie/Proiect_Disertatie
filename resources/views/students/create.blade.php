@extends('layouts.admin')

@section('title', 'Import Elevi')
@section('page-title', 'Import Elevi')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Instructiuni import Elevi</h3>
            <p>Pentru a importa elevi este nevoie de un fisier excel cu extensia .xlsx care sa contina date de forma: </p>
            <img class="tutorial-image" src="{{ asset('img/import_elevi.png') }}"/>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="{{ route('students.import.excel') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Importă Elevi</h5>
                        <div class="form-group row">
                            <label class="col-md-3">Alege Fișier Excel(.xlsx)</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" name="excel_file" class="custom-file-input {{ $errors->first('excel_file') ? 'is-invalid' : '' }}" id="validatedCustomFile" accept=".xlsx">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('excel_file') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-success text-white">
                                Importă
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form enctype="multipart/form-data" action="{{ route('students.truncate') }}" method="POST" id="truncate">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Șterge toți elevii</h5>
                        <div class="form-group row">
                            <label class="col-md-12 text-danger">Atenție! Această acțiune va șterge toate datele din tabelul Elevi.</label>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="button" class="btn btn-danger text-white"  data-bs-toggle="modal" data-bs-target="#delete_modal">
                                Șterge
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">
                        Șterge toți Elevii
                    </h5>
                </div>
                <div class="modal-body">
                    Sigur vrei să ștergi toți Elevii?
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Închide
                    </button>
                    <button type="button" class="btn btn-danger" onclick="truncate()">
                        Da, Șterg
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection

@section('custom-js')
    <script>
        function truncate ()
        {
            $('#truncate').submit();
        }
    </script>
@endsection
