@extends('layouts.master')

@section("contenu")
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row p-4 pt-5">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-user-plus fa-2x"></i> Formulaire de modification du type d'article</h3>
                </div>
                <form action="{{ route('admin.typesarticles.update', ['id' => $typeArticle->id]) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $typeArticle->nom }}">
                            @error("nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('admin.typesarticles.index') }}"><button type="button"  class="btn btn-danger">Retour</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
