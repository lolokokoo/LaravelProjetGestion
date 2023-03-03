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
                        <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des propriétés du type : {{ $type_article->nom }}</h3>
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
                            @foreach($proprietesTypeArticles as $proprietesTypeArticle)
                                <tr>
                                    <td>{{ $proprietesTypeArticle->nom }}</td>
                                    <td class="text-center">
                                        <i class="fas {{ $proprietesTypeArticle->estObligatoire ? "fa-check text-success" : "fa-times text-danger"}}"></i>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.proprietetypearticle.create') }}" class="text-decoration-none text-center">
                                            <button class="btn btn-link"><i class="fa fa-plus"></i></button>
                                        </a>
                                        <a href="{{ route('admin.proprietetypearticle.edit', [$proprietesTypeArticle->id]) }}" class="text-decoration-none">
                                            <button class="btn btn-link"><i class="far fa-edit"></i></button>
                                        </a>
                                        <a href="{{ route('admin.proprietetypearticle.delete', [$proprietesTypeArticle->id]) }}" class="text-decoration-none">
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



















