@extends('layouts.admin')

@section('title', 'Elevi')
@section('page-title', 'Elevi')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Elevi</h5>
                    <div class="table-responsive">
                        <table id="students" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Nr.</th>
                                <th>Nume</th>
                                <th>Tip Formatiune</th>
                                <th>Nume Clasa</th>
                                <th>Acțiuni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->fullName() }}</td>
                                    <td>{{ $student->tip_formatiune }}</td>
                                    <td>{{ $student->nume_clasa }}</td>
                                    <td>
                                        <a  class="btn btn-primary d-block m-2" href="#">
                                            Adeverință Elev
                                        </a>
                                        <a  class="btn btn-info d-block m-2" href="#">
                                            Adeverință de Absolvire
                                        </a>
                                    </td>
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
        $('#students').dataTable( {
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


