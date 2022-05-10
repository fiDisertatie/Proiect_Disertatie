@extends('layouts.admin')

@section('title', 'Utilizatori')
@section('page-title', 'Utilizatori')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Utilizatori Înregistrați</h5>
                    <div class="table-responsive">
                        <table id="users" class="table table-striped table-bordered dataTable">
                            <thead>
                                <tr>
                                    <th>Nume</th>
                                    <th>Prenume</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->last_name }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom-js')
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        $('#users').dataTable( {
            "language": {
                "search": "Caută:",
                "lengthMenu": "Arată _MENU_ rânduri pe pagină",
                "zeroRecords": "Nu am găsit ce ai căutat",
                "info": "Arăt pagina _PAGE_ din _PAGES_",
                "infoEmpty": "Nu există rânduri în tabel",
                "infoFiltered": "(filtrate din _MAX_ rânduri)",
                "paginate": {
                    "next": "Următoarea",
                    "previous": "Anterior"
                }
            }
        } );
    </script>
@endsection
