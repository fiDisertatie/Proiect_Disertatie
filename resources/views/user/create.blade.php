@extends('layouts.admin')

@section('title', 'Adăugare Utilizator')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Adăugare Utilizator</h4>

                        <div class="form-group row">
                            <label class="col-sm-3 text-end control-label col-form-label">Rol</label>
                            <div class="col-md-9">
                                <select class="select2 form-select shadow-none select2-hidden-accessible" name="role_id" style="width: 100%; height: 36px" aria-hidden="true">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" >{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-end control-label col-form-label">Nume*</label>
                            <div class="col-sm-9">
                                <input value="{{ old('last_name') ?? '' }}" type="text" class="form-control {{ $errors->first('last_name') ? 'is-invalid' : '' }}" id="lname" name="last_name" placeholder="Nume">
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-end control-label col-form-label">Prenume*</label>
                            <div class="col-sm-9">
                                <input value="{{ old('first_name') ?? '' }}" type="text" class="form-control {{ $errors->first('first_name') ? 'is-invalid' : '' }}" id="fname" name="first_name" placeholder="Prenume">
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-end control-label col-form-label">Email*</label>
                            <div class="col-sm-9">
                                <input value="{{ old('email') ?? '' }}" type="text" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" id="email1"  name="email" placeholder="Email">
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-3 text-end control-label col-form-label">Parolă*</label>
                            <div class="col-sm-9">
                                <input value="{{ old('password') ?? '' }}" type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="Parolă">
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpassword" class="col-sm-3 text-end control-label col-form-label">Confirmare Parolă*</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control {{ $errors->first('password_confirmation') ? 'is-invalid' : '' }}" id="cpassword" name="password_confirmation" placeholder="Confirmare Parolă">
                                <div class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">
                                Adaugă
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


