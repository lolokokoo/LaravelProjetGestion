@extends('layouts.master')

@section('contenu')
    <form action="{{ route('admin.roles.storePermission') }}" method="POST">
        @csrf
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
                            <p>Valider</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <div class="small-box-footer">
                            <button type="submit" class="btn bg-none"><i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="small-box bg-danger">
                        <div class="inner text-center">
                            <p>Annuler</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <div class="small-box-footer">
                            <a href="{{ route('admin.roles.index') }}" class="btn bg-none"><i class="fas fa-arrow-circle-right"></i></a>
                        </div>
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
                                <tr>
                                    <td class="row mr-1 ml-1">
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom">
                                        @error("nom")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
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
    </form>
@endsection
