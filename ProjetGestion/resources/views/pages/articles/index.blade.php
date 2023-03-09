@extends('layouts.master')

@section("contenu")
    <div class="mt-1">
        <a href="">
            <span class="badge badge-primary"><i class="fa fa-plus"></i> Nouvel article</span>
        </a>
    </div>
    <div class="mt-3 row">
        @foreach($articles as $article)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-3" style="min-height: 168px">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('img/articles/'.$article->imageUrl) }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                                <div class="float-right">
                                    <span class="badge badge-dark">
                                        @if($article->estDisponible)
                                            Disponible <i class="fa fa-check text-success"></i>
                                        @else
                                            Indisponible <i class="fa fa-times text-danger"></i>
                                        @endif
                                    </span>
                                </div>
                                <p class="card-text">numero de série {{ $article->noSerie }}</p>
                                <div class="d-block">
                                    <div>
                                        <a href="" class="text-decoration-none">
                                            <span class="badge badge-warning"><i class="far fa-edit"></i> Modifier</span>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="">
                                            <span class="badge badge-danger"><i class="fa fa-trash-alt"></i> Supprimer</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
