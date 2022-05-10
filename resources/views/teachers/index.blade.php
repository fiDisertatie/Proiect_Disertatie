@extends('layouts.admin')

@section('title', 'Profesori')
@section('page-title', 'Profesori')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Cadre Didactice</h5>
                    <div class="table-responsive">
                        <table id="teachers" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr>
                                <th>Nr.</th>
                                <th>Nume</th>
                                <th>Statut</th>
                                <th>Categorie Personal</th>
                                <th>Disciplină Post Încadrare</th>
                                <th>Acțiuni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->fullName() }}</td>
                                    <td>{{ $teacher->statut }}</td>
                                    <td>{{ $teacher->categorie_personal }}</td>
                                    <td>{{ $teacher->disciplina_incadrare }}</td>
                                    <td>
                                        <a  class="btn btn-primary" href="#">
                                            Adeverință Încadrare
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
        $('#teachers').dataTable( {
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


