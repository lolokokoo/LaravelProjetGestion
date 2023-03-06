@extends('layouts.master')

@section("contenu")
    <div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row p-4 pt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des types d'articles</h3>
                        <div class="card-tools d-flex align-items-center">
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
                    <div class="card-body table-responsive p-0 table-striped" style="max-height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 50%;">Types d'article</th>
                                <th style="width: 20%;">Ajouté</th>
                                <th style="width: 30%;" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form action="{{ route('admin.typesarticles.store') }}" method="POST">
                                @csrf
                                <tr>
                                    <td class="row">
                                        <input type="text" class="form-control w-50 @error('nom') is-invalid @enderror" name="nom">
                                        @error("nom")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>

                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                        <a href="{{ route('admin.typesarticles.index') }}"><button type="button"  class="btn btn-danger">Annuler</button></a>
                                    </td>
                                </tr>
                            </form>
                            @foreach($typesarticles as $typesarticle)
                                <tr>
                                    <td>
                                        {{ $typesarticle->nom }}
                                    </td>
                                    <td>
                                        {{ $typesarticle->created_at->diffForHumans() }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.typesarticles.edit', [$typesarticle->id]) }}" class="text-decoration-none">
                                            <button class="btn btn-link"><i class="far fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('admin.typesarticles.delete', [$typesarticle->id]) }}" class="text-decoration-none">
                                            <button class="btn btn-link"><i class="fa fa-trash-alt"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <div class="float-right pagination">
                            <div class="float-right pagination">
                                {{ $typesarticles->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
