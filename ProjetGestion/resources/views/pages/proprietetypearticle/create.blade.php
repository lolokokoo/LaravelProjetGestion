@extends('layouts.master')

@section("contenu")
    <div class="mx-auto">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row p-4 pt-5">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-primary d-flex align-items-center">
                        <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Ajout d'une propriete au type : {{ $type_article->nom }}</h3>
                        <a href="{{ route('admin.proprietetypearticle.create', [$type_article->id]) }}" class="text-decoration-none text-center text-white">
                            <button class="btn btn-succes"><i class="fa fa-plus"></i> Nouvelle propriété</button>
                        </a>
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
                            <thead class="">
                            <tr>
                                <th style="width: 50%;">Nom</th>
                                <th style="width: 20%;" class="text-center">Obligatoire ?</th>
                                <th style="width: 30%;" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form action="{{ route('admin.proprietetypearticle.store', [$type_article->id]) }}" method="POST">
                                @csrf
                                <tr>
                                    <td class="row">
                                        <input type="text" class="form-control w-50 @error('nom') is-invalid @enderror" name="nom">
                                        @error("nom")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" >
                                            <input type="checkbox" class="custom-control-input" name="estObligatoire" id="estObligatoire">                                           >
                                            <label class="custom-control-label" for="estObligatoire"></label>
                                        </div>
                                    </td>
                                    <div>
                                        <input class="d-none" value="{{ $type_article->id }}" name="type_article_id" id="type_article_id">
                                        <label class="custom-control-label" for="type_article_id"></label>
                                    </div>

                                    <td class="text-center">
                                        <button type="submit" class="btn btn-success">Enregistrer</button>
                                        <a href="{{ route('admin.proprietetypearticle.show', [$type_article->id]) }}"><button type="button"  class="btn btn-danger">Annuler</button></a>
                                    </td>
                                </tr>
                            </form>
                            @foreach($proprietesTypeArticles as $proprietesTypeArticle)
                                <tr>
                                    <td>{{ $proprietesTypeArticle->nom }}</td>
                                    <td class="text-center">
                                        <i class="fas {{ $proprietesTypeArticle->estObligatoire ? "fa-check text-success" : "fa-times text-danger"}}"></i>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.proprietetypearticle.edit', [$type_article->id, $proprietesTypeArticle->id]) }}" class="text-decoration-none">
                                            <button class="btn btn-link"><i class="far fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('admin.proprietetypearticle.delete', [$proprietesTypeArticle->id, $proprietesTypeArticle->id]) }}" class="text-decoration-none">
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
                            {{ $proprietesTypeArticles->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.typesarticles.index') }}">
                <span class="badge badge-danger">Retour</span>
            </a>
        </div>
    </div>
@endsection



















