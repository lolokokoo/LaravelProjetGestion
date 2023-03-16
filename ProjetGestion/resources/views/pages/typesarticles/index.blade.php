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
                            <a href=" {{ route('admin.typesarticles.create') }}" class="btn btn-link text-white mr-4 d-block text-decoration-none"><i class="fas fa-user-plus"></i> Nouveau type d'article</a>
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
                                            <a href="{{ route('admin.proprietetypearticle.show', [$typesarticle->id]) }}" class="text-decoration-none">
                                                <button class="btn btn-link"><i class="fa fa-list"></i></button>
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
