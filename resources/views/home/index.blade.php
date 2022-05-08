@extends('layouts.admin')

@section('title', 'Acasă')
@section('page-title', 'Acasă')

@section('content')
    <h2>Buna eu sunt pagina acasa</h2>
@endsection

@section('custom-js')
    <script>
        $( document ).ready(function() {
            if ({{ Session::has('success') ? 1 : 0 }})
            {
                toastr.success("{{ Session::get('success') }}", "Succes!");
            }
        });
    </script>
@endsection


