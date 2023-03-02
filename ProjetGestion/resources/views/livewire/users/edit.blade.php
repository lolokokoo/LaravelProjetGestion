@extends('layouts.master')

@section("contenu")
    <div class="row p-4 pt-5">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user-plus fa-2x"></i> Formulaire de modification d'utilisateur</h3>
                </div>

                <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nom</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $user->nom }}">
                                @error("nom")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Prenom</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $user->prenom }}">
                                @error("prenom")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sexe</label>
                            <select class="form-control @error('sexe') is-invalid @enderror" name="sexe">
                                <option value="H">Homme</option>
                                <option value="F">Femme</option>
                            </select>
                            @error("sexe")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Adresse e-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}">
                            @error("email")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Numéro de téléphone 1</label>
                                <input type="text" class="form-control @error('telephone1') is-invalid @enderror" name="telephone1" value="{{ $user->telephone1 }}">
                                @error("telephone1")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Numéro de téléphone 2</label>
                                <input type="text" class="form-control" name="telephone2" value="{{ $user->telephone2 }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Piece d'identité</label>
                            <select class="form-control @error('pieceIdentite') is-invalid @enderror" name="pieceIdentite">
                                <option value="CNI">CNI</option>
                                <option value="PASSPORT">PASSPORT</option>
                                <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                            </select>
                            @error("pieceIdentite")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Numéro de piece d'identité</label>
                            <input type="number" class="form-control  @error('numeroPieceIdentite') is-invalid @enderror" name="numeroPieceIdentite" value="{{ $user->numeroPieceIdentite }}">
                            @error("numeroPieceIdentite")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mot de passe</label>
                            <input type="text" class="form-control" name="password" value="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.users.index') }}"><button type="button"  class="btn btn-danger">Retour</button></a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-lock fa-2x"></i> Réinitialisation de mot de passe</h3>
                        </div>
                        <div class="card-body">
                            <ul>
                                <li>
                                    <a href="{{ route('admin.users.editPassword', ['id' => $user->id]) }}" class="btn btn-link text-decoration-none">
                                        Réinitialiser le mot de passe par défaut
                                    </a>

                                    @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>



                <div class="col-md-12 mt-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-fingerprint fa-2x"></i> Roles & permissions</h3>
                        </div>
                        @foreach($rolesPermissions["roles"] as $role)
                        <div class="card-body">
                            <div class="card-header d-flex justify-content-between rounded">
                                <h4 class="card-title flex-grow-1">
                                    <a  data-parent="#acordion"  href="" aria-expanded="true" class="text-decoration-none text-black">
                                        {{ $role["role_nom"] }}
                                    </a>
                                </h4>
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitchRole{{ $role["role_id"] }}"
                                    @if($role["checked"])
                                        checked
                                    @endif
                                    >
                                    <label class="custom-control-label" for="customSwitchRole{{ $role["role_id"] }}"></label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="p-3">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Permissions</th>
                                    <th></th>
                                </thead>
                                <tbody >
                                @foreach($rolesPermissions["permissions"] as $permission)
                                    <tr>
                                        <td>{{ $permission["permission_nom"] }}</td>
                                        <td>
                                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchPermission{{ $permission["permission_id"] }}"
                                                @if($permission["checked"])
                                                    checked
                                                @endif
                                                >
                                                <label class="custom-control-label" for="customSwitchPermission{{ $permission["permission_id"] }}"></label>
                                            </div>
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
    </div>
@endsection
