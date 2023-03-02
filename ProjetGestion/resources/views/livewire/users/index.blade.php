@extends('layouts.master')

@section("contenu")
<div>
    <h1>Page utilisateurs</h1>
    <div class="row p-4 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary d-flex align-items-center">
                    <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs</h3>
                    <div class="card-tools d-flex align-items-center">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-link text-white mr-4 d-block"><i class="fas fa-user-plus"></i> Nouvel utilisateur</a>
                        <div class="input-group input-group-md" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 5%;"></th>
                            <th style="width: 25%;">Utilisateur</th>
                            <th style="width: 20%;">Role</th>
                            <th style="width: 20%;" class="text-center">Ajouté</th>
                            <th style="width: 30%;" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>
                                    @if($user->sexe == "F")
                                        <img src="{{ asset('img/femme.png') }}" style="width: 24px"/>
                                    @else
                                        <img src="{{ asset('img/homme.png') }}" style="width: 24px"/>
                                    @endif
                                </td>
                                <td>{{ $user->prenom . ' ' . $user->nom}}</td>
                                <td>
                                    {{ $user->getAllRolesNamesAttribute() }}
                                </td>
                                <td class="text-center">{{ $user->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <button class="btn btn-link"><i class="far fa-edit"></i></button>
                                    <button class="btn btn-link"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer ">
                    <div class="float-right pagination">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection