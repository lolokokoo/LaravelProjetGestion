@extends('layouts.master')

@section("contenu")
    <div class="row mt-4">
        <div class="container col-4">
            <div class="card">
                <div class="card-header">
                    <h3>Créer un nouvel article</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Type d'article</label>
                            <select class="form-control custom-select" name="type_article_id" id="type_article_id">
                                @foreach($types_article as $type_article)
                                    <option value="{{ $type_article->id }}">{{ $type_article->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom de l'article:</label>
                            <input type="text" class="form-control form-control-sm @error('nom') is-invalid @enderror" id="nom" name="nom">
                            @error("nom")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="noSerie">Numéro de série:</label>
                            <input type="text" class="form-control form-control-sm @error('noSerie') is-invalid @enderror" id="noSerie" name="noSerie" >
                            @error("noSerie")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estDisponible" name="estDisponible">
                            <label class="custom-control-label" for="estDisponible">Disponible ?</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Créer l'article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
