@extends('layouts.master')

@section("contenu")
    <div class="row mt-4">
        <div class="container col-4">
            <div class="card">
                <div class="card-header">
                    <h3>Edition article</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.articles.update', ['id' => $article->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Type d'article</label>
                            <select class="form-control custom-select" name="type_article_id" id="type_article_id">
                                @foreach($types_article as $type_article)
                                    <option value="{{ $type_article->id }}"
                                            @if($type_article->id == $article->type_article_id)
                                                selected
                                            @endif>{{ $type_article->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom de l'article:</label>
                            <input type="text" class="form-control form-control-sm @error('nom') is-invalid @enderror" id="nom" name="nom"
                                value="{{ $article->nom }}"
                            >
                            @error("nom")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="noSerie">Numéro de série:</label>
                            <input type="text" class="form-control form-control-sm @error('noSerie') is-invalid @enderror" id="noSerie" name="noSerie"
                                value="{{ $article->noSerie }}"
                            >
                            @error("noSerie")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <b class="mt-2">Image actuelle :</b>
                        </div>
                        <img src="{{ asset('img/articles/' . $article->imageUrl) }}" style="max-height: 100px; max-width: 100px" class="mt-2">


                        <div class="form-group mt-2">
                            <label for="image">Nouvelle image ?</label>
                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                            @error("image")
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="estDisponible" name="estDisponible"
                                @if($article->estDisponible)
                                    checked
                                @endif
                            >
                            <label class="custom-control-label" for="estDisponible">Disponible ?</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-2">Editer l'article</button>
                        <a href="{{ route('admin.articles.index') }}">
                            <button type="button" class="btn btn-danger btn-sm mt-2">Retour</button>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
