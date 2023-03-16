@extends('layouts.master')

@section('contenu')
        <div class="row mt-4 d-flex justify-content-center">
            <div class="card-container d-inline-block col-auto">
                <div class="card">
                    <div class="card-body">
                        <table id="roles-table" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Roles</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->nom}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <script>
                            $(document).ready(function() {
                                $('#roles-table').DataTable({
                                    ordering:  false,
                                    searching: false,
                                    info: false,
                                    paging: false,
                                    "language": { // langage de la datatable
                                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                                    },
                                    "columns": [ // spécification des colonnes
                                        { "orderable": false }, // colonne non triable
                                    ]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card-container">
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <p>Ajouter un role</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin.roles.createRole') }}" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="card-container">
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <p>Ajouter une permission</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>


            <div class="card-container col-auto">
                <div class="card">
                    <div class="card-body">
                        <table id="permissions-table" class="table table-bordered table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Permissions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{$permission->nom}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <script>
                            $(document).ready(function() {
                                $('#permissions-table').DataTable({
                                    ordering:  false,
                                    searching: false,
                                    info: false,
                                    paging: false,
                                    "language": { // langage de la datatable
                                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                                    },
                                    "columns": [ // spécification des colonnes
                                        { "orderable": false }, // colonne non triable
                                    ]
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
@endsection
